<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>{{ config('app.name','school-name') }}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ URL::to('/')}}/homePage/assets/img/favicon.png" rel="icon">
  <link href="{{ URL::to('/')}}/homePage/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ URL::to('/')}}/homePage/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ URL::to('/')}}/homePage/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{ URL::to('/')}}/homePage/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="{{ URL::to('/')}}/homePage/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="{{ URL::to('/')}}/homePage/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <!-- Main CSS File -->
  <link href="{{ URL::to('/')}}/homePage/assets/css/main.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style type="text/css">
    @media(max-width:456px){
        #login_link{
            position: relative;
            margin: 0;
        }
    }
  </style>
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="#" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename text-secondary" style="font-family: sans-serif;font-style: italic;">{{ config('app.name','school-name') }}</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{ route('guest_homepage') }}" class="{{Request::segment(1) == '' ? 'active' : ''}}"><i class="fa fa-home"></i>&nbsp;Home<br></a></li>
          <li><a href="{{ route('about_us') }}" class="{{Request::segment(1) == 'about-us' ? 'active' : ''}}"><i class="fa fa-list-alt"></i>&nbsp;About us</a></li>
          <li><a href="{{ route('course') }}" class="{{Request::segment(1) == 'course' ? 'active' : ''}}"><i class="fa fa-book"></i>&nbsp;Courses</a></li>
          <!-- <li><a href="#"><i class="fa fa-calendar"></i>&nbsp;Events</a></li> -->
          <li class="dropdown"><a href="#"><span><i class="fa fa-user-graduate"></i>&nbsp;Students</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="#">Studying</a></li>
              <li><a href="#">Living</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#" class="{{Request::segment(1) == 'teachers' ? 'active' : ''}}"><span><i class="fa fa-crown"></i>&nbsp;Leaders</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="#">Administration</a></li>
              <li><a href="{{ route('teachers') }}">Teachers</a></li>
            </ul>
          </li>
          <li><a href="{{ route('contact') }}" class="{{Request::segment(1) == 'contact' ? 'active' : ''}}"><i class="fa fa-phone"></i>&nbsp;Contact</a></li>
          <li>
            <a class="{{ Request::segment(1) == 'login' ? 'active' : '' }}" href="{{ route('login.form') }}" id="login_link"><b><i class="fa fa-user"></i>&nbsp;Account</b></a>
          </li>

        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      

    </div>
  </header>

  <main class="main">
    @yield('content')
  </main>

  <footer id="footer" class="footer position-relative light-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="#" class="logo d-flex align-items-center">
            <span class="sitename">{{ config('app.name','school-name') }}</span>
          </a>
          <div class="footer-contact pt-3">
            <p>Rwanda-Kigali-Gasabo</p>
            <p>Kacyiru-Kamatamu-Rwinzovu</p>
            <p>KG 567 St</p>
            <p class="mt-3"><strong>Phone:</strong> <span>+250780000000</span></p>
            <p><strong>Email:</strong> <span>{{config('app.name','school-name')}}@gmail.com</span></p>
          </div>
          <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 footer-links">
            <div class="row">
              <h4>Useful Links</h4>
              <div class="col-lg-6 col-md-6 col-sm-6 footer-links">
                <ul>
                  <li><a href="#">Home</a></li>
                  <li><a href="#">About us</a></li>
                  <li><a href="#">course</a></li>
                  <li><a href="#">Events</a></li>
                </ul>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 footer-links">
                <ul>
                  <li><a href="#">student's living</a></li>
                  <li><a href="#">student's studying</a></li>
                  <li><a href="#">administration</a></li>
                  <li><a href="#">contact</a></li>
                </ul>
              </div>
              
            </div>
          
        </div>

        <div class="col-lg-4 col-md-12 footer-newsletter">
          <h4>Our Newsletter</h4>
          <p>Subscribe to our newsletter and receive the latest news about our school !</p>
          <form action="#" method="post" class="php-email-form">
            <div class="newsletter-form"><input type="email" name="email"><input type="submit" value="Subscribe" class="bg-info"></div>
          </form>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">{{ config('app.name','school-name') }}</strong> <span>All Rights Reserved</span></p>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center bg-info"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <!-- <div id="preloader"></div> -->

  <!-- Vendor JS Files -->
  <script src="{{ URL::to('/')}}/homePage/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{ URL::to('/')}}/homePage/assets/vendor/php-email-form/validate.js"></script>
  <script src="{{ URL::to('/')}}/homePage/assets/vendor/aos/aos.js"></script>
  <script src="{{ URL::to('/')}}/homePage/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="{{ URL::to('/')}}/homePage/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="{{ URL::to('/')}}/homePage/assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="{{ URL::to('/')}}/homePage/assets/js/main.js"></script>

</body>

</html>