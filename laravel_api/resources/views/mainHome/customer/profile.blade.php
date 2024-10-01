@extends('mainHome.customer.cover')
@section('content')
    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item">Account</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>

      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card" style="box-shadow:0px 4px 8px 0px rgba(0,0,0,0.2);">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              @include('mainHome.customer.customerName')
              
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card"  style="box-shadow:0px 4px 8px 0px rgba(0,0,0,0.2);overflow:auto;">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                  @include('mainHome.customer.info_main_links')

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Name</div>
                    <div class="col-lg-9 col-md-8">{{ auth()->guard('customer')->user()->school_name }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Phone</div>
                    <div class="col-lg-9 col-md-8">{{ auth()->guard('customer')->user()->phone }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8">{{ auth()->guard('customer')->user()->email }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Country</div>
                    <div class="col-lg-9 col-md-8">{{ auth()->guard('customer')->user()->country }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Username</div>
                    <div class="col-lg-9 col-md-8">{{ auth()->guard('customer')->user()->username }}&nbsp;&nbsp;&nbsp;<i class="bi bi-pen text-info" id="edit_admin_username" onclick="window.location.href='{{ route('main.customer.show.username') }}'"></i> </div>
                  </div>

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>
@endsection