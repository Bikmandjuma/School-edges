<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>{{ $school_name }}</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">
        <link href="{{ URL::to('/') }}/mainHomePage/img/school/{{ $school_logo }}" rel="icon">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
        <link href="{{ URL::to('/') }}/Single_school_pages/lib/animate/animate.min.css" rel="stylesheet">
        <link href="{{ URL::to('/') }}/Single_school_pages/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="{{ URL::to('/') }}/Single_school_pages/lib/lightbox/css/lightbox.min.css" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{ URL::to('/') }}/Single_school_pages/css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{ URL::to('/') }}/Single_school_pages/css/style.css" rel="stylesheet">
    </head>

    <body>

        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Topbar Start -->
        <div class="container-fluid topbar px-0 d-none d-lg-block">
            <div class="container px-0">
                <div class="row gx-0 align-items-center" style="height: 45px;">
                    <div class="col-lg-8 text-center text-lg-start mb-lg-0">
                        <div class="d-flex flex-wrap">
                            <a href="#" class="text-muted me-4"><img src="{{ URL::to('/') }}/mainHomePage/img/school/{{ $school_logo }}" alt="Logo" style="width:30px;height: 30px;">&nbsp;{{ $school_name }}</a>
                            <a href="https://tel:{{ $school_phone }}" class="text-muted me-4"><i class="fas fa-phone-alt text-primary me-2"></i>{{ $school_phone }}</a>
                            <a href="https://mail:to/{{ $school_email }}" class="text-muted me-0"><i class="fas fa-envelope text-primary me-2"></i>{{ $school_email }}</a>
                        </div>
                    </div>
                    <div class="col-lg-4 text-center text-lg-end">
                        <div class="d-flex align-items-center justify-content-end">
                            <a href="#" class="btn btn-primary btn-square rounded-circle nav-fill me-3"><i class="fab fa-facebook-f text-white"></i></a>
                            <a href="#" class="btn btn-primary btn-square rounded-circle nav-fill me-3"><i class="fab fa-twitter text-white"></i></a>
                            <a href="#" class="btn btn-primary btn-square rounded-circle nav-fill me-3"><i class="fab fa-instagram text-white"></i></a>
                            <a href="#" class="btn btn-primary btn-square rounded-circle nav-fill me-0"><i class="fab fa-linkedin-in text-white"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Topbar End -->


        <!-- Navbar & Hero Start -->
        <div class="container-fluid sticky-top px-0">
            <div class="position-absolute bg-dark" style="left: 0; top: 0; width: 100%; height: 100%;">
            </div>
            <div class="container px-0">
                <nav class="navbar navbar-expand-lg navbar-dark bg-white py-3 px-4">
                    <a href="#" class="navbar-brand p-0">
                        <h4 class="text-primary m-0">
                        @if(strlen($school_name) <= 18)
                            {{ $school_name}}
                        @else
                            {{ substr($school_name,0,18)."..." }}
                        @endif
                        </h4>
                        
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <div class="navbar-nav ms-auto py-0">
                            <a href="{{ url('home') }}/{{ Crypt::encrypt($school_id) }}" class="nav-item nav-link {{ Request::segment(1) == 'home' ? 'active' : 'collapsed' }}"><i class="fas fa-home"></i>&nbsp;Home</a>
                            <a href="{{ url('about') }}/{{ Crypt::encrypt($school_id) }}" class="nav-item nav-link {{ Request::segment(1) == 'about' ? 'active' : 'collapsed' }}"><i class="fas fa-wrench"></i>&nbsp;About us</a>
                            <a href="{{ url('news') }}/{{ Crypt::encrypt($school_id) }}" class="nav-item nav-link {{ Request::segment(1) == 'news' ? 'active' : 'collapsed' }}"><i class="fa fa-list-alt"></i>&nbsp;News</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle {{ Request::segment(1) == 'student' ? 'active' : 'collapsed' }}" data-bs-toggle="dropdown"><i class="fas fa-user-graduate"></i>&nbsp;Students</a>
                                <div class="dropdown-menu m-0">
                                    <a href="{{ url('student/studying/') }}/{{ Crypt::encrypt($school_id) }}" class="dropdown-item"><i class="fas fa-book"></i>&nbsp;Studying</a>
                                    <a href="{{ url('student/living/') }}/{{ Crypt::encrypt($school_id) }}" class="dropdown-item"><i class="fas fa-bed"></i>&nbsp;Living</a>
                                    <a href="{{ url('student/living/') }}/{{ Crypt::encrypt($school_id) }}" class="dropdown-item"><i class="fas fa-utensils"></i>&nbsp;Dining</a>
                                </div>
                            </div>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle {{ Request::segment(1) == 'administration' ? 'active' : 'collapsed' }}" data-bs-toggle="dropdown"><i class="fas fa-user-tie"></i>&nbsp;Leaders</a>
                                <div class="dropdown-menu m-0">
                                    <a href="{{ url('administration/') }}/{{ Crypt::encrypt($school_id) }}" class="dropdown-item"><i class="fas fa-remote"></i>&nbsp;Administration</a>
                                </div>
                            </div>
                            <a href="{{ url('contact/') }}/{{ Crypt::encrypt($school_id) }}" class="nav-item nav-link {{ Request::segment(1) == 'contact' ? 'active' : 'collapsed' }}"><i class="fas fa-phone"></i>&nbsp;Contact</a>
                        </div>
                        <div class="d-flex align-items-center flex-nowrap pt-xl-0">
                            <button class="btn btn-primary btn-md-square mx-2" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search"></i></button>
                            <a href="{{ url('login/') }}/{{ Crypt::encrypt($school_id) }}" class="btn btn-primary rounded-pill text-white py-2 px-4 ms-2 flex-wrap flex-sm-shrink-0"> <i class="fa fa-user"></i>&nbsp;Account</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Navbar & Hero End -->

        <!-- Modal Search Start -->
        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h4 class="modal-title mb-0" id="exampleModalLabel">Search by keyword</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex align-items-center">
                        <div class="input-group w-75 mx-auto d-flex">
                            <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                            <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Search End -->

        @yield('content')

        <!-- Footer Start -->
        <div id="footer" class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.2s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <div class="footer-item">
                                <h4 class="text-white mb-4">Newsletter</h4>
                                <p class="mb-3">Dolor
                                 amet sit justo amet elitr clita ipsum elitr est.Lorem ipsum dolor sit amet, consectetur adipiscing elit consectetur adipiscing elit.</p>
                                <div class="position-relative mx-auto rounded-pill">
                                    <input class="form-control rounded-pill w-100 py-3 ps-4 pe-5" type="text" placeholder="Enter your email">
                                    <button type="button" class="btn btn-primary rounded-pill position-absolute top-0 end-0 py-2 mt-2 me-2">SignUp</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="text-white mb-4">Explore</h4>
                            <a href="#"><i class="fas fa-angle-right me-2"></i> Home</a>
                            <a href="#"><i class="fas fa-angle-right me-2"></i> About Us</a>
                            <a href="#"><i class="fas fa-angle-right me-2"></i> News</a>
                            <a href="#"><i class="fas fa-angle-right me-2"></i> Student_studying</a>
                            <a href="#"><i class="fas fa-angle-right me-2"></i> Student_living</a>
                            <a href="#"><i class="fas fa-angle-right me-2"></i> Teachers</a>
                            <a href="#"><i class="fas fa-angle-right me-2"></i> Contact</a>
                            <a href="#"><i class="fas fa-angle-right me-2"></i> Account</a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="text-white mb-4">Contact Info</h4>
                            <a href=""><i class="fa fa-map-marker-alt me-2"></i> 123 Street, New York, USA</a>
                            <a href=""><i class="fas fa-envelope me-2"></i> {{ $school_email }}</a>
                            <a href=""><i class="fas fa-phone me-2"></i> {{ $school_phone }}</a>
                            <div class="d-flex align-items-center">
                                <a class="btn btn-light btn-md-square me-2" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-light btn-md-square me-2" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-light btn-md-square me-2" href=""><i class="fab fa-instagram"></i></a>
                                <a class="btn btn-light btn-md-square me-0" href=""><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item-post d-flex flex-column">
                            <h4 class="text-white mb-4">News</h4>
                            <div class="d-flex flex-column mb-3">
                                <p class="text-uppercase text-primary mb-2">Investment</p>
                                <a href="#" class="text-body">Revisiting Your Investment & Distribution Goals</a>
                            </div>
                            <div class="d-flex flex-column mb-3">
                                <p class="text-uppercase text-primary mb-2">Business</p>
                                <a href="#" class="text-body">Dimensional Fund Advisors Interview with Director</a>
                            </div>
                            <div class="footer-btn text-start">
                                <a href="#" class="btn btn-light rounded-pill px-4">View All news <i class="fa fa-arrow-right ms-1"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->

        
        <!-- Copyright Start -->
        <div id="footer" class="container-fluid copyright py-4">
            <div class="container">
                <div class="row g-4 align-items-center">
                    <div class="col-md-6 text-center text-md-start mb-md-0">
                        <span class="text-body"><a href="#" class="border-bottom text-primary"><i class="fas fa-copyright text-light me-2"></i>{{ $school_name }}</a>, All right reserved.</span>
                    </div>
                    <div class="col-md-6 text-center text-md-end text-body">
                        <!--/*** This template is free as long as you keep the below author’s credit link/attribution link/backlink. ***/-->
                        <!--/*** If you'd like to use the template without the below author’s credit link/attribution link/backlink, ***/-->
                        <!--/*** you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". ***/-->
                        Designed By <a class="border-bottom text-primary" href="https://schooledge.com" target="perent">{{ config('app.name','school-name') }}</a> Distributed By <a class="border-bottom text-primary" href="https://www.teclgroupeltd.com" target="perent">Tecla</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Copyright End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-primary btn-lg-square back-to-top"><i class="fa fa-arrow-up"></i></a>   

        
    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ URL::to('/') }}/Single_school_pages/lib/wow/wow.min.js"></script>
    <script src="{{ URL::to('/') }}/Single_school_pages/lib/easing/easing.min.js"></script>
    <script src="{{ URL::to('/') }}/Single_school_pages/lib/waypoints/waypoints.min.js"></script>
    <script src="{{ URL::to('/') }}/Single_school_pages/lib/counterup/counterup.min.js"></script>
    <script src="{{ URL::to('/') }}/Single_school_pages/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="{{ URL::to('/') }}/Single_school_pages/lib/lightbox/js/lightbox.min.js"></script>
    <!-- Template Javascript -->
    <script src="{{ URL::to('/') }}/Single_school_pages/js/main.js"></script>
    </body>

</html>