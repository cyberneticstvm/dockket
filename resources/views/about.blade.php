@extends('base')
@section('content')
<section class="about-me mb-5 mt-5">
    <div class="container">
        <h3 class="text-color-quaternary mb-3 font-weight-semibold text-capitalize text-center mb-5 mt-5">About Us</h3>
        <div class="row">
            <div class="col-xs-12 col-lg-4 mb-4 mb-lg-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="100">
                <h3 class="text-color-quaternary mb-3 font-weight-semibold text-capitalize pe-5">With Dockket, we bring health and happiness.</h3>
                <p class="text-uppercase mb-3">Team Dockket</p>
                <!--<img src="" alt="Signature">-->
            </div>
            <div class="col-xs-12 col-lg-8 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
                <p class="p-relative bottom-6">Recovery is just one click away. Connect with trusted doctors in your locality.
                Select from a pool of specialized doctors who are committed to serve you.</p>
                <p>In times of urgency, finding a reliable doctor becomes a stressful challenge. It is the worst scenario to be made
                to go from one hospital to another without knowledge at hand. With DOCKKET, you’ll not only receive critical
                information during the time of need, you’ll be able to get a doctor and find yourself a clinic right away.</p>
                <a href="/appointment/" class="font-weight-bold text-uppercase text-decoration-none">Make an Appointment</a>
            </div>
        </div>
    </div>
</section>
@endsection