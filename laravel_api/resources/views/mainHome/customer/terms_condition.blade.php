@extends('mainHome.customer.cover')
@section('content')
@php
	use App\Models\customer_read_terms_condition;
@endphp
    <div class="pagetitle">
      <h1>Terms and conditions</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Terms and conditions</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
        	<div class="card">
	            <div class="card-body">
	              <h5 class="card-title">Terms and conditions</h5>

	              <!-- Default Tabs -->
	              <ul class="nav nav-tabs" id="myTab" role="tablist" style="Overview-x:auto;">
	                <li class="nav-item" role="presentation">
	                  <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true" title="System's introduction">Introduction</button>
	                </li>
	                <li class="nav-item" role="presentation">
	                  <button class="nav-link" id="Overview-tab" data-bs-toggle="tab" data-bs-target="#Overview" type="button" role="tab" aria-controls="Overview" aria-selected="false" title="System's overview">Overview</button>
	                </li>
	                <li class="nav-item" role="presentation">
	                  <button class="nav-link" id="Payment-tab" data-bs-toggle="tab" data-bs-target="#Payment" type="button" role="tab" aria-controls="Payment" aria-selected="false" title="Payment terms">Payment</button>
	                </li>
	                <li class="nav-item" role="presentation">
	                  <button class="nav-link" id="Service-tab" data-bs-toggle="tab" data-bs-target="#Service" type="button" role="tab" aria-controls="Service" aria-selected="false" title="Service Updates">Service</button>
	                </li>
	                <li class="nav-item" role="presentation">
	                  <button class="nav-link" id="Security-tab" data-bs-toggle="tab" data-bs-target="#Security" type="button" role="tab" aria-controls="Security" aria-selected="false" title="Data Security and Privacy">Security & Privacy</button>
	                </li>
	                <li class="nav-item" role="presentation">
	                  <button class="nav-link" id="Responsibility-tab" data-bs-toggle="tab" data-bs-target="#Responsibility" type="button" role="tab" aria-controls="Responsibility" aria-selected="false" title="User Responsibilities">User Respon..</button>
	                </li>
	                <li class="nav-item" role="presentation">
	                  <button class="nav-link" id="Termination-tab" data-bs-toggle="tab" data-bs-target="#Termination" type="button" role="tab" aria-controls="Termination" aria-selected="false" title="Termination">Termination</button>
	                </li>
	                <li class="nav-item" role="presentation">
	                  <button class="nav-link" id="Support-tab" data-bs-toggle="tab" data-bs-target="#Support" type="button" role="tab" aria-controls="Support" aria-selected="false" title="Customer Support">Customer help</button>
	                </li>
	              </ul>
	              <div class="tab-content pt-2" id="myTabContent">
	                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
	                  This agreement outlines the terms and conditions for the use of SchoolEdge, a school management system designed to enhance efficiency in managing school data, tracking student performance, and generating detailed reports. By using our services, schools agree to the following terms.
	                  <br>
	                	@php
        							$auth_user=Auth::guard('customer')->user()->id;
	                		$terms_condition_data = customer_read_terms_condition::where('school_fk_id',$auth_user)->where('Terms','Introduction')->where('status','Read')->get();

	                		$terms_condition_data_count = $terms_condition_data->count();
	                		@endphp
	                	
	                		@if($terms_condition_data_count == 0)
													<button class="btn btn-primary mt-2" onclick="window.location.href='{{ route('main.submit.terms_condition','introduction')}}'">Finish to read&nbsp;<i class="fa fa-list-alt"></i> </button>
											@else
													<button class="btn btn-info mt-2">Read already&nbsp;<i class="fa fa-check"></i> </button>
											@endif
	                		
	                	
	                  
	                </div>
	                <div class="tab-pane fade" id="Overview" role="tabpanel" aria-labelledby="profile-tab">
	                  <ul>

	                  	<li><b>SchoolEdge provides schools with the following features:</b></li>
	                  	<br>
											<li><b>Student Information Management:</b> Store and manage student data such as enrollment records, academic performance, attendance, and disciplinary records.</li>
						                  	<br>
											<li><b>Academic Performance Tracking:</b> Real-time tracking of student scores and performance, with automated report generation for students, teachers, and administrators.</li>
						                  	<br>
											<li><b>Machine Learning Insights:</b> Identify students at risk of falling behind or dropping out using AI algorithm and advanced data analysis.</li>
						                  	<br>
											<li><b>Multi-Role Access:</b> Tailored access for administrators, teachers, students, and parents, ensuring that each user has the necessary permissions to fulfill their role.</li>
						                  	<br>
											<li><b>Reporting Tools:</b> Generate custom reports on student performance, teacher efficiency, and other relevant metrics.</li>
	                  
	                  <br>
	                  @php
        							$auth_user=Auth::guard('customer')->user()->id;
	                		$terms_condition_data = customer_read_terms_condition::where('school_fk_id',$auth_user)->where('Terms','System overview')->where('status','Read')->get();

	                		$terms_condition_data_count = $terms_condition_data->count();
	                		@endphp
	                	
	                		@if($terms_condition_data_count == 0)
													<button class="btn btn-primary mt-2" onclick="window.location.href='{{ route('main.submit.terms_condition','System overview')}}'">Finish to read&nbsp;<i class="fa fa-list-alt"></i> </button>
											@else
													<button class="btn btn-info mt-2">Read already&nbsp;<i class="fa fa-check"></i> </button>
											@endif
										</ul>
	                </div>
	                <div class="tab-pane fade" id="Payment" role="tabpanel" aria-labelledby="contact-tab">
	                  <ul>
	                  	<li><b>Subscription-Based Pricing:</b> Schools are billed on a subscription model based on the number of students.</li>
	                  	<br>
											<li><b>Annual Plan:</b> Schools are charged 1,000 Rwandan Francs per student per year.</li>
											<br>
											<li><b>Payment Methods:</b> Payment can be made via bank transfer, mobile money, or credit card.</li>
											<br>
											<li><b>Billing Schedule:</b> Payments are collected annually. Schools are required to make payments at the start of each academic year or within the first quarter after adoption of the system.</li>
											<br>
											<li><b>Late Payment:</b> If payment is not received within 30 days of the due date, the school’s access to certain features may be restricted until full payment is made.</li>
	                  
	                  <br>
	                  @php
        							$auth_user=Auth::guard('customer')->user()->id;
	                		$terms_condition_data = customer_read_terms_condition::where('school_fk_id',$auth_user)->where('Terms','Payment terms')->where('status','Read')->get();

	                		$terms_condition_data_count = $terms_condition_data->count();
	                		@endphp
	                	
	                		@if($terms_condition_data_count == 0)
													<button class="btn btn-primary mt-2" onclick="window.location.href='{{ route('main.submit.terms_condition','Payment terms')}}'">Finish to read&nbsp;<i class="fa fa-list-alt"></i> </button>
											@else
													<button class="btn btn-info mt-2">Read already&nbsp;<i class="fa fa-check"></i> </button>
											@endif
										</ul>
	                </div>
	                <div class="tab-pane fade" id="Service" role="tabpanel" aria-labelledby="Service-tab">
	                  <ul>
	                  	<li>
	                  		SchoolEdge will regularly roll out updates to improve system functionality, performance, and security. These updates are automatically applied without additional charges. Notifications will be sent to the school admin when major updates occur.
	                  	</li>
	                  
	                  <br>
	                  @php
        							$auth_user=Auth::guard('customer')->user()->id;
	                		$terms_condition_data = customer_read_terms_condition::where('school_fk_id',$auth_user)->where('Terms','Service update')->where('status','Read')->get();

	                		$terms_condition_data_count = $terms_condition_data->count();
	                		@endphp
	                	
	                		@if($terms_condition_data_count == 0)
													<button class="btn btn-primary mt-2" onclick="window.location.href='{{ route('main.submit.terms_condition','Service update')}}'">Finish to read&nbsp;<i class="fa fa-list-alt"></i> </button>
											@else
													<button class="btn btn-info mt-2">Read already&nbsp;<i class="fa fa-check"></i> </button>
											@endif
										</ul>
	                </div>
	                <div class="tab-pane fade" id="Security" role="tabpanel" aria-labelledby="Security-tab">
	                  <ul>
	                  	<li>
	                  		SchoolEdge takes data security seriously. We ensure that all student and school data is stored securely using encryption protocols. Personal information will not be shared with third parties without prior consent from the school.
	                  	</li>
	                  
	                  <br>
		                  @php
	        							$auth_user=Auth::guard('customer')->user()->id;
		                		$terms_condition_data = customer_read_terms_condition::where('school_fk_id',$auth_user)->where('Terms','Security and privacy')->where('status','Read')->get();

		                		$terms_condition_data_count = $terms_condition_data->count();
	                		@endphp
	                	
	                		@if($terms_condition_data_count == 0)
													<button class="btn btn-primary mt-2" onclick="window.location.href='{{ route('main.submit.terms_condition','Security and privacy')}}'">Finish to read&nbsp;<i class="fa fa-list-alt"></i> </button>
											@else
													<button class="btn btn-info mt-2">Read already&nbsp;<i class="fa fa-check"></i> </button>
											@endif
										</ul>
	                </div>
	                <div class="tab-pane fade" id="Responsibility" role="tabpanel" aria-labelledby="Responsibility-tab">
	                  <ul>
	                  	<li><b>Administrators:</b> School admins are responsible for maintaining up-to-date student records and ensuring that the data entered into SchoolEdge is accurate.</li>
	                  	<br>
											<li><b>Teachers:</b> Teachers must enter academic performance data regularly and ensure it reflects student performance.</li>
											<br>
											<li><b>Parents and Students:</b> Parents and students will have restricted access to view only relevant data such as performance and attendance.</li>
	                  
	                  <br>
	                    @php
	        							$auth_user=Auth::guard('customer')->user()->id;
		                		$terms_condition_data = customer_read_terms_condition::where('school_fk_id',$auth_user)->where('Terms','User responsibility')->where('status','Read')->get();

		                		$terms_condition_data_count = $terms_condition_data->count();
	                		@endphp
	                	
	                		@if($terms_condition_data_count == 0)
													<button class="btn btn-primary mt-2" onclick="window.location.href='{{ route('main.submit.terms_condition','User responsibility')}}'">Finish to read&nbsp;<i class="fa fa-list-alt"></i> </button>
											@else
													<button class="btn btn-info mt-2">Read already&nbsp;<i class="fa fa-check"></i> </button>
											@endif
										</ul>
	                </div>
	                <div class="tab-pane fade" id="Termination" role="tabpanel" aria-labelledby="Termination-tab">
	                  <ul>
	                  	<li>Schools can terminate their subscription at any time by providing a 30-day notice.</li>
	                  	<br>
											<li>Upon termination, SchoolEdge will allow access to existing records for a limited time (up to 60 days) to enable the export of data.</li>
											<br>
											<li>No refunds will be issued for payments already made within the current subscription cycle.</li>
	                  
	                  <br>
	                    @php
	        							$auth_user=Auth::guard('customer')->user()->id;
		                		$terms_condition_data = customer_read_terms_condition::where('school_fk_id',$auth_user)->where('Terms','Termination')->where('status','Read')->get();

		                		$terms_condition_data_count = $terms_condition_data->count();
	                		@endphp
	                	
	                		@if($terms_condition_data_count == 0)
													<button class="btn btn-primary mt-2" onclick="window.location.href='{{ route('main.submit.terms_condition','Termination')}}'">Finish to read&nbsp;<i class="fa fa-list-alt"></i> </button>
											@else
													<button class="btn btn-info mt-2">Read already&nbsp;<i class="fa fa-check"></i> </button>
											@endif
										</ul>
	                </div>
	                <div class="tab-pane fade" id="Support" role="tabpanel" aria-labelledby="Support-tab">
	                  <ul>
	                  	<li>
	                  		SchoolEdge provides round-the-clock customer support to help resolve any issues schools may face during the use of the system. Schools can contact our support team via email or phone for technical assistance.
	                  	</li>
	                  </ul>
	                  
	                  @php
	        							$auth_user=Auth::guard('customer')->user()->id;
		                		$terms_condition_data = customer_read_terms_condition::where('school_fk_id',$auth_user)->where('Terms','Customer support')->where('status','Read')->get();

		                		$terms_condition_data_count = $terms_condition_data->count();
	                		@endphp
	                	
	                		@if($terms_condition_data_count == 0)
													<button class="btn btn-primary mt-2" onclick="window.location.href='{{ route('main.submit.terms_condition','Customer support')}}'">Finish to read&nbsp;<i class="fa fa-list-alt"></i> </button>
											@else
													<button class="btn btn-info mt-2">Read already&nbsp;<i class="fa fa-check"></i> </button>
											@endif
											<br>
	                  
	                </div>
	              </div><!-- End Default Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>


@endsection