<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Clinic;
use Carbon\Carbon;
use DB;

class HelperController extends Controller
{
    public function index(){
        $doctors = Doctor::leftJoin('users as u', 'doctors.user_id', '=', 'u.id')->leftJoin('specializations as s', 's.id', '=', 'doctors.spec')->leftJoin('doctor_settings as ds', 'doctors.id', '=', 'ds.doctor_id')->select('u.name as dname', 'doctors.designation', 'doctors.photo', 's.name as spec')->where('doctors.status', 'A')->where('ds.available_for_appointment', 1)->limit(10)->get();
        $clinics = Clinic::leftJoin('users as u', 'u.id', '=', 'clinics.user_id')->select('u.name', 'clinics.address')->where('clinics.status', 'A')->limit(10)->get();
        return view('index', compact('doctors', 'clinics'));
    }
}
