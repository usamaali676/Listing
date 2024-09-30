@extends('layouts.master')
@section('meta')
<title>Local Beings - Find Great Place in Your Areas</title>
<meta name="title" content="Local Beings - Find Great Place in Your Areas">
 <meta content="Register and list your business for free on Localbeings.com. Enhance your online visibility, reach local customers, and grow your business today! " name="description">
@endsection
@section('front')

<div class="home-banner margin-bottom-0" style="background:#f41b3b url(asset/img/banner-6.jpg) no-repeat;" data-overlay="5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-11 col-lg-12 col-md-12 col-sm-12 col-12">

                <div class="banner_caption text-center mb-5">
                    <h1 class="banner_title ft-bold mb-1">Find Great Place in Your Areas</h1>
                    <p class="fs-md ft-medium">Your one-stop platform to explore and connect with local businesses of all sizes.</p>
                </div>

                <div class="Goodup-top-cates">
                    <ul>
                        @foreach ($famcat as $list)
                        <li><a href="{{route('singcat')}}/{{$list->slug}}" class="Goodup-top-cat-box"><div class="Goodup-tp-ico"><i class="{{$list->icon}}"></i></div><div class="Goodup-tp-title"><h5>{{$list->name}}</h5></div></a></li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- ======================= Home Banner ======================== -->

