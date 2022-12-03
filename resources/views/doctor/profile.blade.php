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
                <form role="form" action="{{ route('doctor.profile.update', Auth::user()->id) }}" method="post">
                    @csrf
                    <input type="hidden" name="profPhoto" id="profPhoto" value="" />
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
                            <input class="form-control text-3 h-auto py-2" type="text" name="mobile" maxlength="10" placeholder="Mobile Number">
                        </div>
                        @error('mobile')
                        <small class="text-danger">{{ $errors->first('mobile') }}</small>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2">Date of Birth</label>
                        <div class="col-lg-9">
                            <input class="form-control text-3 h-auto py-2" type="date" name="dob">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2">Communication Address</label>
                        <div class="col-lg-9">
                            <input class="form-control text-3 h-auto py-2" type="text" name="communication_address" value="" placeholder="Communication Address">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2"></label>
                        <div class="col-lg-6">
                            <input class="form-control text-3 h-auto py-2" type="text" name="com_city" value="" placeholder="City">
                        </div>
                        <div class="col-lg-3">
                            <input class="form-control text-3 h-auto py-2" type="text" name="com_state" value="" placeholder="State">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2">Consultation Address</label>
                        <div class="col-lg-9">
                            <input class="form-control text-3 h-auto py-2" type="text" name="consultation_address" value="" placeholder="Consultation Address">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2"></label>
                        <div class="col-lg-6">
                            <input class="form-control text-3 h-auto py-2" type="text" name="con_city" value="" placeholder="City">
                        </div>
                        <div class="col-lg-3">
                            <input class="form-control text-3 h-auto py-2" type="text" name="con_state" value="" placeholder="State">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2">Branch</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="branch">
                                <option value="">Select</option>
                                @forelse($branches as $key => $branch)
                                <option value="{{ $branch->id }}">{{ $branch->name }}</option>
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
                                <option value="{{ $spec->id }}">{{ $spec->name }}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                        @error('spec')
                        <small class="text-danger">{{ $errors->first('spec') }}</small>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2">Designation</label>
                        <div class="col-lg-9">
                            <input class="form-control text-3 h-auto py-2" type="text" name="designation">
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