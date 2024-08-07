@extends('admin.cover')
@section('content')
  <div class="pagetitle">
      <h1>System users</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">System-users</li>
          <li class="breadcrumb-item active">register-users</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body text-center" style="overflow: auto;">
        				<h5 class="card-title">Register User by full information</h5>
        		</div>

                <div class="row">
                  <div class="col-md-1"></div>
                  <div class="col-md-10">
                
                      <!-- No Labels Form -->
                      <form class="row g-3" action="{{ route('register-system-user') }}" method="POST">
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
                              <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                              <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                          </select>
                          @error('gender')
                              <p style="color:Red;">
                                  {{ $message }}
                              </p>
                          @enderror
                        </div>
                        <div class="col-md-6">
                          <label>Email</label>  
                          <input type="email" name="email" class="form-control" placeholder="enter email" value="{{ old('email') }}">
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
                          <select class="form-control" name="role_id">
                            <option value="">Select user role ...</option>
                            @foreach($data_role_users as $data)
                              <option value="{{ $data->id }}" {{ old('role_id') == $data->id ? 'selected' : '' }}>{{ $data->role_name }}</option>
                            @endforeach
                          </select>
                            @error('role_id')
                                <p style="color:Red;">
                                    {{ $message }}
                                </p>
                            @enderror
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

                        
                        <div class="col-md-12 text-center mb-4">
                          <button type="submit" class="btn btn-primary mt-3">Submit</button>
                          <button type="reset" class="btn btn-secondary mt-3">Reset</button>
                        </div>
                        
                      </form><!-- End No Labels Form -->
                    </div>
                    <div class="col-md-1"></div>
                </div>
              
            </div>
          </div>

        </div>
      </div>
    </section>
@endsection