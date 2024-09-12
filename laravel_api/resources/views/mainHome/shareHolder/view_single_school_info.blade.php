@extends('mainHome.shareHolder.cover')
@section('content')
    <div class="pagetitle">
      <h1>School</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item">school</li>
          <li class="breadcrumb-item active">View_school_info</li>
        </ol>

      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                <img src="{{ URL::to('/') }}/adminPanel/assets/img/{{ auth()->guard('shareHolder')->user()->image }}" alt="Profile" class="rounded-circle" style="border:4px solid #eee;">
                

                @if(strlen(auth()->guard('shareHolder')->user()->firstname.' '.auth()->guard('shareHolder')->user()->lastname) > 18)

                  <h2 title="{{ auth()->guard('shareHolder')->user()->firstname.' '.auth()->guard('shareHolder')->user()->lastname }}">{{ $admin_name = substr(auth()->guard('shareHolder')->user()->firstname.' '.auth()->guard('shareHolder')->user()->lastname,0,18).'..' }}</h2>
                
                @else

                  <h2 title="{{ auth()->guard('shareHolder')->user()->firstname.' '.auth()->guard('shareHolder')->user()->lastname }}">{{ $admin_name = auth()->guard('shareHolder')->user()->firstname.' '.auth()->guard('shareHolder')->user()->lastname }}</h2>
                
                @endif
                
                <h3 class="mt-2">School</h3>
                <div class="social-links mt-2">
                  <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                  <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                  <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                  <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                  <a href="#" class="linkedin"><i class="bi bi-whatsapp"></i></a>
                </div>
              
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                  @include('mainHome.shareHolder.info_main_links')

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">School Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8">{{ auth()->guard('shareHolder')->user()->firstname }}&nbsp;{{ auth()->guard('shareHolder')->user()->lastname }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Gender</div>
                    <div class="col-lg-9 col-md-8">{{ auth()->guard('shareHolder')->user()->gender }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Phone</div>
                    <div class="col-lg-9 col-md-8">{{ auth()->guard('shareHolder')->user()->phone }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8">{{ auth()->guard('shareHolder')->user()->email }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Date of birth</div>
                    <div class="col-lg-9 col-md-8">{{ auth()->guard('shareHolder')->user()->dob }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Username</div>
                    <div class="col-lg-9 col-md-8">{{ auth()->guard('shareHolder')->user()->username }}&nbsp;&nbsp;&nbsp;<i class="bi bi-pen text-info" id=edit_admin_username></i> </div>
                  </div>

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>
@endsection