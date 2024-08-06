@extends('users.RegisterCover')
@section('content')
	
	@if($record_count == 0)
		<div class="row mt-5">
			<div class="col-lg-4 col-md-4 col-sm-12 "></div>
			<div class="col-lg-4 col-md-4 col-sm-12 ">
				<div class="card">
	            <div class="card-body">
	              <h5 class="card-title text-center">You are registered ,now you can access your account in <b>{{ config('app.name','laravel') }}</b>'s system</h5>
	              <!-- No Labels Form -->
	              <div class="row">
	          
	                <div class="col-md-12 text-center text-primary">
	                	<p  id="id_links" onclick="window.location.href='{{ route('login.form' )}}'"><i class="fa fa-lock-open"></i>&nbsp;Login here</p>
	                </div>
	                
	            </div>
	        </div>
			<div class="col-lg-4 col-md-4 col-sm-12 "></div>
	    </div>

	@else
		
		<div class="row mt-5" id="FormId">
			
			<div class="col-lg-2 col-md-2 col-sm-2 "></div>
			<div class="col-lg-8 col-md-8 col-sm-8 ">
				<div class="card">
	            <div class="card-body">
	              <h5 class="card-title text-center">Fill this form</h5>

	              <!-- No Labels Form -->
	              <form class="row g-3" action="{{ url('/system-user/registrations') }}/{{ $email }}/{{ $user_role_id }}" method="POST">
	              	@csrf
	          
	                <div class="col-md-6">
	                  <label>Firstname</label>	
	                  <input type="text" name="firstname" value="{{ old('firstname') }}" class="form-control" placeholder="Enter firstname">
	                  	@error('firstname')
						    <p style="color:Red;">
						        {{ $message }}
						    </p>
						@enderror
	                </div>
	                <div class="col-md-6">
	                  <label>Lastname</label>	
	                  <input type="text" name="lastname" class="form-control" placeholder="Enter lastname" value="{{ old('lastname') }}">
	                    @error('lastname')
						    <p style="color:Red;">
						        {{ $message }}
						    </p>
						@enderror
	                </div>

	                <div class="col-md-6">
	                  <label>Gender</label>	
	                	<select id="inputState" name="gender" class="form-select">
		                    <option selected>Gender</option>
		                    <option value="Male">Male</option>
		                    <option value="Female">Female</option>
		                </select>
		                @error('gender')
						    <p style="color:Red;">
						        {{ $message }}
						    </p>
						@enderror
	                </div>
	                <div class="col-md-6">
	                  <label>Email</label>	
	                  <input type="email" name="email" class="form-control" value="{{ $email }}" disabled required>
	                    @error('email')
						    <p style="color:Red;">
						        {{ $message }}
						    </p>
						@enderror
	                </div>


	                <div class="col-md-6">
	                  <label>Phone</label>	
	                  <input type="text" name="phone" value="{{ old('phone') }}" class="form-control" placeholder="Enter phone">
	                    @error('phone')
						    <p style="color:Red;">
						        {{ $message }}
						    </p>
						@enderror
	                </div>
	                <div class="col-md-6">
	                  <label>Date of birth</label>
	                  <input type="date" name="dob" class="form-control" value="{{ old('dob') }}" placeholder="Enter date" name="dob">
	                    @error('dob')
						    <p style="color:Red;">
						        {{ $message }}
						    </p>
						@enderror
	                </div>

	                <div class="col-md-6">
	                  <label>Username</label>	
	                  <input type="text" class="form-control" placeholder="Enter Username" value="{{ old('username') }}" name="username">
	                    @error('username')
						    <p style="color:Red;">
						        {{ $message }}
						    </p>
						@enderror
	                </div>
	                <div class="col-md-6">
	                  <label>User role</label>	
	                	<select class="form-control" name="role_id" disabled>
	                		<option value="{{ $user_role_id }}">{{ $user_role_name }}</option>
	                	</select>
	                </div>
	                <div class="col-md-6">
	                  <label>Password</label>	
	                  <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password">
	                    @error('password')
						    <p style="color:Red;">
						        {{ $message }}
						    </p>
						@enderror
	                </div>
	                <div class="col-md-6">
	                  <label>Re-enter Password</label>	
	                  <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Re-enter Password">
	                   
	                </div>

	                
	                <div class="col-md-12 text-center">
	                	<button type="submit" class="btn btn-primary mt-3">Submit</button>
	                  <button type="reset" class="btn btn-secondary mt-3">Reset</button>
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
	@endif

@endsection