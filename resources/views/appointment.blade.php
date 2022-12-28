@extends('base')
@section('content')
<div role="main" class="main">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
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
                                <option value="0">All</option>
                                @forelse($specs as $key => $spec)
                                <option value="{{ $spec->id }}" {{ ($input && $input[0] == $spec->id) ? 'selected' : '' }}>{{ $spec->name }}</option>
                                @empty
                                @endforelse
                            </select>
                            @error('spec')
                            <small class="text-danger">{{ $errors->first('spec') }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5 form-group">
                            <label class="col-form-label form-control-label line-height-9 pt-2 text-2">Location <span class="text-danger">*</span></label>
                            <input class="form-control form-control-lg text-3 h-auto py-2" type="text" id="address" value="{{ ($input && $input[1]) ? $input[1] : old('location') }}" name="location" placeholder="Location" required>
                            <input type="text" name="latitude" id="latitude" value="{{ ($input && $input[2]) ? $input[2] : '' }}" />
                            <input type="text" name="longitude" id="longitude" value="{{ ($input && $input[3]) ? $input[3] : '' }}" />
                            @error('location')
                            <small class="text-danger">{{ $errors->first('location') }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 form-group">
                            <label class="col-form-label form-control-label line-height-9 pt-2 text-2">Radius in KM <span class="text-danger">*</span></label>
                            <input class="form-control form-control-lg text-3 h-auto py-2" type="number" name="radius" min="1" max="50" step="1" placeholder="0 KM" value="{{ ($input && $input[4]) ? $input[4] : '' }}" required />
                            @error('radius')
                            <small class="text-danger">{{ $errors->first('radius') }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 form-group">
                            <label class="col-form-label form-control-label line-height-9 pt-2 text-2">Date <span class="text-danger">*</span></label>
                            <input class="form-control form-control-lg text-3 h-auto py-2" type="date" id="inputdate" value="{{ ($input && $input[5]) ? $input[5] : '' }}" name="date" required />
                            @error('date')
                            <small class="text-danger">{{ $errors->first('date') }}</small>
                            @enderror
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
            <div class="col-md-12">
                <div class="row">
                    @forelse($apps as $key => $app)
                        <div class="col-lg-4 col-md-6 pb-2">
							<div class="card border-0 mb-4 border-radius-0 box-shadow-1 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="100">
								<div class="card-body p-3 z-index-1">
									<a href="demo-medical-2-our-doctors-detail.html" class="d-block text-center bg-color-grey">
										<img alt="Doctor" class="img-fluid rounded" src="{{ ($app->photo) ? public_path().'/storage/doctor/photo/'.$app->photo :  public_path().'/storage/doctor/photo/avatar.png' }}">
									</a>
									<strong class="font-weight-bold text-dark d-block text-5 mt-4 mb-0 text-center">
										<a href="demo-medical-2-our-doctors-detail.html" class="text-dark">
											{{ $app->docname }}
										</a>
									</strong>
									<span class="text-uppercase d-block text-default font-weight-semibold text-1 p-relative bottom-4 mb-0 text-center">{{ $app->spec }}</span>
									<p class="text-center">{{ $app->designation }}<br>Branch: {{ $app->bname }}</p>
                                    <div class="row">
                                        <div class="col text-center text-dark">₹ {{ $app->fee }}</div>
                                        <div class="col text-center text-dark">{{ number_format($app->distance_km, 2) }} KMs</div>
                                        <!--<div class="col text-center"><a href="/appointment/locationmap/{{ $app->id }}" target="_blank"><i class="fa fa-location-dot text-info"></i></a></div>-->
                                        <div class="col text-center"><a href="geo:{{ $app->con_latitude }},{{ $app->con_longitude }}" target="_blank"><i class="fa fa-location-dot text-info"></i></a></div>
                                    </div>
									<div class="text-center mt-2"><button data-bs-toggle="collapse" data-bs-target="#slot_{{ $app->id }}" class="btn btn-outline btn-light bg-hover-light text-dark text-hover-primary border-color-grey border-color-active-primary border-color-hover-primary text-uppercase rounded-0 px-4 py-2 mb-4 text-2 slotBtn">Show Slots</button></div>
                                    <form method="post" action="{{ route('appointment.save') }}">
                                        @csrf                   
                                        <input type='hidden' name='doctor_id' value="{{ $app->id }}" />                     
                                        <input type='hidden' name='appointment_date' value="{{ $input[5] }}" />                     
                                        <input type='hidden' name='branch' value='1' />                     
                                        <input type='hidden' name='spec' value="{{ $input[0] }}" />                     
                                        <div id="slot_{{ $app->id }}" class="collapse">
                                            <h5 class="text-center text-success">Available Slots on {{ date('d-M-Y', strtotime($input[5])) }}</h5>
                                            @php 
                                                $from = strtotime($app->stime); $end = strtotime($app->etime); $dur = $app->time_per_appointment; $bg = ''; $bstime = strtotime($app->bstime); $betime = strtotime($app->betime); $c = 0;
                                                $apps = DB::table('appointments')->selectRaw("TIME_FORMAT(appointment_time, '%h:%i %p') AS appointment_time")->where('doctor_id', $app->id)->whereDate('appointment_date', $input[5])->pluck('appointment_time')->toArray();
                                            @endphp
                                            <div class="row">                                                
                                                @while($from <= $end)
                                                    @if($c == $app->slots) @break; @endif
                                                    <div class="col slot {{ (in_array(date('h:i A', $from), $apps) || (date('h:i A', $from) >= date('h:i A', $bstime) && date('h:i A', $from) <= date('h:i A', $betime))) ? 'bg-danger text-white no-app' : '' }}">
                                                        {{ date('h:i A', $from) }}
                                                    </div>
                                                    <input type="hidden" name="slot" value="{{ $c }}" />
                                                    @php $from = strtotime('+'.$dur.' minutes', $from); $c++; @endphp
                                                @endwhile                                                
                                                <div class="row mt-3">
                                                    <div class="col-lg-12 form-group">
                                                        <label>Selected Time: </label>
                                                        <input type="text" class="form-control from-control-sm atime" name="appointment_time" value="Selected Time" placeholder="" readonly required/>
                                                    </div>
                                                    <div class="col-lg-12 form-group">
                                                        <label>Full Name: </label>
                                                        <input type="text" class="form-control from-control-sm" name="patient_name" placeholder="Full Name" required/>
                                                    </div>
                                                    <div class="col-lg-12 form-group">
                                                        <label>Mobile Number: </label>
                                                        <input type="text" class="form-control from-control-sm" maxlength="10" name="mobile" placeholder="Mobile Number" required/>
                                                    </div>
                                                    <div class="col text-center">                                                        
                                                        <button type="submit" class="btn btn-submit btn-outline btn-light bg-hover-light text-dark text-hover-primary border-color-grey border-color-active-primary border-color-hover-primary text-uppercase rounded-0 px-4 py-2 mb-4 text-2">Book Now</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
								</div>
							</div>
						</div>
                    @empty
                    <div class="col-md-12"><p class="fw-bold text-danger">No Records Found! Please try again with different criteria.</p></div>
                    @endforelse
                </div>
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