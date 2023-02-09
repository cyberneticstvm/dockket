<!DOCTYPE html>
<html>
	<head>

		<!-- Basic -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Dockket | Online Clinic Booking App</title>	

		<meta name="keywords" content="doctor booking, online doctor booing" />
		<meta name="description" content="Dockket - Online Doctor Booking App">
		<meta name="author" content="eniecoitsolutions.com">
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<!-- Favicon -->
		<link rel="shortcut icon" href="{{ public_path().'/img/dockket/logos/dockket-icon.png' }}" type="image/x-icon" />
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

	</head>
	<body>

		<div class="body">

			<header id="header" class="header-effect-shrink" data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': false, 'stickyChangeLogo': true, 'stickyStartAt': 120, 'stickyHeaderContainerHeight': 70}">
				<div class="header-body border-top-0">
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
						</div>
					</div>
				</div>
			</header>

			@yield("content")

			<footer id="footer" class="m-0 bg-color-quaternary">
				<div class="footer-copyright pt-3 pb-3 container bg-color-quaternary">
					<div class="row">
						<div class="col-lg-12 text-center m-0 pb-4">
							<p class="text-color-default">Dockket. ©  {{ date('Y') }}.  All Rights Reserved</p>
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
			window.addEventListener('load', initialize);
			var options = {
				componentRestrictions: {country: "in"}
			};
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
	</body>
</html>
