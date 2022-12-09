<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
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

Route::get('/', function () {
    return view('index');
});
Route::get('/login', function () {
    return view('doctor.login');
})->name('login');

Route::get('/appointment/', [AppointmentController::class, 'index'])->name('appointment');
Route::post('/appointment/', [AppointmentController::class, 'show'])->name('appointment.show');

Route::get('/doctor/registration/', [DoctorController::class, 'showReg'])->name('doctor.show.registration');
Route::post('/doctor/registration/', [DoctorController::class, 'reg'])->name('doctor.registration');
Route::get('/doctor/login/', [DoctorController::class, 'showLogin'])->name('doctor.show.login');
Route::post('/doctor/login/', [DoctorController::class, 'login'])->name('doctor.login');

Route::group(['middleware' => ['auth', 'doctor']], function(){
    Route::get('/doctor/profile/', [DoctorController::class, 'profile'])->name('doctor.profile');
    Route::post('/doctor/profile/{id}/', [DoctorController::class, 'profileupdate'])->name('doctor.profile.update');

    Route::get('/doctor/settings/', [DoctorController::class, 'settings'])->name('doctor.settings');
    Route::post('/doctor/settings/{id}/', [DoctorController::class, 'settingsupdate'])->name('doctor.settings.update');

    Route::get('/doctor/leaves/', [DoctorController::class, 'leaves'])->name('doctor.leaves');
    Route::post('/doctor/leaves/{id}/', [DoctorController::class, 'leavesupdate'])->name('doctor.leaves.update');

    Route::get('/doctor/appointments/', [DoctorController::class, 'appointments'])->name('doctor.appointments');
    
    
    Route::get('/doctor/reports/', [DoctorController::class, 'reports'])->name('doctor.reports');
    Route::get('/doctor/logout/', [DoctorController::class, 'logout'])->name('doctor.logout');
    
});

