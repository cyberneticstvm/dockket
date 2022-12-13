@extends('base')
@section('content')
<div role="main" class="main">
    <div class="container">
        <div class="row">
            <div class="col mt-5 mb-5">
                <h3 class="text-center text-primary">Doctor Location</h3>
                <input type="hidden" id="doc_latitude" value="{{ $doctor->con_latitude }}">
                <input type="hidden" id="doc_longitude" value="{{ $doctor->con_longitude }}">
                <div id="doclocationmap"></div>
            </div>
        </div>
    </div>
</div>
@endsection