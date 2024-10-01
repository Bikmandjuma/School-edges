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

                <div class="tab-pane fade show active pt-3" id="logo">

                  <!-- Profile Edit Form -->
                  
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-3 col-lg-3 col-form-label">School logo</label>
                      <div class="col-md-6 col-lg-3">

                          @if(session('profile_changed'))
                              <div class="alert alert_success" style="text-align: center;"> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
                              <strong>{{session('profile_changed')}}</strong>
                              </div><br>
                          @endif

                          @if(session('profile_error'))
                              <div class="alert alert_error" style="text-align: center;"> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
                              <strong>{{session('profile_error')}}</strong>
                              </div><br>
                          @endif
                        
                          <div class="row">
                            <div class="col-md-12 text-center">
                                <img src="{{ URL::to('/') }}/mainHomePage/img/school/{{ auth()->guard('customer')->user()->image }}" style="width:150px;height:150px;border:2px solid gray;">
                            </div>
                          </div>
                          <br>
                          <div class="row">
                            <div class="col-md-12 text-center">
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#profile"><i class="fa fa-edit"></i>&nbsp; Edit</button>
                            </div>
                          </div>
                      </div>
                      <div class="col-md-6 col-lg-3"></div>
                    </div>

                
                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

<!-- start image Modal -->
<div class="modal fade" id="profile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modify your profile picture</h5>
        <!-- <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>
      <div class="modal-body">
        <form action="{{ route('main.customer.update.logo') }}" method="POST" enctype="multipart/form-data" class="text-center align-items-center">
            @csrf            
            <img id="blah" scr="{{ URL::to('/') }}/mainHomePage/img/school/{{ auth()->guard('customer')->user()->image }}" style="width:120px;height:120px;"/>
            <br><br>
            <input name="image" type="file" accept="image/*" id="imgInp" class="form-control" required><br>
            <button class="btn btn-primary" type="submit" name="submit"><i class="fa fa-save"></i>&nbsp; Save changes</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!--end image modal-->
<script type="text/javascript">
imgInp.onchange = evt => {
  const [file] = imgInp.files
  if (file) {
    blah.src = URL.createObjectURL(file)
  }
}
</script>

@endsection