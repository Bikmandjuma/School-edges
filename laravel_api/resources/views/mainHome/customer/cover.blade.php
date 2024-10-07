<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name','school-name') }}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ URL::to('/') }}/adminPanel/assets/img/favicon.png" rel="icon">
  <link href="{{ URL::to('/') }}/adminPanel/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">
  <link href="{{ URL::to('/') }}/Customer_Ask_question/css/user_panel.css" rel="stylesheet">
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
  <link rel="stylesheet" href="{{URL::to('/')}}/mainHomePage/css/icofont.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
  <script src="{{ URL::to('/') }}/Customer_Ask_question/js/user_panel.js"></script>

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
  <header id="header" class="header fixed-top d-flex align-items-center"  style="box-shadow:0px 4px 8px 0px rgba(0,0,0,0.2);">

    <div class="d-flex align-items-center justify-content-between">
      <a href="#" class="logo d-flex align-items-center">
        <img src="{{ URL::to('/') }}/adminPanel/assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">{{ config('app.name','school-name') }}</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <!-- <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form> -->
      <h3 style="font-family:sans-serif;font-style: italic;">School's panel</h3>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="{{ URL::to('/') }}/mainHomePage/img/school/{{ auth()->guard('customer')->user()->image }}" alt="Profile" class="rounded-circle" style="border:1px solid #eee;">
            <span class="d-none d-md-block dropdown-toggle ps-2">{{ auth()->guard('customer')->user()->school_name }}</span>

          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{ auth()->guard('customer')->user()->school_name }}</h6>
              <span>School</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#" onclick="window.location.href='{{ route('main.customer.show.profile') }}'" data-bs-toggle="tab" data-bs-target="#profile-edit">
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
  <aside id="sidebar" class="sidebar"  style="box-shadow:0px 4px 8px 0px rgba(0,0,0,0.3);">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link {{ Request::segment(2) == 'home' ? 'active' : 'collapsed' }} " href="{{ route('main.customer.dashboard') }}">
          <i class="fa fa-dashboard"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <!-- Start system users Nav -->
      <li class="nav-item">
        <a class="nav-link {{ Request::segment(2) == 'terms_condition' ? 'active' : 'collapsed' }}" data-bs-target="#rules_and_regulation" data-bs-toggle="collapse" href="#">
          <i class="fa fa-cog"></i><span>Terms & Conditions</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="rules_and_regulation" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('main.customer.terms_condition') }}" >
              <i class="bi bi-circle"></i><span>view terms & conditions</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- End system users Nav -->

      <!-- Start system users Nav -->
      <li class="nav-item"
        @if($count_terms != 0) 
            data-bs-target="#terms_cond_model" data-bs-toggle="modal"
        @endif
      >
        <a class="nav-link {{ Request::segment(2) == 'employees_students' ? 'active' : 'collapsed' }}" data-bs-target="#system-user" data-bs-toggle="collapse" href="#">
          <i class="fa fa-users"></i><span>Employees & students</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="system-user" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('main.customer.employees_students') }}" >
              <i class="bi bi-circle"></i><span>view employees&students</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- End system users Nav -->
      
      <!-- Start system users Nav -->
      <li class="nav-item"
            @if($count_terms != 0) 
                data-bs-target="#terms_cond_model" data-bs-toggle="modal"
            @endif
      >
        <a class="nav-link collapsed" data-bs-target="#contract" data-bs-toggle="collapse" href="#">
          <i class="fa fa-list"></i><span>Contract</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="contract" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('view_users') }}" >
              <i class="bi bi-circle"></i><span>my contract</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- End system users Nav -->
      

      <!-- Start system users Nav -->
      <li class="nav-item"
          @if($count_terms != 0) 
              data-bs-target="#terms_cond_model" data-bs-toggle="modal"
          @endif
      >
        <a class="nav-link collapsed" data-bs-target="#payment" data-bs-toggle="collapse" href="#">
          <i class="fa fa-dollar"></i><span>Payment</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="payment" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('main.customer.payment_plan') }}" >
              <i class="bi bi-circle"></i><span>payment</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- End system users Nav -->
      
      <!-- Start system users Nav -->
      <li class="nav-item"
        @if($count_terms != 0) 
            data-bs-target="#terms_cond_model" data-bs-toggle="modal"
        @endif
      >
        <a class="nav-link collapsed" data-bs-target="#support" data-bs-toggle="collapse" href="#">
          <i class="fa fa-question"></i><span>Ask question</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="support" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('main.customer.ask_question') }}" >
              <i class="bi bi-circle"></i><span>ask for help</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- End system users Nav -->

      <!-- Start system users Nav -->
      <li class="nav-item"
        @if($count_terms != 0) 
            data-bs-target="#terms_cond_model" data-bs-toggle="modal"
        @endif
      >
        <a class="nav-link collapsed" data-bs-target="#open_app" data-bs-toggle="collapse" href="#">
          <i class="fa fa-wrench"></i><span>Open app</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="open_app" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ url('customer/open_app') }}/{{ Crypt::encrypt(auth()->guard('customer')->user()->id) }}" target="parent">
              <i class="bi bi-circle"></i><span>School's link</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- End system users Nav -->
      
    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">
    @yield('content')
  </main>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

   <div class="modal fade" id="terms_cond_model" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
              <div class="modal-header"style="display: flex; flex-direction: column; align-items:center;">
                <h5 class="modal-title">Notification&nbsp;&nbsp;<i class="fa fa-bell"></i> </h5>
              </div>
              <div class="modal-body align-items-center justify-content-center" style="display: flex; flex-direction: column; align-items:center;">
                <p>Before any action , you have to read all terms and conditions first !</p>
                      <ul>
                        @foreach($terms as $data)
                          <li>{{ $data->terms }}</li>
                        @endforeach
                      </ul>
              </div>
              <div class="modal-footer">
                  <button class="btn btn-primary" onclick="window.location.href='{{ route("main.customer.terms_condition") }}'">Read&nbsp;<i class="fa fa-list-alt"></i></button>
                  <button class="btn btn-danger" class="btn-close" data-bs-dismiss="modal" aria-label="Close">Close&nbsp;<i class="fa fa-times"></i></button>
              </div>
          </div>
      </div>
  </div>

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
                  <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="window.location.href='{{ route('main.customer.logout') }}'">Yes&nbsp;<i class="fa fa-check"></i></button>
                  <button class="btn btn-danger" class="btn-close" data-bs-dismiss="modal" aria-label="Close">Not now&nbsp;<i class="fa fa-times"></i></button>
              </div>
          </div>
      </div>
  </div>

  <script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

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