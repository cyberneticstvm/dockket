@extends('doctor.base')
@section('content')
<div role="main" class="main">
    <div class="container pt-3 pb-2">
        <div class="row pt-2">
            <div class="col-lg-12">
                <h3 class="text-center text-primary">Clinic Profile</h3>
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif                
            </div>
            @include('clinic.sections.leftmenu')
            <div class="col-lg-9">                
                <form role="form" action="{{ route('clinic.profile.update', Auth::user()->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="photo" id="profPhoto" value="{{ ($clinic && $clinic->photo) ? base64_encode(file_get_contents(storage_path('app/public/clinic/photo/'.$clinic->photo))) : base64_encode(file_get_contents(storage_path('app/public/clinic/photo/avatar.png'))) }}" />
                    <input type="hidden" name="user_id" value="{{ ($clinic && $clinic->user_id) ? $clinic->user_id : Auth::user()->id }}" />
                    <input type="hidden" name="city" value="" />
                    <input type="hidden" name="state" value="" />
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2">Clinic Name <span class="text-danger">*</span></label>
                        <div class="col-lg-9">
                            <input class="form-control text-3 h-auto py-2" type="text" name="name" value="{{ Auth::user()->name }}" required>
                        </div>
                        @error('name')
                        <small class="text-danger">{{ $errors->first('name') }}</small>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2">Email <span class="text-danger">*</span></label>
                        <div class="col-lg-9">
                            <input class="form-control text-3 h-auto py-2" type="email" name="email" value="{{ Auth::user()->email }}" required>
                        </div>
                        @error('email')
                        <small class="text-danger">{{ $errors->first('email') }}</small>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2">Mobile Number <span class="text-danger">*</span></label>
                        <div class="col-lg-9">
                            <input class="form-control text-3 h-auto py-2" type="text" name="mobile" maxlength="10" value="{{ ($clinic && $clinic->mobile) ? $clinic->mobile : old('mobile') }}" placeholder="Mobile Number">
                        </div>
                        @error('mobile')
                        <small class="text-danger">{{ $errors->first('mobile') }}</small>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2">Address <span class="text-danger">*</span></label>
                        <div class="col-lg-9">
                            <a href="javascript:pickmylocation()">Pick My Location</a></label>
                            <input class="form-control text-3 h-auto py-2" type="text" name="address" id="address" value="{{ ($clinic && $clinic->address) ? $clinic->address : old('address') }}" placeholder="Consultation Address">
                        </div>
                        @error('address')
                        <small class="text-danger">{{ $errors->first('address') }}</small>
                        @enderror
                        <input type="hidden" name="latitude" id="latitude" value="{{ ($clinic && $clinic->latitude) ? $clinic->latitude : old('latitude') }}" />
                        <input type="hidden" name="longitude" id="longitude" value="{{ ($clinic && $clinic->longitude) ? $clinic->longitude : old('longitude') }}" />
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