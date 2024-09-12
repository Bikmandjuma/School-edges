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
                        <img src="{{ URL::to('/') }}/mainHomePage/img/school/{{ $school_data->image }}" alt="Profile" class="rounded-circle" style="border:4px solid #eee;">
                        @if(strlen($school_data->school_name."Bikman") > 18)
                            <h2 title="{{ auth()->guard('shareHolder')->user()->firstname.' '.auth()->guard('shareHolder')->user()->lastname }}">{{ substr($school_data->school_name,0,18).'..' }}</h2>
                        @else
                            <h2 title="{{ $school_data->school_name }}">{{ $school_data->school_name }}</h2>
                        @endif
                        <h3 class="mt-2">School , <span style="font-family: sans-serif;color:blueviolet;font-style: italic;">{{ $school_data->school_code }}</span></h3>
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
                            <li class="nav-item">
                                <button class="nav-link {{ Request::segment(2) == 'view_single_school_info' ? 'active' : '' }}" data-bs-toggle="tab" data-bs-target="#profile-overview" onclick="window.location.href='{{ route('main.show.profile') }}'">Overview</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link {{ Request::segment(2) == 'information' ? 'active' : '' }}" onclick="window.location.href='{{ route('main.show.myInformation') }}'">Edit Profile & Info</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link {{ Request::segment(2) == 'username' ? 'active' : '' }}" onclick="window.location.href='{{ route('main.show.username') }}'">Change username</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link {{ Request::segment(2) == 'password' ? 'active' : '' }} " onclick="window.location.href='{{ route('main.show.password') }}'">Change Password</button>
                            </li>
                        </ul>
                        <div class="tab-content pt-2">
                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <h5 class="card-title">School Details</h5>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Name</div>
                                    <div class="col-lg-9 col-md-8">{{ $school_data->school_name }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Code</div>
                                    <div class="col-lg-9 col-md-8">{{ $school_data->school_code }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8">{{ $school_data->email }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Phone</div>
                                    <div class="col-lg-9 col-md-8">{{ $school_data->phone }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Location</div>
                                    <div class="col-lg-9 col-md-8">{{ $school_data->country }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Username</div>
                                    <div class="col-lg-9 col-md-8">{{ $school_data->username }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Joined</div>
                                    <div class="col-lg-9 col-md-8">{{ $school_data->time_ago }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Link</div>
                                    <div class="col-lg-9 col-md-8">
                                        <a href="{{ URL::to('/') }}/{{ $school_data->school_name }}/{{ Crypt::encrypt($school_data->id) }}/{{ Crypt::encrypt($school_data->school_code) }}" target="self">Click me to go live</a>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Bordered Tabs -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
