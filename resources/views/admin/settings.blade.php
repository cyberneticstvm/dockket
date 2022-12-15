@extends('admin.base')
@section('content')
<div role="main" class="main">
    <div class="container pt-3 pb-2">
        <div class="row pt-2">
            <div class="col-lg-12">
                <h3 class="text-center text-primary">Settings</h3>
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif                
            </div>
            @include('admin.sections.leftmenu')
            <div class="col-lg-9">                
            <form role="form" action="{{ route('admin.settings.update') }}" method="post">
                    @csrf
                    <div class="form-group row">                        
                        <div class="col-lg-6">
                            <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2">Pay Days <span class="text-danger">*</span></label>
                            <input class="form-control text-3 h-auto py-2" type="number" name="default_pay_days" value="{{ ($settings && $settings->default_pay_days) ? $settings->default_pay_days : 0 }}" placeholder="Specialization">
                            @error('default_pay_days')
                            <small class="text-danger">{{ $errors->first('default_pay_days') }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2">Password <span class="text-danger">*</span></label>
                            <input class="form-control text-3 h-auto py-2" type="password" name="password"  placeholder="*****">
                        </div>
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