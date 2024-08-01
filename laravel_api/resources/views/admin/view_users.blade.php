@extends('admin.cover')
@section('content')
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
              <h5 class="card-title">System users</h5>
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>
                      N<sup>o</sup>
                    </th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Gender</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                	@foreach($users_data as $data)
	                  <tr>
	                    <td>{{ $count_no }}</td>
	                    <td>{{ $data->firstname }}</td>
	                    <td>{{ $data->lastname }}</td>
	                    <td>{{ $data->gender }}</td>
	                    <td><a href="#"><i class="fa fa-eye"></i>&nbsp;View</a> </td>
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