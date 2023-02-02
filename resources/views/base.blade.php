<!DOCTYPE html>
<html>
	<head>

		<!-- Basic -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Dockket | Online Doctor Booking App</title>	

		<meta name="keywords" content="doctor booking, online doctor booing, Find a Doctor" />
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
													<span class="header-top-email px-0 font-weight-normal d-flex align-items-center"><i class="far fa-envelope text-4"></i>  <a class="text-color-default" href="mailto:mail@dockket.in">mail@dockket.in</a></span>
													<span class="header-top-opening-hours px-0 font-weight-normal d-flex align-items-center"><i class="far fa-clock text-4"></i>Mon - Sun 9:00am - 7:00pm</span>
												</li>
												<li class="nav-item nav-item-header-top-socials d-flex justify-content-between">
													<span class="header-top-button-make-as-appoitment d-inline-flex align-items-center justify-content-center h-100 p-0 align-top">
														<a href="/doctor/login/" class="d-flex align-items-center justify-content-center h-100 w-100 btn-primary font-weight-normal text-decoration-none">Doctor Login</a>
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
														<a class="nav-link active" href="/">
															Home
														</a>
													</li>
													<li class="dropdown-secondary">
														<a class="nav-link" href="/about">
															About Us
														</a>
													</li>
													<li class="dropdown-secondary">
														<a class="nav-link" href="/contact">
															Contact Us
														</a>
													</li>
													@if(Auth::user() && Auth::user()->user_type == 'P')
													<li class="dropdown-secondary">
														<a class="nav-link" href="/patient/">
															My Appointments
														</a>
													</li>
													@endif
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
								<div class="custom-info-block custom-info-block-phone">
									<span class="text-color-default font-weight-bold text-uppercase title-custom-info-block title-custom-info-block-phone">Phone</span>
									<span class="font-weight-normal text-color-light text-custom-info-block p-relative bottom-6 text-custom-info-block-phone">Toll Free <a href="tel:+1234567890" class="text-color-light">(123) 456-7890</a></span>
								</div>
								<div class="custom-info-block custom-info-block-email">
									<span class="text-color-default font-weight-bold text-uppercase title-custom-info-block title-custom-info-block-email">Email</span>
									<span class="font-weight-normal text-color-light text-custom-info-block p-relative bottom-6 text-custom-info-block-email"><a class="text-color-light" href="mailto:mail@dockket.in">mail@dockket.in</a></span>
								</div>
								<div class="custom-info-block custom-info-block-working-days">
									<span class="text-color-default font-weight-bold text-uppercase title-custom-info-block title-custom-info-block-working-days">Working Days/Hours</span>
									<span class="font-weight-normal text-color-light text-custom-info-block text-custom-info-block-working-days">Mon - Sun / 9:00AM - 7:00PM</span>
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
								<h4 class="mb-4 text-uppercase">Medical Categories</h4>
								<div class="nav-footer d-flex">
									<ul>
										<li>
											<a href="#">Active Ageing</a>
										</li>
										<li>
											<a href="#">Aesthetic Medicine</a>
										</li>
										<li>
											<a href="#">Bones and Joints</a>
										</li>
										<li>
											<a href="#">Brain Health</a>
										</li>
										<li>
											<a href="#">Cancer</a>
										</li>
										<li>
											<a href="#">Children's Health</a>
										</li>
										<li>
											<a href="#">Dental Health</a>
										</li>
										<li>
											<a href="#">Diabetes</a>
										</li>
										<li>
											<a href="#">Digestive System</a>
										</li>
										<li>
											<a href="#">ENT</a>
										</li>										
									</ul>
									<ul class="ps-4">
										<li>
											<a href="#">General Medicine</a>
										</li>
										<li>
											<a href="#">Infections</a>
										</li>
										<li>
											<a href="#">Nutrition</a>
										</li>
										<li>
											<a href="#">Skin Health</a>
										</li>
										<li>
											<a href="#">Mental Health</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-sm-12 pt-4 pt-lg-0 col-lg-3 text-start ms-lg-auto footer-column footer-column-opening-hours">
							<h4 class="mb-4 text-uppercase">Useful Links</h4>
								<ul class="ps-4">
									<li>
										<a href="/appointment/">Doctor/Clinic Appointment</a>
									</li>
									<li>
										<a href="/patient/login/">Patient Login</a>
									</li>
									<li>
										<a href="/clinic/login/">Clinic Login</a>
									</li>
									<li>
										<a href="/doctor/registration/">Doctor Registration</a>
									</li>
									<li>
										<a href="/clinic/registration/">Clinic Registration</a>
									</li>
									<li>
										<a href="/sitemap/">Sitemap</a>
									</li>
									<li>
										<a href="/terms-of-service/">Terms of Service</a>
									</li>
									<li>
										<a href="/contact/">Contact Us</a>
									</li>
								</ul>
						</div>
					</div>
				</div>
				<div class="footer-copyright pt-3 pb-3 container bg-color-quaternary">
					<div class="row">
						<div class="col-lg-12 text-center m-0 pb-4">
							<p class="text-color-default">Dockket.in ©  {{ date('Y') }}.  All Rights Reserved</p>
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
			function pickmylocation(){
				navigator.geolocation.getCurrentPosition(
					function (position) {
						var addr = getUserAddressBy(position.coords.latitude, position.coords.longitude);
					},
					function errorCallback(error) {
					console.log(error)
					}
				);
			}
			function getUserAddressBy(lat, long) {
				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function () {
					if (this.readyState == 4 && this.status == 200) {
						var address = JSON.parse(this.responseText)
						var addr = address.results[0].formatted_address;
						document.getElementById('address').value = addr;
						$('#latitude').val(lat);
        				$('#longitude').val(long);
					}
				};
				xhttp.open("GET", "https://maps.googleapis.com/maps/api/geocode/json?latlng="+lat+","+long+"&key={{config('app.google_api_key')}}", true);
				xhttp.send();
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
