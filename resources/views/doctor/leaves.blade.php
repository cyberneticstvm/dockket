@extends('doctor.base')
@section('content')
<div role="main" class="main">
    <div class="container pt-3 pb-2">
        <div class="row pt-2">
            <div class="col-lg-12">
                <h3 class="text-center text-primary">My Leaves</h3>
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                @if(session()->has('error'))
                    <div class="alert alert-warning">
                        {{ session()->get('error') }}
                    </div>
                @endif
            </div>
            @include('doctor.sections.leftmenu')
            <div class="col-lg-9">                
                <form role="form" method="post" action="{{ route('doctor.leaves.update', $doctor->id) }}">
                    @csrf
                    <input type="hidden" name="doctor_id" value="{{ $doctor->id }}" />
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2">Date of Leave</label>
                        <div class="col-lg-9">
                            <input class="form-control text-3 h-auto py-2" type="date" value="" name="leave_date">
                        </div>
                        @error('leave_date')
                        <small class="text-danger">{{ $errors->first('leave_date') }}</small>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <div class="form-group col-lg-9">

                        </div>
                        <div class="form-group col-lg-3">
                            <button type="submit" class="btn-submit btn btn-primary btn-modern float-end">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection