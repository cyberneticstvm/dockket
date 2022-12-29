@extends('admin.base')
@section('content')
<div role="main" class="main">
    <div class="container pt-3 pb-2">
        <div class="row pt-2">
            <div class="col-lg-12">
                <h3 class="text-center text-primary">Today's Appointments</h3>
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif                
            </div>
            @include('admin.sections.leftmenu')
            <div class="col-lg-9">                
                <div class="table-responsive">
                    <table id="dataTbl" class="table table-bordered table-stripped">
                        <thead><tr><th>SL No</th><th>Doctor ID</th><th>Doctor Name</th><th>Appointments</th></tr></thead>
                        <tbody>
                            @php $c = 1; @endphp
                            @forelse($apps as $key => $app)
                                <tr>
                                    <td>{{ $c++ }}</td>
                                    <td>{{ $app->doctor_id }}</td>
                                    <td>{{ $app->name }}</td>
                                    <td>{{ $app->acount }}</td>
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