<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Branch;
use App\Models\Specialization;
use App\Models\Doctor;
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
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
            'terms' => 'required',
        ]);
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        User::create($input);
        return redirect()->route('doctor.registration')
                        ->with('success','Doctor Registered successfully');
    }

    public function showLogin(){
        return view('doctor.login');
    }

    public function login(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
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

    public function profile(){
        $branches = DB::table('branches')->get();
        $specializations = Specialization::all();
        $doctor = Doctor::where('user_id', Auth::user()->id)->first();
        return view('doctor.profile', compact('branches', 'specializations', 'doctor'));
    }

    public function appointments(){
        $doctor = Doctor::where('user_id', Auth::user()->id)->first();
        return view('doctor.appointments', compact('doctor'));
    }

    public function leaves(){
        $doctor = Doctor::where('user_id', Auth::user()->id)->first();
        return view('doctor.leaves', compact('doctor'));
    }

    public function settings(){
        $start = strtotime("06:00"); $end = strtotime("22:00");
        $doctor = Doctor::where('user_id', Auth::user()->id)->first();
        return view('doctor.settings', compact('start', 'end', 'doctor'));
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
    public function update(Request $request, $id)
    {
        $doctor = Doctor::where('user_id', Auth::user()->id)->first();
        $did = ($doctor && $doctor->id) ? 'required|unique:doctors,mobile,'.$doctor->id : 'required|unique:doctors,mobile';
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'mobile' => $did,
            'branch' => 'required',
            'spec' => 'required',
            'designation' => 'required',
        ]);
        $input = $request->except(array('_token', 'email', 'name'));        
        $next = Doctor::selectRaw("CONCAT_WS('', 'DOC', LPAD(IFNULL(max(id)+1, 1), 4, '0')) AS docid")->first();
        $input['doctor_id'] = ($request->doctor_id) ? $request->doctor_id : $next->docid;
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
