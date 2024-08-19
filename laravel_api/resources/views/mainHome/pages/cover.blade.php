<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <!-- Meta Tags -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="keywords" content="Site keywords here">
		<meta name="description" content="">
		<meta name='copyright' content=''>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<!-- Title -->
        <title>{{ config('app.name','laravel') }}</title>
		
		<!-- Favicon -->
        <link rel="icon" href="{{URL::to('/')}}/mainHomePage/img/favicon.png">
		
		<!-- Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
		<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="{{URL::to('/')}}/mainHomePage/css/bootstrap.min.css">
		<!-- Nice Select CSS -->
		<link rel="stylesheet" href="{{URL::to('/')}}/mainHomePage/css/nice-select.css">
		<!-- Font Awesome CSS -->
        <link rel="stylesheet" href="{{URL::to('/')}}/mainHomePage/css/font-awesome.min.css">
		<!-- icofont CSS -->
        <link rel="stylesheet" href="{{URL::to('/')}}/mainHomePage/css/icofont.css">
		<!-- Slicknav -->
		<link rel="stylesheet" href="{{URL::to('/')}}/mainHomePage/css/slicknav.min.css">
		<!-- Owl Carousel CSS -->
        <link rel="stylesheet" href="{{URL::to('/')}}/mainHomePage/css/owl-carousel.css">
		<!-- Datepicker CSS -->
		<link rel="stylesheet" href="{{URL::to('/')}}/mainHomePage/css/datepicker.css">
		<!-- Animate CSS -->
        <link rel="stylesheet" href="{{URL::to('/')}}/mainHomePage/css/animate.min.css">
		<!-- Magnific Popup CSS -->
        <link rel="stylesheet" href="{{URL::to('/')}}/mainHomePage/css/magnific-popup.css">
		
		<!-- Medipro CSS -->
        <link rel="stylesheet" href="{{URL::to('/')}}/mainHomePage/css/normalize.css">
        <link rel="stylesheet" href="{{URL::to('/')}}/mainHomePage/style.css">
        <link rel="stylesheet" href="{{URL::to('/')}}/mainHomePage/css/responsive.css">
		
    </head>
    <body>
	
		<!-- Preloader -->
        <div class="preloader">
            <div class="loader">
                <div class="loader-outter"></div>
                <div class="loader-inner"></div>

                <div class="indicator"> 
                    <svg width="16px" height="12px">
                        <polyline id="back" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>
                        <polyline id="front" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>
                    </svg>
                </div>
            </div>
        </div>
        <!-- End Preloader -->
	
		<!-- Header Area -->
		<header class="header" >
			<!-- Topbar -->
			<div class="topbar" style="background: #1a76d1;">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-5 col-12">
                <!-- Contact -->
                <ul class="top-link" style="list-style: none; padding: 0; margin: 0;">
                    <li style="display: inline; margin-right: 10px;"><a href="#about" style="color: #fff;"><i class="fa fa-facebook"></i>&nbsp;</a></li>
                    <li style="display: inline; margin-right: 10px;"><a href="#services" style="color: #fff;"><i class="fa fa-whatsapp"></i>&nbsp;</a></li>
                    <li style="display: inline; margin-right: 10px;"><a href="#contact" style="color: #fff;"><i class="fa fa-phone"></i>&nbsp;</a></li>
                    <li style="display: inline; margin-right: 10px;"><a href="#contact" style="color: #fff;"><i class="fa fa-instagram"></i>&nbsp;</a></li>
                    <li style="display: inline; margin-right: 10px;"><a href="#contact" style="color: #fff;"><i class="fa fa-twitter"></i>&nbsp;</a></li>
                    <li style="display: inline; margin-right: 10px;"><a href="#contact" style="color: #fff;"><i class="fa fa-envelope"></i>&nbsp;</a></li>
                </ul>
                <!-- End Contact -->
            </div>
            <div class="col-lg-6 col-md-7 col-12">
                <!-- Top Contact -->
                <ul class="top-contact" style="list-style: none; padding: 0; margin: 0; color: #fff;">
                    <li style="color:white;"><i class="fa fa-phone" style="color:white;"></i>+250785389000</li>
                    <li><i class="fa fa-envelope" style="color:white;"></i><a href="mailto:support@yourmail.com" style="color: #fff;">{{ config('app.name','laravel') }}@gmail.com</a></li>
                </ul>
                <!-- End Top Contact -->
            </div>
        </div>
    </div>
