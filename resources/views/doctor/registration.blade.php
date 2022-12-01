@extends('doctor.base')
@section('content')
<div role="main" class="main">
    <div class="container pt-3 pb-2">
        <div class="row pt-2">
            <div class="col-lg-12">
                <h3 class="text-center text-primary">Doctor Registration</h3>
            </div>
            <div class="col-lg-2"></div>
            <div class="col-lg-8">							
                <div class="row justify-content-md-center">
                    <div class="col-md-9">
                        <div class="featured-box featured-box-primary text-start mt-0">
                            <div class="box-content">
                                <h4 class="color-primary font-weight-semibold text-4 text-uppercase mb-3">Register As a Doctor</h4>
                                @if(session()->has('success'))
                                    <div class="alert alert-success">
                                        {{ session()->get('success') }}
                                    </div>
                                @endif
                                <form action="{{ route('doctor.registration') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col">
                                            <label class="form-label">Full Name <span class="text-danger">*</span></label>
                                            <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Full Name">
                                            @error('name')
                                            <small class="text-danger">{{ $errors->first('name') }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col">
                                            <label class="form-label">E-mail Address <span class="text-danger">*</span></label>
                                            <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="E-mail Address">
                                            @error('email')
                                            <small class="text-danger">{{ $errors->first('email') }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label class="form-label">Password <span class="text-danger">*</span></label>
                                            <input type="password" name="password" value="" class="form-control" placeholder="*****">
                                            @error('password')
                                            <small class="text-danger">{{ $errors->first('password') }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label class="form-label">Confirm Password <span class="text-danger">*</span></label>
                                            <input type="password" name="password_confirmation" value="" class="form-control" placeholder="*****">
                                            @error('password_confirmation')
                                            <small class="text-danger">{{ $errors->first('password_confirmation') }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-9">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" name="terms" class="custom-control-input" id="terms" value="1">
                                                <label class="custom-control-label text-2" for="terms">I have read and agree to the <a href="#">terms of service</a></label>
                                                @error('terms')
                                                <small class="text-danger">{{ $errors->first('terms') }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <button type="submit" class="btn-submit btn btn-primary btn-modern float-end">Register</button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <a href="/doctor/login/">Login</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>
</div>
@endsection