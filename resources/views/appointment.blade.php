@extends('base')
@section('content')
<div role="main" class="main">
    <div class="container">
        <div class="row">
            <div class="col">
                <h3 class="text-center text-primary">Book an Appointment</h3>
                <form role="form" method="post" action="{{ route('appointment.show') }}">
                    @csrf
                    <div class="row">
                        <!--<div class="col-lg-4 col-md-4 col-sm-4 form-group">
                            <label class="col-form-label form-control-label line-height-9 pt-2 text-2">Name <span class="text-danger">*</span></label>
                            <input class="form-control form-control-lg text-3 h-auto py-2" type="text" maxlength="50" name="name" placeholder="Name" required>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 form-group">
                            <label class="col-form-label form-control-label line-height-9 pt-2 text-2">Mobile Number <span class="text-danger">*</span></label>
                            <input class="form-control form-control-lg text-3 h-auto py-2" type="text" maxlength="10" name="mobile" placeholder="Mobile Number" required>
                        </div>-->
                        <div class="col-lg-3 col-md-3 col-sm-3 form-group">
                            <label class="col-form-label form-control-label line-height-9 pt-2 text-2">Specialization <span class="text-danger">*</span></label>
                            <select class="form-control" name="spec" required>
                                <option value="">Select</option>
                                @forelse($specs as $key => $spec)
                                <option value="{{ $spec->id }}">{{ $spec->name }}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5 form-group">
                            <label class="col-form-label form-control-label line-height-9 pt-2 text-2">Location <span class="text-danger">*</span></label>
                            <input class="form-control form-control-lg text-3 h-auto py-2" type="text" id="address" name="location" placeholder="Location" required>
                            <input type="hidden" name="latitude" id="latitude"  />
                            <input type="hidden" name="longitude" id="longitude" />
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 form-group">
                            <label class="col-form-label form-control-label line-height-9 pt-2 text-2">Radius in KM <span class="text-danger">*</span></label>
                            <input class="form-control form-control-lg text-3 h-auto py-2" type="number" name="radius" min="1" step="1" placeholder="0 KM"/>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 form-group">
                            <label class="col-form-label form-control-label line-height-9 pt-2 text-2">Date</label>
                            <input class="form-control form-control-lg text-3 h-auto py-2" type="date" value="" name="date">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-group col-lg-9">

                        </div>
                        <div class="form-group col-lg-3">
                            <button type="submit" class="btn-submit btn btn-primary btn-modern float-end">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
window.onload = getLocation();
function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else {
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}
function showPosition(position) {
    var lat = document.getElementById("latitude");
    var long = document.getElementById("longitude");
    lat.value = position.coords.latitude;
    long.value = position.coords.longitude;
}
</script>
@endsection