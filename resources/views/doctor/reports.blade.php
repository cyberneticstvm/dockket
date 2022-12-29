@extends('doctor.base')
@section('content')
<div role="main" class="main">
    <div class="container pt-3 pb-2">
        <div class="row pt-2">
            <div class="col-lg-12">
                <h3 class="text-center text-primary">My Appointments Report</h3>
            </div>
            @include('doctor.sections.leftmenu')
            <div class="col-lg-9">
                <form method="post" action="{{ route('doctor.report.appointments') }}">
                    @csrf
                    <div class="form-group row">
                        <div class="col-lg-3">
                            <label>From Date</label>
                            <input class="form-control text-3 h-auto py-2" type="date" value="{{ ($inputs && $inputs[0]) ? $inputs[0] : '' }}" name="from_date" placeholder="From Date" required>
                        </div>
                        <div class="col-lg-3">
                            <label>To Date</label>
                            <input class="form-control text-3 h-auto py-2" type="date" value="{{ ($inputs && $inputs[1]) ? $inputs[1] : '' }}" name="to_date" placeholder="To Date" required>
                        </div>
                        <div class="col-lg-1">
                            <label></label>
                            <button type="submit" class="btn-submit btn btn-primary btn-modern">Fetch</button>
                        </div>
                    </div>
                </form>
                <div class="table-responsive">
                    <table id="dataTbl" class="table table-bordered table-stripped">
                        <thead><tr><th>SL No</th><th>Date</th><th>Appointments</th></tr></thead>
                        <tbody>
                            @php $c = 1; @endphp
                            @forelse($apps as $key => $app)
                                <tr>
                                    <td>{{ $c++ }}</td>
                                    <td>{{ $app->adate }}</td>
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