<!-- ======================= Home Search ======================== -->
<section class="p-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-11 col-lg-12 col-md-12 col-12">

                <div class="Goodup-search-shadow">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="placesseach" role="tabpanel" aria-labelledby="placesseach-tab">
                            <form action="{{route('search')}}" method="GET" class="main-search-wrap fl-wrap">
                                <div class="main-search-item">
                                    <span class="search-tag"><i class="lni lni-keyboard"></i></span>
                                    <input type="text" name="search" class="form-control radius" placeholder="What are you looking for?" />
                                </div>
                                <div class="main-search-item">
                                    <span class="search-tag"><i class="lni lni-map-marker"></i></span>
                                    <input type="text" name="location" class="form-control" placeholder="Location" />
                                </div>
                                <div class="main-search-item">
                                    <span class="search-tag"><i class="lni lni-briefcase"></i></span>
                                    <select class="form-control" name="category">
                                        <option value="">Choose Category</option>
                                        @foreach ($bcat as $cat)
                                            <option value="{{$cat->name}}">{{$cat->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="main-search-button">
                                    <button  type="submit" class="btn full-width theme-bg text-white" type="button">Search</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- ======================= Home Search End ======================== -->


			<!-- =========================== Listing Category ======================= -->
			@if($states->count() >= 1)
			<section class="gray middle min">
				<div class="container">

					<div class="row">
						<div class="col-xl-12 col-lg-12 col-md-12 col-12">
							<div class="sec_title position-relative text-center mb-5">
								<h6 class="text-muted mb-0">Top Areas</h6>
								<h2 class="ft-bold">Find the Best Businesses in Town</h2>
							</div>
						</div>
					</div>

					<div class="row align-items-center">

                        @foreach ($states as $item)
						<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
							<div class="Goodup-img-catg-wrap">
								<div class="Goodup-catg-city">{{$item->cities_count}} Cities</div>
								<div class="Goodup-img-catg-thumb"><a href="{{route('cities')}}/{{$item->slug}}"><img src="{{asset('/business/states')}}/{{$item->image}}" class="img-fluid" alt=""></a></div>
								<div class="Goodup-img-catg-caption">
									<h4 class="fs-md mb-0 ft-medium m-catrio">{{$item->name}} </h4>
									<a href="{{route('cities')}}/{{$item->slug}}" class="Goodup-cat-arrow"><i class="lni lni-arrow-right-circle"></i></a>
								</div>
							</div>
						</div>
                        @endforeach
					</div>

				</div>
			</section>
			@endif
			<!-- =========================== Listing Category End ===================== -->


    <!-- ======================= All Types Listing ======================== -->
    @if($business->count() >= 1)
    <section class="space min">
        <div class="container">
    
            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="sec_title position-relative text-center mb-5">
                        <h6 class="theme-cl mb-0">Featured Listings</h6>
                        <h2 class="ft-bold">Top Services Provider</h2>
                    </div>
                </div>
            </div>
    
            <!-- row -->
            <div class="row align-items-center">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="tab-content" id="myTabsContent">
    
                        <!-- Places -->
                        <div class="tab-pane fade show active" id="places" role="tabpanel" aria-labelledby="places-tab">
                            <div class="row justify-content-center">
                                @foreach ($business as $item)
                                    <!-- Single -->
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                                        <div class="Goodup-grid-wrap">
                                            <div class="Goodup-grid-upper">
                                                <div class="Goodup-pos ab-left">
                                                    @foreach ($item->cat as $list)
                                                    <div class="Goodup-featured-tag">{{$list->name}}</div>
                                                    @endforeach
    
                                                </div>
                                                <div class="Goodup-grid-thumb">
                                                    <a href="{{route('business.single')}}/{{$item->slug}}" class="d-block text-center m-auto"><img
                                                            src="{{asset('business/feature')}}/{{$item->featureImage}}" class="img-fluid" alt=""></a>
                                                </div>
                                                {{-- <div class="Goodup-rating overlay">
                                                    <div class="Goodup-pr-average high">4.8</div>
                                                    <div class="Goodup-aldeio">
                                                        <div class="Goodup-rates">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                        </div>
                                                        <div class="Goodup-all-review"><span>46 Reviews</span></div>
                                                    </div>
                                                </div> --}}
                                            </div>
                                            <div class="Goodup-grid-fl-wrap">
                                                <div class="Goodup-caption px-3 py-2">
                                                    <div class="Goodup-author"><a href="{{route('business.single')}}/{{$item->slug}}"><img src="{{asset('business/logo')}}/{{$item->logo}}"
                                                                class="img-fluid circle" alt=""></a></div>
                                                    <h4 class="mb-0 ft-medium medium"><a href="{{route('business.single')}}/{{$item->slug}}" class="text-dark fs-md">{{$item->name}}</a></h4>
                                                    <div class="Goodup-location"><i class="fas fa-map-marker-alt me-1 theme-cl"></i>{{$item->address}}</div>
                                                    <div class="Goodup-middle-caption mt-3">
                                                        <p>{!! Str::limit($item->description, 50) !!}</p>
                                                    </div>
                                                </div>
                                                <div class="Goodup-grid-footer py-2 px-3">
                                                    <div class="Goodup-ft-last">
                                                        <div class="Goodup-inline">
                                                            <div class="Goodup-bookmark-btn"><a href="mailto:{{$item->email}}"><i
                                                                        class="lni lni-envelope position-absolute"></i></a></div>
                                                            <div class="Goodup-bookmark-btn"><a href="tel:{{$item->phone}}" ><i
                                                                        class="lni lni-phone position-absolute"></i></a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
    
    
                            </div>
                        </div>
                        <!-- /Places -->
    
                    </div>
                </div>
                
                <!--<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">-->
                <!--    <a class="Goodup-price-btn " href="#">View All Listings</a>-->
                <!--</div>-->
    
            </div>
            <!-- /row -->
    
        </div>
    </section>
    @endif
    <!-- ======================= All Types Listing ======================== -->

<!-- ======================= Listing Categories ======================== -->
    @if($bcat->count() >= 1)
    <section class="space min gray">
        <div class="container">
    
            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="sec_title position-relative text-center mb-5">
                        <h6 class="mb-0 theme-cl">Popular Categories</h6>
                        <h2 class="ft-bold">Browse Top Categories</h2>
                    </div>
                </div>
            </div>
    
            <!-- row -->
            <div class="row align-items-center">
                @foreach ($bcat as $item)
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="cats-wrap text-center">
                        <a href="{{route('singcat')}}/{{$item->slug}}" class="Goodup-catg-wrap">
                            <div class="Goodup-catg-city">{{$item->businesses_count}} Listings</div>
                            <div class="Goodup-catg-icon"><i class="{{$item->icon}}"></i></div>
                            <div class="Goodup-catg-caption">
                                <h4 class="fs-md mb-0 ft-medium m-catrio">{{$item->name}}</h4>
                                {{-- <span class="text-muted">607 Listings</span> --}}
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
    
    
    
            </div>
            <!-- row -->
    
        </div>
    </section>
    @endif
<!-- ======================= Listing Categories End ======================== -->

<!-- ======================= About Start ============================ -->
<section class="space" id="mission">
    <div class="container">

        <div class="row align-items-center justify-content-between">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                <div class="m-spaced">
                    <div class="position-relative">
                        <div class="mb-2"><span class="bg-light-sky text-sky px-2 py-1 rounded">Our Mission</span></div>
                        <h2 class="ft-bold mb-3">Claim Your Business & <br>Get Started Today!</h2>
                        <p class="mb-2">At Local Beings, our mission is to empower local communities by connecting people with the best local businesses and services in their area. We believe in the power of supporting and celebrating local businesses, and our platform serves as a bridge between customers seeking exceptional experiences and businesses striving to make a positive impact. Through our user-friendly interface and comprehensive directory, we aim to provide a trusted resource that helps individuals discover, review, and engage with a diverse range of local establishments. By fostering a vibrant ecosystem of local beings, we aspire to strengthen communities, promote economic growth, and enhance the overall quality of life for everyone involved. Join us in our mission to support local businesses, build connections, and embrace the unique essence of each community we serve.</p>
                    </div>
                    <div class="position-relative row">
                        <!--<div class="col-lg-4 col-md-4 col-4">-->
                        <!--    <h3 class="ft-bold text-sky mb-0"><span class="count">07</span>+</h3>-->
                        <!--    <p class="ft-medium">Business Listing</p>-->
                        <!--</div>-->
                        <!--<div class="col-lg-4 col-md-4 col-4">-->
                        <!--    <h3 class="ft-bold text-warning mb-0"><span class="count">06</span>k+</h3>-->
                        <!--    <p class="ft-medium">Popular Authors</p>-->
                        <!--</div>-->
                        <!--<div class="col-lg-4 col-md-4 col-4">-->
                        <!--    <h3 class="ft-bold text-danger mb-0"><span class="count">200</span>+</h3>-->
                        <!--    <p class="ft-medium">Countries</p>-->
                        <!--</div>-->
                        <div class="col-lg-12 col-md-12 col-12 mt-3" id="process">
                            <a href="{{route('about')}}" class="btn btn-md theme-bg-light rounded theme-cl hover-theme">See Details<i class="lni lni-arrow-right-circle ms-2"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12">
                <div class="position-relative">
                    <img src="{{asset('asset/img/bn-5.png')}}" class="img-fluid" alt="" />
                </div>
            </div>
        </div>

    </div>
</section>
<!-- ======================= About Start ============================ -->

<!-- ======================= About Start ============================ -->
<section class="space pt-0" >
    <div class="container">

        <div class="row align-items-center justify-content-between">

            <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12">
                <div class="position-relative">
                    <img src="{{asset('asset/img/bn-4.png')}}" class="img-fluid" alt="" />
                </div>
            </div>

            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                <div class="m-spaced">
                    <div class="position-relative">
                        <div class="mb-1"><span class="bg-light-success text-success px-2 py-1 rounded">Process</span></div>
                        <h2 class="ft-bold mb-3">How it works & features</h2>
                        <p class="mb-3">Discover, Review, and Engage with the best local businesses in your community.</p>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                             <div class="uli-list-features">
                        <ul>

                            <li>
                                <div class="list-uiyt">
                                    <div class="list-iobk"><i class="fas fa-globe"></i></div>
                                    <div class="list-uiyt-capt">
                                        <h5>Find Businesses</h5>
                                        <p>Discover a wide range of local establishments effortlessly with our intuitive search functionality.</p>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="list-uiyt">
                                    <div class="list-iobk"><i class="fas fa-envelope"></i></div>
                                    <div class="list-uiyt-capt">
                                        <h5>Review Listings</h5>
                                        <p>Share your experiences and help others make informed decisions by leaving honest reviews, ratings, and recommendations.</p>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="list-uiyt">
                                    <div class="list-iobk"><i class="fas fa-phone"></i></div>
                                    <div class="list-uiyt-capt">
                                        <h5>Make a Reservation</h5>
                                        <p>Easily book appointments, tables, or services directly through our platform for a seamless experience.</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                        </div>
                        <div class="col-sm-6">
                             <div class="uli-list-features">
                        <ul>

                            <li>
                                <div class="list-uiyt">
                                    <div class="list-iobk"><i class="fas fa-map"></i></div>
                                    <div class="list-uiyt-capt">
                                        <h5>Interactive Map</h5>
                                        <p>Explore your surroundings and navigate different neighborhoods with our visual map feature.</p>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="list-uiyt">
                                    <div class="list-iobk"><i class="fa fa-bookmark"></i></div>
                                    <div class="list-uiyt-capt">
                                        <h5>Bookmark and Favorites</h5>
                                        <p>Save and organize your favorite businesses for quick access whenever you need.</p>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="list-uiyt">
                                    <div class="list-iobk"><i class="fa fa-users"></i></div>
                                    <div class="list-uiyt-capt">
                                        <h5>Community Engagement</h5>
                                        <p>Connect with fellow users and business owners, share tips, and engage with like-minded individuals.</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                        </div>
                    </div>
                   
                </div>
            </div>

        </div>

    </div>
</section>
<!-- ======================= About Start ============================ -->

<!-- ============================ Pricing Start ==================================== -->
<!--<section class="space min gray">-->
<!--    <div class="container">-->

<!--        <div class="row justify-content-center">-->
<!--            <div class="col-xl-5 col-lg-7 col-md-9 col-sm-12">-->
<!--                <div class="sec_title position-relative text-center mb-5">-->
<!--                    <h6 class="theme-cl mb-0">Our Pricing</h6>-->
<!--                    <h2 class="ft-bold">Choose Your Package</h2>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->

<!--        <div class="row">-->

<!--            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">-->
<!--                <div class="Goodup-price-wrap">-->
<!--                    <div class="Goodup-author-header">-->
<!--                        <div class="Goodup-price-currency">-->
<!--                            <h3><span class="Goodup-new-price">$<del>49</del></span><span class="Goodup-old-price">$<del>149</del></span></h3>-->
<!--                        </div>-->
<!--                        <div class="Goodup-price-title">-->
<!--                            <div class="Goodup-price-tlt"><h4>Personal</h4></div><div class="Goodup-price-ribbon"><span class="Goodup-ribbon-offer all">50% Off</span></div>-->
<!--                        </div>-->
<!--                        <div class="Goodup-price-subtitle">Best Choice for Individuals </div>-->
<!--                    </div>-->
<!--                    <div class="Goodup-price-body">-->
<!--                        <ul class="price__features">-->
<!--                            <li><i class="fa fa-angle-right"></i>Lifetime Bandwidth Usage</li>-->
<!--                            <li><i class="fa fa-angle-right"></i>6 Months Support &amp; Updates</li>-->
<!--                            <li><i class="fa fa-angle-right"></i>10 Website License</li>-->
<!--                            <li><i class="fa fa-angle-right"></i>Quickstart Included</li>-->
<!--                            <li><i class="fa fa-angle-right"></i>Access to Plugins &amp; Theme</li>-->
<!--                            <li><i class="fa fa-angle-right"></i>Branding/Copyright Removal</li>-->
<!--                        </ul>-->
<!--                    </div>-->
<!--                    <div class="Goodup-price-bottom">-->
<!--                        <a class="Goodup-price-btn" href="#"><i class="fas fa-shopping-basket"></i> Purchase Now</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->

<!--            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">-->
<!--                <div class="Goodup-price-wrap">-->
<!--                    <div class="Goodup-author-header">-->
<!--                        <div class="Goodup-price-currency">-->
<!--                            <h3><span class="Goodup-new-price theme-cl">$<del>129</del></span><span class="Goodup-old-price">$<del>199</del></span></h3>-->
<!--                        </div>-->
<!--                        <div class="Goodup-price-title">-->
<!--                            <div class="Goodup-price-tlt"><h4>Platinum</h4></div><div class="Goodup-price-ribbon"><span class="Goodup-ribbon-offer">50% Off</span></div>-->
<!--                        </div>-->
<!--                        <div class="Goodup-price-subtitle">Best Choice for Individuals </div>-->
<!--                    </div>-->
<!--                    <div class="Goodup-price-body">-->
<!--                        <ul class="price__features">-->
<!--                            <li><i class="fa fa-angle-right"></i>Lifetime Bandwidth Usage</li>-->
<!--                            <li><i class="fa fa-angle-right"></i>12 Months Support &amp; Updates</li>-->
<!--                            <li><i class="fa fa-angle-right"></i>20 Website License</li>-->
<!--                            <li><i class="fa fa-angle-right"></i>Quickstart Included</li>-->
<!--                            <li><i class="fa fa-angle-right"></i>Access to Plugins &amp; Theme</li>-->
<!--                            <li><i class="fa fa-angle-right"></i>Branding/Copyright Removal</li>-->
<!--                        </ul>-->
<!--                    </div>-->
<!--                    <div class="Goodup-price-bottom">-->
<!--                        <a class="Goodup-price-btn active" href="#"><i class="fas fa-shopping-basket"></i> Purchase Now</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->

<!--            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">-->
<!--                <div class="Goodup-price-wrap">-->
<!--                    <div class="Goodup-author-header">-->
<!--                        <div class="Goodup-price-currency">-->
<!--                            <h3><span class="Goodup-new-price">$<del>149</del></span><span class="Goodup-old-price">$<del>249</del></span></h3>-->
<!--                        </div>-->
<!--                        <div class="Goodup-price-title">-->
<!--                            <div class="Goodup-price-tlt"><h4>Standard</h4></div><div class="Goodup-price-ribbon"><span class="Goodup-ribbon-offer all">50% Off</span></div>-->
<!--                        </div>-->
<!--                        <div class="Goodup-price-subtitle">Best Choice for Individuals </div>-->
<!--                    </div>-->
<!--                    <div class="Goodup-price-body">-->
<!--                        <ul class="price__features">-->
<!--                            <li><i class="fa fa-angle-right"></i>Lifetime Bandwidth Usage</li>-->
<!--                            <li><i class="fa fa-angle-right"></i>Lifetime Support &amp; Updates</li>-->
<!--                            <li><i class="fa fa-angle-right"></i>50 Website License</li>-->
<!--                            <li><i class="fa fa-angle-right"></i>Quickstart Included</li>-->
<!--                            <li><i class="fa fa-angle-right"></i>Access to Plugins &amp; Theme</li>-->
<!--                            <li><i class="fa fa-angle-right"></i>Branding/Copyright Removal</li>-->
<!--                        </ul>-->
<!--                    </div>-->
<!--                    <div class="Goodup-price-bottom">-->
<!--                        <a class="Goodup-price-btn" href="#"><i class="fas fa-shopping-basket"></i> Purchase Now</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->

<!--        </div>-->

<!--    </div>-->
<!--</section>-->
<!-- ============================ Pricing End ==================================== -->


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
