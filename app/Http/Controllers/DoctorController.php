<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\DoctorSettings;
use App\Models\Branch;
use App\Models\Specialization;
use App\Models\Appointment;
use App\Models\Doctor;
use Carbon\Carbon;
use Hash;
use Session;
use DB;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showReg(){
        return view('doctor.registration');
    }

    public function reg(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email:filter|unique:users,email',
            'password' => 'required|confirmed|min:6',
            'terms' => 'required',
        ]);
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        User::create($input);
        return redirect()->route('doctor.login')
                        ->with('success','Doctor Registered successfully');
    }

    public function showLogin(){
        return view('doctor.login');
    }

    public function login(Request $request){
        $this->validate($request, [
            'email' => 'required|email:filter',
            'password' => 'required|min:6',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials, $request->has('remember'))):            
            return redirect()->intended(route('doctor.profile'))->withSuccess('You have Successfully loggedin');
        endif;
        return redirect()->back()->withErrors('Oops! You have entered invalid credentials')->withInput($request->all());
    }

    public function logout() {
        Session::flush();
        Auth::logout();  
        return Redirect('/doctor/login/');
    }    

    public function appointments(){
        $doctor = Doctor::where('user_id', Auth::user()->id)->first();
        return view('doctor.appointments', compact('doctor'));
    }   

    public function reports(){
        $doctor = Doctor::where('user_id', Auth::user()->id)->first();
        return view('doctor.reports', compact('doctor'));
    }

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function profile(){
        $branches = DB::table('branches')->get();
        $specializations = Specialization::all();
        $doctor = Doctor::where('user_id', Auth::user()->id)->first();
        return view('doctor.profile', compact('branches', 'specializations', 'doctor'));
    }

    public function profileupdate(Request $request, $id){
        $doctor = Doctor::where('user_id', Auth::user()->id)->first();
        $did = ($doctor && $doctor->id) ? 'required|numeric|digits:10|unique:doctors,mobile,'.$doctor->id : 'required|numeric|digits:10|unique:doctors,mobile';
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'mobile' => $did,
            'consultation_address' => 'required',
            'branch' => 'required',
            'spec' => 'required',
            'designation' => 'required',
        ]);
        $input = $request->except(array('_token', 'email', 'name'));        
        $next = Doctor::selectRaw("CONCAT_WS('', 'DOC', LPAD(IFNULL(max(id)+1, 1), 4, '0')) AS docid")->first();
        $input['doctor_id'] = ($request->doctor_id) ? $request->doctor_id : $next->docid;
        //$input['status'] = ($doctor && $doctor->status) ? $doctor->getOriginal('status') : 'P';
        if($request->photo):
            $fpath = 'doctor/photo/'.$id.'.png';
            Storage::disk('public')->put($fpath, base64_decode(str_replace(['data:image/jpeg;base64,', 'data:image/png;base64,', ' '], ['', '', '+'], $request->photo)));
            $input['photo'] = $id.'.png';
        endif;
        try{
            DB::transaction(function () use ($input, $request, $id) {
                Doctor::upsert($input, 'user_id');
                User::where('id', $id)->update(['name' => $request->name, 'email' => $request->email]);
            });            
        }catch(Exception $e){
            throw $e;
        }        
        return redirect()->route('doctor.profile')->with('success','Profile updated successfully');
    }

    public function settings(){
        $start = strtotime("06:00"); $end = strtotime("22:00");
        $doctor = Doctor::where('user_id', Auth::user()->id)->first();        
        if($doctor):
            $settings = DoctorSettings::selectRaw("*, TIME_FORMAT(appointment_start_time, '%h:%i %p') AS stime, TIME_FORMAT(break_start_time, '%h:%i %p') AS bstime, TIME_FORMAT(break_end_time, '%h:%i %p') AS betime")->where('doctor_id', $doctor->id)->first();
            return view('doctor.settings', compact('start', 'end', 'doctor', 'settings'));
        else:
            return redirect()->route('doctor.profile')->with('success','Please update profile first to view settings.');
        endif;
    }

    public function settingsupdate(Request $request, $id){
        $this->validate($request, [
            'fee' => 'required',
            'slots' => 'required',
            'time_per_appointment' => 'required',
            'appointment_start_time' => 'required',
            'appointment_open_days' => 'required',
        ]);
        $pwd = ($request->password) ? Hash::make($request->password) : NULL;
        $input = $request->except(array('_token', 'password'));
        $input['appointment_start_time'] = ($request->appointment_start_time) ? Carbon::createFromFormat('h:i A', $request->appointment_start_time)->format('H:i:s') : '00:00';
        $input['appointment_end_time'] = Carbon::createFromFormat('h:i A', date('h:i A', strtotime("22:30")))->format('H:i:s');
        $input['break_start_time'] = ($request->break_start_time) ? Carbon::createFromFormat('h:i A', $request->break_start_time)->format('H:i:s') : '00:00';
        $input['break_end_time'] = ($request->break_end_time) ? Carbon::createFromFormat('h:i A', $request->break_end_time)->format('H:i:s') : '00:00';
        $input['available_for_appointment'] = isset($request->available_for_appointment) ? $request->available_for_appointment : 0;
        if($input['break_start_time'] > $input['break_end_time']):
            return redirect()->route('doctor.settings')->with('error','Break end time should not be greater than Break start time')->withInput($request->all());
        else:
            try{
                DoctorSettings::upsert($input, 'doctor_id');
                if($pwd)
                    $upd = DB::table('users')->where('id', Auth::user()->id)->update(['password' => $pwd]);           
            }catch(Exception $e){
                throw $e;
            }
            return redirect()->route('doctor.settings')->with('success','Settings updated successfully');
        endif;
    }

    public function leaves(){
        $doctor = Doctor::where('user_id', Auth::user()->id)->first();
        if($doctor):
            $leaves = DB::table('doctor_leaves')->selectRaw("DATE_FORMAT(leave_date, '%d/%b/%Y') AS ldate")->where('doctor_id', $doctor->id)->orderByDesc('leave_date')->get();
            return view('doctor.leaves', compact('doctor', 'leaves'));
        else:
            return redirect()->route('doctor.profile')->with('success','Please update profile first to view settings.');
        endif;
    }

    public function leavesupdate(Request $request, $id){
        $this->validate($request, [
            'leave_date' => 'required',
        ]);
        $input = $request->all();
        //$leave_date = Carbon::parse($request->leave_date)->toDateString();
        try{
            $ap = Appointment::whereDate('appointment_date', $request->leave_date)->where('doctor_id', $id)->get();
            $ap1 = DB::table('doctor_leaves')->whereDate('leave_date', $request->leave_date)->where('doctor_id', $id)->first();
            if($ap->isNotEmpty()):
                return redirect()->route('doctor.leaves')->with('error','Oops! You have appointments on provided date.');
            elseif($ap1):
                return redirect()->route('doctor.leaves')->with('error','Oops! You have already leave marked on provided date.');
            else:
                DB::table('doctor_leaves')->insert(['doctor_id' => $id, 'leave_date' => $request->leave_date, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
                return redirect()->route('doctor.leaves')->with('success','Leaves updated successfully');
            endif;      
        }catch(Exception $e){
            throw $e;
        }        
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
