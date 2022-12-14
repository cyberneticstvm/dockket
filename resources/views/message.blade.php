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
                            @if($type == 'A')
                                <h4 class="card-title mb-1 text-4 font-weight-bold">Appointment Details</h4>
                                <p class="card-text mb-2">Hi {{ $app->patient_name }}, Thank you for choosing <a href='https://dockket.in'>Dockket</a>. Your Appintment Details as follows. Please keep this details in a safe place.</p>
                                <p><strong>Doctor Name:</strong> {{ $user->name }} <br>
                                <strong>Doctor Address/Location:</strong> {{ $doctor->consultation_address }} <br>
                                <strong>Appointment Date:</strong> {{ date('d, M Y', strtotime($app->appointment_date)) }} <br>
                                <strong>Appointment Time:</strong> {{ date('h:i A', strtotime($app->appointment_time)) }} *</p>
                                <p class='text-center'><a href="/appointment/" class="read-more text-color-primary font-weight-semibold text-2">Make Another Appointment<i class="fas fa-angle-right position-relative top-1 ms-1"></i></a></p>
                                <small>* time may vary depends on consultation time taken for a patient.</small>
                            @elseif($type == 'S')
                                <h4 class="card-title mb-1 text-4 font-weight-bold">Service Details</h4>
                                <p class="card-text mb-2">Hi {{ $service->patient_name }}, Thank you for choosing <a href='https://dockket.in'>Dockket</a>. Your Service Details as follows. Please keep this details in a safe place.</p>
                                <p><strong>Service Name:</strong> {{ $sname }} <br>
                                <strong>Clinic Name:</strong> {{ $user->name }} <br>
                                <strong>Clinic Address/Location:</strong> {{ $clinic->address }} <br>
                                <strong>Contact Number:</strong> {{ $clinic->mobile }} <br>
                                <strong>Service Date:</strong> {{ date('d, M Y', strtotime($service->service_date)) }} <br>
                                <p class='text-center'><a href="/service-request/" class="read-more text-color-primary font-weight-semibold text-2">Make Another Service<i class="fas fa-angle-right position-relative top-1 ms-1"></i></a></p>
                            @endif;
                        </div>
                    </div>
                </div>
            </div>            
        </div>
    </div>
</div>
@endsection