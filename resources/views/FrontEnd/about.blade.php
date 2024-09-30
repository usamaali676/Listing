@extends('layouts.master')
@section('meta')
<title>Empowering Local Connections | Local Beings</title>
<meta name="title" content="Empowering Local Connections | Local Beings">
 <meta content="Welcome to Local Beings - your trusted online platform connecting you with the vibrant world of local businesses. " name="description">
@endsection
@section('front')
			<!-- ======================= Top Breadcrubms ======================== -->
			<section class="about-bg bg-cover" style="background:url(asset/img/about.jpg) no-repeat;">
				<div class="container">
					<div class="row">
						<div class="col-xl-8 col-lg-8 col-md-11 col-sm-12">
							<div class="abt-caption">
								<div class="abt-caption-head">
									<h1>Smart team alwasy create better thing and better solutions.</h1>
									<h6>Welcome to Local Beings, your trusted online platform for connecting with the vibrant world of local businesses in your community. We believe in the power of local connections, supporting small businesses, and fostering thriving communities.</h6>
									<div class="abt-bt-info"><a href="{{route('register')}}" class="btn ft-medium theme-cl bg-white rounded">Get Started<i class="fas fa-arrow-right ms-2"></i></a></div>
									<!--<div class="position-relative row">-->
									<!--	<div class="col-lg-4 col-md-4 col-4">-->
									<!--		<h3 class="ft-bold text-sky mb-0"><span class="count">07</span>+</h3>-->
									<!--		<p class="ft-medium text-light">Business Listing</p>-->
									<!--	</div>-->
									<!--	<div class="col-lg-4 col-md-4 col-4">-->
									<!--		<h3 class="ft-bold text-warning mb-0"><span class="count">06</span>k+</h3>-->
									<!--		<p class="ft-medium text-light">Popular Authors</p>-->
									<!--	</div>-->
									<!--	<div class="col-lg-4 col-md-4 col-4">-->
									<!--		<h3 class="ft-bold text-danger mb-0"><span class="count">200</span>+</h3>-->
									<!--		<p class="ft-medium text-light">Countries</p>-->
									<!--	</div>-->
									<!--</div>-->
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- ======================= Top Breadcrubms ======================== -->

			<!-- ======================= How It Work Detail ======================== -->
			<section class="space min">
				<div class="container">

					<!--<div class="row justify-content-center">-->
					<!--	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">-->
					<!--		<div class="sec_title position-relative text-center mb-5">-->

					<!--		</div>-->
					<!--	</div>-->
					<!--</div>-->

					<div class="row align-items-center">
					    <div class="col-sm-6">
					        <h6 class="mb-0 theme-cl">Welcome to Local Beings</h6>
							<h2 class="ft-bold">About Us</h2>
					        <p>Welcome to Local Beings, your trusted online platform for connecting with the vibrant world of local businesses in your community. We believe in the power of local connections, supporting small businesses, and fostering thriving communities.
                                At Local Beings, our mission is simple: to empower individuals like you to discover, review, and engage with the best local establishments in your area. We understand that local businesses are the heart and soul of every community, and we are passionate about creating a platform that celebrates their unique offerings.
                                We built Local Beings with you in mind, providing an intuitive and user-friendly experience that makes it effortless to find businesses that suit your needs. Whether you're in search of a cozy café to catch up with friends, a trusted contractor for your home improvement projects, or a hidden gem boutique for a special shopping experience, we've got you covered.
                                But we're more than just a directory. We are a community of like-minded individuals who appreciate the value of supporting local businesses. Through our platform, you have the opportunity to share your experiences, leave reviews, and contribute to the collective knowledge of our community. Your insights and recommendations help others make informed decisions while also providing valuable feedback to the businesses themselves.
                                We also understand the importance of convenience and efficiency in today's fast-paced world. That's why we offer features such as reservation capabilities, allowing you to book appointments, tables, or services directly through our platform. Save time, skip the hassle, and ensure a seamless experience as you engage with the local businesses you love.
                                Local Beings is more than just a website. It's a hub where connections are made, stories are shared, and communities are strengthened. We invite you to join us in our mission to support and celebrate the local beings that make our communities unique and vibrant.
                                Thank you for being part of the Local Beings community. Together, we can make a difference, one local connection at a time.</p>
					    </div>
					    <div class="col-sm-6">
					        <img src="{{asset('asset/img/bn-5.png')}}" class="img-fluid" alt=""  >
					    </div>
					</div>
				</div>
			</section>
			<!-- ======================= How It Work End ======================== -->



			<!-- ======================= Newsletter Start ============================ -->
			<section class="space bg-cover" style="background:#03343b url(assets/img/landing-bg.png) no-repeat;">
				<div class="container py-5">

					<div class="row justify-content-center">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="sec_title position-relative text-center mb-5">
								<h6 class="text-light mb-0">Subscribr Now</h6>
								<h2 class="ft-bold text-light">Get All Updates & Advance Offers</h2>
							</div>
						</div>
					</div>

					<div class="row align-items-center justify-content-center">
						<div class="col-xl-7 col-lg-10 col-md-12 col-sm-12 col-12">
							<form class="bg-white rounded p-1">
								<div class="row no-gutters">
									<div class="col-xl-9 col-lg-9 col-md-8 col-sm-8 col-8">
										<div class="form-group mb-0 position-relative">
											<input type="text" class="form-control b-0" placeholder="Enter Your Email Address">
										</div>
									</div>
									<div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-4">
										<div class="form-group mb-0 position-relative">
											<button class="btn full-width btn-height theme-bg text-light fs-md" type="button">Subscribe</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>

				</div>
			</section>
			<!-- ======================= Newsletter Start ============================ -->
@endsection
