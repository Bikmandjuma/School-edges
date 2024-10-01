@extends('mainHome.customer.cover')
@section('content')
 <style type="text/css">
        .error-message {
            color: #e74c3c;
            font-size: 14px;
            margin-top: 5px;
        }

        .form-group {
            position: relative;
            margin-bottom: 20px;
        }
        .form-group label {
            position: absolute;
            top: 10px;
            left: 12px;
            font-size: 16px;
            color: #888;
            transition: all 0.2s ease-out;
            pointer-events: none;
            background-color: #fff; /* Ensure background is opaque */
            padding: 0 4px; /* Space for the label to sit on top of the input */
        }
        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 12px 12px 12px 12px; /* Add padding to accommodate label */
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #007bff;
        }
        .form-group input:focus + label,
        .form-group input:not(:placeholder-shown) + label,
        .form-group textarea:focus + label,
        .form-group textarea:not(:placeholder-shown) + label {
            top: -12px;
            left: 12px;
            font-size: 12px;
            color: #007bff;
        }
        .form-group input.invalid,
        .form-group textarea.invalid {
            border-color: #e74c3c;
        }
        .form-group textarea {
            resize: vertical;
        }
    </style>

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item">Account</li>
          <li class="breadcrumb-item active">Password</li>
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

                <div class="tab-pane fade show active pt-3" id="profile-change-password">

                    <div class="row">
                        <div class="col-xl-2 col-md-2 col-sm-1"></div>
                        <div class="col-xl-8 col-md-8 col-sm-10">
                            
                            @if($errors->any())
                                <p style="display: flex;text-align: center;align-items: center;justify-content: center;justify-items: center;font-family: sans-serif;font-style: italic;color: #e74c3c;font-size: 14px;" class="error-message" id="error_msg">
                                    @foreach($errors->all() as $error)
                                        {{ $error }}<br>
                                    @endforeach
                                </p>
                            @endif

                            @if(session('current_password'))
                                <div class="d-flex align-items-center justify-content-center" id="session_msg_container" id="error_msg">
                                    <div class="alert alert-info alert-dismissible fade show text-center" role="alert">
                                        {{ session('current_password') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                </div>
                            @endif

                            <form class="mt-8 space-y-6 ml-4" action="{{ route('main.customer.submit.password') }}" method="POST" id="password-form">
                                
                                @csrf
                                
                                <div class="rounded-md">
                                    <div  class="form-group">
                                        <input name="current_password" value="{{old('current_password')}}" type="password" autocomplete="password" placeholder=" " id="password">
                                        <label for="password">Enter current password</label>
                                        <div class="error_message" id="password_error"></div>
                                    </div>
                                    
                                    <div style="margin-top:10px;"  class="form-group">
                                        <input name="new_password" type="password" autocomplete="new_password" placeholder=" " id="new_password" >
                                        <label for="new_password">Enter new password</label><div class="error_message" id="new_password_error"></div>
                                    </div>

                                    <div style="margin-top:10px;"  class="form-group">
                                        <input name="password_confirmation" type="password" autocomplete="repeat_new_password" placeholder=" " id="repeat_new_password" >
                                        <label for="repeat_new_password">Repeat new-password</label><div class="error_message" id="repeat_new_password_error"></div>
                                    </div>
                                    
                                </div>
                            
                                <div class="text-center">
                                <button type="submit" class="btn btn-primary">Change Password</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-xl-2 col-md-2 col-sm-1"></div>
                    </div>

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

            <div class="modal fade" id="deleteProfileModal" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header align-items-center justify-content-center">
                      <h5 class="modal-title align-items-center justify-content-center">Delete my profile</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body align-items-center justify-content-center">
                      Are you sure , do you want to delete your profile ?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="window.location.href='{{ route('AdminDeleteProfile',auth()->guard('customer')->user()->id) }}'">Yes</button>
                      <button class="btn btn-danger" class="btn-close" data-bs-dismiss="modal" aria-label="Close">Not now</button>
                    </div>
                  </div>
                </div>
              </div><!-- End Vertically centered Modal-->

      <script>
       
        document.addEventListener('DOMContentLoaded', () => {
            const form = document.getElementById('password-form');

            form.addEventListener('blur', (event) => {
                const input = event.target;
                const errorElement = document.getElementById(`${input.id}-error`);
                
                if (input.tagName === 'INPUT') {
                    // Clear previous error message
                    errorElement.textContent = '';

                    // Simple validation example
                    if (input.value.trim() === '') {
                        input.classList.add('invalid');
                        errorElement.textContent = 'This field is required.';
                        document.getElementById('error_msg').style.display="none";
                    } else {
                        input.classList.remove('invalid');
                    }
                }
            }, true);
        });
    </script>


      </script>
@endsection