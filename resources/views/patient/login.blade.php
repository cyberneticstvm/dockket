@extends('doctor.base')
@section('content')
<div role="main" class="main">
    <div class="container pt-3 pb-2">
        <div class="row pt-2">
            <div class="col-lg-12">
                <h3 class="text-center text-primary">User/Patient Login</h3>
            </div>
            <div class="col-lg-2"></div>
            <div class="col-lg-8">							
                <div class="row justify-content-md-center">
                    <div class="col-md-9">
                        <div class="featured-box featured-box-primary text-start mt-0">
                            <div class="box-content">
                                <h4 class="color-primary font-weight-semibold text-4 text-uppercase mb-3">Login as a User/Patient</h4>
                                @if (count($errors) > 0)
                                <div role="alert" class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        {{ $error }}
                                    @endforeach
                                </div>
                                @endif
                                <form action="{{ route('patient.login') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col">
                                            <label class="form-label">Mobile Number <span class="text-danger">*</span></label>
                                            <input type="text" name="email" maxlength="10" value="{{ old('email') }}" class="form-control" placeholder="Mobile Number" required>
                                            @error('email')
                                            <small class="text-danger">{{ $errors->first('email') }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-12">
                                            <label class="form-label">4 Digits PIN <span class="text-danger">*</span></label>
                                            <input type="password" name="password" value="" class="form-control" placeholder="0000">
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