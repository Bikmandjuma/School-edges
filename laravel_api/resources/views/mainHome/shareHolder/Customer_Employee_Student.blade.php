@extends('mainHome.shareHolder.cover')
@section('content')
    <div class="pagetitle">
      <h1>School</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item">school</li>
          <li class="breadcrumb-item active">View_school_info</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    @include('mainHome.shareHolder.school_name_and_image')
                </div>
            </div>

            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        @include('mainHome.shareHolder.main_tabs_links_info')
                        
                        <h5 class="mt-4 mb-4">School - Employees - Students</h5>

                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#employee_tab">Employees</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#student_tab">Students</button>
                            </li>
                        </ul>

                        <div class="tab-content pt-2">
                            <div class="tab-pane fade show active" id="employee_tab">
                                <h5 class="card-title">Employee info</h5>
                            </div>
                            <div class="tab-pane fade" id="student_tab">
                                <h5 class="card-title">Student info</h5>
                            </div>
                        </div>
                        <!-- End Bordered Tabs -->

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
