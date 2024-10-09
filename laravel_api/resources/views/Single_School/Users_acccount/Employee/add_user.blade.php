@extends('Single_School.Users_acccount.Employee.Cover')
@section('content')
	
	<div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-2 mb-xl-0 mb-4"></div>
	    <div class="col-xl-8 col-sm-4 mb-xl-0 mb-4">
	          <div class="card">
	            <div class="card-header p-3 pt-2 text-center">
	            	<div class="bg-gradient-secondary shadow-secondary border-radius-lg  pb-1 pt-1">
		                <h6 class="text-white text-capitalize">Add new employee</h6>
		            </div>
	          	</div>
	          	<div class="card-body p-3 pt-2">
	          		<form role="form" class="text-start" action="{{ route('school_employee_submit_user_data',$school_id) }}" method="POST">
									    @csrf
									    <div class="row">
									        <!-- Input for First Name -->
									        <div class="col-md-4">
									            <div class="input-group input-group-outline my-3">
									                <label class="form-label">First Name</label>
									                <input type="text" name="firstname" class="form-control" value="{{ old('firstname') }}">
									                @error('firstname')
									                    <span class="error-message text-danger">{{ $message }}</span>
									                @enderror
									            </div>
									        </div>

									        <!-- Input for Middle Name -->
									        <div class="col-md-4">
									            <div class="input-group input-group-outline my-3">
									                <label class="form-label">Middle Name</label>
									                <input type="text" name="middle_name" class="form-control" value="{{ old('middle_name') }}">
									            </div>
									        </div>

									        <!-- Input for Last Name -->
									        <div class="col-md-4">
									            <div class="input-group input-group-outline my-3">
									                <label class="form-label">Last Name</label>
									                <input type="text" name="lastname" class="form-control" value="{{ old('lastname') }}">
									                @error('lastname')
									                    <span class="error-message text-danger">{{ $message }}</span>
									                @enderror
									            </div>
									        </div>

									        <!-- Input for Username -->
									        <div class="col-md-4">
									            <div class="input-group input-group-outline my-3">
									                <label class="form-label">Username</label>
									                <input type="text" name="username" class="form-control" value="{{ old('username') }}">
									                @error('username')
									                    <span class="error-message text-danger">{{ $message }}</span>
									                @enderror
									            </div>
									        </div>

									        <!-- Input for Email -->
									        <div class="col-md-4">
									            <div class="input-group input-group-outline my-3">
									                <label class="form-label">Email</label>
									                <input type="email" name="email" class="form-control" value="{{ old('email') }}">
									                @error('email')
									                    <span class="error-message text-danger">{{ $message }}</span>
									                @enderror
									            </div>
									        </div>

									        <!-- Input for Phone Number -->
									        <div class="col-md-4">
									            <div class="input-group input-group-outline my-3">
									                <label class="form-label">Phone Number</label>
									                <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
									                @error('phone')
									                    <span class="error-message text-danger">{{ $message }}</span>
									                @enderror
									            </div>
									        </div>

									        <!-- Modern Input for Date of Birth -->
									        <div class="col-md-4">
									            <div class="input-group input-group-outline my-3">
									                <input type="date" name="dob" class="form-control" value="{{ old('dob') }}">
									                @error('dob')
									                    <span class="error-message text-danger">{{ $message }}</span>
									                @enderror
									            </div>
									        </div>

									        <!-- Input for User Role Selection -->
									        <div class="col-md-4">
									            <div class="input-group input-group-outline my-3">
									               
									                <select name="user_role" class="form-control">
																	    <option value="">Select user_role</option>
																	    @foreach($user_role_data as $data)
																	        <option value="{{ $data->id }}">{{ $data->role_name }}</option>
																	    @endforeach
																	</select>

									                @error('user_role')
									                    <span class="error-message text-danger">{{ $message }}</span>
									                @enderror
									            </div>
									        </div>

									        <!-- Input for Password -->
									        <div class="col-md-4">
									            <div class="input-group input-group-outline my-3">
									                <label class="form-label">Password</label>
									                <input type="password" name="password" class="form-control">
									                @error('password')
									                    <span class="error-message text-danger">{{ $message }}</span>
									                @enderror
									            </div>
									        </div>

									        <!-- Input for Confirm Password -->
									        <div class="col-md-4">
									            <div class="input-group input-group-outline my-3">
									                <label class="form-label">Confirm Password</label>
									                <input type="password" name="password_confirmation" class="form-control">
									                @error('password_confirmation')
									                    <span class="error-message text-danger">{{ $message }}</span>
									                @enderror
									            </div>
									        </div>

									        <!-- Radio buttons for gender selection -->
									        <div class="col-md-4">
									            <div class="gender-details my-3">
									                <span class="gender-title">Gender</span>
									                <div class="input-group">
									                    <div class="form-check me-3">
									                        <input type="radio" name="gender" id="dot-1" class="form-check-input" value="Male">
									                        <label class="form-check-label" for="dot-1">Male</label>
									                    </div>
									                    <div class="form-check">
									                        <input type="radio" name="gender" id="dot-2" class="form-check-input" value="Female">
									                        <label class="form-check-label" for="dot-2">Female</label>
									                    </div>
									                    @error('gender')
									                        <span class="error-message text-danger">{{ $message }}</span>
									                    @enderror
									                </div>
									            </div>
									        </div>
									    </div>

									    <!-- Submit button -->
									    <div class="text-center">
									        <button type="submit" class="btn bg-gradient-info w-40 my-4 mb-2"><i class="fa fa-plus"></i>&nbsp;Register</button>
									    </div>
									</form>

	          	</div>
	          </div>
	    	</div>
        <div class="col-xl-2 mb-xl-0 mb-4"></div>
      </div>
    </div>

@endsection