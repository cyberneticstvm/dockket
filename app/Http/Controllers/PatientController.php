<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Appointment;
use Session;
use DB;

class PatientController extends Controller
{
    public function showLogin(){
        return view('patient.login');
    }

    public function login(Request $request){
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials, $request->has('remember'))):            
            return redirect()->intended(route('appointment'))->withSuccess('You have Successfully logged in');
        endif;
        return redirect()->back()->withErrors('Oops! You have entered invalid credentials')->withInput($request->all());
    }

    public function logout() {
        Session::flush();
        Auth::logout();  
        return Redirect('/');
    } 

    public function myappointments(){
        $appointments = Appointment::where('user_id', Auth::user()->id)->orderByDesc('appointment_date')->get();
        $services = DB::table("service_requests")->where('user_id', Auth::user()->id)->orderByDesc('service_date')->get();
        return view('patient.appointments', compact('appointments', 'services'));
    }
}
