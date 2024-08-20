@extends('mainHome.shareHolder.cover')
@section('content')

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item">Account</li>
          <li class="breadcrumb-item active">Information</li>
        </ol>

      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

            	@include('mainHome.shareHolder.shareHolderName')
            
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

                <div class="tab-pane fade show active pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">
                        <img src="{{ URL::to('/') }}/adminPanel/assets/img/{{ auth()->guard('shareHolder')->user()->image }}" alt="Profile">
                        <div class="pt-2">
                          <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                          <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image" data-bs-toggle="modal" data-bs-target="#deleteProfileModal"><i class="bi bi-trash"></i></a>
                        </div>
                      </div>
                    </div>

                <form method="POST" action="{{ route('main.editInfo') }}">
                    @csrf
                    <div class="row mb-3">
                      <label for="firstname" class="col-md-4 col-lg-3 col-form-label">Firstname</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="firstname" type="text" class="form-control" id="firstname" value="{{ auth()->guard('shareHolder')->user()->firstname }}">
                      </div>
                    </div>
                    
                    <div class="row mb-3">
                      <label for="Lastname" class="col-md-4 col-lg-3 col-form-label">Lastname</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="lastname" type="text" class="form-control" id="Lastname" value="{{ auth()->guard('shareHolder')->user()->lastname }}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Gender" class="col-md-4 col-lg-3 col-form-label">Gender</label>
                      <div class="col-md-8 col-lg-9">
                        
                        <select name="gender" type="text" class="form-control">
                            @if(auth()->guard('shareHolder')->user()->gender == 'male')
                                <option value="{{ auth()->guard('shareHolder')->user()->gender }}">{{ auth()->guard('shareHolder')->user()->gender }}</option>
                                <option value="female">female</option>
                            @else
                                <option value="{{ auth()->guard('shareHolder')->user()->gender }}">{{ auth()->guard('shareHolder')->user()->gender }}</option>
                                <option value="male">male</option>
                            @endif
                        </select>

                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="phone" type="text" class="form-control" id="Phone" value="{{ auth()->guard('shareHolder')->user()->phone }}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" id="Email" value="{{ auth()->guard('shareHolder')->user()->email }}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="dob" class="col-md-4 col-lg-3 col-form-label">Dirth of birth</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="dob" type="text" class="form-control" id="dob" value="{{ auth()->guard('shareHolder')->user()->dob }}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Username" class="col-md-4 col-lg-3 col-form-label">Username</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="username" type="text" class="form-control" id="Username" value="{{ auth()->guard('shareHolder')->user()->username }}">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">
                          Save Changes
                      </button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

@endsection