@extends('admin.base')
@section('content')
<div role="main" class="main">
    <div class="container pt-3 pb-2">
        <div class="row pt-2">
            <div class="col-lg-12">
                <h3 class="text-center text-primary">Today's Appointments</h3>
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif                
            </div>
            @include('admin.sections.leftmenu')
            <div class="col-lg-9">
                <form role="form" action="{{ route('admin.appointments.fetch') }}" method="post">
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
                <div class="table-responsive">
                    <table id="dataTbl" class="table table-bordered table-stripped">
                        <thead><tr><th>SL No</th><th>Doctor ID</th><th>Doctor Name</th><th>Appointments</th></tr></thead>
                        <tbody>
                            @php $c = 1; @endphp
                            @forelse($apps as $key => $app)
                                <tr>
                                    <td>{{ $c++ }}</td>
                                    <td>{{ $app->doctor_id }}</td>
                                    <td>{{ $app->name }}</td>
                                    <td>{{ $app->acount }}</td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection