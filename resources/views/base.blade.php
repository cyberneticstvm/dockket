<!DOCTYPE html>
<html>
	<head>

		<!-- Basic -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Dockket | Online Doctor Booking App</title>	

		<meta name="keywords" content="doctor booking, online doctor booing" />
		<meta name="description" content="Dockket - Online Doctor Booking App">
		<meta name="author" content="eniecoitsolutions.com">
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<!-- Favicon -->
		<link rel="shortcut icon" href="{{ public_path().'/img/favicon.ico' }}" type="image/x-icon" />
		<link rel="apple-touch-icon" href="{{ public_path().'/img/apple-touch-icon.png' }}">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

		<!-- Web Fonts  -->
		<link id="googleFonts" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="{{ public_path().'/vendor/bootstrap/css/bootstrap.min.css' }}">
		<link rel="stylesheet" href="{{ public_path().'/vendor/fontawesome-free/css/all.min.css' }}">
		<link rel="stylesheet" href="{{ public_path().'/vendor/animate/animate.compat.css' }}">
		<link rel="stylesheet" href="{{ public_path().'/vendor/simple-line-icons/css/simple-line-icons.min.css' }}">
		<link rel="stylesheet" href="{{ public_path().'/vendor/owl.carousel/assets/owl.carousel.min.css' }}">
		<link rel="stylesheet" href="{{ public_path().'/vendor/owl.carousel/assets/owl.theme.default.min.css' }}">
		<link rel="stylesheet" href="{{ public_path().'/vendor/magnific-popup/magnific-popup.min.css' }}">

		<link rel="stylesheet" href="{{ public_path().'/plugins/DataTables/datatables.min.css' }}">

		<!-- Theme CSS -->
		<link rel="stylesheet" href="{{ public_path().'/css/theme.css' }}">
		<link rel="stylesheet" href="{{ public_path().'/css/theme-elements.css' }}">
		<link rel="stylesheet" href="{{ public_path().'/css/theme-blog.css' }}">
		<link rel="stylesheet" href="{{ public_path().'/css/theme-shop.css' }}">

		<!-- Demo CSS -->
		<link rel="stylesheet" href="{{ public_path().'/css/demos/demo-medical-2.css' }}">

		<!-- Skin CSS -->
		<link id="skinCSS" rel="stylesheet" href="{{ public_path().'/css/skins/skin-medical-2.css' }}">

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="{{ public_path().'/css/custom.css' }}">

		<!-- Head Libs -->
		<script src="{{ public_path().'/vendor/modernizr/modernizr.min.js' }}"></script>
		<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

	</head>
	<body>
		<div class="body">

			<header id="header" class="header-effect-shrink" data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': false, 'stickyChangeLogo': true, 'stickyStartAt': 120, 'stickyHeaderContainerHeight': 70}">
				<div class="header-body border-top-0">
					<div class="header-top header-top-default header-top-borders border-bottom-0 bg-color-light">
						<div class="container h-100">
							<div class="header-row h-100">
								<div class="header-column justify-content-between">
									<div class="header-row">
										<nav class="header-nav-top w-100">
											<ul class="nav nav-pills justify-content-between w-100 h-100">
												<li class="nav-item py-2 d-xl-inline-flex">
													<span class="header-top-phone py-2 d-flex align-items-center text-color-primary font-weight-semibold text-uppercase">
														<i class="icon-user icons text-5 me-2"></i> <a href="/doctor/login/">Sign in | Create New Account</a>
													</span>
													<span class="header-top-email px-0 font-weight-normal d-flex align-items-center"><i class="far fa-envelope text-4"></i>  <a class="text-color-default" href="mailto:mail@example.com">mail@example.com</a></span>
													<span class="header-top-opening-hours px-0 font-weight-normal d-flex align-items-center"><i class="far fa-clock text-4"></i>Mon - Sat 9:00am - 6:00pm / Sunday - CLOSED</span>
												</li>
												<li class="nav-item nav-item-header-top-socials d-flex justify-content-between">
													<span class="header-top-socials p-0 h-100">
														<ul class="d-flex align-items-center h-100 p-0">
															<li class="list-unstyled">
																<a href="#"><i class="fab fa-instagram text-color-quaternary text-hover-primary"></i></a>
															</li>
															<li class="list-unstyled">
																<a href="#"><i class="fab fa-facebook-f text-color-quaternary text-hover-primary"></i></a>
															</li>
															<li class="list-unstyled">
																<a href="#"><i class="fab fa-twitter text-color-quaternary text-hover-primary"></i></a>
															</li>
														</ul>
													</span>
													<span class="header-top-button-make-as-appoitment d-inline-flex align-items-center justify-content-center h-100 p-0 align-top">
														<a href="/appointment/" class="d-flex align-items-center justify-content-center h-100 w-100 btn-primary font-weight-normal text-decoration-none">MAKE AN APPOINTMENT</a>
													</span>
												</li>
											</ul>
										</nav>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="header-container container bg-color-light">
						<div class="header-row">
							<div class="header-column header-column-logo">
								<div class="header-row">
									<div class="header-logo">
										<a href="/">
											<img alt="Porto" width="225" height="50" src="{{ public_path().'/img/dockket/logos/dockket-logo.png' }}">
										</a>
									</div>
								</div>
							</div>
							<div class="header-column header-column-nav-menu justify-content-end">
								<div class="header-row">
									<div class="header-nav header-nav-links order-2 order-lg-1">
										<div class="header-nav-main header-nav-main-square header-nav-main-effect-1 header-nav-main-sub-effect-1">
											<nav class="collapse">
												<ul class="nav nav-pills" id="mainNav">
													<li class="dropdown-secondary">
														<a class="nav-link active" href="demo-medical-2.html">
															Home
														</a>
													</li>
													<li class="dropdown-secondary">
														<a class="nav-link" href="demo-medical-2-about-us.html">
															About Us
														</a>
													</li>
													<li class="dropdown-secondary">
														<a class="nav-link" href="demo-medical-2-our-doctors.html">
															Our Doctors
														</a>
													</li>
													<li class="dropdown dropdown-secondary">
														<a class="nav-link dropdown-toggle" class="dropdown-toggle" href="demo-medical-2-departments.html">
															Departments
														</a>
														<ul class="dropdown-menu">
															<li>
																<a class="dropdown-item font-weight-normal" href="demo-medical-2-departments.html">
																	Overview
																</a>
															</li>
															<li>
																<a class="dropdown-item font-weight-normal" href="demo-medical-2-departments-detail.html">
																	Cardiology
																</a>
															</li>
															<li>
																<a class="dropdown-item font-weight-normal" href="demo-medical-2-departments-detail.html">
																	Gastroenterology
																</a>
															</li>
															<li>
																<a class="dropdown-item font-weight-normal" href="demo-medical-2-departments-detail.html">
																	Pulmonology
																</a>
															</li>
															<li>
																<a class="dropdown-item font-weight-normal" href="demo-medical-2-departments-detail.html">
																	Dental Care
																</a>
															</li>
															<li>
																<a class="dropdown-item font-weight-normal" href="demo-medical-2-departments-detail.html">
																	Gynecology
																</a>
															</li>
															<li>
																<a class="dropdown-item font-weight-normal" href="demo-medical-2-departments-detail.html">
																	Hepatology
																</a>
															</li>
															<li>
																<a class="dropdown-item font-weight-normal" href="demo-medical-2-departments-detail.html">
																	Gastroenterology
																</a>
															</li>
															<li>
																<a class="dropdown-item font-weight-normal" href="demo-medical-2-departments-detail.html">
																	Pulmonology
																</a>
															</li>
														</ul>
													</li>
													<li class="dropdown-secondary">
														<a class="nav-link" href="demo-medical-2-blog.html">
															Blog
														</a>
													</li>
													<li class="dropdown-secondary">
														<a class="nav-link" href="demo-medical-2-contact-us.html">
															Contact Us
														</a>
													</li>
												</ul>
											</nav>
										</div>
										<button class="btn header-btn-collapse-nav" data-bs-toggle="collapse" data-bs-target=".header-nav-main nav">
											<i class="fas fa-bars"></i>
										</button>
									</div>
								</div>
							</div>
							<div class="header-column header-column-search justify-content-center align-items-end">
								<div class="header-nav-features">
									<div class="header-nav-feature header-nav-features-search d-inline-flex">
										<a href="#" class="header-nav-features-toggle" data-focus="headerSearch">
											<i class="fas fa-search header-nav-top-icon"></i>
										</a>
										<div class="header-nav-features-dropdown header-nav-features-dropdown-mobile-fixed border-radius-0" id="headerTopSearchDropdown">
											<form role="search" action="page-search-results.html" method="get">
												<div class="simple-search input-group">
													<input class="form-control text-1" id="headerSearch" name="q" type="search" value="" placeholder="Search...">
													<button class="btn" type="submit">
														<i class="fa fa-search header-nav-top-icon"></i>
													</button>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>

			@yield("content")

			<footer id="footer" class="m-0 bg-color-quaternary">
				<div class="container">
					<div class="row py-5">
						<div class="col-sm-12 pb-4 pb-lg-0 col-lg-2 mb-2 d-flex align-items-center">
							<!--<img src="{{ public_path().'/img/dockket/logos/dockket-logo.png' }}" alt="Logo Footer">-->
						</div>
						<div class="col-sm-6 col-lg-3 footer-column footer-column-get-in-touch">
							<h4 class="mb-4 text-uppercase">Get in Touch</h4>
							<div class="info custom-info mb-4">
								<div class="custom-info-block custom-info-block-address">
									<span class="text-color-default font-weight-bold text-uppercase title-custom-info-block title-custom-info-block-address">Address</span>
									<span class="font-weight-normal text-color-light text-custom-info-block p-relative bottom-6 text-custom-info-block-address">123 Street Name, City, England</span>
								</div>
								<div class="custom-info-block custom-info-block-phone">
									<span class="text-color-default font-weight-bold text-uppercase title-custom-info-block title-custom-info-block-phone">Phone</span>
									<span class="font-weight-normal text-color-light text-custom-info-block p-relative bottom-6 text-custom-info-block-phone">Toll Free <a href="tel:+1234567890" class="text-color-light">(123) 456-7890</a></span>
								</div>
								<div class="custom-info-block custom-info-block-email">
									<span class="text-color-default font-weight-bold text-uppercase title-custom-info-block title-custom-info-block-email">Email</span>
									<span class="font-weight-normal text-color-light text-custom-info-block p-relative bottom-6 text-custom-info-block-email"><a class="text-color-light" href="mailto:mail@example.com">mail@example.com</a></span>
								</div>
								<div class="custom-info-block custom-info-block-working-days">
									<span class="text-color-default font-weight-bold text-uppercase title-custom-info-block title-custom-info-block-working-days">Working Days/Hours</span>
									<span class="font-weight-normal text-color-light text-custom-info-block text-custom-info-block-working-days">Mon - Sun / 9:00AM - 8:00PM</span>
								</div>
							</div>
							<ul class="social-icons">
								<li class="social-icons-instagram">
									<a href="http://www.instagram.com/" target="_blank" title="Instagram">
										<i class="fab fa-instagram text-4 font-weight-semibold"></i>
									</a>
								</li>
								<li class="social-icons-twitter">
									<a href="http://www.twitter.com/" target="_blank" title="Twitter">
										<i class="fab fa-twitter text-4 font-weight-semibold"></i>
									</a>
								</li>
								<li class="social-icons-facebook">
									<a href="http://www.facebook.com/" target="_blank" title="Facebook">
										<i class="fab fa-facebook-f text-4 font-weight-semibold"></i>
									</a>
								</li>
							</ul>
						</div>
						<div class="col-sm-6 pt-5 pt-md-0 col-lg-4">
							<div class="nav-footer-container">
								<h4 class="mb-4 text-uppercase">Medical Services</h4>
								<div class="nav-footer d-flex">
									<ul>
										<li>
											<a href="#">Home</a>
										</li>
										<li>
											<a href="#">About Us</a>
										</li>
										<li>
											<a href="#">Our Doctors</a>
										</li>
										<li>
											<a href="#">Departments</a>
										</li>
										<li>
											<a href="#">Overview</a>
										</li>
										<li>
											<a href="#">Cardiology</a>
										</li>
										<li>
											<a href="#">Gastroenterology</a>
										</li>
										<li>
											<a href="#">Pulmonology</a>
										</li>
										<li>
											<a href="#">Dental Care</a>
										</li>
										<li>
											<a href="#">Gynecology</a>
										</li>										
									</ul>
									<ul class="ps-4">
										<li>
											<a href="#">Hepatology</a>
										</li>
										<li>
											<a href="#">Gastroenterology</a>
										</li>
										<li>
											<a href="#">Pulmonology</a>
										</li>
										<li>
											<a href="#">Blog</a>
										</li>
										<li>
											<a href="#">Contact Us</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-sm-12 pt-4 pt-lg-0 col-lg-3 text-start ms-lg-auto footer-column footer-column-opening-hours">
							<h4 class="mb-4 text-uppercase">Opening Hours</h4>
							<div class="info custom-info pt-0">
								<span>Mon-Fri</span>
								<span>8:30 am to 5:00 pm</span>
							</div>
							<div class="info custom-info">
								<span>Saturday</span>
								<span>9:30 am to 1:00 pm</span>
							</div>
							<div class="info custom-info pb-0 border-bottom-0">
								<span>Sunday</span>
								<span>Closed</span>
							</div>
						</div>
					</div>
				</div>
				<div class="footer-copyright pt-3 pb-3 container bg-color-quaternary">
					<div class="row">
						<div class="col-lg-12 text-center m-0 pb-4">
							<p class="text-color-default">Porto Medical. ??  2022.  All Rights Reserved</p>
						</div>
					</div>
				</div>
			</footer>
		</div>

		<!-- Vendor -->
		<script src="{{ public_path().'/vendor/plugins/js/plugins.min.js' }}"></script>

		<script src="https://maps.googleapis.com/maps/api/js?key={{config('app.google_api_key')}}&libraries=places">
		</script>

		<script src="{{ public_path().'/plugins/DataTables/datatables.min.js' }}"></script>

		<!-- Theme Base, Components and Settings -->
		<script src="{{ public_path().'/js/theme.js' }}"></script>

		<!-- Current Page Vendor and Views -->
		<script src="{{ public_path().'/js/views/view.contact.js' }}"></script>

		<!-- Theme Custom -->
		<script src="{{ public_path().'/js/custom.js' }}"></script>

		<!-- Theme Initialization Files -->
		<script src="{{ public_path().'/js/theme.init.js' }}"></script>

		<script>
			var options = {
				componentRestrictions: {country: "in"}
			};
			window.addEventListener('load', initialize);
			function initialize() {
				var input = document.getElementById('address');
				var autocomplete = new google.maps.places.Autocomplete(input, options);
				autocomplete.addListener('place_changed', function () {
					var place = autocomplete.getPlace();
					$('#latitude').val(place.geometry['location'].lat());
					$('#longitude').val(place.geometry['location'].lng());
				});
			}
		</script>
		<script>
			var lat = $("#doc_latitude").val();
			var long = $("#doc_longitude").val();
			var myLatlng = new google.maps.LatLng(lat,long);
			var mapOptions = {
			zoom: 15,
			center: myLatlng
			}
			var map = new google.maps.Map(document.getElementById("doclocationmap"), mapOptions);
			var marker = new google.maps.Marker({
				position: myLatlng,
				title:"Hello World!"
			});
			// To add the marker to the map, call setMap();
			marker.setMap(map);
		</script>
	</body>
</html>
