@extends('base')
@section('content')
<div role="main" class="main">
    <section class="section section-funnel border-0 m-0 p-0">
        <div class="owl-carousel-wrapper" style="height: 991px;">
            <div class="owl-carousel dots-inside dots-horizontal-center custom-dots-style-1 show-dots-hover show-dots-xs nav-style-1 nav-inside nav-inside-plus nav-dark nav-lg nav-font-size-lg show-nav-hover mb-0" data-plugin-options="{'responsive': {'0': {'items': 1, 'dots': true, 'nav': false}, '479': {'items': 1, 'dots': true}, '768': {'items': 1, 'dots': true}, '979': {'items': 1}, '1199': {'items': 1}}, 'loop': false, 'autoHeight': false, 'margin': 0, 'dots': true, 'dotsVerticalOffset': '-250px', 'nav': false, 'animateIn': 'fadeIn', 'animateOut': 'fadeOut', 'mouseDrag': false, 'touchDrag': false, 'pullDrag': false, 'autoplay': true, 'autoplayTimeout': 7000, 'autoplayHoverPause': true, 'rewind': true}">
                
                <div class="position-relative overflow-hidden pb-5" data-dynamic-height="['991px','991px','991px','650px','650px']" style="height: 991px;">
                    <div class="background-image-wrapper position-absolute top-0 left-0 right-0 bottom-0" data-appear-animation="kenBurnsToLeft" data-appear-animation-duration="30s" data-plugin-options="{'minWindowWidth': 0}" data-carousel-onchange-show style="background-image: url({{ public_path().'/img/dockket/slides/doctor-wearing-white-robe-stethoscope.jpg' }}); background-size: cover; background-position: center;"></div>
                    <div class="container position-relative z-index-3 pb-5 h-100">
                        <div class="row align-items-center pb-5 h-100">
                            <div class="col-md-10 col-lg-6 text-center text-md-start pb-5">
                                <h1 class="text-color-dark font-weight-extra-bold text-10 line-height-2 mb-3 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="500" data-plugin-options="{'minWindowWidth': 0}">Time Saved is Life Saved</h1>
                                <h2 class="text-color-dark font-weight-normal text-4-5 line-height-2 mb-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="750" data-plugin-options="{'minWindowWidth': 0}">Doctor Booking App</h2>
                                <a href="/appointment/" class="btn btn-primary btn-modern font-weight-semibold text-3 btn-py-3 px-5 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1000" data-plugin-options="{'minWindowWidth': 0}">Make an Appointment</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Carousel Slide 1 -->
                <div class="position-relative overflow-hidden pb-5" data-dynamic-height="['991px','991px','991px','650px','650px']" style="height: 991px;">
                    <div class="background-image-wrapper position-absolute top-0 left-0 right-0 bottom-0" data-appear-animation="kenBurnsToLeft" data-appear-animation-duration="30s" data-plugin-options="{'minWindowWidth': 0}" data-carousel-onchange-show style="background-image: url({{ public_path().'/img/dockket/slides/network.jpg' }}); background-size: cover; background-position: center;"></div>
                    <div class="container position-relative z-index-3 pb-5 h-100">
                        <div class="row align-items-center pb-5 h-100">
                            <div class="col-md-10 col-lg-6 text-center text-md-end pb-5 ms-auto">
                                <h1 class="text-color-dark font-weight-extra-bold text-10 line-height-2 mb-3 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="500" data-plugin-options="{'minWindowWidth': 0}">Networking Healthcare Providers for You</h1>
                                <h2 class="text-color-dark font-weight-normal text-4-5 line-height-2 mb-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="750" data-plugin-options="{'minWindowWidth': 0}">Doctor Booking App</h2>
                                <a href="/appointment/" class="btn btn-primary btn-modern font-weight-semibold text-3 btn-py-3 px-5 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1000" data-plugin-options="{'minWindowWidth': 0}">Make an Appointment</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Carousel Slide 2 -->
                <div class="position-relative overflow-hidden pb-5" data-dynamic-height="['991px','991px','991px','650px','650px']" style="height: 991px;">
                    <div class="background-image-wrapper position-absolute top-0 left-0 right-0 bottom-0" data-appear-animation="kenBurnsToLeft" data-appear-animation-duration="30s" data-plugin-options="{'minWindowWidth': 0}" data-carousel-onchange-show style="background-image: url({{ public_path().'/img/dockket/slides/tsils.jpg' }}); background-size: cover; background-position: center;"></div>
                    <div class="container position-relative z-index-3 pb-5 h-100">
                        <div class="row align-items-center pb-5 h-100">
                            <div class="col-md-10 col-lg-6 text-center text-md-start pb-5">
                                <h1 class="text-color-dark font-weight-extra-bold text-10 line-height-2 mb-3 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="500" data-plugin-options="{'minWindowWidth': 0}">Healthcare at your Fingertips</h1>
                                <h2 class="text-color-dark font-weight-normal text-4-5 line-height-2 mb-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="750" data-plugin-options="{'minWindowWidth': 0}">Doctor Booking App</h2>
                                <a href="/appointment/" class="btn btn-primary btn-modern font-weight-semibold text-3 btn-py-3 px-5 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1000" data-plugin-options="{'minWindowWidth': 0}">Make an Appointment</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="section-funnel-layer-bottom d-none d-xl-block z-index-1">
            <div class="section-funnel-layer bg-light"></div>
            <div class="section-funnel-layer bg-light"></div>
        </div>
    </section>

    <div class="cards custom-cards container z-index-2">
        <div class="cards-container row justify-content-center justify-content-xl-between w-100 my-5 mt-xl-0 mx-0">
            <div class="col-xs-12 col-lg-6 col-xl-4 mb-4 mb-xl-0 pb-2 pb-xl-0">
                <div class="card border-radius-0 bg-color-light border-0 box-shadow-1 appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="400">
                    <div class="card-body d-flex align-items-center justify-content-between flex-column z-index-1">
                        <img src="{{ public_path().'/img/dockket/search.png' }}" class="img-fluid" alt="Healthcare Center">
                        <h4 class="card-title mb-1 font-weight-bold">Search.</h4>
                        <p class="card-text text-center">Find a Doctor based on your healthcare need. Search accordingly to distance, specific illness and date.</p>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-lg-6 col-xl-4 mb-4 mb-xl-0 pb-2 pb-xl-0">
                <div class="card border-radius-0 bg-color-light border-0 box-shadow-1 appear-animation" data-appear-animation="zoomIn" data-appear-animation-delay="100">
                    <div class="card-body d-flex align-items-center justify-content-between flex-column z-index-1">
                        <img src="{{ public_path().'/img/dockket/finger-pointer.png' }}" alt="Immediate Center">
                        <h4 class="card-title mb-1 font-weight-bold">Select</h4>
                        <p class="card-text text-center">View professional profile of doctors. Select on credibility, specialization profile and location criteria. It's only a few clicks away to the right doctor.</p>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-lg-6 col-xl-4 mb-4 mb-xl-0 pb-2 pb-xl-0">
                <div class="card border-radius-0 bg-color-light border-0 box-shadow-1 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="400">
                    <div class="card-body d-flex align-items-center justify-content-between flex-column z-index-1">
                        <img src="{{ public_path().'/img/dockket/tick.png' }}" alt="Diagnostic Center">
                        <h4 class="card-title mb-1 font-weight-bold">Book</h4>
                        <p class="card-text text-center">Book an appointment with your preferred doctor all within the Dckket App.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="mb-5">
        <div class="cards container">
            <h3 class="text-color-quaternary mb-3 font-weight-semibold text-capitalize pe-5">What We Provide.</h3>
            <div class="cards-container row justify-content-center justify-content-xl-between w-100">
                <div class="col-xs-12 col-lg-6 col-xl-3 mb-4 mb-xl-0 pb-2 pb-xl-0">
                    <div class="card border-radius-0 bg-color-light border-0 box-shadow-1 appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="400">
                        <div class="card-body bg-info d-flex align-items-center justify-content-between flex-column z-index-1">
                            <img src="{{ public_path().'/img/dockket/medical-teleconsultation-sick-patient-home.jpg' }}" class="img-fluid rounded-circle" alt="Healthcare Center">
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-lg-6 col-xl-3 mb-4 mb-xl-0 pb-2 pb-xl-0">
                    <div class="card border-radius-0 bg-color-light border-0 box-shadow-1 appear-animation" data-appear-animation="zoomIn" data-appear-animation-delay="100">
                        <div class="card-body bg-info d-flex align-items-center justify-content-between flex-column z-index-1">
                            <img src="{{ public_path().'/img/dockket/doctor-is-going-examine-his-patient-using-his-stethoscope-isolated-white.jpg' }}" class="img-fluid rounded-circle" alt="Immediate Center">
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-lg-6 col-xl-3 mb-4 mb-xl-0 pb-2 pb-xl-0">
                    <div class="card border-radius-0 bg-color-light border-0 box-shadow-1 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="400">
                        <div class="card-body bg-info d-flex align-items-center justify-content-between flex-column z-index-1">
                            <img src="{{ public_path().'/img/dockket/high-angle-female-researcher-laboratory-with-test-tubes.jpg' }}" class="img-fluid rounded-circle" alt="Diagnostic Center">
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-lg-6 col-xl-3 mb-4 mb-xl-0 pb-2 pb-xl-0">
                    <div class="card border-radius-0 bg-color-light border-0 box-shadow-1 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="400">
                        <div class="card-body bg-info d-flex align-items-center justify-content-between flex-column z-index-1">
                            <img src="{{ public_path().'/img/dockket/arrangement-vaccination-elements-covid19.jpg' }}" class="img-fluid rounded-circle" alt="Diagnostic Center">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about-me mb-5">
        <div class="container">
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

    <section class="more-about lazyload" data-bg-src="{{ public_path().'/img/dockket/scientist-with-microscope.jpg' }}">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-lg-6 p-relative overflow-hidden col-cuttin-more-about"></div>
                <div class="col-xs-12 col-lg-6 p-relative py-5 bg-color-light z-index-1 ps-lg-5 ps-xl-0">
                    <p class="text-uppercase mb-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="100">Who We Are</p>
                    <h3 class="text-color-quaternary font-weight-bold text-capitalize mb-2 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">More About Dockket</h3>
                    <p class="font-weight-semibold appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="300">Dockket
                    provides services that allow a person with special needs to stay in their home. The care can be for
                    people who are getting older, are chronically ill, recovering from surgery, disabled, or any person that needs in
                    home care.</p>
                    <p class="mb-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400">We have tied up with world class blood testing and other check up labs around your locality for serving you
                    better IN THE COMFORT OF YOUR HOME.</p>
                    <p class="mb-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400">We offer Home nursing, Physiotherapy to the bedridden patients. Your can trust DOCKKET and the dedicated team will take care of your elderly parents and loved ones in your absence.</p>
                    <div class="row counters mb-4 flex-nowrap flex-sm-wrap">
                        <div class="col-xs-4 col-sm-4 col-lg-4 mb-0 d-flex">
                            <div class="counter counter-primary appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="500">
                                <strong class="number-counter text-10" data-to="2" data-append="+">0</strong>
                                <label class="number-counter-text text-4 text-color-primary font-weight-semibold negative-ls-1">Business Year</label>
                            </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-lg-4 mb-0 d-flex">
                            <div class="counter counter-primary appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="750">
                                <strong class="number-counter text-10" data-to="50" data-append="+">0</strong>
                                <label class="number-counter-text text-4 text-color-primary font-weight-semibold negative-ls-1">Specialist Doctors</label>
                            </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-lg-4 mb-0 d-flex justify-content-center">
                            <div class="counter counter-primary appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="1000">
                                <strong class="number-counter text-10" data-to="20" data-append="+">0</strong>
                                <label class="number-counter-text text-4 text-color-primary font-weight-semibold negative-ls-1">Clinics</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="patient-reviews p-relative overflow-hidden lazyload m-0" data-bg-src="{{ public_path().'/img/dockket/review.jpg' }}">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-xl-6 p-relative bg-color-light z-index-1">
                    <p class="text-uppercase p-0 m-0">What They Say</p>
                    <h3 class="font-weight-bold text-color-quaternary mb-2 p-0 text-capitalize">Patients Reviews</h3>
                    <p class="p-0 m-0 font-weight-normal">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed imperdiet libero id nisi.</p>
                    <section class="section section-height-4 mt-0 mb-0 border-0 bg-color-light stage-margin">
                        <div class="owl-carousel owl-theme nav-style-2 mb-0" data-plugin-options="{'items': 1, 'loop': false, 'nav': true, 'dots': false, 'infinite': false, 'stagePadding': 0}">
                            <div class="text-center d-flex flex-wrap justify-content-center p-relative">
                                <span class="review-quotes text-start position-absolute"><i class="fas fa-quote-left text-color-primary"></i></span>
                                <p class="lead lead-2 mb-0 text-color-default font-weight-normal">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget risus porta, tincidunt turpis at, interdum tortor. Suspendisse potenti. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sociis natoque penatibus et magnis.</p>
                                <h4 class="review-signature text-capitalize text-color-quaternary mt-3">John Smith</h4>
                            </div>
                            <div class="text-center d-flex flex-wrap justify-content-center p-relative">
                                <span class="review-quotes text-start position-absolute"><i class="fas fa-quote-left text-color-primary"></i></span>
                                <p class="lead lead-2 mb-0 text-color-default font-weight-normal">Lorem ipsum, consectetur adipiscing elit. Sed eget porta, tincidunt turpis at, interdum tortor. Suspendisse potenti. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sociis natoque penatibus et magnis.</p>
                                <h4 class="review-signature text-capitalize text-color-quaternary mt-3">John Doe</h4>
                            </div>
                            <div class="text-center d-flex flex-wrap justify-content-center p-relative">
                                <span class="review-quotes text-start position-absolute"><i class="fas fa-quote-left text-color-primary"></i></span>
                                <p class="lead lead-2 mb-0 text-color-default font-weight-normal">Lorem ipsum dolor sit amet. Sed eget risus porta, tincidunt turpis at, interdum tortor. Suspendisse potenti. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sociis natoque penatibus et magnis.</p>
                                <h4 class="review-signature text-capitalize text-color-quaternary mt-3">Janice Smith</h4>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-md-6 col-lg-6 p-relative overflow-hidden col-cutting-patient-reviews"></div>
            </div>
        </div>
    </section>

    <!--<section class="medical-services py-5 p-relative overflow-hidden lazyload" data-bg-src="{{ public_path().'/img/dockket/3d-plexus-dna-strand-bg.jpg' }}">
        <div class="container">
            <div class="row">
                <div class="col pt-4">
                    <p class="text-uppercase mb-0 text-color-dark appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="100">Departments</p>
                    <h3 class="text-color-quaternary mb-2 text-color-dark font-weight-bold text-capitalize appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">Our Medical Services</h3>
                    <p class="mb-5 text-color-dark appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="300">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed imperdiet libero id nisi euismod, sed porta est consectetur. Vestibulum auctor felis eget orci semper.</p>        
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="cards-medical-services row flex-wrap justify-content-center">
                        <div class="card border-0 border-radius-0 col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 bg-transparent appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="500">
                            <div class="card-body d-flex flex-column justify-content-center align-items-center bg-color-light hover-effect-1">
                                <i class="fa-solid fa-heart-pulse fa-2xl text-warning"></i>
                                <h4 class="card-title mb-2 text-5 font-weight-bold text-color-quaternary mt-5">Cardiology</h4>
                                <p class="card-text mb-2 text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc viverra erat orci, ac auctor lacus tincidunt ut...</p>
                                <a href="demo-medical-2-departments-detail.html" class="font-weight-semibold text-uppercase text-decoration-none">read more +</a>
                            </div>
                        </div>
                        <div class="card border-0 border-radius-0 col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 bg-transparent appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="700">
                            <div class="card-body d-flex flex-column justify-content-center align-items-center bg-color-light hover-effect-1">
                                <i class="fa-solid fa-lungs fa-2xl text-success"></i>
                                <h4 class="card-title mb-2 text-5 font-weight-bold text-color-quaternary mt-5">Pulmonology</h4>
                                <p class="card-text mb-2 text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc viverra erat orci, ac auctor lacus tincidunt ut...</p>
                                <a href="demo-medical-2-departments-detail.html" class="font-weight-semibold text-uppercase text-decoration-none">read more +</a>
                            </div>
                        </div>
                        <div class="card border-0 border-radius-0 col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 bg-transparent appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="900">
                            <div class="card-body d-flex flex-column justify-content-center align-items-center bg-color-light hover-effect-1">
                                <i class="fa-solid fa-person-cane fa-2xl text-info"></i>
                                <h4 class="card-title mb-2 text-5 font-weight-bold text-color-quaternary mt-5">Orthopaedic</h4>
                                <p class="card-text mb-2 text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc viverra erat orci, ac auctor lacus tincidunt ut...</p>
                                <a href="demo-medical-2-departments-detail.html" class="font-weight-semibold text-uppercase text-decoration-none">read more +</a>
                            </div>
                        </div>
                        <div class="card border-0 border-radius-0 col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 bg-transparent appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1100">
                            <div class="card-body d-flex flex-column justify-content-center align-items-center bg-color-light hover-effect-1">
                                <i class="fa-solid fa-tooth fa-2xl text-primary"></i>
                                <h4 class="card-title mb-2 text-5 font-weight-bold text-color-quaternary mt-5">Dental Care</h4>
                                <p class="card-text mb-2 text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc viverra erat orci, ac auctor lacus tincidunt ut...</p>
                                <a href="demo-medical-2-departments-detail.html" class="font-weight-semibold text-uppercase text-decoration-none">read more +</a>
                            </div>
                        </div>
                        <div class="card border-0 border-radius-0 col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 bg-transparent appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1200">
                            <div class="card-body d-flex flex-column justify-content-center align-items-center bg-color-light hover-effect-1">
                                <i class="fa-solid fa-person-breastfeeding fa-2xl text-success"></i>
                                <h4 class="card-title mb-2 text-5 font-weight-bold text-color-quaternary mt-5">Gynecology</h4>
                                <p class="card-text mb-2 text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc viverra erat orci, ac auctor lacus tincidunt ut...</p>
                                <a href="demo-medical-2-departments-detail.html" class="font-weight-semibold text-uppercase text-decoration-none">read more +</a>
                            </div>
                        </div>
                        <div class="card border-0 border-radius-0 col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 bg-transparent appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1400">
                            <div class="card-body d-flex flex-column justify-content-center align-items-center bg-color-light hover-effect-1">
                                <i class="fa-solid fa-hand-holding-medical fa-2xl text-info"></i>
                                <h4 class="card-title mb-2 text-5 font-weight-bold text-color-quaternary mt-5">General Medicine</h4>
                                <p class="card-text mb-2 text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc viverra erat orci, ac auctor lacus tincidunt ut...</p>
                                <a href="demo-medical-2-departments-detail.html" class="font-weight-semibold text-uppercase text-decoration-none">read more +</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col text-center pb-lg-5 mb-lg-5">
                    <p class="text-uppercase text-color-dark d-block text-center mb-2 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="300">Need a Speciallist?</p>
                    <h3 class="text-color-quaternary mb-4 text-color-dark d-block text-center font-weight-semibold text-capitalize appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400">Get Better Now! Just Make An Appointment</h3>
                    <a href="/appointment/" class="btn btn-outline btn-light bg-hover-light text-hover-dark text-color-dark border-color-dark text-uppercase rounded-0 px-5 py-3 mb-2 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="500">make an appointment</a>
                </div>
            </div>
        </div>

        <div class="section-funnel-layer-bottom">
            <div class="section-funnel-layer bg-color-light"></div>
            <div class="section-funnel-layer bg-color-light"></div>
        </div>
    </section>-->
</div>
@endsection