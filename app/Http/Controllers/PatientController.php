<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    public function showLogin(){
        return view('patient.login');
    }

    public function login(Request $request){
        $this->validate($request, [
            'email' => 'required|numeric|digits:10',
            'password' => 'required|min:4',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials, $request->has('remember'))):            
            return redirect()->intended(route('appointment'))->withSuccess('You have Successfully logged in');
        endif;
        return redirect()->back()->withErrors('Oops! You have entered invalid credentials')->withInput($request->all());
    }
}
