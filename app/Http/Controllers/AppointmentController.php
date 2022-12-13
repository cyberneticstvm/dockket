<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;
use App\Models\Doctor;
use Carbon\Appointment;
use DB;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specs = DB::table('specializations')->orderBy('name')->get();
        $apps = []; $input = [];
        return view('appointment', compact('specs', 'apps', 'input'));
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
    public function show(Request $request)
    {
        $this->validate($request, [
            'spec' => 'required',
            'location' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'radius' => 'required',
            'date' => 'required',
        ]);
        $specs = DB::table('specializations')->orderBy('name')->get();
        $input = array($request->spec, $request->location, $request->latitude, $request->longitude, $request->radius, $request->date);
        $apps = DB::select("SELECT u.name AS docname, d.id, d.doctor_id AS docid, d.photo, d.designation, z.name AS spec, d.consultation_address, DATE_ADD(CURRENT_DATE(), INTERVAL S.appointment_open_days DAY) AS next_available, s.fee, s.slots, s.time_per_appointment, TIME_FORMAT(s.appointment_start_time, '%H:%i') AS stime, TIME_FORMAT(s.appointment_end_time, '%H:%i') AS etime, s.break_start_time, s.break_end_time, 6371 * acos( cos( radians(?) ) * cos( radians( d.con_latitude ) ) * cos( radians( d.con_longitude ) - radians(?) ) + sin( radians(?) ) * sin( radians( d.con_latitude ) ) ) AS distance_km FROM doctors d JOIN users u ON u.id=d.user_id JOIN doctor_settings s ON d.id = s.doctor_id LEFT JOIN specializations as z ON z.id = d.spec WHERE d.status = 'A' AND s.available_for_appointment = 1 AND d.spec = ? AND d.id NOT IN(SELECT DISTINCT(doctor_id) FROM doctor_leaves WHERE leave_date=?) HAVING next_available <= ? AND distance_km <= ?", [$request->latitude, $request->longitude, $request->latitude, $request->spec, $request->date, $request->date, $request->radius]);
        return view('appointment', compact('specs', 'apps', 'input'));
    }

    public function locationmap($id){
        $doctor = Doctor::find($id);
        return view('location-map', compact('doctor'));
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
