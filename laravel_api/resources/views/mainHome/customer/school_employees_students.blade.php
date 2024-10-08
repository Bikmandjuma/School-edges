@extends('mainHome.customer.cover')
@section('content')
	
	<div class="pagetitle">
      <h1>School employees & students</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">employees and students</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

          	<!-- Left side columns -->
	        <div class="col-lg-12">
	        	<div class="card">
		            <div class="card-body">
		              <h5 class="card-title text-center">Employees and students</h5>

			            <!-- Default Tabs -->
			            <ul class="nav nav-tabs" id="myTab" role="tablist" style="Overview-x:auto;">
			                <li class="nav-item" role="presentation">
			                  <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#employees" type="button" role="tab" aria-controls="employees" aria-selected="true" title="System's introduction">Employees&nbsp;<span class="badge bg-primary">{{ $employees_count }}</span> </button>
			                </li>
			                <li class="nav-item" role="presentation">
			                  <button class="nav-link" id="Overview-tab" data-bs-toggle="tab" data-bs-target="#students" type="button" role="tab" aria-controls="students" aria-selected="false" title="System's overview">Students&nbsp;<span class="badge bg-primary">{{ $students_count }}</span></button>
			                </li>
		            	</ul>

		            	<div class="tab-content pt-2" id="myTabContent">
	                		<div class="tab-pane fade show active" id="employees" role="tabpanel" aria-labelledby="employees-tab">
	                			<!-- Table with stripped rows -->
					              <table class="table datatable">
					                <thead>
					                  <tr>
					                    <th>
					                      <b>N</b>o
					                    </th>
					                    <th>Image</th>
					                    <th>Firstname</th>
					                    <th>Lastname</th>
					                    <th>Gender</th>
					                    <th>Email</th>
					                    <th>Phone</th>
					                  </tr>
					                </thead>
					                <tbody>
					                  @foreach($employees as $data)
					                  	
					                  	@if($data->firstname == '' and $data->lastname == '')
						                  	
						                  	<tr>
							                    <td colspan="7" class="text-center">No data found in database !</td>
							                  </tr>

					                  	@else
							                  
							                  <tr>
							                    <td>{{ $count++ }}</td>
							                    <td><img src="{{ URL::to('/') }}/Single_school_account/assets/img/users_profiles_pictures/{{ $data->image }}" width="40" height="40" style="border-radius: 50px;border: 1px solid gray;"> </td>
							                    <td>{{ $data->firstname }}</td>
							                    <td>{{ $data->lastname }}</td>
							                    <td>{{ $data->gender }}</td>
							                    <td>{{ $data->email }}</td>
							                    <td>{{ $data->phone }}</td>
							                  </tr>
							                
							                @endif

					                  @endforeach
					              	</tbody>
					            	</table>
	                		
	                		</div>
	                	</div>

	                	<div class="tab-content pt-2" id="myTabContent">
	                		<div class="tab-pane fade" id="students" role="tabpanel" aria-labelledby="students-tab">
	                				
	                			<!-- Table with stripped rows -->
					              <table class="table datatable">
					                <thead>
					                  <tr>
					                    <th>
					                      <b>N</b>o
					                    </th>
					                    <th>Image</th>
					                    <th>Firstname</th>
					                    <th>Lastname</th>
					                    <th>Gender</th>
					                    <th>Province</th>
					                    <th>District</th>
					                  </tr>
					                </thead>
					                <tbody>
					                  @foreach($students as $data)
					                  	@if($students_count == 0)
						                  	<tr>
							                    <td colspan="7" class="text-center">No data found in our database</td>
							                  </tr>
					                  	@else

							                  <tr>
							                    <td>{{ $count++ }}</td>
							                    <td><img src="{{ URL::to('/') }}/mainHomePage/img/school/{{ $data->image }}" width="80" height="50px" style="border-radius: 50px;"> </td>
							                    <td>{{ $data->firstname }}</td>
							                    <td>{{ $data->lastname }}</td>
							                    <td>{{ $data->gender }}</td>
							                    <td>{{ $data->province }}</td>
							                    <td>{{ $data->district }}</td>
							                  </tr>
							                
					                  	@endif
					                  @endforeach
					              	</tbody>
					            	</table>

	                		</div>
	                	</div>

		            </div>
		        </div>

		    </div>

          </div>
        </div>
      </div>
    </section>
@endsection