@extends('layouts.master')
@section('front')

			<!-- ======================= Top Breadcrubms ======================== -->
			<div class="bg-dark py-3">
				<div class="container">
					<div class="row">
						<div class="colxl-12 col-lg-12 col-md-12">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="#" class="text-light">Home</a></li>
									<li class="breadcrumb-item"><a href="#" class="text-light">Page</a></li>
									<li class="breadcrumb-item active theme-cl" aria-current="page">Error Page</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
			</div>
			<!-- ======================= Top Breadcrubms ======================== -->
			
			<!-- ======================= Product Detail ======================== -->
			<section>
				<div class="container">
				
					<div class="row justify-content-center">
						<div class="col-12 col-md-10 col-lg-8 col-xl-6 text-center">

							<!-- Icon -->
							<div class=""><img src="assets/img/404.png" class="img-fluid" alt="" /></div>
							<!-- Heading -->
							<h1 class="mb-3 ft-bold">Whoops! That page doesn’t exist.</h1>
							<!-- Text -->
							<h5 class="ft-medium fs-md mb-5">The page you requested could not be found</h5>
							<!-- Button -->
							<a class="btn rounded theme-bg text-light" href="{{route('front')}}">Go To Home Page</a>
						</div>
					</div>
					
				</div>
			</section>
			<!-- ======================= Product Detail End ======================== -->



@endsection
