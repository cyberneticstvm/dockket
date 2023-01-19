@extends('base')
@section('content')
<div role="main" class="main">
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5 mb-5">
                <h3 class="text-center text-primary">Doctor Location</h3>
                <input type="hidden" id="doc_latitude" value="{{ $doctor->con_latitude }}">
                <input type="hidden" id="doc_longitude" value="{{ $doctor->con_longitude }}">
                <div id="doclocationmap"></div>
            </div>
            <div class="col text-center">
                <a href="https://maps.google.com/maps?daddr={{ $doctor->con_latitude }},{{ $doctor->con_longitude }}&11=" class="btn btn-outline btn-light bg-hover-light text-dark text-hover-primary border-color-grey border-color-active-primary border-color-hover-primary text-uppercase rounded-0 px-4 py-2 mb-4 text-2">OPEN IN MAP</a>
            </div>
        </div>
    </div>
</div>
@endsection