<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Clinic;
use App\Models\Specialization;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Hash;
use Session;
use DB;

class ClinicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateClinicRequestStatus(Request $request){
        $rid = $request->rid; $val = $request->val;
        DB::table('service_requests')->where('id', $rid)->update(['status' => $val]);
        echo "Status Updated Successfully!";
    }

    public function showReg(){
        return view('clinic.registration');
    }

    public function reg(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email:filter|unique:users,email',
            'password' => 'required|confirmed|min:6',
            'terms' => 'required',
        ]);
        $input = $request->all();
        $token = Str::random(64);
        $input['password'] = Hash::make($input['password']);
        $input['email_token'] = $token;
        $user = User::create($input);
        Auth::login($user);
        return redirect()->route('clinic.profile')
                        ->with('success','Clinic Registered successfully');
    }

    public function showLogin(){
        return view('clinic.login');
    }

    public function login(Request $request){
        $this->validate($request, [
            'email' => 'required|email:filter',
            'password' => 'required|min:6',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials, $request->has('remember'))):            
            return redirect()->intended(route('clinic.profile'))->withSuccess('You have Successfully loggedin');
        endif;
        return redirect()->back()->withErrors('Oops! You have entered invalid credentials')->withInput($request->all());
    }

    public function logout() {
        Session::flush();
        Auth::logout();  
        return Redirect('/');
    } 

    public function index()
    {
        $clinic = Clinic::where('user_id', Auth::user()->id)->first();
        return view('clinic.profile', compact('clinic'));
    }

    public function profileupdate(Request $request, $id){
        $clinic = Clinic::where('user_id', Auth::user()->id)->first();
        $did = ($clinic && $clinic->id) ? 'required|numeric|digits:10|unique:clinics,mobile,'.$clinic->id : 'required|numeric|digits:10|unique:clinics,mobile';
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'mobile' => $did,
            'address' => 'required',
        ]);
        $input = $request->except(array('_token', 'email', 'name'));
        if($request->photo && $clinic->id):
            $doc = $request->file('photo');
            $fname = 'clinic/photo/'.$clinic->id.'/'.$doc->getClientOriginalName();
            Storage::disk('public')->putFileAs($fname, $doc, '');
            $input['photo'] = $doc->getClientOriginalName();
        endif;        
        try{
            DB::transaction(function () use ($input, $request, $id) {
                Clinic::upsert($input, 'user_id');
                User::where('id', $id)->update(['name' => $request->name, 'email' => $request->email]);
            });            
        }catch(Exception $e){
            throw $e;
        }        
        return redirect()->route('clinic.profile')->with('success','Profile updated successfully');
    }

    public function requests(){
        $clinic = Clinic::where('user_id', Auth::user()->id)->first();
        if($clinic):
            $requests = DB::table('service_requests as sr')->leftJoin('specializations as s', 's.id', '=', 'sr.service_id')->selectRaw("sr.*, s.name as sname, CASE WHEN sr.status = 'P' THEN 'Pending' ELSE 'Completed' END AS st")->whereDate('service_date', Carbon::today())->where('clinic_id', $clinic->id)->orderByDesc('status')->get();
            $inputs = [];
            return view('clinic.requests', compact('requests', 'inputs'));
        else:
            return redirect()->route('clinic.profile')->with('success','Please update profile first to view requests.');
        endif;
    }

    public function services(){
        $clinic = Clinic::where('user_id', Auth::user()->id)->first();
        $services = Specialization::where('category', 2)->get();
        $clinic_services = ($clinic) ? DB::table('clinic_services')->where('clinic_id', $clinic->id)->get() : [];
        if($clinic):
            return view('clinic.services', compact('services', 'clinic_services'));
        else:
            return redirect()->route('clinic.profile')->with('success','Please update profile first to view services.');
        endif;
    }

    public function servicesUpdate(Request $request){
        $clinic = Clinic::where('user_id', Auth::user()->id)->first();
        $this->validate($request, [
            'service' => 'present|array',
        ]);
        $services = $request->service;
        try{
            foreach($services as $key => $service):
                $data[] = [
                    'clinic_id' => $clinic->id,
                    'service_id' => $services[$key],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ];
            endforeach;
            DB::transaction(function() use ($data, $clinic) {
                DB::table("clinic_services")->where('clinic_id', $clinic->id)->delete();
                DB::table('clinic_services')->insert($data);
            });
            return redirect()->route('clinic.services')->with('success','Services updated successfully.');        
        }catch(Exception $e){
            throw $e;
        }        
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

    public function fetchappointments(Request $request){
        $clinic = Clinic::where('user_id', Auth::user()->id)->first();
        $this->validate($request, [
            'from_date' => 'required',
            'to_date' => 'required',
        ]);
        $inputs = array($request->from_date, $request->to_date);
        $apps = $requests = DB::table('service_requests as sr')->leftJoin('specializations as s', 's.id', '=', 'sr.service_id')->selectRaw("sr.*, s.name as sname, CASE WHEN sr.status = 'P' THEN 'Pending' ELSE 'Completed' END AS st")->whereBetween('service_date', [$request->from_date, $request->to_date])->where('clinic_id', $clinic->id)->orderByDesc('status')->get();
        return view('clinic.requests', compact('requests', 'inputs'));
    }
}
