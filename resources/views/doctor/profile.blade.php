@extends('doctor.base')
@section('content')
<div role="main" class="main">
    <div class="container pt-3 pb-2">
        <div class="row pt-2">
            <div class="col-lg-12">
                <h3 class="text-center text-primary">My Profile</h3>
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif                
            </div>
            @include('doctor.sections.leftmenu')
            <div class="col-lg-9">                
                <form role="form" action="{{ route('doctor.profile.update', Auth::user()->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ ($doctor && $doctor->user_id) ? $doctor->user_id : Auth::user()->id }}" />
                    <input type="hidden" name="photo" id="profPhoto" value="{{ ($doctor && $doctor->photo) ? base64_encode(file_get_contents(storage_path('app/public/doctor/photo/'.$doctor->photo))) : base64_encode(file_get_contents(storage_path('app/public/doctor/photo/avatar.png'))) }}" />
                    <input type="hidden" name="doctor_id" value="{{ ($doctor && $doctor->doctor_id) ? $doctor->doctor_id : NULL }}" />
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2">Full Name <span class="text-danger">*</span></label>
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
                            <input class="form-control text-3 h-auto py-2" type="text" name="mobile" maxlength="10" value="{{ ($doctor && $doctor->doctor_id) ? $doctor->mobile : old('mobile') }}" placeholder="Mobile Number">
                        </div>
                        @error('mobile')
                        <small class="text-danger">{{ $errors->first('mobile') }}</small>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2">Date of Birth</label>
                        <div class="col-lg-9">
                            <input class="form-control text-3 h-auto py-2" type="date" value="{{ ($doctor && $doctor->dob) ? $doctor->dob : old('dob') }}" name="dob">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2">Communication Address</label>
                        <div class="col-lg-9">
                            <input class="form-control text-3 h-auto py-2" type="text" name="communication_address" value="{{ ($doctor && $doctor->communication_address) ? $doctor->communication_address : old('communication_address') }}" placeholder="Communication Address">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2"></label>
                        <div class="col-lg-6">
                            <input class="form-control text-3 h-auto py-2" type="text" name="com_city" value="{{ ($doctor && $doctor->com_city) ? $doctor->com_city : old('com_city') }}" placeholder="City">
                        </div>
                        <div class="col-lg-3">
                            <input class="form-control text-3 h-auto py-2" type="text" name="com_state" value="{{ ($doctor && $doctor->com_state) ? $doctor->com_state : old('com_state') }}" placeholder="State">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2">Consultation Address <span class="text-danger">*</span></label>
                        <div class="col-lg-9">
                            <input class="form-control text-3 h-auto py-2" type="text" name="consultation_address" id="address" value="{{ ($doctor && $doctor->consultation_address) ? $doctor->consultation_address : old('consultation_address') }}" placeholder="Consultation Address">
                        </div>
                        <input type="hidden" name="con_latitude" id="latitude" value="{{ ($doctor && $doctor->con_latitude) ? $doctor->con_latitude : old('con_latitude') }}" />
                        <input type="hidden" name="con_longitude" id="longitude" value="{{ ($doctor && $doctor->con_longitude) ? $doctor->con_longitude : old('con_longitude') }}" />
                    </div>
                    <!--<div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2"></label>
                        <div class="col-lg-6">
                            <input class="form-control text-3 h-auto py-2" type="text" name="con_city" value="{{ ($doctor && $doctor->con_city) ? $doctor->con_city : '' }}" placeholder="City">
                        </div>
                        <div class="col-lg-3">
                            <input class="form-control text-3 h-auto py-2" type="text" name="con_state" value="{{ ($doctor && $doctor->con_state) ? $doctor->con_state : '' }}" placeholder="State">
                        </div>
                    </div>-->
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2">Branch <span class="text-danger">*</span></label>
                        <div class="col-lg-9">
                            <select class="form-control" name="branch">
                                <option value="">Select</option>
                                @forelse($branches as $key => $branch)
                                <option value="{{ $branch->id }}" {{ ($doctor && $doctor->branch == $branch->id) ? 'selected' : '' }}>{{ $branch->name }}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                        @error('branch')
                        <small class="text-danger">{{ $errors->first('branch') }}</small>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2">Specialization <span class="text-danger">*</span></label>
                        <div class="col-lg-9">
                            <select class="form-control" name="spec">
                                <option value="">Select</option>
                                @forelse($specializations as $key => $spec)
                                <option value="{{ $spec->id }}" {{ ($doctor && $doctor->spec == $spec->id) ? 'selected' : '' }}>{{ $spec->name }}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                        @error('spec')
                        <small class="text-danger">{{ $errors->first('spec') }}</small>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2">Designation <span class="text-danger">*</span></label>
                        <div class="col-lg-9">
                            <input class="form-control text-3 h-auto py-2" type="text" value="{{ ($doctor && $doctor->designation) ? $doctor->designation : old('designation') }}" name="designation">
                        </div>
                        @error('designation')
                        <small class="text-danger">{{ $errors->first('designation') }}</small>
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