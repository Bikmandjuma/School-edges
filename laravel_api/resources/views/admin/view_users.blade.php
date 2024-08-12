@extends('admin.cover')
@section('content')
  <style>
    .profile-wrapper {
        position: relative;
        display: inline-block;
    }

    .online-indicator {
        position: absolute;
        bottom: 0;
        right: 0;
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background-color: green; /* Color for online status */
        border: 2px solid #fff; /* Optional: Border to make it stand out */
  }
  </style>


  <div class="pagetitle">
      <h1>System users</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">System-users</li>
          <li class="breadcrumb-item active">view-users</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body" style="overflow: auto;">
            	<div class="row">
        			<div class="col-lg-8">
        				<h5 class="card-title">System users info</h5>
        			</div>
        			<div class="col-lg-4" style="display: flex; justify-content: center;">
  						<div class="filter mt-2" style="display: flex; flex-direction: column; align-items:center;">
		                  <a class="icon btn btn-primary" href="#" data-bs-toggle="dropdown"><i class="fa fa-user-plus"></i>&nbsp;<span style="font-family: sans-serif;font-style: italic;y"><b>Add new user</b></span></a>
		                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
		                    <li><a class="dropdown-item" href="{{ route('registerUserByInformation') }}" data-bs-toggle="tooltip" data-bs-placement="left" title="Add new system user by his/her full information"><i class="fa fa-list-alt"></i>&nbsp;By full info </a></li>
		                    <li><a class="dropdown-item" href="{{ route('registerUserByEmail') }}" data-bs-toggle="tooltip" data-bs-placement="left" title="Sent a user an email link to register him/her self !"><i class="fa fa-envelope"></i>&nbsp;By Email</a></li>
		                  </ul>
		                </div>
        			</div>
        		</div>
              
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>
                      N<sup>o</sup>
                    </th>
                    <th>Image</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Gender</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($users_data as $user)
                    <tr>
                        <td>{{ $count_no++ }}</td>
                        <td>
                            <div style="position: relative; display: inline-block;">
                                <img src="{{ URL::to('/') }}/userPanel/profile/{{ $user->image }}" alt="Profile" class="rounded-circle" style="border:2px solid #eee;width: 40px;height: 40px;">
                                @if($user->is_online)
                                    <div class='online_indicator_user' title="{{ $user->firstname }} {{ $user->lastname }} is online right now !">
                                        <span class='blink_online_icon_user'></span>
                                    </div>
                                @else
                                    <span style="position: absolute; bottom: 0; right: 0; width: 12px; height: 12px; background-color: #dc3545; border-radius: 50%; border: 2px solid white;" title="{{ $user->firstname }} {{ $user->lastname }} is offline right now !"></span>
                                @endif
                            </div>
                        </td>
                        <td>{{ $user->firstname }}</td>
                        <td>{{ $user->lastname }}</td>
                        <td>{{ $user->gender }}</td>
                        <td><a href="{{ route('viewUserData', Crypt::encrypt($user->id)) }}"><i class="fa fa-eye"></i>&nbsp;View</a></td>
                    </tr>
                @endforeach


                </tbody>
              </table>
              
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>
@endsection