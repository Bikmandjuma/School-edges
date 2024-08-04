@extends('users.RegisterCover')
@section('content')
	
	<div class="row mt-5">
		<div class="col-lg-2 col-md-2 col-sm-2 "></div>
		<div class="col-lg-8 col-md-8 col-sm-8 ">
			<div class="card">
            <div class="card-body">
              <h5 class="card-title">Fill this form</h5>

              <!-- No Labels Form -->
              <form class="row g-3">
          
                <div class="col-md-6">
                  <input type="text" class="form-control" placeholder="Enter firstname">
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" placeholder="Enter lastname">
                </div>

                <div class="col-md-6">
                	<select id="inputState" class="form-select">
	                    <option selected>Gender</option>
	                    <option value="Male">Male</option>
	                    <option value="Female">Female</option>
	                </select>
                </div>
                <div class="col-md-6">
                  <input type="email" class="form-control" value="{{ $email }}" disabled required>
                </div>


                <div class="col-md-6">
                  <input type="text" class="form-control" placeholder="Enter phone">
                </div>
                <div class="col-md-6">
                  <input type="date" class="form-control" placeholder="Enter date">
                </div>

                <div class="col-md-6">
                  <input type="text" class="form-control" placeholder="Enter Username">
                </div>
                <div class="col-md-6">
                  <input type="password" class="form-control" placeholder="Password">
                </div>

                <div class="col-md-6">
                  <input type="text" disabled class="form-control" value="Teacher">
                </div>
                <div class="col-md-6 text-center">
                	<button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
                
              </form><!-- End No Labels Form -->

            </div>
          </div>

         	<div class="row ">
		        <div class="col-lg-12 col-md-12 col-sm-12 text-center">
			        <div>
			          &copy; Copyright <strong><span>2024</span></strong>. All Rights Reserved
			        </div>
			        <div class="credits">
			          <!-- All the links in the footer should remain intact. -->
			          <!-- You can delete the links only if you purchased the pro version. -->
			          <!-- Licensing information: https://bootstrapmade.com/license/ -->
			          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
			          Designed by <a href="#">{{ config('app.name','laravel') }}</a>
			        </div>
		      	</div>
		    </div>
		</div>
		<div class="col-lg-2 col-md-2 col-sm-2"></div>
	</div>


@endsection