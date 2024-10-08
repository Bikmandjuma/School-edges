@extends('Single_School.Users_acccount.Employee.Cover')
@section('content')
	
	<div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-2 mb-xl-0 mb-4"></div>
	    <div class="col-xl-3 col-sm-4 mb-xl-0 mb-4">
	          <div class="card">
	            <div class="card-header p-3 pt-2 text-center">
	            	<div class="bg-gradient-secondary shadow-secondary border-radius-lg  pb-1 pt-1">
		                <h6 class="text-white text-capitalize ps-3">Add new user_role</h6>
		            </div>
	          	</div>
	          	<div class="card-body p-3 pt-2">
	          		<form role="form" class="text-start" action="{{ route('school_employee_add_new_role',$school_id) }}" method="POST">
	          		  @csrf
	                  <div class="input-group input-group-outline my-3">
	                    <label class="form-label">Role_name</label>
	                    <input type="text" name="role_name" class="form-control">
	                    <!-- @error('role_name')
	                    	<span id="error-message">{{ $message }}</span>
	                    @enderror -->
	                  </div>
	                  
	                  <div class="text-center">
	                    <button type="submit" class="btn bg-gradient-info w-100 my-4 mb-2"><i class="fa fa-plus"></i>&nbsp;Add</button>
	                  </div>
	                 
	                </form>
	          	</div>
	          </div>
	    </div>
        <div class="col-xl-4 col-sm-4 mb-xl-0 mb-4">
        	<div class="card">
	            <div class="card-header p-3 pt-2 text-center">
	            	 <div class="bg-gradient-secondary shadow-secondary border-radius-lg pb-1 pt-1">
		                <h6 class="text-white text-capitalize ps-3">All user_role</h6>
		              </div>
	          	</div>
	          	<div class="card-body p-3 pt-2">
	          		<div class="table-responsive p-0">
               
		          		<table class="table align-items-center justify-content-center mb-0">
						  @foreach($role_data as $data)
						    <tr>
						      <td>{{ $data->role_name }}</td>
						      <td>
						        <div class="bg-gradient-info shadow-secondary border-radius-lg text-center pb-1 pt-1 text-white edit-btn" 
						                data-bs-toggle="modal" 
						                data-bs-target="#editRoleModal" 
						                data-id="{{ $data->id }}" 
						                data-role="{{ $data->role_name }}">
						          <i class="fa fa-edit"></i> Edit
						        </div>
						      </td>
						    </tr>
						  @endforeach
						</table>

		          	</div>
	          	</div>
        </div>
        <div class="col-xl-2 mb-xl-0 mb-4"></div>
      </div>
    </div>

    <!-- Edit Role Modal -->
	<div class="modal fade" id="editRoleModal" tabindex="-1" aria-labelledby="editRoleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header text-center">
	        <h5 class="modal-title" id="editRoleModalLabel">Edit Role</h5>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>
	      <div class="modal-body">
	        <form id="editRoleForm" method="POST" action="{{ route('school_employee_update_role') }}">
	          @csrf
	          <!-- Hidden input to hold the role ID -->
	          <input type="hidden" id="roleId" name="role_id">
	          
	          <div class="mb-3">
	            <label for="roleName" class="form-label">Role Name</label>
	            <input type="text" class="form-control" id="roleName" name="role_name" autofocus required>
	          </div>
	          
	          <div class="modal-footer">
	            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
	            <button type="submit" class="btn btn-info">Save changes</button>
	          </div>
	        </form>
	      </div>
	    </div>
	  </div>
	</div>

	<script type="text/javascript">
		document.addEventListener('DOMContentLoaded', function () {
	  // Select all the edit buttons
	  const editButtons = document.querySelectorAll('.edit-btn');

	  editButtons.forEach(button => {
	    button.addEventListener('click', function () {
	      // Get the role ID and name from the button's data attributes
	      const roleId = this.getAttribute('data-id');
	      const roleName = this.getAttribute('data-role');

	      // Set the values in the modal
	      document.getElementById('roleId').value = roleId;
	      document.getElementById('roleName').value = roleName;
	    });
	  });
	});

	</script>
@endsection