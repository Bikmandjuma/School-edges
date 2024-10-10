<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ URL::to('/') }}/Single_school_account/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="{{ URL::to('/') }}/mainHomePage/img/school/{{ $school_logo }}">
  <title>
    {{ $school_name }}
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="{{ URL::to('/') }}/Single_school_account/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="{{ URL::to('/') }}/Single_school_account/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Bundle JS (includes Popper.js) -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ URL::to('/') }}/Single_school_account/assets/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />
  <style>
  /* Custom styles for the nav links */
  .nav-link-custom {
    font-family: sans-serif; /* Set font family to sans-serif */
    color: gray; /* Initial color */
    text-decoration: none; /* Remove underline */
    transition: color 0.3s ease; /* Smooth transition for hover effect */
  }

  /* Change color on hover */
  .nav-link-custom:hover {
    color: black; /* Change text color to black when hovered */
  }

  #error-message{
    color: red;
  }
</style>
</head>

<body class="g-sidenav-show  bg-gray-200">
  @php
    use App\Models\UserRole;
  @endphp
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
        <img src="{{ URL::to('/') }}/Single_school_account/assets/img/users_profiles_pictures/{{ auth()->guard('school_employee')->user()->image }}" alt="user_image" alt="User Image" style=" border-radius: 50%;" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">
          
          @if(strlen(auth()->guard('school_employee')->user()->firstname." ".auth()->guard('school_employee')->user()->middle_name." ".auth()->guard('school_employee')->user()->lastname) <= 20)
            {{ auth()->guard('school_employee')->user()->firstname." ".auth()->guard('school_employee')->user()->middle_name." ".auth()->guard('school_employee')->user()->lastname }}
          @else
            {{ substr(auth()->guard('school_employee')->user()->firstname." ".auth()->guard('school_employee')->user()->middle_name." ".auth()->guard('school_employee')->user()->lastname,0,20)." ..." }}
          @endif

        </span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="w-auto  max-height-vh-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        
        <li class="nav-item">
          <a class="nav-link text-white {{ Request::segment(2) == 'home' ? 'active bg-gradient-secondary' : '' }}" href="{{ route('school_employee.dashboard',Crypt::encrypt($school_id)) }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link collapsed text-white" data-bs-target="#homepage" data-bs-toggle="collapse" href="#" style="font-family: sans-serif;">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-home"></i>
            </div>
            <span class="nav-link-text ms-1">Homepage</span>
            <i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="homepage" class="nav-content collapse" data-bs-parent="#sidebar-nav" style="list-style-type: none;">
            <li>
              <a class="dropdown-item nav-link-custom" href="./pages/tables.html">
                <i class="fa fa-home"></i><span class="ms-2">Home</span>
              </a>
            </li>
            <li>
              <a class="dropdown-item nav-link-custom" href="./pages/tables.html">
                <i class="fa fa-info-circle"></i><span class="ms-2">About Us</span>
              </a>
            </li>
            <li>
              <a class="dropdown-item nav-link-custom" href="./pages/tables.html">
                <i class="fa fa-newspaper"></i><span class="ms-2">News</span>
              </a>
            </li>
            <li>
              <a class="dropdown-item nav-link-custom" href="./pages/tables.html">
                <i class="fa fa-user-graduate"></i><span class="ms-2">Student</span>
              </a>
            </li>
            <li>
              <a class="dropdown-item nav-link-custom" href="./pages/tables.html">
                <i class="fa fa-building"></i><span class="ms-2">Administration</span>
              </a>
            </li>
            <li>
              <a class="dropdown-item nav-link-custom" href="./pages/tables.html">
                <i class="fa fa-envelope"></i><span class="ms-2">Contact Us</span>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link {{ Request::segment(2) == 'manage_role' ? 'active bg-gradient-secondary' : '' }} text-white" data-bs-target="#role" data-bs-toggle="collapse" href="#" style="font-family: sans-serif;">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-list-alt"></i>
            </div>
            <span class="nav-link-text ms-1">Role</span>
            <i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="role" class="nav-content collapse" data-bs-parent="#sidebar-nav" style="list-style-type: none;">
              <li>
                <a class="dropdown-item nav-link-custom" href="{{ route('school_employee_manage_role',Crypt::encrypt($school_id)) }}">
                  <i class="fa fa-list-alt"></i><span class="ms-2">Manage role</span>
                </a>
              </li>
          </ul>
        </li>


        <li class="nav-item">
          <a class="nav-link {{ Request::segment('2') == 'school_employee_add_user' ? 'active bg-gradient-secondary' : 'collapsed' }} text-white" data-bs-target="#users" data-bs-toggle="collapse" href="#" style="font-family: sans-serif;">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-users"></i>
            </div>
            <span class="nav-link-text ms-1">Employees</span>
            <i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="users" class="nav-content collapse" data-bs-parent="#sidebar-nav" style="list-style-type: none;">
              <li>
                <a class="dropdown-item nav-link-custom" href="{{ route('school_employee_add_user',Crypt::encrypt($school_id)) }}">
                  <i class="fa fa-plus"></i><span class="ms-2">Add employee</span>
                </a>
              </li>
              <li>
                <a class="dropdown-item nav-link-custom" href="{{ route('school_employee_view_user',Crypt::encrypt($school_id))}}">
                  <i class="fa fa-users"></i><span class="ms-2">View employee</span>
                </a>
              </li>
          </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link collapsed text-white" data-bs-target="#students" data-bs-toggle="collapse" href="#" style="font-family: sans-serif;">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-user-graduate"></i>
            </div>
            <span class="nav-link-text ms-1">Students</span>
            <i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="students" class="nav-content collapse" data-bs-parent="#sidebar-nav" style="list-style-type: none;">
              <li>
                <a class="dropdown-item nav-link-custom" href="./pages/tables.html">
                  <i class="fa fa-plus"></i><span class="ms-2">Add students</span>
                </a>
              </li>
              <li>
                <a class="dropdown-item nav-link-custom" href="./pages/tables.html">
                  <i class="fa fa-users"></i><span class="ms-2">View students</span>
                </a>
              </li>
          </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link collapsed text-white" data-bs-target="#account" data-bs-toggle="collapse" href="#" style="font-family: sans-serif;">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-user"></i>
            </div>
            <span class="nav-link-text ms-1">Account</span>
            <i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="account" class="nav-content collapse" data-bs-parent="#sidebar-nav" style="list-style-type: none;">
              <li>
                <a class="dropdown-item nav-link-custom" href="./pages/tables.html">
                  <i class="fa fa-list-alt"></i><span class="ms-2">My info</span>
                </a>
              </li>
              <li>
                <a class="dropdown-item nav-link-custom" href="./pages/tables.html">
                  <i class="fa fa-image"></i><span class="ms-2">Profile</span>
                </a>
              </li>
              <li>
                <a class="dropdown-item nav-link-custom" data-bs-target="#logoutModal" data-bs-toggle="modal" href="#">
                  <i class="fa fa-lock"></i><span class="ms-2">Logout</span>
                </a>
              </li>
          </ul>
        </li>

      </ul>
    </div>
    
  </aside>

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
    <!-- Navbar -->
    <nav class="navbar navbar-main  navbar-expand-lg shadow-none border-radius-xl w-100" id="navbarBlur" navbar-scroll="true">
        
        @php
          $auth_user_role = auth()->guard('school_employee')->user()->role_fk_id;
          $auth_user_role = UserRole::findOrFail($auth_user_role);
        @endphp

        <div class="container-md py-1 px-3 w-100"> <!-- Changed to "container-md" -->
            <div class="card w-100 d-flex flex-row align-items-center justify-content-between">

                <h6 class="mb-0 d-none d-md-block" style="padding-left:5px;">{{ $auth_user_role->role_name }}'s panel</h6> <!-- Only visible on medium and larger devices -->
                
                <div class="card-header text-center flex-grow-1 text-center">
                    {{ $school_name }}
                </div>
                
                <div class="d-flex align-items-center">
                    <div class="d-xl-none me-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                            </div>
                        </a>
                    </div>
                    <img src="{{ URL::to('/') }}/mainHomePage/img/school/{{ $school_logo }}" alt="user_image" alt="User Image" style="width: 50px; height: 50px; border-radius: 50%;padding-right: 5px;">
                </div>
            </div>
        </div>


    </nav>
    
    @yield('content')

  </main>
  <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2" style="box-shadow:0px 4px 8px 2px rgba(0, 0, 0, 0.5);">
      <i class="material-icons py-2">settings</i>
    </a>
    <div class="card shadow-lg">
      <div class="card-header pb-0 pt-3">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Material UI Configurator</h5>
          <p>See our dashboard options.</p>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="material-icons">clear</i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0">
        <!-- Sidebar Backgrounds -->
        <div>
          <h6 class="mb-0">Sidebar Colors</h6>
        </div>
        <a href="javascript:void(0)" class="switch-trigger background-color">
          <div class="badge-colors my-2 text-start">
            <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
          </div>
        </a>
        <!-- Sidenav Type -->
        <div class="mt-3">
          <h6 class="mb-0">Sidenav Type</h6>
          <p class="text-sm">Choose between 2 different sidenav types.</p>
        </div>
        <div class="d-flex">
          <button class="btn bg-gradient-dark px-3 mb-2 active" data-class="bg-gradient-dark" onclick="sidebarType(this)">Dark</button>
          <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
          <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
        </div>
        <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
        <!-- Navbar Fixed -->
        <div class="mt-3 d-flex">
          <h6 class="mb-0">Navbar Fixed</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
          </div>
        </div>
        <hr class="horizontal dark my-3">
        <div class="mt-2 d-flex">
          <h6 class="mb-0">Light / Dark</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
          </div>
        </div>
        <hr class="horizontal dark my-sm-4">
        <a class="btn btn-outline-dark w-100" href="">View documentation</a>
        <div class="w-100 text-center">
          <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/material-dashboard on GitHub">Star</a>
          <h6 class="mt-3">Thank you for sharing!</h6>
          <a href="https://twitter.com/intent/tweet?text=Check%20Material%20UI%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
          </a>
          <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/material-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
          </a>
        </div>
      </div>
    </div>
  </div>

<!-- Logout Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header p-3 pt-2">
               
                <h5 class="modal-title text-end pt-1 ms-auto" id="logoutModalLabel">Logout</h5>
            </div>
            <hr class="dark horizontal my-0">
            <div class="modal-body text-center">
                <p class="mb-0">Are you sure you want to logout?</p>
            </div>
            <div class="modal-footer p-3">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <a href="{{ route('school_employee.logout',$school_id) }}" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </div>
</div>


  <!--   Core JS Files   -->
  <script src="{{ URL::to('/') }}/Single_school_account/assets/js/core/popper.min.js"></script>
  <script src="{{ URL::to('/') }}/Single_school_account/assets/js/core/bootstrap.min.js"></script>
  <script src="{{ URL::to('/') }}/Single_school_account/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="{{ URL::to('/') }}/Single_school_account/assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="{{ URL::to('/') }}/Single_school_account/assets/js/plugins/chartjs.min.js"></script>
  <script>
    var ctx = document.getElementById("chart-bars").getContext("2d");

    new Chart(ctx, {
      type: "bar",
      data: {
        labels: ["M", "T", "W", "T", "F", "S", "S"],
        datasets: [{
          label: "Sales",
          tension: 0.4,
          borderWidth: 0,
          borderRadius: 4,
          borderSkipped: false,
          backgroundColor: "rgba(255, 255, 255, .8)",
          data: [50, 20, 10, 22, 50, 10, 40],
          maxBarThickness: 6
        }, ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              suggestedMin: 0,
              suggestedMax: 500,
              beginAtZero: true,
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
              color: "#fff"
            },
          },
          x: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });


    var ctx2 = document.getElementById("chart-line").getContext("2d");

    new Chart(ctx2, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Mobile apps",
          tension: 0,
          borderWidth: 0,
          pointRadius: 5,
          pointBackgroundColor: "rgba(255, 255, 255, .8)",
          pointBorderColor: "transparent",
          borderColor: "rgba(255, 255, 255, .8)",
          borderColor: "rgba(255, 255, 255, .8)",
          borderWidth: 4,
          backgroundColor: "transparent",
          fill: true,
          data: [50, 40, 300, 320, 500, 350, 200, 230, 500],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });

    var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");

    new Chart(ctx3, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Mobile apps",
          tension: 0,
          borderWidth: 0,
          pointRadius: 5,
          pointBackgroundColor: "rgba(255, 255, 255, .8)",
          pointBorderColor: "transparent",
          borderColor: "rgba(255, 255, 255, .8)",
          borderWidth: 4,
          backgroundColor: "transparent",
          fill: true,
          data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#f8f9fa',
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ URL::to('/') }}/Single_school_account/assets/js/material-dashboard.min.js?v=3.0.0"></script>
</body>

</html>