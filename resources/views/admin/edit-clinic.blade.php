@extends('admin.base')
@section('content')
<div role="main" class="main">
    <div class="container pt-3 pb-2">
        <div class="row pt-2">
            @include('admin.sections.leftmenu')
            <div class="col-lg-9">                
                <form role="form" action="{{ route('admin.clinic.update', $clinic->id) }}" method="post">
                    @csrf
                    @method("PUT")
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2">Clinic Name <span class="text-danger">*</span></label>
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
                            <input class="form-control text-3 h-auto py-2" type="text" name="mobile" maxlength="10" value="{{ ($clinic && $clinic->mobile) ? $clinic->mobile : old('mobile') }}" placeholder="Mobile Number">
                        </div>
                        @error('mobile')
                        <small class="text-danger">{{ $errors->first('mobile') }}</small>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2">Address <span class="text-danger">*</span></label>
                        <div class="col-lg-9">
                            <input class="form-control text-3 h-auto py-2" type="text" name="address" id="address" value="{{ ($clinic && $clinic->address) ? $clinic->address : old('address') }}" placeholder="Consultation Address">
                        </div>
                        @error('address')
                        <small class="text-danger">{{ $errors->first('address') }}</small>
                        @enderror
                        <input type="hidden" name="latitude" id="latitude" value="{{ ($clinic && $clinic->latitude) ? $clinic->latitude : old('latitude') }}" />
                        <input type="hidden" name="longitude" id="longitude" value="{{ ($clinic && $clinic->longitude) ? $clinic->longitude : old('longitude') }}" />
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2">Status</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="status">
                                <option value="A" {{ ($clinic->status == 'A') ? 'selected' : '' }}>Approved</option>
                                <option value="P" {{ ($clinic->status == 'P') ? 'selected' : '' }}>Pending</option>
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