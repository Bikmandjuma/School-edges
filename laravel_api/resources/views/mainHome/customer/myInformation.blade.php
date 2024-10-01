@extends('mainHome.customer.cover')
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

            	@include('mainHome.customer.customerName')
            
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                @include('mainHome.customer.info_main_links')

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active pt-3" id="profile-edit">

                @if($errors->any())
                    <p style="display: flex;text-align: center;align-items: center;justify-content: center;justify-items: center;font-family: sans-serif;font-style: italic;color: #e74c3c;font-size: 14px;" class="error-message" id="error_msg">
                        @foreach($errors->all() as $error)
                              {{ $error }}<br>
                        @endforeach
                    </p>
                 @endif

                <form method="POST" action="{{ route('main.customer.editInfo') }}">
                    
                    @csrf

                    <div class="row mb-3">
                      <label for="firstname" class="col-md-4 col-lg-3 col-form-label">School code</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="school_code" type="text" class="form-control" id="school_code" value="{{ auth()->guard('customer')->user()->school_code }}" disabled>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="firstname" class="col-md-4 col-lg-3 col-form-label">School name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="school_name" type="text" class="form-control" id="school_name" value="{{ auth()->guard('customer')->user()->school_name }}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="phone" type="text" class="form-control" id="Phone" value="{{ auth()->guard('customer')->user()->phone }}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" id="Email" value="{{ auth()->guard('customer')->user()->email }}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="dob" class="col-md-4 col-lg-3 col-form-label">Country</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="country" type="text" class="form-control" id="country" value="{{ auth()->guard('customer')->user()->country }}">
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