</div>

			<!-- End Topbar -->
			<!-- Header Inner -->
			<div class="header-inner">
				<div class="container">
					<div class="inner">
						<div class="row">
							<div class="col-lg-3 col-md-3 col-12">
								<!-- Start Logo -->
								<div class="logo">
									<h2><a href="index.html">{{ config('app.name','laravel') }}</a></h2>
									<!-- <img src="{{URL::to('/')}}/mainHomePage/img/logo.png" alt="#"> -->
									<!-- <img src="{{URL::to('/')}}/mainHomePage/img/icons.png" alt="#" style="width:60px;height:50px;"> -->

								</div>
								<!-- End Logo -->
								<!-- Mobile Nav -->
								<div class="mobile-nav"></div>
								<!-- End Mobile Nav -->
							</div>
							<div class="col-lg-7 col-md-9 col-12">
								<!-- Main Menu -->
								<div class="main-menu">
									<nav class="navigation">
										<ul class="nav menu">
											<li class="@if (Request::segment(1) == null ) active @endif"><a href="{{ route('main.home') }}"><i class="fa fa-home"></i>&nbsp;Home</a>
											</li>
											<li class="@if (Request::segment(1) == 'about-us' ) active @endif"><a href="{{ route('main.about') }}"><i class="fa fa-list-alt"></i>&nbsp;About </a></li>
											<li class="@if (Request::segment(1) == 'services' ) active @endif"><a href="{{ route('main.services') }}"><i class="fa fa-wrench"></i>&nbsp;Services </a></li>
											<li class="@if (Request::segment(1) == 'pricing' ) active @endif"><a href="{{ route('main.pricing') }}"><i class="fa fa-money"></i>&nbsp;Pricing </a></li>
											<li class="@if (Request::segment(1) == 'contact' ) active @endif"><a href="{{ route('main.contact') }}"><i class="fa fa-phone"></i>&nbsp;Contact Us</a></li>
											<li class="d-block d-sm-none ">
											    <a href="{{ route('main.login.page') }}" style="color:blue;">
											        <i class="fa fa-phone"></i>&nbsp;Account
											    </a>
											</li>


										</ul>
									</nav>
								</div>
								<!--/ End Main Menu -->
							</div>
							
							<div class="col-lg-2 col-md-4 col-sm-6 col-12">
							   <!--  <div class="get-quote @if (Request::segment(1) == 'login-form' ) document.write(this).style.display='none' @endif">
							        <a href="{{ route('main.login.page') }}" class="btn"> <i class="fa fa-user"></i> Account</a>
							    </div> -->
							    <div class="get-quote">
								    <a href="{{ route('main.login.page') }}" class="btn @if (Request::segment(1) == 'login') d-none @endif">
								        <i class="fa fa-user"></i> Account
								    </a>
								</div>

							</div>

						</div>
					</div>
				</div>
			</div>
			<!--/ End Header Inner -->
		</header>
		<!-- End Header Area -->
		
		@yield('content')
		
		<!-- Footer Area -->
		<footer id="footer" class="footer ">
			<!-- Footer Top -->
			<div class="footer-top">
				<div class="container">
					<div class="row">
						<div class="col-lg-3 col-md-6 col-12">
							<div class="single-footer">
								<h2>About Us</h2>
								<p>SchoolEdge is a user-friendly management information system designed to streamline school operations, track student progress, and enhance communication between teachers, students, and parents.it helps schools improve efficiency by machine learning technology and prevent student dropouts</p>
								<!-- Social -->
								<ul class="social">
									<li><a href="#"><i class="icofont-facebook"></i></a></li>
									<li><a href="#"><i class="icofont-google-plus"></i></a></li>
									<li><a href="#"><i class="icofont-twitter"></i></a></li>
									<li><a href="#"><i class="icofont-vimeo"></i></a></li>
									<li><a href="#"><i class="icofont-pinterest"></i></a></li>
								</ul>
								<!-- End Social -->
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-12">
							<div class="single-footer f-link">
								<h2>Quick Links</h2>
								<div class="row">
									<div class="col-lg-6 col-md-6 col-12">
										<ul>
											<li><a href="{{ route('main.home') }}"><i class="fa fa-caret-right" aria-hidden="true"></i>Home</a></li>
											<li><a href="{{ route('main.about') }}"><i class="fa fa-caret-right" aria-hidden="true"></i>About Us</a></li>
											<li><a href="{{ route('main.services') }}"><i class="fa fa-caret-right" aria-hidden="true"></i>Services</a></li>
											<li><a href="{{ route('main.pricing') }}"><i class="fa fa-caret-right" aria-hidden="true"></i>pricing</a></li>
											<li><a href="{{ route('main.contact') }}"><i class="fa fa-caret-right" aria-hidden="true"></i>contact us</a></li>	
											<li><a href="{{ route('main.login.page') }}"><i class="fa fa-caret-right" aria-hidden="true"></i>account</a></li>	
										</ul>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-12">
							<div class="single-footer">
								<h2>Open Hours</h2>
								<p></p>
								<ul class="time-sidual">
									<li class="day">Monday - Friday <span>8:00-17:00</span></li>
									<li class="day">Saturday <span>closed</span></li>
									<li class="day">Sunday <span>closed</span></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-12">
							<div class="single-footer">
								<h2>Newsletter</h2>
								<p>Subscribe to our newsletter to receive all our latest news and updates in your inbox in real-time, ensuring you stay informed about every event as it happens!</p>

								<form action="{{ route('main.submit_subscription_email') }}" method="POST" class="newsletter-inner">
								    @csrf
								    <input type="email" name="email" placeholder="Your email address" class="common-input" required="">
								    <button type="submit" class="button"><i class="icofont icofont-paper-plane"></i></button>
								</form>

							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/ End Footer Top -->
			<!-- Copyright -->
			<div class="copyright">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-12">
							<div class="copyright-content">
								<p>© Copyright {{ date('Y') }}  |  All Rights Reserved by <a href="{{ route('main.home') }}"><strong>{{ config('app.name','laravel') }} </strong> </a> </p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/ End Copyright -->
		</footer>
		<!--/ End Footer Area -->
		
		<!-- jquery Min JS -->
        <script src="{{URL::to('/')}}/mainHomePage/js/jquery.min.js"></script>
		<!-- jquery Migrate JS -->
		<script src="{{URL::to('/')}}/mainHomePage/js/jquery-migrate-3.0.0.js"></script>
		<!-- jquery Ui JS -->
		<script src="{{URL::to('/')}}/mainHomePage/js/jquery-ui.min.js"></script>
		<!-- Easing JS -->
        <script src="{{URL::to('/')}}/mainHomePage/js/easing.js"></script>
		<!-- Color JS -->
		<script src="{{URL::to('/')}}/mainHomePage/js/colors.js"></script>
		<!-- Popper JS -->
		<script src="{{URL::to('/')}}/mainHomePage/js/popper.min.js"></script>
		<!-- Bootstrap Datepicker JS -->
		<script src="{{URL::to('/')}}/mainHomePage/js/bootstrap-datepicker.js"></script>
		<!-- Jquery Nav JS -->
        <script src="{{URL::to('/')}}/mainHomePage/js/jquery.nav.js"></script>
		<!-- Slicknav JS -->
		<script src="{{URL::to('/')}}/mainHomePage/js/slicknav.min.js"></script>
		<!-- ScrollUp JS -->
        <script src="{{URL::to('/')}}/mainHomePage/js/jquery.scrollUp.min.js"></script>
		<!-- Niceselect JS -->
		<script src="{{URL::to('/')}}/mainHomePage/js/niceselect.js"></script>
		<!-- Tilt Jquery JS -->
		<script src="{{URL::to('/')}}/mainHomePage/js/tilt.jquery.min.js"></script>
		<!-- Owl Carousel JS -->
        <script src="{{URL::to('/')}}/mainHomePage/js/owl-carousel.js"></script>
		<!-- counterup JS -->
		<script src="{{URL::to('/')}}/mainHomePage/js/jquery.counterup.min.js"></script>
		<!-- Steller JS -->
		<script src="{{URL::to('/')}}/mainHomePage/js/steller.js"></script>
		<!-- Wow JS -->
		<script src="{{URL::to('/')}}/mainHomePage/js/wow.min.js"></script>
		<!-- Magnific Popup JS -->
		<script src="{{URL::to('/')}}/mainHomePage/js/jquery.magnific-popup.min.js"></script>
		<!-- Counter Up CDN JS -->
		<script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
		<!-- Bootstrap JS -->
		<script src="{{URL::to('/')}}/mainHomePage/js/bootstrap.min.js"></script>
		<!-- Main JS -->
		<script src="{{URL::to('/')}}/mainHomePage/js/main.js"></script>
    </body>
</html>