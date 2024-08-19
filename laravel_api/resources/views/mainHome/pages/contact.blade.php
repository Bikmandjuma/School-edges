@extends('mainHome.pages.cover')
@section('content')

	<!-- Breadcrumbs -->
	<div class="breadcrumbs overlay">
		<div class="container">
			<div class="bread-inner">
				<div class="row">
					<div class="col-12">
						<h2>Contact Us</h2>
						<ul class="bread-list">
							<li><a href="{{ route('main.home') }}">Home</a></li>
							<li><i class="icofont-simple-right"></i></li>
							<li class="active">Contact Us</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->

<!-- Start Contact Us -->
		<section class="contact-us section">
			<div class="container">
				<div class="inner">
					<div class="row"> 
						<div class="col-lg-6">
							 <div class="contact-us-left">
					            <!--Start Google-map -->
					            <iframe 
					                style="border:0; width: 100%; height:100%;" 
					                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15955.937848161928!2d30.084165!3d-1.938114!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x19dca6b70fb12b83%3A0x80a53a8a0585e0c6!2sKigali!5e0!3m2!1sen!2srw!4v1676961268712!5m2!1sen!2srw" 
					                frameborder="0" 
					                allowfullscreen="" 
					                loading="lazy" 
					                referrerpolicy="no-referrer-when-downgrade">
					            </iframe>
					            <!--/End Google-map -->
					        </div>
						</div>
						<div class="col-lg-6">
							<div class="contact-us-form">
								<h2>Contact With Us</h2>
								<p>If you have any questions please feel free to contact with us.</p>
								<!-- Form -->
									@if($errors->contact->any())
										<div class="alert alert-danger">
											<ul>
											    @foreach($errors->contact->all() as $error)
											        <li>{{ $error }}.</li>
											    @endforeach
											</ul>
										</div>
									@endif

								<form class="form" method="POST" action="{{ route('main.submit.contact') }}">
									@csrf
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
												<input type="text" name="name" placeholder="Name" value="{{ old('name') }}">
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<input type="text" name="phone" placeholder="Phone" value="{{ old('phone') }}">
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<input type="text" name="subject" placeholder="Subject"  value="{{ old('subject') }}">
											</div>
										</div>
										<div class="col-lg-12">
											<div class="form-group">
												<!-- <textarea name="message" rows="4"placeholder="Your Message" required="">
													 {{ old('message') }}
												</textarea> -->
												<textarea name="message" placeholder="Your Message"></textarea>
											</div>
											</div>
										</div>
										<div class="col-12">
											<div class="form-group login-btn">
												<button class="btn" type="submit">Send</button>
											</div>
											<!-- <div class="checkbox">
												<label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox">Do you want to subscribe our Newsletter ?</label>
											</div> -->
										</div>
									</div>
								</form>
								<!--/ End Form -->
							</div>
						</div>
					</div>
				</div>
				<div class="contact-info">
					<div class="row">
						<!-- single-info -->
						<div class="col-lg-4 col-12 ">
							<div class="single-info">
								<i class="icofont icofont-ui-call"></i>
								<div class="content">
									<h3>+250785389000</h3>
									<p>schools.edges@company.com</p>
								</div>
							</div>
						</div>
						<!--/End single-info -->
						<!-- single-info -->
						<div class="col-lg-4 col-12 ">
							<div class="single-info">
								<i class="icofont-google-map"></i>
								<div class="content">
									<h3>KG 276 St , ave 25</h3>
									<p>Kigali-Gasabo-Kacyiru</p>
								</div>
							</div>
						</div>
						<!--/End single-info -->
						<!-- single-info -->
						<div class="col-lg-4 col-12 ">
							<div class="single-info">
								<i class="icofont icofont-wall-clock"></i>
								<div class="content">
									<h3>Mon - Frid: 8am - 5pm</h3>
									<p>Saturday - Sunday : Closed</p>
								</div>
							</div>
						</div>
						<!--/End single-info -->
					</div>
				</div>
			</div>
		</section>
		<!--/ End Contact Us -->

@endsection