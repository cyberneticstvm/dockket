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
                <div class="row">
                    @php 
                        $from = strtotime($settings->stime); $end = strtotime($settings->etime); $dur = $settings->time_per_appointment; $bstime = strtotime($settings->bstime); $betime = strtotime($settings->betime); $c = 0; $index = 0;
                        $atimes = $apps->pluck('appointment_time')->toArray(); 
                    @endphp
                    @while($from <= $end)
                        @if($c == $settings->slots) @break; @endif
                        <div class="col-sm-3 slot {{ (in_array(date('h:i A', $from), $atimes)) ? 'bg-success text-white no-app' : '' }}">
                            {{ date('h:i A', $from) }}<br>
                            @if(in_array(date('h:i A', $from), $atimes))
                                @php $index = array_search(date('h:i A', $from), $atimes); @endphp
                                Patient Name: {{ $apps[$index]->patient_name }}<br>
                                Contact No: {{ $apps[$index]->mobile }}
                            @endif
                        </div>
                        @php $from = strtotime('+'.$dur.' minutes', $from); $c++; @endphp
                    @endwhile
                </div>
            </div>
        </div>
    </div>
</div>
@endsection