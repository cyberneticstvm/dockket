@extends('doctor.base')
@section('content')
<div role="main" class="main">
    <div class="container pt-3 pb-2">
        <div class="row pt-2">
            <div class="col-lg-12">
                <h3 class="text-center text-primary">My Settings</h3>
            </div>
            @include('doctor.sections.leftmenu')
            <div class="col-lg-9">                
                <form role="form">
                    @csrf
                    <div class="form-group row">
                        <div class="col-lg-3 form-group">
                            <label class="col-form-label form-control-label line-height-9 pt-2 text-2">Consultation Fee</label>
                            <input class="form-control text-3 h-auto py-2" type="number" step="1" min="1" name="fee" placeholder="0.00">
                        </div>
                        <div class="col-lg-3 form-group">
                            <label class="col-form-label form-control-label line-height-9 pt-2 text-2">Slots per Day</label>
                            <input class="form-control text-3 h-auto py-2" step="1" type="number" min="1" name="slot" placeholder="0">
                        </div>
                        <div class="col-lg-3 form-group">
                            <label class="col-form-label form-control-label line-height-9 pt-2 text-2">Time per Cons. (In Minutes)</label>
                            <input class="form-control text-3 h-auto py-2" step="1" type="number" min="1" name="slot" placeholder="0">
                        </div>
                        <div class="col-lg-3 form-group">
                            <label class="col-form-label form-control-label line-height-9 pt-2 text-2">Consultation Start</label>
                            @php $from = $start @endphp
                            <select class="form-control">
                                <option value="">Select</option>
                                @while($from <= $end)                                            
                                    <option value="{{ date('h:i A', $from) }}">{{ date('h:i A', $from) }}</option>
                                    @php $from = strtotime('+60 minutes', $from); @endphp
                                @endwhile
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-3 form-group">
                            <label class="col-form-label form-control-label line-height-9 pt-2 text-2">Appointment Open</label>
                            <select class="form-control">
                                <option value="">Select</option>
                                <option value="0">Always</option>
                                <option value="1">1 Day prior</option>
                                <option value="2">2 Days prior</option>
                                <option value="3">3 Days prior</option>
                            </select>
                        </div>                        
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-9 form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="availability" class="custom-control-input" value="1">
                                <label class="custom-control-label text-2" for="terms">Available for Consultation</label>
                                @error('terms')
                                <small class="text-danger">{{ $errors->first('terms') }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-4 form-group">
                            <label class="col-form-label form-control-label line-height-9 pt-2 text-2">New Password</label>
                            <input class="form-control text-3 h-auto py-2" type="password" name="password" placeholder="*****">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection