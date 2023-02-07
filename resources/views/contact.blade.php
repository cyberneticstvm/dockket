@extends('base')
@section('content')
<section class="about-me mb-5 mt-5">
    <div class="container">
        <h3 class="text-color-quaternary mb-3 font-weight-semibold text-capitalize text-center mb-5 mt-5">Contact Us</h3>
        <div class="row">
            <div class="col">
                <h3 class="text-color-quaternary font-weight-bold text-capitalize mb-2">Send a Message</h3>
                <p>Please fill and submit below form or email your thoughts to <a href="mailto:mail@dockket.in">mail@dockket.in.</a></p>
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                @if(session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                @endif
                <form action="{{ route('contact.email') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <input type="text" placeholder="Your Name" value="" data-msg-required="Please enter your name." maxlength="100" class="form-control" name="name">
                            @error('name')
                            <small class="text-danger">{{ $errors->first('name') }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-lg-6">
                            <input type="email" placeholder="Your E-mail" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control" name="email">
                            @error('email')
                            <small class="text-danger">{{ $errors->first('email') }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <input placeholder="Mobile Number" type="text" value="" data-msg-required="Please enter the Mobile number." maxlength="10" class="form-control" name="mobile">
                        </div>
                        @error('mobile')
                        <small class="text-danger">{{ $errors->first('mobile') }}</small>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <input placeholder="Subject" type="text" value="" data-msg-required="Please enter the subject." maxlength="100" class="form-control" name="subject">
                        </div>
                        @error('subject')
                        <small class="text-danger">{{ $errors->first('subject') }}</small>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <textarea placeholder="Your Message..." maxlength="5000" data-msg-required="Please enter your message." rows="6" class="form-control" name="message"></textarea>
                        </div>
                        @error('message')
                        <small class="text-danger">{{ $errors->first('message') }}</small>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <input type="submit" value="Send Message" class="btn btn-submit btn-primary px-4 py-3 text-center text-uppercase font-weight-semibold" data-loading-text="Loading...">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection