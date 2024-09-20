@extends('mainHome.shareHolder.cover')
@section('content')
  <section class="section">
      
      <div class="row">
          <div class="col-lg-12 text-end">
              <div class="dropdown">
                  <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: gray; color: white;">
                      Schools not allowed & registered yet
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <li><a class="dropdown-item" href="#" onclick="window.location.href='{{ route("main.school_not_allowed_yet") }}'">Not allowed & registered yet</a></li>
                  </ul>
              </div>
          </div>
      </div>

      <br>
      
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body" style="overflow: auto;">
              <h5 class="card-title">All Schools info <span class="badge  text-white bg-primary badge-number">{{ $school_count }}</span> </h5>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>
                      <b>N</b>o
                    </th>
                    <th>Code</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($school_data as $data)
                  <tr>
                    <td>{{ $count++ }}</td>
                    <td>{{ $data->school_code }}</td>
                    <td><img src="{{ URL::to('/') }}/mainHomePage/img/school/{{ $data->image }}" width="80" height="50px" style="border-radius: 50px;"> </td>
                    <td>{{ $data->school_name }}</td>
                    <td><button class="btn btn-primary" onclick="window.location.href='{{ route("main.view_single_school_info",Crypt::encrypt($data->id)) }}'" ><i class="fas fa-eye"></i> View</button> </td>
                  </tr>
                  @endforeach
<!-- 
                  <tr>
                    <td>Theodore Duran</td>
                  </tr> -->
                  
              </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
</section>
    
@endsection