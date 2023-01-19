@extends('admin.base')
@section('content')
<div role="main" class="main">
    <div class="container pt-3 pb-2">
        <div class="row pt-2">
            <div class="col-lg-12">
                <h3 class="text-center text-primary">Doctors</h3>
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif                
            </div>
            @include('admin.sections.leftmenu')
            <div class="col-lg-9 table-responsive">                
                <table id="dataTblDoc" class="table table-bordered table-stripped">
                    <thead><tr><th>SL No</th><th>Doctor Name</th><th>Doctor ID</th><th>Email</th><th>Status</th><th>Edit</th><th>Delete</th></tr></thead>
                    <tbody>
                        @php $c = 1; @endphp
                        @forelse($doctors as $key => $doc)
                            <tr>
                                <td>{{ $c++ }}</td>
                                <td>{{ $doc->name }}</td>
                                <td>{{ $doc->doctor_id }}</td>
                                <td>{{ $doc->email }}</td>
                                <td>{{ $doc->status }}</td>
                                <td><a class='btn btn-link' href="{{ route('admin.doctor.edit', $doc->id) }}"><i class="fa fa-pencil text-warning"></i></a></td>
                                <td>
                                    <form method="post" action="{{ route('admin.doctor.delete', $doc->id) }}">
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