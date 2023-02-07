@extends('doctor.base')
@section('content')
<div role="main" class="main">
    <div class="container pt-3 pb-2">
        <div class="row pt-2">
            <div class="col-lg-12">
                <h3 class="text-center text-primary">My Settings</h3>
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                @if(session()->has('error'))
                    <div class="alert alert-warning">
                        {{ session()->get('error') }}
                    </div>
                @endif
            </div>
            @include('doctor.sections.leftmenu')
            <div class="col-lg-9">                
                <form role="form" method="post" action="{{ route('doctor.settings.update', $doctor->id) }}">
                    @csrf
                    <input type="hidden" name="doctor_id" value="{{ $doctor->id }}" />
                    <div class="form-group row">
                        <div class="col-lg-3 form-group">
                            <label class="col-form-label form-control-label line-height-9 pt-2 text-2">Consultation Fee <span class="text-danger">*</span></label>
                            <input class="form-control text-3 h-auto py-2" type="text" maxlength="4" name="fee" value="{{ ($settings && $settings['fee']) ? $settings['fee'] : old('fee') }}" placeholder="0.00">
                            @error('fee')
                            <small class="text-danger">{{ $errors->first('fee') }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-3 form-group">
                            <label class="col-form-label form-control-label line-height-9 pt-2 text-2">Slots per Day <span class="text-danger">*</span></label>
                            <input class="form-control text-3 h-auto py-2 totslot" type="text" maxlength="2" name="slots" value="{{ ($settings && $settings['slots']) ? $settings['slots'] : old('slots') }}" placeholder="0">
                            @error('slots')
                            <small class="text-danger">{{ $errors->first('slots') }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-3 form-group">
                            <label class="col-form-label form-control-label line-height-9 pt-2 text-2">Time per Cons. (In Minutes) <span class="text-danger">*</span></label>
                            <input class="form-control text-3 h-auto py-2 dur" type="text" maxlength="2" name="time_per_appointment" value="{{ ($settings && $settings['time_per_appointment']) ? $settings['time_per_appointment'] : old('time_per_appointment') }}" placeholder="0">
                            @error('time_per_appointment')
                            <small class="text-danger">{{ $errors->first('time_per_appointment') }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-3 form-group">
                            <label class="col-form-label form-control-label line-height-9 pt-2 text-2">Consultation Start <span class="text-danger">*</span></label>
                            @php $from = $start @endphp
                            <select class="form-control cstart" name="appointment_start_time">
                                <option value="">Select</option>
                                @while($from <= $end)                                            
                                    <option value="{{ date('h:i A', $from) }}" {{ ($settings && $settings['stime'] == date('h:i A', $from)) ? 'selected' : '' }}>{{ date('h:i A', $from) }}</option>
                                    @php $from = strtotime('+60 minutes', $from); @endphp
                                @endwhile
                            </select>
                            @error('appointment_start_time')
                            <small class="text-danger">{{ $errors->first('appointment_start_time') }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-3 form-group">
                            <label class="col-form-label form-control-label line-height-9 pt-2 text-2">Appointment Open <span class="text-danger">*</span></label>
                            <select class="form-control" name="appointment_open_days">
                                <option value="">Select</option>
                                <option value="0" {{ ($settings && $settings['appointment_open_days'] == 0) ? 'selected' : '' }}>Always</option>
                                <option value="1" {{ ($settings && $settings['appointment_open_days'] == 1) ? 'selected' : '' }}>1 Day prior</option>
                                <option value="2" {{ ($settings && $settings['appointment_open_days'] == 2) ? 'selected' : '' }}>2 Days prior</option>
                                <option value="3" {{ ($settings && $settings['appointment_open_days'] == 3) ? 'selected' : '' }}>3 Days prior</option>
                            </select>
                            @error('appointment_open_days')
                            <small class="text-danger">{{ $errors->first('appointment_open_days') }}</small>
                            @enderror
                        </div>                        
                        <div class="col-lg-3 form-group">
                            <label class="col-form-label form-control-label line-height-9 pt-2 text-2">Break Start</label>
                            @php $from = ($settings && $settings['bstime']) ? strtotime($settings['bstime']) : $start; @endphp
                            <select class="form-control bstart" name="break_start_time">
                                <option value="">Select</option>
                                @while($from <= $end)                                            
                                    <option value="{{ date('h:i A', $from) }}" {{ ($settings && $settings['bstime'] == date('h:i A', $from)) ? 'selected' : '' }}>{{ date('h:i A', $from) }}</option>
                                    @php $from = strtotime('+30 minutes', $from); @endphp
                                @endwhile
                            </select>
                        </div>
                        <div class="col-lg-3 form-group">
                            <label class="col-form-label form-control-label line-height-9 pt-2 text-2">Break End</label>
                            @php $from = ($settings && $settings['betime']) ? strtotime($settings['betime']) : $start; @endphp
                            <select class="form-control bend" name="break_end_time">
                                <option value="">Select</option>
                                @while($from <= $end)                                            
                                    <option value="{{ date('h:i A', $from) }}" {{ ($settings && $settings['betime'] == date('h:i A', $from)) ? 'selected' : '' }}>{{ date('h:i A', $from) }}</option>
                                    @php $from = strtotime('+30 minutes', $from); @endphp
                                @endwhile
                            </select>
                        </div>                        
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-9 form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="available_for_appointment" class="custom-control-input" value="1" {{ ($settings && $settings['available_for_appointment'] == 1) ? 'checked' : '' }}>
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
                    <div class="form-group row">
                        <div class="form-group col-lg-9">

                        </div>
                        <div class="form-group col-lg-3">
                            <button type="submit" class="btn-submit btn btn-primary btn-modern float-end">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection