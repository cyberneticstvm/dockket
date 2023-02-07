@extends('doctor.base')
@section('content')
<div role="main" class="main">
    <div class="container pt-3 pb-2">
        <div class="row pt-2">
            <div class="col-lg-12">
                <h3 class="text-center text-primary">Forgot Password?</h3>
            </div>
            <div class="col-lg-2"></div>
            <div class="col-lg-8">							
                <div class="row justify-content-md-center">
                    <div class="col-md-9">
                        <div class="featured-box featured-box-primary text-start mt-0">
                            <div class="box-content">
                                <h4 class="color-primary font-weight-semibold text-4 text-uppercase mb-3">Please enter your mail id registered with us</h4>
                                @if(session()->has('success'))
                                    <div class="alert alert-success">
                                        {{ session()->get('success') }}
                                    </div>
                                @endif
                                @if(session()->has('error'))
                                    <div class="alert alert-danger">
                                        {{ session()->get('error') }}
                                    </div>
                                @endif
                                <form action="{{ route('forgot.email') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col">
                                            <label class="form-label">E-mail Address <span class="text-danger">*</span></label>
                                            <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="E-mail Address" required>
                                            @error('email')
                                            <small class="text-danger">{{ $errors->first('email') }}</small>
                                            @enderror
                                        </div>
                                        <small class="text-info">In case you are a patient and dont have an email regitered with us, use our android app to recover the PIN or contact support to mail@dockket.in </small>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-9"></div>
                                        <div class="form-group col-lg-3">
                                            <button type="submit" class="btn-submit btn btn-primary btn-modern float-end">Send Email</button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <a href="/">Home</a>
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