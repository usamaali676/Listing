            <!-- ============================================================== -->
            <!-- Top header  -->
            <!-- ============================================================== -->
            <!-- Start Navigation -->
			<div class="header header-light dark-text head-border">
				<div class="container">
					<nav id="navigation" class="navigation navigation-landscape">
						<div class="nav-header">
							<a class="nav-brand" href="{{route('front')}}">
								<img src="{{asset('asset/img/logo.png')}}" class="logo" alt="" />
							</a>
							<div class="nav-toggle"></div>
							<div class="mobile_nav">
								<ul>
								<li>
									<a href="#" data-bs-toggle="modal" data-bs-target="#login" class="theme-cl fs-lg">
										<i class="lni lni-user"></i>
									</a>
								</li>
								<li>
									<a href="add-listing.html" class="crs_yuo12 w-auto text-white theme-bg">
										<span class="embos_45"><i class="fas fa-plus me-2"></i>Add Listing</span>
									</a>
								</li>
								</ul>
							</div>
						</div>
						<div class="nav-menus-wrapper" style="transition-property: none;">
							<ul class="nav-menu">

								<li ><a href="{{route('front')}}">Home</a>
								</li>

								<li><a href="{{route('listing')}}">Listings</a>
								</li>


								<li><a href="{{route('blogs')}}">Blog</a>
								</li>


								<li><a href="{{route('about')}}">About</a>
								</li>

								<li><a href="{{route('contact')}}">Contact</a>
								</li>

							</ul>

							<ul class="nav-menu nav-menu-social align-to-right">
								<li>
									<a href="{{route('home')}}" class="ft-bold">
                                        @auth
                                            <i class="fas fa-home me-1 theme-cl"></i>Dashboard
                                        @else
                                            <i class="fas fa-sign-in-alt me-1 theme-cl"></i>Log In
                                        @endauth

									</a>
								</li>
								{{-- <li class="add-listing">
									<a href="add-listing.html" >
										<i class="fas fa-plus me-2"></i>Add Listing
									</a>
								</li> --}}
							</ul>
						</div>
					</nav>
				</div>
			</div>
			<!-- End Navigation -->
			<div class="clearfix"></div>
			<!-- ============================================================== -->
			<!-- Top header  -->
			<!-- ============================================================== -->
