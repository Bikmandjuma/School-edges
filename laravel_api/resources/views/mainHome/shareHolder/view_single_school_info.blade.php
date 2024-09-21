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
                    @include('mainHome.shareHolder.school_name_and_image')
                </div>
            </div>

            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        @include('mainHome.shareHolder.main_tabs_links_info')
                        <div class="tab-content pt-2">
                            <div class="tab-pane fade show {{ Request::segment(2) == 'view_single_school_info' ? 'active' : '' }} profile-overview" id="profile-overview">
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
