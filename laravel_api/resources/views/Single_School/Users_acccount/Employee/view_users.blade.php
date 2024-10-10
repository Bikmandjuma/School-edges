@extends('Single_School.Users_acccount.Employee.Cover')
@section('content')

	<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-secondary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Authors table</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Author</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Function</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Employed</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                  	@foreach($all_users_data as $data)
	                    <tr>
	                      <td>
	                        <div class="d-flex px-2 py-1">
	                          <div>
	                            <img src="{{ URL::to('/') }}/Single_school_account/assets/img/users_profiles_pictures/{{ $data->image }}" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
	                          </div>
	                          <div class="d-flex flex-column justify-content-center">
	                            <h6 class="mb-0 text-sm">{{ $data->firstname." ".$data->middle_name." ".$data->lastname }}</h6>
	                            <p class="text-xs text-secondary mb-0">{{ $data->role ? $data->role->role_name : 'No Role Assigned' }}</p>

	                          </div>
	                        </div>
	                      </td>
	                      <td>
	                        <p class="text-xs font-weight-bold mb-0">{{ $data->email }}</p>
	                        <p class="text-xs text-secondary mb-0">{{ $data->phone }}</p>
	                      </td>
	                      <td class="align-middle text-center text-sm">
	                        <span class="badge badge-sm bg-gradient-success">Online</span>
	                      </td>
	                      <td class="align-middle text-center">
	                        <span class="text-secondary text-xs font-weight-bold">23/04/18</span>
	                      </td>
	                      <td class="align-middle">
	                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
	                          Edit
	                        </a>
	                      </td>
	                    </tr>
	                @endforeach
                   
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection 