@extends('base')
@section('content')
<div role="main" class="main">
    <div class="container">
        <div class="row">
            <div class="card mt-5 mb-5">
                <div class="row g-0">
                    <div class="col-lg-4">
                        <img src="{{ public_path().'/img/dockket/success.jpg' }}" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-lg-8">
                        <div class="card-body">
                            <h4 class="card-title mb-1 text-4 font-weight-bold">Appointment Details</h4>
                            <p class="card-text mb-2">Hi {{ $app->patient_name }}, Thank you for choosing <a href='https://dockket.in'>Dockket</a>. Your Appintment Details as follows. Please keep this details in a safe place.</p>
                            <p><strong>Doctor Name:</strong> {{ $user->name }} <br>
                            <strong>Address/Location:</strong> {{ $doctor->consultation_address }} <br>
                            <strong>Appointment Date:</strong> {{ date('d/M/Y', strtotime($app->appointment_date)) }} <br>
                            <strong>Appointment Time: *</strong> {{ date('h:i A', strtotime($app->appointment_time)) }} </p>

                            <small>* time may vary depends on consultation time taken for a patient.</small>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
    </div>
</div>
@endsection