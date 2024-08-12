@extends('admin.cover')
@section('content')
  <style type="text/css">
    @media (max-width: 576px) {
      #role_selection {
          margin-top:20px;
      }
  }
  </style>
   
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
        <div class="col-lg-2"></div>
        <div class="col-lg-8">

          <div class="card">
            <div class="card-body text-center" style="overflow: auto;">
        				<h5 class="card-title">Send an email to a new user</h5>
                <p>You have to send an email to a new system user so that he/she can register him/her self !</p>

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
        		</div>

            
                <form action="{{ route('submitUserEmailToRegister') }}" method="POST" style="padding-left:10px;padding-right: 10px;">
                  @csrf

                  <div class="row">
                      <div class="col-md-6">
                          <input type="text" name="email" class="form-control" placeholder="Enter email">
                      </div>
                      <div class="col-md-6">
                          <select name="role_name" class="form-control" id="role_selection" required>
                              <option class="">User role . . .</option>
                              @foreach($user_role_data as $data)
                                  <option value="{{ $data->id }}"><b>{{ $data->role_name }}</b></option>
                              @endforeach
                          </select>
                      </div>
                  </div>

                  <br>
                  <div class="text-center">
                      <button class="btn btn-primary mb-4" type="submit">Send&nbsp;<i class="fa fa-paper-plane"></i></button>
                  </div>
              </form>
              
          </div>

        </div>
        <div class="col-lg-2"></div>
      </div>

      <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2"></div>
        <div class="col-lg-8 col-md-8 col-sm-8">
          @if($count_email_user != 0)
              <button class="btn btn-secondary mb-4 float-right" style="display: flex; flex-direction: column; align-items: center;" data-bs-toggle="modal" data-bs-target="#EmailDataModal">
                    <span>User's emails registration list</span>
              </button>
          @endif
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2"></div>
      </div>

    </section>

    <div class="modal fade" id="EmailDataModal" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
              <div class="modal-header" style="display: flex; flex-direction: column; align-items:center;">
                  <h5 class="modal-title">Registration list of system users!&nbsp;&nbsp;<i class="fa fa-list-alt"></i></h5>
              </div>

              <div class="modal-body text-center">
                  <div class="table-container">

                    <!-- Bordered Tabs -->
                    <ul class="nav nav-tabs nav-tabs-bordered" id="borderedTab" role="tablist">
                      <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#registered" type="button" role="tab" aria-controls="home" aria-selected="true">Registered&nbsp;<i class="badge bg-primary"><b>{{$data_email_registered_count}}</b></i></button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#not_registered" type="button" role="tab" aria-controls="profile" aria-selected="false">Not registered yet&nbsp;<i class="badge bg-primary"><b>{{$data_count_email}}</b></i></button>
                      </li>
                      
                    </ul>
                    <div class="tab-content pt-2" id="borderedTabContent">
                      <div class="tab-pane fade show active" id="registered" role="tabpanel" aria-labelledby="home-tab">
                            <table border="1" class="table table-bordered table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <th>N<sup>o</sup></th>
                                        <th>Email</th>
                                        <th>Time-ago</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data_email_registered as $data)
                                        <tr>
                                            <td>{{ $count++ }}</td>
                                            <td>{{ $data->email }}</td>
                                            @php
                                                $dateTime = new DateTime($data->created_at);
                                                $now = new DateTime();
                                                $diff = $now->diff($dateTime);

                                                if ($diff->y > 0) {
                                                    $timeAgo = $diff->y . " year" . ($diff->y > 1 ? "s" : "") . " ago";
                                                } elseif ($diff->m > 0) {
                                                    $timeAgo = $diff->m . " month" . ($diff->m > 1 ? "s" : "") . " ago";
                                                } elseif ($diff->d > 0) {
                                                    $timeAgo = $diff->d . " day" . ($diff->d > 1 ? "s" : "") . " ago";
                                                } elseif ($diff->h > 0) {
                                                    $timeAgo = $diff->h . " hour" . ($diff->h > 1 ? "s" : "") . " ago";
                                                } elseif ($diff->i > 0) {
                                                    $timeAgo = $diff->i . " min" . " ago";
                                                } else {
                                                    $timeAgo = "Just now";
                                                }
                                            @endphp
                                            <td><b>{{ $timeAgo }}</b></td>
                                        </tr>
                                    @endforeach

                                    @if($data_email_registered_count == 0)
                                      <tr>
                                        <td colspan="3" class="text-center">
                                          No data found yet !
                                        </td>
                                      </tr>
                                    @endif
                                </tbody>
                            </table>
                      </div>
                      <div class="tab-pane fade" id="not_registered" role="tabpanel" aria-labelledby="profile-tab">
                            <table border="1" class="table table-bordered table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <th>N<sup>o</sup></th>
                                        <th>Email</th>
                                        <th>Time-ago</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data_email as $data)
                                        <tr>
                                            <td>{{ $count++ }}</td>
                                            <td>{{ $data->email }}</td>
                                            @php
                                                $dateTime = new DateTime($data->created_at);
                                                $now = new DateTime();
                                                $diff = $now->diff($dateTime);

                                                if ($diff->y > 0) {
                                                    $timeAgo = $diff->y . " year" . ($diff->y > 1 ? "s" : "") . " ago";
                                                } elseif ($diff->m > 0) {
                                                    $timeAgo = $diff->m . " month" . ($diff->m > 1 ? "s" : "") . " ago";
                                                } elseif ($diff->d > 0) {
                                                    $timeAgo = $diff->d . " day" . ($diff->d > 1 ? "s" : "") . " ago";
                                                } elseif ($diff->h > 0) {
                                                    $timeAgo = $diff->h . " hour" . ($diff->h > 1 ? "s" : "") . " ago";
                                                } elseif ($diff->i > 0) {
                                                    $timeAgo = $diff->i . " min" . " ago";
                                                } else {
                                                    $timeAgo = "Just now";
                                                }
                                            @endphp
                                            <td><b>{{ $timeAgo }}</b></td>
                                        </tr>
                                    @endforeach

                                    
                                     @if($data_count_email == 0)
                                      <tr>
                                        <td colspan="3" class="text-center">
                                          No data found yet !
                                        </td>
                                      </tr>
                                    @endif
                                </tbody>
                            </table>
                      </div>
                      
                    </div><!-- End Bordered Tabs -->
                          <!--end of Tabs-->
                      
                  </div>
              </div>
              <div class="modal-footer">
                  <button class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">Close&nbsp;<i class="fa fa-times"></i></button>
              </div>
          </div>
      </div>
  </div>

  <style>
  .table-container {
      max-height: 400px; /* Adjust the height as needed */
      overflow: auto;
  }
  </style>


    <script type="text/javascript">
      setTimeout(function(){
          document.getElementById('error_msg').style.display="none";
        },5000);
    </script>
    
@endsection