@extends('doctor.base')
@section('content')
<div role="main" class="main">
    <div class="container pt-3 pb-2">
        <div class="row pt-2">
            <div class="col-lg-12">
                <h3 class="text-center text-primary">Reset Password</h3>
            </div>
            <div class="col-lg-2"></div>
            <div class="col-lg-8">							
                <div class="row justify-content-md-center">
                    <div class="col-md-9">
                        <div class="featured-box featured-box-primary text-start mt-0">
                            <div class="box-content">
                                <h4 class="color-primary font-weight-semibold text-4 text-uppercase mb-3">Please enter your New Password</h4>
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
                                <form action="{{ route('updatepassword') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ $user->id }}" />
                                    <input type="hidden" name="token" value="{{ $user->email_token }}" />
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
                                        <div class="form-group col-lg-12">
                                            <label class="form-label">Confirm Password <span class="text-danger">*</span></label>
                                            <input type="password" name="password_confirmation" value="" class="form-control" placeholder="*****">
                                            @error('password_confirmation')
                                            <small class="text-danger">{{ $errors->first('password_confirmation') }}</small>
                                            @enderror
                                        </div>                                        
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-9"></div>
                                        <div class="form-group col-lg-3">
                                            <button type="submit" class="btn-submit btn btn-primary btn-modern float-end">Submit</button>
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