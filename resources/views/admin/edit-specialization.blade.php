@extends('admin.base')
@section('content')
<div role="main" class="main">
    <div class="container pt-3 pb-2">
        <div class="row pt-2">
            <div class="col-lg-12">
                <h3 class="text-center text-primary">Update Specialization</h3>               
            </div>
            @include('admin.sections.leftmenu')
            <div class="col-lg-9">                
                <form role="form" action="{{ route('admin.specialization.update', $spec->id) }}" method="post">
                    @csrf
                    @method("PUT")
                    <div class="form-group row">                        
                        <div class="col-lg-6">
                            <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2">Specialization <span class="text-danger">*</span></label>
                            <input class="form-control text-3 h-auto py-2" type="text" name="name" value="{{ $spec->name }}" placeholder="Specialization">
                            @error('name')
                            <small class="text-danger">{{ $errors->first('name') }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2">Branch <span class="text-danger">*</span></label>
                            <select class="form-control text-3 h-auto py-2" name="branch">
                                <option value="">Select</option>
                                @forelse($branches as $key => $branch)
                                <option value="{{ $branch->id }}" {{ ($branch->id == $spec->branch) ? 'selected' : '' }}>{{ $branch->name }}</option>
                                @empty
                                @endforelse
                            </select>
                            @error('branch')
                            <small class="text-danger">{{ $errors->first('branch') }}</small>
                            @enderror
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