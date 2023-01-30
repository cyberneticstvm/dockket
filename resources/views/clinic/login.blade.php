@extends('clinic.base')
@section('content')
<div role="main" class="main">
    <div class="container pt-3 pb-2">
        <div class="row pt-2">
            <div class="col-lg-12">
                <h3 class="text-center text-primary">Clinic Login</h3>
            </div>
            <div class="col-lg-2"></div>
            <div class="col-lg-8">							
                <div class="row justify-content-md-center">
                    <div class="col-md-9">
                        <div class="featured-box featured-box-primary text-start mt-0">
                            <div class="box-content">
                                <h4 class="color-primary font-weight-semibold text-4 text-uppercase mb-3">Login as a Clinic</h4>
                                @if (count($errors) > 0)
                                <div role="alert" class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        {{ $error }}
                                    @endforeach
                                </div>
                                @endif
                                <form action="{{ route('clinic.login') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col">
                                            <label class="form-label">E-mail Address <span class="text-danger">*</span></label>
                                            <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="E-mail Address" required>
                                            @error('email')
                                            <small class="text-danger">{{ $errors->first('email') }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-12">
                                            <label class="form-label">Password <span class="text-danger">*</span></label>
                                            <input type="password" name="password" value="" class="form-control" placeholder="*****">
                                            @error('password')
                                            <small class="text-danger">{{ $errors->first('password') }}</small>
                                            @enderror
                                        </div>                                        
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-9"></div>
                                        <div class="form-group col-lg-3">
                                            <button type="submit" class="btn-submit btn btn-primary btn-modern float-end">Login</button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <a href="/clinic/registration/">Register</a> | <a href="/forgot">Forgot password?</a>
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