@extends('admin.base')
@section('content')
<div role="main" class="main">
    <div class="container pt-3 pb-2">
        <div class="row pt-2">
            @include('admin.sections.leftmenu')
            <div class="col-lg-9">                
                <form role="form" action="{{ route('admin.doctor.update', $doctor->id) }}" method="post">
                    @csrf
                    @method("PUT")
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2">Full Name <span class="text-danger">*</span></label>
                        <div class="col-lg-9">
                            <input class="form-control text-3 h-auto py-2" type="text" name="name" value="{{ $user->name }}" required>
                        </div>
                        @error('name')
                        <small class="text-danger">{{ $errors->first('name') }}</small>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2">Email <span class="text-danger">*</span></label>
                        <div class="col-lg-9">
                            <input class="form-control text-3 h-auto py-2" type="email" name="email" value="{{ $user->email }}" required>
                        </div>
                        @error('email')
                        <small class="text-danger">{{ $errors->first('email') }}</small>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2">Mobile Number <span class="text-danger">*</span></label>
                        <div class="col-lg-9">
                            <input class="form-control text-3 h-auto py-2" type="text" name="mobile" maxlength="10" value="{{ ($doctor && $doctor->doctor_id) ? $doctor->mobile : '' }}" placeholder="Mobile Number">
                        </div>
                        @error('mobile')
                        <small class="text-danger">{{ $errors->first('mobile') }}</small>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2">Date of Birth</label>
                        <div class="col-lg-9">
                            <input class="form-control text-3 h-auto py-2" type="date" value="{{ ($doctor && $doctor->dob) ? $doctor->dob : NULL }}" name="dob">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2">Communication Address</label>
                        <div class="col-lg-9">
                            <input class="form-control text-3 h-auto py-2" type="text" name="communication_address" value="{{ ($doctor && $doctor->communication_address) ? $doctor->communication_address : '' }}" placeholder="Communication Address">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2"></label>
                        <div class="col-lg-6">
                            <input class="form-control text-3 h-auto py-2" type="text" name="com_city" value="{{ ($doctor && $doctor->com_city) ? $doctor->com_city : '' }}" placeholder="City">
                        </div>
                        <div class="col-lg-3">
                            <input class="form-control text-3 h-auto py-2" type="text" name="com_state" value="{{ ($doctor && $doctor->com_state) ? $doctor->com_state : '' }}" placeholder="State">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2">Consultation Address</label>
                        <div class="col-lg-9">
                            <input class="form-control text-3 h-auto py-2" type="text" name="consultation_address" id="address" value="{{ ($doctor && $doctor->consultation_address) ? $doctor->consultation_address : '' }}" placeholder="Consultation Address">
                        </div>
                        <input type="hidden" name="con_latitude" id="latitude" value="{{ ($doctor && $doctor->con_latitude) ? $doctor->con_latitude : '' }}" />
                        <input type="hidden" name="con_longitude" id="longitude" value="{{ ($doctor && $doctor->con_longitude) ? $doctor->con_longitude : '' }}" />
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2">Branch</label>
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
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2">Specialization</label>
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
                            <input class="form-control text-3 h-auto py-2" type="text" value="{{ ($doctor && $doctor->designation) ? $doctor->designation : '' }}" name="designation">
                        </div>
                        @error('designation')
                        <small class="text-danger">{{ $errors->first('designation') }}</small>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2">Status</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="status">
                                <option value="A" {{ ($doctor->status == 'A') ? 'selected' : '' }}>Approved</option>
                                <option value="P" {{ ($doctor->status == 'P') ? 'selected' : '' }}>Pending</option>
                            </select>
                        </div>
                        @error('spec')
                        <small class="text-danger">{{ $errors->first('spec') }}</small>
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