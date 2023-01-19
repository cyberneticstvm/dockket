@extends('doctor.base')
@section('content')
<div role="main" class="main">
    <div class="container pt-3 pb-2">
        <div class="row pt-2">
            <div class="col-lg-12">
                <h3 class="text-center text-primary">Service Requests on &nbsp; {{ date('d-M-Y') }}</h3>
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif                
            </div>
            @include('clinic.sections.leftmenu')
            <div class="col-lg-9 table-responsive">                
                <table id="dataTbl" class="table table-bordered table-stripped">
                    <thead><tr><th>SL No</th><th>Patient Name</th><th>Contact</th><th>Service</th><th>Notes</th><th>Status</th></tr></thead>
                    <tbody>
                        @php $c = 1; @endphp
                        @forelse($requests as $key => $req)
                            <tr id="{{ $req->id }}">
                                <td>{{ $c++ }}</td>
                                <td>{{ $req->patient_name }}</td>
                                <td>{{ $req->mobile }}</td>
                                <td>{{ $req->sname }}</td>
                                <td>{{ $req->notes }}</td>
                                <td class="text-center">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input chkClinicStatus" type="checkbox" value="{{ $req->status }}" {{ ($req->status == 'C') ? 'checked' : '' }}>
                                    </div>
                                </td>
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