<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelperController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ClinicController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HelperController::class, 'index'])->name('index');
Route::get('/login', function () {
    return view('doctor.login');
})->name('login');

Route::get('/appointment/', [AppointmentController::class, 'index'])->name('appointment');
Route::post('/appointment/', [AppointmentController::class, 'show'])->name('appointment.show');
Route::get('/service-request/', [AppointmentController::class, 'showserviceRequest'])->name('appointment.service');
Route::post('/service-request/', [AppointmentController::class, 'serviceRequest'])->name('appointment.service.request');
Route::post('/service-request/create/', [AppointmentController::class, 'saveService'])->name('service.save');
Route::post('/appointment/create/', [AppointmentController::class, 'store'])->name('appointment.save');
Route::get('/appointment/locationmap/{id}/', [AppointmentController::class, 'locationmap'])->name('appointment.locationmap');
Route::get('/clinic/locationmap/{id}/', [AppointmentController::class, 'locationmapc'])->name('clinic.locationmap');

Route::get('/doctor/registration/', [DoctorController::class, 'showReg'])->name('doctor.show.registration');
Route::post('/doctor/registration/', [DoctorController::class, 'reg'])->name('doctor.registration');
Route::get('/doctor/login/', [DoctorController::class, 'showLogin'])->name('doctor.show.login');
Route::post('/doctor/login/', [DoctorController::class, 'login'])->name('doctor.login');

Route::get('/clinic/registration/', [ClinicController::class, 'showReg'])->name('clinic.show.registration');
Route::post('/clinic/registration/', [ClinicController::class, 'reg'])->name('clinic.registration');
Route::get('/clinic/login/', [ClinicController::class, 'showLogin'])->name('clinic.show.login');
Route::post('/clinic/login/', [ClinicController::class, 'login'])->name('clinic.login');

Route::get('/patient/login/', [PatientController::class, 'showLogin'])->name('patient.show.login');
Route::post('/patient/login/', [PatientController::class, 'login'])->name('patient.login');

Route::get('/admin/login/', [AdminController::class, 'showLogin'])->name('admin.show.login');
Route::post('/admin/login/', [AdminController::class, 'login'])->name('admin.login');

Route::group(['middleware' => ['auth', 'doctor']], function(){
    Route::get('/doctor/profile/', [DoctorController::class, 'profile'])->name('doctor.profile');
    Route::post('/doctor/profile/{id}/', [DoctorController::class, 'profileupdate'])->name('doctor.profile.update');

    Route::get('/doctor/settings/', [DoctorController::class, 'settings'])->name('doctor.settings');
    Route::post('/doctor/settings/{id}/', [DoctorController::class, 'settingsupdate'])->name('doctor.settings.update');
    Route::get('/getBreakTime/', [DoctorController::class, 'getBreakTime']);

    Route::get('/doctor/leaves/', [DoctorController::class, 'leaves'])->name('doctor.leaves');
    Route::post('/doctor/leaves/{id}/', [DoctorController::class, 'leavesupdate'])->name('doctor.leaves.update');

    Route::get('/doctor/appointments/', [DoctorController::class, 'appointments'])->name('doctor.appointments');
    Route::post('/doctor/appointments/', [DoctorController::class, 'saveappointments'])->name('doctor.appointments.save');
    
    
    Route::get('/doctor/reports/', [DoctorController::class, 'reports'])->name('doctor.reports');
    Route::post('/doctor/reports/', [DoctorController::class, 'getAppointmentSummary'])->name('doctor.report.appointments');
    Route::get('/doctor/logout/', [DoctorController::class, 'logout'])->name('doctor.logout');
    
});

Route::group(['middleware' => ['auth', 'clinic']], function(){
    Route::get('/clinic/profile/', [ClinicController::class, 'index'])->name('clinic.profile');
    Route::post('/clinic/profile/{id}/', [ClinicController::class, 'profileupdate'])->name('clinic.profile.update');

    Route::get('/clinic/requests/', [ClinicController::class, 'requests'])->name('clinic.requests');

    Route::get('/clinic/services/', [ClinicController::class, 'services'])->name('clinic.services');
    Route::post('/clinic/services/', [ClinicController::class, 'servicesUpdate'])->name('clinic.services.update');

    Route::get('/clinic/logout/', [ClinicController::class, 'logout'])->name('clinic.logout');
});

Route::group(['middleware' => ['auth', 'admin']], function(){
    Route::get('/admin/dash/', [AdminController::class, 'dash'])->name('admin.dash');
    Route::get('/admin/logout/', [AdminController::class, 'logout'])->name('admin.logout');

    Route::get('/admin/appointments/', [AdminController::class, 'appointments'])->name('admin.appointments');

    Route::get('/admin/doctor/', [AdminController::class, 'doctors'])->name('admin.doctor');
    Route::get('/admin/doctor/edit/{id}/', [AdminController::class, 'doctoredit'])->name('admin.doctor.edit');
    Route::put('/admin/doctor/update/{id}/', [AdminController::class, 'doctorupdate'])->name('admin.doctor.update');
    Route::delete('/admin/doctor/delete/{id}/', [AdminController::class, 'doctordelete'])->name('admin.doctor.delete');

    Route::get('/admin/clinic/', [AdminController::class, 'clinics'])->name('admin.clinic');

    Route::get('/admin/specializations/', [AdminController::class, 'specialization'])->name('admin.specialization');
    Route::post('/admin/specializations/', [AdminController::class, 'specializationsave'])->name('admin.specialization.save');
    Route::get('/admin/specializations/edit/{id}/', [AdminController::class, 'specializationedit'])->name('admin.specialization.edit');
    Route::put('/admin/specializations/update/{id}/', [AdminController::class, 'specializationupdate'])->name('admin.specialization.update');
    Route::delete('/admin/specializations/delete/{id}/', [AdminController::class, 'specializationdelete'])->name('admin.specialization.delete');
    
    Route::get('/admin/settings/', [AdminController::class, 'settings'])->name('admin.settings');
    Route::post('/admin/settings/', [AdminController::class, 'settingsupdate'])->name('admin.settings.update');
});

Route::group(['middleware' => ['auth', 'patient']], function(){
    //
});

