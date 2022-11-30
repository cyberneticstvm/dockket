@extends('doctor.base')
@section('content')
<div role="main" class="main">
    <div class="col-lg-9 order-1 order-lg-2">							
        <div class="row justify-content-md-center">
            <div class="col-md-9">
                <div class="featured-box featured-box-primary text-start mt-0">
                    <div class="box-content">
                        <h4 class="color-primary font-weight-semibold text-4 text-uppercase mb-3">I'm a Returning Customer</h4>
                        <form action="/" id="frmSignIn" method="post" class="needs-validation">
                            <div class="row">
                                <div class="form-group col">
                                    <label class="form-label">Username or E-mail Address</label>
                                    <input type="text" name="username" value="" class="form-control form-control-lg" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <a class="float-end" href="#">(Lost Password?)</a>
                                    <label class="form-label">Password</label>
                                    <input type="password" name="password" value="" class="form-control form-control-lg" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="rememberme" class="custom-control-input" id="rememberme">
                                        <label class="custom-control-label text-2" for="rememberme">Remember Me</label>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6">
                                    <input type="submit" value="Login" class="btn btn-primary btn-modern float-end" data-loading-text="Loading...">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection