<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Branch;
use App\Models\Doctor;
use App\Models\User;
use App\Models\Clinic;
use App\Models\Appointment;
use App\Models\ServiceRequest;
use App\Models\Specialization;
use Carbon\Carbon;
use DB;
use Hash;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */

    public function __construct(){
        //$this->type = (Route::currentRouteName() == 'appointment.show') ? 'A' : 'S';
    }

    public function index()
    {
        $specs = DB::table('specializations')->where('category', 1)->orderBy('name')->get();
        $apps = []; $input = [];
        return view('appointment', compact('specs', 'apps', 'input',));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'appointment_time' => 'required',
            'patient_name' => 'required',
            'mobile' => 'required',
        ]);
        $input = $request->all();
        $input['appointment_time'] = ($request->appointment_time) ? Carbon::createFromFormat('h:i A', $request->appointment_time)->format('H:i:s') : '00:00';
        $token = Appointment::where('doctor_id', $request->doctor_id)->whereDate('appointment_date', $request->appointment_date)->max('token');
        $input['token'] = ($token > 0) ? $token+1 : 1;
        if($request->log == 1 && $request->email):
            $patient['name'] = $input['patient_name'];
            $patient['email'] = $input['email'];
            $patient['mobile'] = $input['mobile'];
            $patient['password'] = Hash::make($input['password']);
            $patient['user_type'] = 'P'; // Patient
            $patient['user_status'] = 'A';
            User::upsert($patient, 'email');
            $user = User::where('email', $request->email)->first();
            Auth::login($user);           
        endif;        
        $input['user_id'] = (Auth::user()) ? Auth::user()->id : 0;
        $app = Appointment::create($input);
        $doctor = Doctor::find($request->doctor_id); $user = User::find($doctor->user_id);
        $token = $input['token']; $date = $request->appointment_date; $time = $request->appointment_time; $type = 'A';
        return view('message', compact('token', 'date', 'time', 'doctor', 'app', 'user', 'type'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $this->validate($request, [
            'spec' => 'required',
            'location' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'radius' => 'required|numeric',
            'date' => 'required',
        ]);
        $specs = DB::table('specializations')->where('category', 1)->orderBy('name')->get();
        $input = array($request->spec, $request->location, $request->latitude, $request->longitude, $request->radius, $request->date);
        $apps = DB::select("SELECT u.name AS docname, d.id, d.doctor_id AS docid, d.photo, d.designation, d.con_latitude, d.con_longitude, z.name AS spec, d.consultation_address, b.name AS bname, DATE_ADD(CURRENT_DATE(), INTERVAL s.appointment_open_days DAY) AS next_available, s.fee, s.slots, s.time_per_appointment, TIME_FORMAT(s.appointment_end_time, '%H:%i') AS etime, CASE WHEN ? = CURRENT_DATE() AND TIME_FORMAT(s.appointment_start_time, '%H:%i') < TIME_FORMAT(?, '%H:%i') THEN TIME_FORMAT(DATE_ADD(?, INTERVAL 60 MINUTE), '%H:00') ELSE TIME_FORMAT(s.appointment_start_time, '%H:%i') END AS stime, s.break_start_time AS bstime, s.break_end_time AS betime, 6371 * acos( cos( radians(?) ) * cos( radians( d.con_latitude ) ) * cos( radians( d.con_longitude ) - radians(?) ) + sin( radians(?) ) * sin( radians( d.con_latitude ) ) ) AS distance_km FROM doctors d JOIN users u ON u.id=d.user_id JOIN doctor_settings s ON d.id = s.doctor_id LEFT JOIN specializations as z ON z.id = d.spec LEFT JOIN branches AS b ON b.id = d.branch WHERE d.status = 'A' AND s.available_for_appointment = 1 AND IF(? = 0, 1, d.spec = ?) AND d.id NOT IN(SELECT DISTINCT(doctor_id) FROM doctor_leaves WHERE leave_date=?) HAVING next_available <= ? AND distance_km <= ? ORDER BY distance_km ASC", [$request->date, Carbon::now(), Carbon::now(), $request->latitude, $request->longitude, $request->latitude, $request->spec, $request->spec, $request->date, $request->date, $request->radius]);
        return view('appointment', compact('apps', 'input', 'specs'));
    }

    public function showserviceRequest(){
        $services = DB::table('specializations')->where('category', 2)->orderBy('name')->get();
        $input = []; $clinics = [];
        return view('service', compact('services', 'input', 'clinics'));
    }

    public function serviceRequest(Request $request){
        $this->validate($request, [
            'serv' => 'required',
            'location' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'radius' => 'required|numeric',
            'date' => 'required',
        ]);
        $input = array($request->serv, $request->location, $request->latitude, $request->longitude, $request->radius, $request->date);
        $services = DB::table('specializations')->where('category', 2)->orderBy('name')->get();
        $clinics = DB::select("SELECT cs.clinic_id, cs.service_id, u.name, u.email, c.mobile, c.latitude, c.longitude, c.address, 6371 * acos( cos( radians(?) ) * cos( radians( c.latitude ) ) * cos( radians( c.longitude ) - radians(?) ) + sin( radians(?) ) * sin( radians( c.latitude ) ) ) AS distance_km FROM clinic_services cs JOIN clinics c ON c.id = cs.clinic_id LEFT JOIN users u ON u.id = c.user_id WHERE IF(? = 0, 1, cs.service_id = ?) AND c.status = 'A' GROUP BY cs.clinic_id HAVING distance_km <= ? ORDER BY distance_km ASC", [$request->latitude, $request->longitude, $request->latitude, $request->serv, $request->serv, $request->radius]);
        return view('service', compact('services', 'input', 'clinics'));
    }

    public function saveService(Request $request){
        $this->validate($request, [
            'patient_name' => 'required',
            'mobile' => 'required',
        ]);
        $input = $request->only(array('mobile', 'email'));
        $input1 = $request->all();
        $input['name'] = $request->patient_name;
        $input['password'] = Hash::make($request->password);
        $input['user_type'] = 'P';
        $input['user_status'] = 'A';
        if($request->log == 1 && $request->email):
            User::upsert($input, 'email');
            $user = User::where('email', $request->email)->first();
            Auth::login($user);            
        endif;        
        $input1['user_id'] = (Auth::user()) ? Auth::user()->id : 0;
        $service = ServiceRequest::create($input1);
        $clinic = Clinic::find($request->clinic_id);
        $date = $request->service_date; $type = 'S';
        $ss = Specialization::find($request->service_id);
        $sname = ($ss) ? $ss->name : 'All';
        return view('message', compact('date', 'clinic', 'service', 'user', 'type', 'sname'));
    }

    public function locationmap($id){
        $doctor = Doctor::find($id);
        return view('location-map', compact('doctor'));
    }
    public function locationmapc($id){
        $clinic = Clinic::find($id);
        return view('location-map-clinic', compact('clinic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
