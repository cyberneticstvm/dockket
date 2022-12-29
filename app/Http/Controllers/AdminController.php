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

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLogin(){
        return view('admin.login');
    }

    public function login(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials, $request->has('remember'))):            
            return redirect()->intended(route('admin.dash'))->withSuccess('You have Successfully loggedin');
        endif;
        return redirect()->back()->withErrors('Oops! You have entered invalid credentials')->withInput($request->all());
    }

    public function dash(){
        return view('admin.dash');
    }

    public function appointments(){
        $apps = Appointment::leftJoin('doctors as d', 'd.id', '=', 'appointments.doctor_id')->leftJoin('users as u', 'u.id', '=', 'd.user_id')->selectRaw("d.doctor_id, u.name, count(appointments.id) AS acount, DATE_FORMAT(appointments.appointment_date, '%d/%b/%Y') AS adate")->whereBetween('appointments.appointment_date', [Carbon::today(), Carbon::today()])->groupBy('appointments.doctor_id')->orderBy('u.name')->get();
        return view('admin.appointments', compact('apps'));
    }

    public function specialization(){
        $branches = DB::table('branches')->get();
        $specs = Specialization::leftJoin('branches as b', 'b.id', '=', 'specializations.branch')->select('specializations.id', 'specializations.name as sname', 'b.name as bname')->orderBy('specializations.name', 'ASC')->get();
        return view('admin.specializations', compact('branches', 'specs'));
    }

    public function specializationsave(Request $request){
        $this->validate($request, [
            'name' => 'required|unique:specializations,name',
            'branch' => 'required',
        ]);
        $input = $request->all();
        Specialization::create($input);
        return redirect()->route('admin.specialization')->with('success','Record added successfully');
    }

    public function specializationedit($id){
        $branches = DB::table('branches')->get();
        $spec = Specialization::find($id);
        return view('admin.edit-specialization', compact('branches', 'spec'));
    }

    public function specializationupdate(Request $request, $id){
        $this->validate($request, [
            'name' => 'required|unique:specializations,name,'.$id,
            'branch' => 'required',
        ]);
        $input = $request->all();
        $spec = Specialization::find($id);
        $spec->update($input);
        return redirect()->route('admin.specialization')->with('success','Record updated successfully');
    }

    public function specializationdelete($id){
        Specialization::find($id)->delete();
        return redirect()->route('admin.specialization')
                        ->with('success','Record deleted successfully');
    }

    public function doctors(){
        $doctors = Doctor::leftJoin('users as u', 'u.id', 'doctors.user_id')->select('doctors.id', 'u.name', 'u.email', 'doctors.doctor_id', DB::raw("CASE WHEN doctors.status = 'P' THEN 'Pending' ELSE 'Approved' END AS status"))->orderBy('u.name', 'ASC')->get();
        return view('admin.doctors', compact('doctors'));
    }

    public function doctoredit($id){
        $branches = DB::table('branches')->get();
        $specializations = Specialization::all();
        $doctor = Doctor::find($id);
        $user = User::where('id', $doctor->user_id)->first();
        return view('admin.edit-doctor', compact('branches', 'specializations', 'doctor', 'user'));
    }

    public function clinics(){
        $clinics = [];
        return view('admin.clinic', compact('clinics'));
    }

    public function doctorupdate(Request $request, $id){
        $doctor = Doctor::find($id);
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$doctor->user_id,
            'mobile' => 'required|unique:doctors,mobile,'.$id,
            'branch' => 'required',
            'spec' => 'required',
            'designation' => 'required',
        ]);
        $input = $request->all();        
        try{
            DB::transaction(function () use ($input, $request, $doctor, $id) {
                $doctor->update($input);
                User::where('id', $doctor->user_id)->update(['name' => $request->name, 'email' => $request->email]);
            });            
        }catch(Exception $e){
            throw $e;
        }        
        return redirect()->route('admin.doctor')->with('success','Doctor updated successfully');
    }

    public function doctordelete($id){
        $doctor = Doctor::find($id);
        User::where('id', $doctor->user_id)->delete();
        $doctor->delete();
        return redirect()->route('admin.doctor')
                        ->with('success','Record deleted successfully');
    }

    public function settings(){
        $settings = DB::table('admin_settings')->find(1);
        return view('admin.settings', compact('settings'));
    }    

    public function settingsupdate(Request $request){
        $this->validate($request, [
            'default_pay_days' => 'required',
        ]);
        $pwd = ($request->password) ? Hash::make($request->password) : NULL;
        $upd = DB::table('admin_settings')->where('id', 1)->update(['default_pay_days' => $request->default_pay_days]);
        if($pwd):
            $upd = DB::table('users')->where('id', Auth::user()->id)->update(['password' => $pwd]);
        endif;
        return redirect()->route('admin.settings')->with('success','Settings updated successfully');
    }

    public function logout() {
        Session::flush();
        Auth::logout();  
        return Redirect('/admin/login/');
    }
    public function index()
    {
        //
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
