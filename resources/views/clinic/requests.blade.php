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
                <form role="form" action="{{ route('clinic.appointments.fetch') }}" method="post">
                    @csrf
                    <div class="form-group row">
                        <div class="col-lg-5">
                            <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2">From Date <span class="text-danger">*</span></label>
                            <input class="form-control text-3 h-auto py-2" type="date" name="from_date" value="{{ ($inputs && $inputs[0]) ? $inputs[0] : '' }}">
                            @error('from_date')
                            <small class="text-danger">{{ $errors->first('from_date') }}</small>
                            @enderror
                        </div>                        
                        <div class="col-lg-5">
                            <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2">To Date <span class="text-danger">*</span></label>
                            <input class="form-control text-3 h-auto py-2" type="date" name="to_date" value="{{ ($inputs && $inputs[1]) ? $inputs[1] : '' }}">
                            @error('to_date')
                            <small class="text-danger">{{ $errors->first('to_date') }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn-submit btn btn-primary btn-modern float-end">Fetch</button>
                    </div>
                </form>                 
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