@extends('admin.base')
@section('content')
<div role="main" class="main">
    <div class="container pt-3 pb-2">
        <div class="row pt-2">
            <div class="col-lg-12">
                <h3 class="text-center text-primary">Clinics</h3>
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif                
            </div>
            @include('admin.sections.leftmenu')
            <div class="col-lg-9 table-responsive">                
                <table id="dataTblClinic" class="table table-bordered table-stripped">
                    <thead><tr><th>SL No</th><th>Clinic Name</th><th>Address</th><th>Contact</th><th>Status</th><th>Edit</th><th>Delete</th></tr></thead>
                    <tbody>
                        @php $c = 1; @endphp
                        @forelse($clinics as $key => $clinic)
                            <tr>
                                <td>{{ $c++ }}</td>
                                <td>{{ $clinic->name }}</td>
                                <td>{{ $clinic->address }}</td>
                                <td>{{ $clinic->mobile }}</td>
                                <td>{{ $clinic->status }}</td>
                                <td><a class='btn btn-link' href="{{ route('admin.clinic.edit', $clinic->id) }}"><i class="fa fa-pencil text-warning"></i></a></td>
                                <td>
                                    <form method="post" action="{{ route('admin.clinic.delete', $clinic->id) }}">
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
@endsection