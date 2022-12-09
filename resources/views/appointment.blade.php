@extends('base')
@section('content')
<div role="main" class="main">
    <div class="container">
        <div class="row">
            <div class="col">
                <h3 class="text-center text-primary">Appointment</h3>
                <form role="form" method="post" action="">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                            <label class="col-form-label form-control-label line-height-9 pt-2 text-2">Name</label>
                            <input class="form-control text-3 h-auto py-2" type="text" maxlength="50" name="name" required>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                            <label class="col-form-label form-control-label line-height-9 pt-2 text-2">Mobile Number</label>
                            <input class="form-control text-3 h-auto py-2" type="text" maxlength="10" name="mobile" required>
                        </div>
                        <div id="demo"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
window.onload = getLocation();
var x = document.getElementById("demo");
function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else {
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
  x.innerHTML = "Latitude: " + position.coords.latitude +
  "<br>Longitude: " + position.coords.longitude;
}
</script>
@endsection