@extends('doctor.base')
@section('content')
<div role="main" class="main">
    <div class="container pt-3 pb-2">
        <div class="row pt-2">
            <div class="col-lg-12">
                <h3 class="text-center text-primary">My Appointments (<a href="/patient/logout/">Logout</a>)</h3>
            </div>
            <div class="col-lg-12 table-responsive">
                <table id="dataTbl" class="table table-bordered table-stripped">
                    <thead><tr><th>SL No</th><th>Name</th><th>Contact</th><th>Appointment Date</th><th>Spec</th><th>Doctor</th></tr></thead>
                    <tbody>
                        @php $c = 1; @endphp
                        @forelse($appointments as $key => $app)
                            <tr>
                                <td>{{ $c++ }}</td>
                                <td>{{ $app->patient_name }}</td>
                                <td>{{ $app->mobile }}</td>
                                <td>{{ $app->appointment_date }}</td>
                                <td>{{ $app->spec }}</td>
                                <td>{{ $app->doctor }}</td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row pt-2">
            <div class="col-lg-12">
                <h3 class="text-center text-primary">My Service Requests</h3>
            </div>
            <div class="col-lg-12 table-responsive">
                <table id="dataTbl1" class="table table-bordered table-stripped">
                    <thead><tr><th>SL No</th><th>Name</th><th>Contact</th><th>Request Date</th><th>service</th><th>Clinic</th></tr></thead>
                    <tbody>
                        @php $c = 1; @endphp
                        @forelse($services as $key => $serv)
                            <tr>
                                <td>{{ $c++ }}</td>
                                <td>{{ $serv->patient_name }}</td>
                                <td>{{ $serv->mobile }}</td>
                                <td>{{ $serv->service_date }}</td>
                                <td>{{ $serv->service_id }}</td>
                                <td>{{ $serv->clinic_id }}</td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection