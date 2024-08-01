@extends('admin.cover')
@section('content')
    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item">Account</li>
          <li class="breadcrumb-item active">Social-media</li>
        </ol> 

      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              @include('admin.admin_name')
              
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                @include('admin.info_main_link')
                  
              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active pt-3" id="profile-change-password">
                  @if($errors->any())
                      <div class="d-flex align-items-center justify-content-center" id="error_msg">
                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                              @foreach($errors->all() as $error)
                                  {{ $error }}<br>
                              @endforeach
                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                      </div>
                  @endif

                  <!-- Change Password Form -->
                  <form action="{{ route('submit_social_media') }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                      <label class="col-md-4 col-lg-3 col-form-label">Phone</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="phone" type="text" class="form-control" placeholder="Enter phone number" value="{{ auth()->guard('admin')->user()->phone }}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label class="col-md-4 col-lg-3 col-form-label">Gmail</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="text" class="form-control"  placeholder="Enter your email" value="{{ auth()->guard('admin')->user()->email }}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label class="col-md-4 col-lg-3 col-form-label">Twitter</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="text" name="twitter" class="form-control"  placeholder="Enter Twitter's link">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label class="col-md-4 col-lg-3 col-form-label">Facebook</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="text" name="facebook" class="form-control" placeholder="Enter facebook's link">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label class="col-md-4 col-lg-3 col-form-label">Linkedin</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="text" name="linkedin" class="form-control" placeholder="Enter Linkedin's link">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label class="col-md-4 col-lg-3 col-form-label">Whatsapp</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="text" name="whatsapp" class="form-control" placeholder="Enter Whatsapp's link" value="{{ auth()->guard('admin')->user()->phone }}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label class="col-md-4 col-lg-3 col-form-label">Instagram</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="text" name="instagram" class="form-control" placeholder="Enter your Instagram's link">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save&nbsp;<i class="fa fa-save"></i> </button>
                    </div>

                  </form>

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>

      <script>
        setTimeout(function(){
          document.getElementById('error_msg').style.display="none";
        },5000);
      </script>

@endsection
