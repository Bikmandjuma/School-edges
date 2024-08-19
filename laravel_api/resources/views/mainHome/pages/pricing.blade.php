@extends('mainHome.pages.cover')
@section('content')
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
	
	<h1>Pricing us content goes here !</h1>

@endsection