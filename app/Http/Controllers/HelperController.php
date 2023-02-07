<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Clinic;
use App\Models\User;
use Carbon\Carbon;
use DB;
use Mail;
use Hash;

class HelperController extends Controller
{
    public function index(){
        $doctors = Doctor::leftJoin('users as u', 'doctors.user_id', '=', 'u.id')->leftJoin('specializations as s', 's.id', '=', 'doctors.spec')->leftJoin('doctor_settings as ds', 'doctors.id', '=', 'ds.doctor_id')->select('u.name as dname', 'doctors.designation', 'doctors.photo', 's.name as spec')->where('doctors.status', 'A')->where('ds.available_for_appointment', 1)->limit(10)->get();
        $clinics = Clinic::leftJoin('users as u', 'u.id', '=', 'clinics.user_id')->select('u.name', 'clinics.address')->where('clinics.status', 'A')->limit(10)->get();
        return view('index', compact('doctors', 'clinics'));
    }

    public function forgot(){
        return view('forgot');
    }

    public function forgotemail(Request $request){
        $this->validate($request, [
            'email' => 'required|email:filter',
        ]);
        $user = User::where('email', $request->email)->first();
        if($user):
            Mail::send('email.password-reset', ['user' => $user], function($message) use($request){
                $message->to($request->email);
                $message->subject('Dockket - Password Reset Link');
            });        
            return redirect()->route('forgot')->with('success','Password chnage link has been sent to your registered email successfully. Please check your inbox/spam folder and click the password change link.');
        else:
            return redirect()->route('forgot')->with('error','Provided email id could not found in the records. Please try with another email id.')->withInput($request->all());
        endif;
    }

    public function contactemail(Request $request){
        $this->validate($request, [
            'email' => 'required|email:filter',
            'name' => 'required',
            'subject' => 'required',
            'mobile' => 'required|numeric|digits:10',
            'subject' => 'required',
        ]);
        Mail::send('email.contact', ['sender' => $request], function($message){
            $message->to('mail@dockket.in');
            $message->subject('Dockket - New message has been received');
        });        
        return redirect()->route('contact')->with('success','Your message has been sent successfully.');
    }

    public function resetpassword($token){
        $user = User::where('email_token', $token)->first();
        if($user):
            return view('change-password', compact('user'));
        else:
            return view('error');
        endif;
    }

    public function updatepassword(Request $request){
        $this->validate($request, [
            'password' => 'required|confirmed',
            'token' => 'required',
        ]);
        $password = Hash::make($request->password);
        try{
            User::where('email_token', $request->token)->where('id', $request->user_id)->update(['password' => $password]);
        }catch(Exception $e){
            throw $e;
        }
        return redirect()->back()
                        ->with('success', "You've successfully updated your password. Please Login to continue.");
    }

    public function error(){
        return view('error');
    }
}
