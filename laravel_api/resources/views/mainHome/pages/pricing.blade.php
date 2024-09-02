@extends('mainHome.pages.cover')
@section('content')
	<style type="text/css">

	input[type="range"] {
	    width: 100%;
	    margin: 20px 0;
	}

	.progress-info {
	    font-size: 1.2em;
	}

	</style>
	<!-- Breadcrumbs -->
	<div class="breadcrumbs overlay">
		<div class="container">
			<div class="bread-inner">
				<div class="row">
					<div class="col-12">
						<h2>Pricing</h2>
							<ul class="bread-list">
								<li><a href="{{ route('main.home') }}">Home</a></li>
								<li><i class="icofont-simple-right"></i></li>
								<li class="active">Pricing</li>
							</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->
	
	<!-- Pricing Table -->
		<section class="pricing-table section">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section-title">
						    <h2>Pricing and Payment Instructions</h2>
						    <img src="{{ URL::to('/') }}/mainHomePage/img/section-img.png" alt="#" style="display: block; margin: 0 auto;">
						   
						    <p>At {{ config('app.name','laravel') }}, SchoolEdge, we believe in providing schools with flexible pricing options that scale with your needs. Our pricing is determined by the number of students enrolled in your school, ensuring that you only pay for what you need.
						    </p>

						    <p>
						    	We offer three types of payment plans to fit your budget and scheduling preferences:
						    </p>

						</div>

					</div>
				</div>
				<div class="row">
					<!-- Single Table -->
					<div class="col-lg-4 col-md-12 col-12">
						<div class="single-table">
							<!-- Table Head -->
							<div class="table-head">
								<div class="icon">
									<i class="icofont-university"></i>
									<!-- <i class="icofont-school-bag"></i> -->
								</div>
								<h4 class="title">Monthly Plan</h4>
								<!-- <div class="price">
									<ul class="table-list">
										<li><i class="icofont icofont-ui-check"></i>Number of Students : <span id="student-count">500<span></span></li>
										<li><i class="icofont icofont-ui-check"></i>Amount : <span id="amount">300,000 FRW</span></span></li>
									</ul>
						
									<input type="range" id="student-progress" min="0" max="3000" value="500">
								</div> -->
								<!-- <input type="range" id="student-progress" min="0" max="3000" value="500"> -->
							        <div class="price">
							            <ul class="table-list">
							                <li><i class="icofont icofont-ui-check"></i>Number of Students: <span id="min">0</span> - <span id="max">200</span></li>
							                <li><i class="icofont icofont-ui-check"></i>Amount: <span id="amount">300,000 FRW</span></li>
							            </ul>
							        </div>
							        <input type="range" id="student-progress" min="0" max="3000" value="500">

							</div>
							<!-- Table List -->
							 <div class="container">
						        
						        <div class="progress-info">
						            
						        </div>
						    </div>
						    <script src="script.js"></script>

							<div class="table-bottom">
								<a class="btn" href="#">Pay Now</a>
							</div>
							<!-- Table Bottom -->
						</div>
					</div>
					<!-- End Single Table-->
					<!-- Single Table -->
					<div class="col-lg-4 col-md-12 col-12">
						<div class="single-table">
							<!-- Table Head -->
							<div class="table-head">
								<div class="icon">
									<i class="icofont-university"></i>
									<!-- <i class="icofont icofont-tooth"></i> -->
								</div>
								<h4 class="title">Termly Plan</h4>
								<div class="price">
									<p class="amount">0<span> Frw</span></p>
								</div>	
							</div>
							<!-- Table List -->
							<ul class="table-list">
								<li><i class="icofont icofont-ui-check"></i>Lorem ipsum dolor sit</li>
								<li><i class="icofont icofont-ui-check"></i>Cubitur sollicitudin fentum</li>
								<li><i class="icofont icofont-ui-check"></i>Nullam interdum enim</li>
								<li class="cross"><i class="icofont icofont-ui-close"></i>Donec ultricies metus</li>
								<li class="cross"><i class="icofont icofont-ui-close"></i>Pellentesque eget nibh</li>
							</ul>
							<div class="table-bottom">
								<a class="btn" href="#">Book Now</a>
							</div>
							<!-- Table Bottom -->
						</div>
					</div>
					<!-- End Single Table-->
					<!-- Single Table -->
					<div class="col-lg-4 col-md-12 col-12">
						<div class="single-table">
							<!-- Table Head -->
							<div class="table-head">
								<div class="icon">
									<i class="icofont-university"></i>
									<!-- <i class="icofont-heart-beat"></i> -->
								</div>
								<h4 class="title">Annual Plan</h4>
								<div class="price">
									<p class="amount">0<span> Frw</span></p>
								</div>	
							</div>
							<!-- Table List -->
							<ul class="table-list">
								<li><i class="icofont icofont-ui-check"></i>Lorem ipsum dolor sit</li>
								<li><i class="icofont icofont-ui-check"></i>Cubitur sollicitudin fentum</li>
								<li><i class="icofont icofont-ui-check"></i>Nullam interdum enim</li>
								<li><i class="icofont icofont-ui-check"></i>Donec ultricies metus</li>
								<li><i class="icofont icofont-ui-check"></i>Pellentesque eget nibh</li>
							</ul>
							<div class="table-bottom">
								<a class="btn" href="#">Book Now</a>
							</div>
							<!-- Table Bottom -->
						</div>
					</div>
					<!-- End Single Table-->
				</div>	

				<div class="row">
					<!-- Single Table -->
					<div class="col-lg-12 col-md-12 col-12">
						<div class="card">
							<div class="card-header text-center">Why Choose SchoolEdge?</h2></div>
							<div class="card-body">
								<ul>
									<ol>

										<li style="padding-bottom: 5px;"><b>Flexible Pricing:</b> Our plans are designed to scale with your school's size, ensuring that you pay according to your needs and usage.</li>
										
										<li style="padding-bottom: 5px;"><b>High-Quality Solutions:</b> We provide top-notch data management solutions that offer exceptional value and support for schools of all sizes.</li>
										
										<li style="padding-bottom: 5px;"><b>Customizable Payment Options:</b> Choose a payment plan that best suits your budget and administrative preferences.</li>
									</ol> 
								</ul>
							</div>
						</div>
					</div>
				</div>

			</div>	
		</section>	
		<!--/ End Pricing Table -->
	<script type="text/javascript">
		// Pricing ranges for monthly plan

		const pricingRangesMonthly = [
			<?php foreach ($price_range as $data): ?>
				{ min: 0, max: 200, price: 100000 },
			    { min: 201, max: 450, price: 200000 },
			    { min: 451, max: 500, price: 300000 },
			    { min: 501, max: 600, price: 320000 },
			    { min: 601, max: 700, price: 420000 },
			    { min: 701, max: 800, price: 520000 },
			    { min: 801, max: 900, price: 620000 },
			<?php endforeach ?>
		    
		    // Add more ranges as needed
		];

		// Get HTML elements
		const progressBar = document.getElementById('student-progress');
		const minDisplay = document.getElementById('min');
		const maxDisplay = document.getElementById('max');
		const amountDisplay = document.getElementById('amount');

		// Function to get the price based on student count and update range
		function getPrice(students) {
		    let price = 0;
		    let minRange = 0;
		    let maxRange = 0;

		    for (const range of pricingRangesMonthly) {
		        if (students >= range.min && students <= range.max) {
		            price = range.price;
		            minRange = range.min;
		            maxRange = range.max;
		            break;
		        }
		    }
		    
		    // Optionally handle cases where students are out of defined ranges
		    if (price === 0) {
		        price = "Pricing not available";
		        minRange = 0;
		        maxRange = 3000; // Default max range
		    }

		    return { price, minRange, maxRange };
		}

		// Function to update the displayed amount and ranges based on the number of students
		function updateAmount() {
		    const students = parseInt(progressBar.value);
		    const { price, minRange, maxRange } = getPrice(students);
		    
		    minDisplay.textContent = minRange;
		    maxDisplay.textContent = maxRange;
		    amountDisplay.textContent = typeof price === 'number' ? `${price.toLocaleString()} FRW` : price;
		}

		// Initialize the display
		updateAmount();

		// Add event listener to update the display when the progress bar changes
		progressBar.addEventListener('input', updateAmount);

	</script>
@endsection