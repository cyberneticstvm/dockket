<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Clinic;
use Carbon\Carbon;
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
        $input['password'] = Hash::make($input['password']);
        User::create($input);
        return redirect()->route('clinic.login')
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
        return Redirect('/clinic/login/');
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
            return view('clinic.requests');
        else:
            return redirect()->route('clinic.profile')->with('success','Please update profile first to view requests.');
        endif;
    }

    public function services(){
        $clinic = Clinic::where('user_id', Auth::user()->id)->first();
        $services = DB::select("SELECT s.id, s.name, CASE WHEN c.clinic_id = ? THEN 'Y' ELSE 'N' END AS checked FROM specializations s LEFT JOIN clinic_services c ON c.service_id = s.id WHERE s.category = 2", [$clinic->id]);
        if($clinic):
            return view('clinic.services', compact('services'));
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
}
