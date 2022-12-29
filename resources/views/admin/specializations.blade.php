@extends('admin.base')
@section('content')
<div role="main" class="main">
    <div class="container pt-3 pb-2">
        <div class="row pt-2">
            <div class="col-lg-12">
                <h3 class="text-center text-primary">Specializations</h3>
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif                
            </div>
            @include('admin.sections.leftmenu')
            <div class="col-lg-9">                
                <form role="form" action="{{ route('admin.specialization.save') }}" method="post">
                    @csrf
                    <div class="form-group row">                        
                        <div class="col-lg-4">
                            <label class="col-form-label form-control-label line-height-9 pt-2 text-2">Specialization / Service <span class="text-danger">*</span></label>
                            <input class="form-control text-3 h-auto py-2" type="text" name="name" value="{{ old('name') }}" placeholder="Specialization / Service">
                            @error('name')
                            <small class="text-danger">{{ $errors->first('name') }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-4">
                            <label class="col-form-label form-control-label line-height-9 pt-2 text-2">Category<span class="text-danger">*</span></label>
                            <select class="form-control text-3 h-auto py-2" name="category">
                                <option value="1">Consultation</option>
                                <option value="2">Home Care</option>
                            </select>
                            @error('category')
                            <small class="text-danger">{{ $errors->first('category') }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-4">
                            <label class="col-form-label form-control-label line-height-9 pt-2 text-2">Branch<span class="text-danger">*</span></label>
                            <select class="form-control text-3 h-auto py-2" name="branch">
                                <option value="">Select</option>
                                @forelse($branches as $key => $branch)
                                <option value="{{ $branch->id }}">{{ $branch->name }}</option>
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
                            <button type="submit" class="btn-submit btn btn-primary btn-modern float-end">Save</button>
                        </div>
                    </div>
                </form>
                <div class="mt-3 table-responsive">
                    <table id="dataTbl" class="table table-bordered table-stripped">
                        <thead><tr><th>SL No</th><th>Spec/Service Name</th><th>Category</th><th>Branch</th><th>Edit</th><th>Delete</th></tr></thead>
                        <tbody>
                            @php $c = 1; @endphp
                            @forelse($specs as $key => $spec)
                                <tr>
                                    <td>{{ $c++ }}</td>
                                    <td>{{ $spec->sname }}</td>
                                    <td>{{ $spec->service }}</td>
                                    <td>{{ $spec->bname }}</td>
                                    <td><a class='btn btn-link' href="{{ route('admin.specialization.edit', $spec->id) }}"><i class="fa fa-pencil text-warning"></i></a></td>
                                    <td>
                                        <form method="post" action="{{ route('admin.specialization.delete', $spec->id) }}">
                                            @csrf 
                                            @method("DELETE")
                                            <button type="submit" class="btn btn-link" onclick="javascript: return confirm('Are you sure want to delete this record?');"><i class="fa fa-trash text-danger"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection