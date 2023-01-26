@extends('doctor.base')
@section('content')
<div role="main" class="main">
    <div class="container pt-3 pb-2">
        <div class="row pt-2">
            <div class="col-lg-12">
                <h3 class="text-center text-primary">Clinic Services</h3>
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif                
            </div>
            @include('clinic.sections.leftmenu')
            <div class="col-lg-9">
                <form method="post" action="{{ route('clinic.services.update') }}">
                    @csrf                
                    <div class="row">
                        @error('service')
                        <small class="text-danger">{{ $errors->first('service') }}</small>
                        @enderror
                        @forelse($services as $key => $service)
                        <div class="col-lg-2">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="service[]" value="{{ $service->id }}" {{ ($service->checked == 'Y') ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineCheckbox1">{{ $service->name }}</label>
                            </div>
                        </div>
                        @empty
                        @endforelse
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