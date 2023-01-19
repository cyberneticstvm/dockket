@extends('doctor.base')
@section('content')
<div role="main" class="main">
    <div class="container pt-3 pb-2">
        <div class="row pt-2">
            <div class="col-lg-12">
                <h3 class="text-center text-primary">My Appointments</h3>
            </div>
            @include('doctor.sections.leftmenu')
            <div class="col-lg-9">
                <p class="text-center">Today's Appointments</p>
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <form method="post" action="{{ route('doctor.appointments.save') }}">
                    @csrf
                    <div class="row">
                        @php 
                            $from = strtotime($settings->stime); $end = strtotime($settings->etime); $dur = $settings->time_per_appointment; $bstime = strtotime($settings->bstime); $betime = strtotime($settings->betime); $c = 0; $index = 0;
                            $atimes = $apps->pluck('appointment_time')->toArray(); 
                        @endphp
                        @while($from <= $end)
                            @if($c == $settings->slots) @break; @endif
                            <div class="col-sm-3 slot1 {{ (in_array(date('h:i A', $from), $atimes)) ? 'bg-success text-white no-app' : '' }}">
                                {{ date('h:i A', $from) }}<br>
                                @if(in_array(date('h:i A', $from), $atimes) || (date('h:i A', $from) >= date('h:i A', $bstime) && date('h:i A', $from) <= date('h:i A', $betime))))
                                    @php $index = array_search(date('h:i A', $from), $atimes); @endphp
                                    Patient Name: {{ $apps[$index]->patient_name }}<br>
                                    Contact No: {{ $apps[$index]->mobile }}
                                @else
                                    <input type="checkbox" name="appointments[]" value="{{ date('h:i A', $from) }}" />
                                @endif
                            </div>
                            @php $from = strtotime('+'.$dur.' minutes', $from); $c++; @endphp
                        @endwhile
                        @error('appointments')
                        <small class="text-danger">{{ $errors->first('appointments') }}</small>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <div class="form-group col-lg-7">

                        </div>
                        <div class="form-group col-lg-3">
                            <button type="submit" class="btn-submit btn btn-primary btn-modern float-end">Block Slots</button>
                        </div>
                    </div>                    
                </form>
            </div>
        </div>
    </div>
</div>
@endsection