<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{ config('app.name','laravel') }}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ URL::to('/') }}/adminPanel/assets/img/favicon.png" rel="icon">
  <link href="{{ URL::to('/') }}/adminPanel/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">

  <!-- Vendor CSS Files -->
  <link href="{{ URL::to('/') }}/adminPanel/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ URL::to('/') }}/adminPanel/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{ URL::to('/') }}/adminPanel/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="{{ URL::to('/') }}/adminPanel/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="{{ URL::to('/') }}/adminPanel/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="{{ URL::to('/') }}/adminPanel/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="{{ URL::to('/') }}/adminPanel/assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link href="{{ URL::to('/') }}/adminPanel/assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/cropperjs/dist/cropper.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <style>
    #preview {
        max-width: 100%;
    }
    .img-container {
        max-height: 500px;
    }

    #edit_admin_username:hover{
      cursor: pointer;
    }

    div.online_indicator {
        z-index: 1;
        width: 20px;
        height: 20px;
        margin-right:-80px;
        background-color:lightskyblue;
        border-radius: 50%;
        position: absolute;
        margin-top: 95px;
    }

    div.online_indicator:hover{
      cursor: alias;
    }
      
    span.blink_online_icon {
        display: block;
        width: 20px;
        height: 20px;
        background-color:blue;
        opacity: 0.6;
        border-radius: 50%;
        animation: blink 1s linear infinite;
    }

    /*Animations*/
    @keyframes blink {
        100% { transform: scale(2, 2); 
                opacity: 0;
          }
    }

    div.online_indicator_main_bar {
        z-index: 1;
        width: 10px;
        height: 10px;
        background-color:skyblue;
        border-radius: 50%;
        position: absolute;
        margin-top: 27px;
        margin-left: 25px;
    }

    div.online_indicator_main_bar:hover{
      cursor: alias;
    }
      
    span.blink_online_icon_main_bar {
        display: block;
        width: 10px;
        height: 10px;
        background-color:blue;
        opacity: 0.6;
        border-radius: 50%;
        animation: blink 1s linear infinite;
    }

    /*Animations*/
    @keyframes blink {
        100% { transform: scale(2, 2); 
                opacity: 0;
             }
    }

    /*blink online user*/
    div.online_indicator_user {
        position: absolute; bottom: 0; right: 0; width: 12px; height: 12px; background-color: #28a745; border-radius: 50%; border: 2px solid white;
        z-index: 1;
        background-color:lightskyblue;
        border-radius: 50%;
        position: absolute;
    }

    div.online_indicator_user:hover{
      cursor: alias;
    }
      
    span.blink_online_icon_user {
        display: block;
        width: 12px;
        height: 12px;
        margin-top: -2px;
        margin-left: -2px;
        background-color:blue;
        opacity: 0.6;
        border-radius: 50%;
        animation: blink 1s linear infinite;
    }

    /*Animations*/
    @keyframes blink {
        100% { transform: scale(2, 2); 
                opacity: 0;
          }
    }

  </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="#" class="logo d-flex align-items-center">
        <img src="{{ URL::to('/') }}/adminPanel/assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">{{ config('app.name','laravel') }}</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <!-- <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form> -->
      <h3 style="font-family:sans-serif;font-style: italic;">{{ Auth::guard('shareHolder')->user()->role }} panel</h3>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="{{ URL::to('/') }}/adminPanel/assets/img/{{ auth()->guard('shareHolder')->user()->image }}" alt="Profile" class="rounded-circle" style="border:1px solid #eee;">
            <span class="d-none d-md-block dropdown-toggle ps-2">{{ auth()->guard('shareHolder')->user()->lastname }}</span>
            <div class='online_indicator_main_bar' title="You are actively online right now !">
                <span class='blink_online_icon_main_bar'></span>
            </div>

          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{ auth()->guard('shareHolder')->user()->firstname }}</h6>
              <span>{{ auth()->guard('shareHolder')->user()->role }}</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#" onclick="window.location.href='{{ route('main.show.profile') }}'" data-bs-toggle="tab" data-bs-target="#profile-edit">
                <i class="bi bi-gear"></i>
                <span>My account</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link {{ Request::segment(2) == 'home' ? 'active' : 'collapsed' }}" href="{{ route('main.shareHolder.dashboard') }}">
          <i class="fa fa-dashboard"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed {{ Auth::guard('shareHolder')->user()->role != 'Admin' ? 'd-none' : '' }}" data-bs-target="#homepage" data-bs-toggle="collapse" href="#">
            <i class="fas fa-home"></i><span>Homepage</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>

        <ul id="homepage" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('view_users') }}" >
              <i class="fas fa-home"></i><span>Home</span>
            </a>
          </li>
          <li>
            <a href="{{ route('view_users') }}" >
              <i class="fas fa-wrench"></i><span>About</span>
            </a>
          </li>
          <li>
            <a href="{{ route('view_users') }}" >
              <i class="fas fa-list"></i><span>Services</span>
            </a>
          </li>
          <li>
            <a href="{{ route('view_users') }}" >
              <i class="fas fa-money-bill"></i><span>Pricing</span>
            </a>
          </li>
          <li>
            <a href="{{ route('view_users') }}" >
              <i class="fas fa-phone"></i><span>Contact</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

       <li class="nav-item">
        <a class="nav-link {{ (Request::segment(2) == 'view-school' || Request::segment(2) == 'view_single_school_info' || Request::segment(2) == 'edit_customer_info' || Request::segment(2) == 'customer_payment_status' || Request::segment(2) == 'school_not_allowed_yet' || Request::segment(2) == 'customer_employee_student') ? 'active' : 'collapsed' }}" data-bs-target="#schools" data-bs-toggle="collapse" href="#">
          <i class="fas fa-chalkboard-teacher"></i><span>Schools</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="schools" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('main.view_school') }}" >
              <i class="bi bi-circle"></i><span>view schools</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#employee" data-bs-toggle="collapse" href="#">
          <i class="fas fa-users"></i><span>Employee</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="employee" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('view_users') }}" >
              <i class="bi bi-circle"></i><span>view employee</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->
      

       <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#wallets" data-bs-toggle="collapse" href="#">
          </i><i class="fas fa-money-bill"></i><span>Wallet</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="wallets" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('view_users') }}" >
              <i class="bi bi-circle"></i><span>view wallet</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

       
    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">
    @yield('content')
  </main>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div class="modal fade" id="logoutModal" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
              <div class="modal-header"style="display: flex; flex-direction: column; align-items:center;">
                <h5 class="modal-title">Logout your Account&nbsp;&nbsp;<i class="fa fa-lock"></i> </h5>
              </div>
              <div class="modal-body align-items-center justify-content-center" style="display: flex; flex-direction: column; align-items:center;">
                      Are you sure , do you want to sign out ?
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="window.location.href='{{ route('main.logout') }}'">Yes&nbsp;<i class="fa fa-check"></i></button>
                  <button class="btn btn-danger" class="btn-close" data-bs-dismiss="modal" aria-label="Close">Not now&nbsp;<i class="fa fa-times"></i></button>
              </div>
          </div>
      </div>
  </div>

  <!-- Vendor JS Files -->       
  <script src="{{ URL::to('/') }}/adminPanel/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="{{ URL::to('/') }}/adminPanel/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script><script type="text/javascript" src="http://www.freetimelearning.com/js/jquery-1.11.3.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script type="text/javascript" src="http://www.freetimelearning.com/js/jquery-1.11.3.min.js"></script>
  <script src="{{ URL::to('/') }}/adminPanel/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="{{ URL::to('/') }}/adminPanel/assets/vendor/echarts/echarts.min.js"></script>
  <script src="{{ URL::to('/') }}/adminPanel/assets/vendor/quill/quill.js"></script>
  <script src="{{ URL::to('/') }}/adminPanel/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="{{ URL::to('/') }}/adminPanel/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="{{ URL::to('/') }}/adminPanel/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="{{ URL::to('/') }}/adminPanel/assets/js/main.js"></script>

</body>

</html>