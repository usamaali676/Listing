<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="google-site-verification" content="52eIniLS6zaGIatDoEabzFlUlr6nUkTeN9SKxtjgriY" />
    <title>{{$business->meta_title}}</title>
    <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=640224a6567fbf001a2d5c8f&product=inline-share-buttons&source=platform" async="async"></script>
    <meta name="title" content="{{$business->meta_title}}">
    <meta content="{{$business->meta_keywords}}" name="keywords">
    <meta content="{{$business->meta_description}}" name="description">
    @if($business->status){
    <meta name="robots" content="index">
    
    @else 
        <meta name="robots" content="noindex">
    
    @endif
    <link rel="canonical" href="https://localbeings.com/{{$business->slug}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    @include('layouts.partials.headFront')
    @yield('css')
    <style>
       .uploadButton {
    position: relative;
    overflow: hidden;
    display: inline-block;
    margin-top: 15px;
}

.uploadButton-input {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
}

.uploadButton-button {
    background-color: #4CAF50;
    color: white;
    padding: 8px 20px;
    cursor: pointer;
}

.selected-images-container {
    margin-top: 20px;
}

.selected-image-item {
    display: inline-block;
    margin-right: 10px;
}

.selected-image-item img {
    width: 100px;
    height: 100px;
    display: block;
}

.selected-image-item .remove-image {
    cursor: pointer;
}



    </style>
</head>
<body class="dark-header_">

    <!-- Wrapper -->
<div id="main-wrapper">

    <!-- Header Container
    ================================================== -->
    @include('layouts.partials.nav')
    <div class="clearfix"></div>
    <!-- Header Container / End -->

			<!-- ======================= Searchbar Banner ======================== -->
			<div class="featured-slick">
				<div class="featured-gallery-slide">
                    @foreach ($business->gallery as $item)
					<div class="dlf-flew"><a href="{{asset('business/gallery_images')}}/{{$item->images}}" class="mfp-gallery"><img src="{{asset('business/gallery_images')}}/{{$item->images}}" class="img-fluid mx-auto" alt="{{$business->meta_title}}" /></a></div>
                    @endforeach
				</div>
				<div class="Goodup-ops-bhri">
					<div class="Goodup-lkp-flex d-flex align-items-start justify-content-start">
						<div class="Goodup-lkp-thumb">
							<img src="assets/img/burger-king.png" class="img-fluid" width="90" alt="" />
						</div>
						<div class="Goodup-lkp-caption ps-3">
							<div class="Goodup-lkp-title"><h1 class="text-light mb-0 ft-bold">{{$business->name}}</h4></div>
							<div class="d-block mt-3">
								<div class="list-lioe">
									<div class="list-lioe-single"><span class="ft-medium text-info"><i class="fas fa-check-circle me-1"></i>Categories</span></div>
									<div class="list-lioe-single ms-2 ps-3 seperate">
                                        @foreach ($business->cat as $item)
                                        <a href="javascript:void(0);" class="text-light ft-medium">{{$item->name}}</a>,
                                        @endforeach

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- ======================= Searchbar Banner ======================== -->

			<!-- ============================ Listing Details Start ================================== -->
			<section class="gray py-5 position-relative">
				<div class="container">
					<div class="row">
						<div class="col-xl-8 col-lg-8 col-md-12 col-sm-12">

							<!-- About The Business -->
							<div class="bg-white rounded mb-4">
								<div class="jbd-01 px-4 py-4">
									<div class="jbd-details">
										<h5 class="ft-bold fs-lg">About the Business</h5>

										<div class="d-block mt-3">
											<p>{!! $business->description !!}</p>
											@foreach ($business->tags as $list)
                                                <div class="Goodup-pos " style="position :inherit;">
                                                    <div class="Goodup-featured-tag" style="position: inherit; margin: 0 10px">{{$list->name}}</div>
                                                </div>
                                            @endforeach
										</div>
									</div>

								</div>
							</div>



							<!-- Amenities and More -->
                            @if ($business->area_status == 1)
							<div class="bg-white rounded mb-4">
								<div class="jbd-01 px-4 py-4">
									<div class="jbd-details mb-4">
										<h5 class="ft-bold fs-lg">Areas We Serve</h5>

										<div class="Goodup-all-features-list mt-3">
											<ul>
                                                @foreach ($business->areas as $item)
											<li><div class="Goodup-afl-pace"><a href="{{$item->slug}}"><img src="{{asset('asset/img/verify.svg')}}" class="" alt="" /><span>{{$item->area}}</span></a></div></li>
                                                @endforeach
											</ul>
										</div>
									</div>

								</div>
							</div>
                            @endif



							<!-- Location & Hours -->
							<div class="bg-white rounded mb-4">
								<div class="jbd-01 px-4 py-4">
									<div class="jbd-details mb-4">
										<h5 class="ft-bold fs-lg">Location & Hours</h5>
										<div class="Goodup-lot-wrap d-block">
											<div class="row g-4">
												<div class="col-xl-6 col-lg-6 col-md-12">
                                                    @if (isset($business->map))
                                                    <div class="list-map-lot">
                                                        <iframe src="{{$business->map}}" width="100%" height="400px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
													</div>
                                                    @endif
													<div class="list-map-capt">
														<div class="lio-pact"><span class="ft-medium text-info">{{$business->address}}</span></div>
													</div>
												</div>
                                                @if ($business->timing_status == 1)
                                                    <div class="col-xl-6 col-lg-6 col-md-12">
                                                        <table class="table table-borderless">
                                                            <tbody>
                                                                @foreach ($business->hours as $item)
                                                                <tr>
                                                                    <th>{{$item->day}}</th>
                                                                    <td>{{$item->open_hour}} - {{$item->close_hour}}</td>
                                                                    {{-- <td class="text-success">Open now</td> --}}
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                @endif
											</div>
										</div>
									</div>
								</div>
							</div>


                            			<!-- Reviews -->
			<div id="listing-reviews" class="listing-section">
				<h3 class="listing-desc-headline margin-top-75 margin-bottom-20">Reviews <span>({{$business->reviews()->count()}})</span></h3>

				<!-- Rating Overview -->
				<div class="rating-overview">
					<div class="rating-overview-box">
						<span class="rating-overview-box-total">{{ number_format($averageRating, 1) }}</span>
						<span class="rating-overview-box-percent">out of 5.0</span>
						<div class="star-rating" data-rating="{{ number_format($averageRating, 1) }}"></div>
					</div>

					<div class="rating-bars">
                        <img src="{{asset('asset/img/review.webp')}}" alt="">
							{{-- <div class="rating-bars-item">
								<span class="rating-bars-name">Service <i class="tip" data-tip-content="Quality of customer service and attitude to work with you"></i></span>
								<span class="rating-bars-inner">
									<span class="rating-bars-rating" data-rating="4.2">
										<span class="rating-bars-rating-inner"></span>
									</span>
									<strong>4.2</strong>
								</span>
							</div>
							<div class="rating-bars-item">
								<span class="rating-bars-name">Value for Money <i class="tip" data-tip-content="Overall experience received for the amount spent"></i></span>
								<span class="rating-bars-inner">
									<span class="rating-bars-rating" data-rating="4.8">
										<span class="rating-bars-rating-inner"></span>
									</span>
									<strong>4.8</strong>
								</span>
							</div>
							<div class="rating-bars-item">
								<span class="rating-bars-name">Location <i class="tip" data-tip-content="Visibility, commute or nearby parking spots"></i></span>
								<span class="rating-bars-inner">
									<span class="rating-bars-rating" data-rating="3.7">
										<span class="rating-bars-rating-inner"></span>
									</span>
									<strong>3.7</strong>
								</span>
							</div>
							<div class="rating-bars-item">
								<span class="rating-bars-name">Cleanliness <i class="tip" data-tip-content="The physical condition of the business"></i></span>
								<span class="rating-bars-inner">
									<span class="rating-bars-rating" data-rating="4.0">
										<span class="rating-bars-rating-inner"></span>
									</span>
									<strong>4.0</strong>
								</span>
							</div> --}}
					</div>
				</div>
				<!-- Rating Overview / End -->


				<div class="clearfix"></div>

				<!-- Reviews -->


                <section class="comments listing-reviews">
                    <ul id="reviews-container">
                        @foreach ($initialReviews as $review)
                        <li>
                            <div class="avatar"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /></div>
                            <div class="comment-content">
                                <div class="arrow-comment"></div>
                                <div class="comment-by">
                                    {{ $review->user->name }}
                                    @if ($review->user->status == 1)
                                    &nbsp;<i class="tip" data-tip-content="Verified User"></i>
                                    @endif
                                    <span class="date">{{ \Carbon\Carbon::parse($review->created_at)->format('F Y') }}</span>
                                    <div class="star-rating" data-rating="{{ $review->stars }}"></div>
                                </div>
                                <p>{!! $review->review !!}</p>
                                <div class="review-images mfp-gallery-container">
                                    @foreach ($review->images as $image)
                                    <a href="{{ asset('business/review_images/' . $image) }}" class="mfp-gallery"><img src="{{ asset('/business/review_images/' . $image) }}" alt=""></a>
                                    @endforeach
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    @if($initialReviews->count() > 5)
                    <button class="button" id="see-more-reviews" data-page="2" data-business-id="{{ $business->id }}">See More</button>
                    @endif
                </section>



				<!-- Pagination -->
				<div class="clearfix"></div>
				<div class="row">
					<div class="col-md-12">
						<!-- Pagination -->
                        {{-- <button id="see-more-reviews" data-page="2" data-business-id="{{ $business->id }}">See More</button> --}}

						{{-- <div class="pagination-container margin-top-30">
							<nav class="pagination">
								<ul>
									<li><a href="#" class="current-page">1</a></li>
									<li><a href="#">2</a></li>
									<li><a href="#"><i class="sl sl-icon-arrow-right"></i></a></li>
								</ul>
							</nav>
						</div> --}}
					</div>
				</div>
				<div class="clearfix"></div>
				<!-- Pagination / End -->
			</div>


                    <!-- Subratings Container / End -->
            <form action="{{route('store.review')}}" method="POST" enctype="multipart/form-data"  class="add-comment">
                @csrf
                <input type="hidden" name="business_id" value="{{$business->id}}">
                <!-- Add Review Box -->

                <div id="add-review" class="add-review-box">
                    <!-- Add Review -->
                    <h3 class="listing-desc-headline margin-bottom-10">Add Review</h3>
                    @if ($errors->any())
                        <div class="alert alert-danger" style="color: red">
                            <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif
                    <p class="comment-notes">Your email address will not be published.</p>

                    @auth
                        <!-- Subratings Container -->
                        <div class="sub-ratings-container">

                            <!-- Subrating #1 -->
                            <div class="add-sub-rating">
                                <div class="sub-rating-title">Review <i class="tip"
                                        data-tip-content="Quality of customer service and attitude to work with you"></i></div>
                                <div class="sub-rating-stars">
                                    <!-- Leave Rating -->
                                    <div class="clearfix"></div>
                                    <div class="leave-rating">
                                        <input type="radio" name="stars" id="rating-1" value="5" />
                                        <label for="rating-1" class="fa fa-star"></label>
                                        <input type="radio" name="stars" id="rating-2" value="4" />
                                        <label for="rating-2" class="fa fa-star"></label>
                                        <input type="radio" name="stars" id="rating-3" value="3" />
                                        <label for="rating-3" class="fa fa-star"></label>
                                        <input type="radio" name="stars" id="rating-4" value="2" />
                                        <label for="rating-4" class="fa fa-star"></label>
                                        <input type="radio" name="stars" id="rating-5" value="1" />
                                        <label for="rating-5" class="fa fa-star"></label>
                                    </div>
                                </div>
                            </div>




                            <!-- Uplaod Photos -->
                            <div class="uploadButton margin-top-15">
                                <input class="uploadButton-input" type="file" name="images[]" accept="image/*, application/pdf"
                                    id="upload" multiple />
                                <label class="uploadButton-button ripple-effect" for="upload">Add Photos</label>
                                {{-- <span class="uploadButton-file-name"></span> --}}
                                <div class="selected-images-container">
                                    <ul id="selectedImagesList"></ul>
                                </div>
                            </div>
                            <!-- Uplaod Photos / End -->

                        </div>

                        <!-- Review Comment -->
                        <fieldset>

                            <div class="row">
                                <div class="col-md-12">
                                    <label>Name:</label>
                                    <input type="text" name="name"  />
                                </div>

                                {{-- <div class="col-md-6">
                                    <label>Email:</label>
                                    <input type="email" name="email"  />
                                </div> --}}
                            </div>

                            <div>
                                <label>Review:</label>
                                <textarea name="review" cols="40" rows="3"></textarea>
                            </div>

                        </fieldset>

                        <button class="button" type="submit">Submit Review</button>
                        <div class="clearfix"></div>
                    @else
                    <h2>Please Login to Add Review</h2>
                    <div class="d-flex" style="gap: 20px; padding: 30px 0px">
                        <a class="btn full-width theme-bg text-light fs-md" style="width: fit-content;" href="{{route('login')}}">Login</a>
                        <a class="btn full-width theme-bg text-light fs-md" style="width: fit-content;" href="{{route('register')}}">Register</a>
                    </div>
                    @endauth
                </div>


            </form>

			<!-- Add Review Box / End -->




						</div>

						<!-- Sidebar -->
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">

                            @if($business->status == 1)
                            <div class="jb-apply-form bg-white rounded py-4 px-4 box-static mb-4">

									<div class="form-group">
										<div class="verified-badge with-tip" data-tip-content="Listing has been verified and belongs the business owner or manager.">
                                            <i class="sl sl-icon-check"></i> Verified Listing
                                        </div>
									</div>

							</div>
                            @else
                            <div class="jb-apply-form bg-white rounded py-4 px-4 box-static mb-4">

                                <div class="form-group">
                                    <div class="verified-badge with-tip" data-tip-content="Listing has been verified and belongs the business owner or manager." style="background-color: #000">
                                        <i class="sl sl-icon-check"></i>  Not verified Listing
                                    </div>
                                </div>

                        </div>
                            @endif



							<!-- Business Inof -->
							<div class="jb-apply-form bg-white rounded py-4 px-4 box-static mb-4">
								<div class="uli-list-info">
									<ul>
                                        @if (isset($business->website))
                                            <li>
                                                <a href="{{$business->website}}" target="_blank">
                                                    <div class="list-uiyt">
                                                        <div class="list-iobk"><i class="fas fa-globe"></i></div>
                                                        <div class="list-uiyt-capt"><h5>Live Site</h5><p>{{$business->website}}</p></div>
                                                    </div>
                                                </a>
                                            </li>
                                        @endif
										<li>
                                            <a href="mailto:{{$business->email}}">
                                                <div class="list-uiyt">
                                                    <div class="list-iobk"><i class="fas fa-envelope"></i></div>
                                                    <div class="list-uiyt-capt"><h5>Drop a Mail</h5><p>{{$business->email}}</p></div>
                                                </div>
                                            </a>
										</li>

										<li>
                                            <a href="tel:{{$business->phone}}">
                                                <div class="list-uiyt">
                                                    <div class="list-iobk"><i class="fas fa-phone"></i></div>
                                                    <div class="list-uiyt-capt"><h5>Call Us</h5><p>{{$business->phone}}</p></div>
                                                </div>
                                            </a>
										</li>
                                        @if (isset($business->sms))
                                            <li>
                                                <a href="sms:{{$business->sms}}">
                                                    <div class="list-uiyt">
                                                        <div class="list-iobk"><i class="fas fa-sms"></i></div>
                                                        <div class="list-uiyt-capt"><h5>SMS</h5><p>{{$business->sms}}</p></div>
                                                    </div>
                                                </a>
                                            </li>
                                        @endif
                                        @if (isset($business->gmb))
                                            <li>
                                                <a href="{{$business->gmb}}" target="_blank">
                                                    <div class="list-uiyt">
                                                        <div class="list-iobk"><i class="fas fa-map-marker-alt"></i></div>
                                                        <div class="list-uiyt-capt"><h5>Get Directions</h5><p>{{$business->address}}</p></div>
                                                    </div>
                                                </a>
                                            </li>
                                        @endif
                                        @if (isset($business->whatsapp))
										<li>
                                            <a href="https://wa.me/{{$business->whatsapp}}"  target="_blank">
											<div class="list-uiyt">
												<div class="list-iobk"><i class="fab fa-whatsapp"></i></div>
												<div class="list-uiyt-capt"><h5>Whatsapp</h5><p>{{$business->whatsapp}}</p></div>
											</div>
                                            </a>
										</li>
                                        @endif
                                        @if (isset($business->fb))
                                            <li>
                                                <a href="{{$business->fb}}" target="_blank">
                                                    <div class="list-uiyt">
                                                        <div class="list-iobk"><i class="fab fa-facebook-f"></i></div>
                                                        <div class="list-uiyt-capt"><h5>Facebook</h5></div>
                                                    </div>
                                                </a>
                                            </li>
                                        @endif
                                        @if (isset($business->inst))
                                            <li>
                                                <a href="{{$business->inst}}" target="_blank">
                                                    <div class="list-uiyt">
                                                        <div class="list-iobk"><i class="fab fa-instagram"></i></div>
                                                        <div class="list-uiyt-capt"><h5>Instagram</h5></div>
                                                    </div>
                                                </a>
                                            </li>
                                        @endif
                                        @if (isset($business->youtube))
                                            <li>
                                                <a href="{{$business->youtube}}" target="_blank">
                                                    <div class="list-uiyt">
                                                        <div class="list-iobk"><i class="fab fa-youtube"></i></div>
                                                        <div class="list-uiyt-capt"><h5>Youtube</h5></div>
                                                    </div>
                                                </a>
                                            </li>
                                        @endif
                                        @if (isset($business->yelp))
                                            <li>
                                                <a href="{{$business->yelp}}" target="_blank">
                                                    <div class="list-uiyt">
                                                        <div class="list-iobk"><i class="fab fa-yelp"></i></div>
                                                        <div class="list-uiyt-capt"><h5>Yelp</h5></div>
                                                    </div>
                                                </a>
                                            </li>
                                        @endif
									</ul>
								</div>
							</div>

                            <div class="jb-apply-form bg-white rounded py-4 px-4 box-static mb-4">

                                <div class="form-group">
                                    <a href="tel:{{$business->phone}}" type="button" class="btn btn-md rounded theme-bg text-light ft-medium fs-sm full-width">Call Now</a>
                                </div>

                        </div>

							<div class="row g-3 mb-3">
							   	<div class="col-4"><div class="sharethis-inline-share-buttons"></div></div>
							</div>

						</div>

					</div>
				</div>
			</section>
			<!-- ============================ Listing Details End ================================== -->

            @if (isset($relatedbusiness))
			<!-- ======================= Related Listings ======================== -->
			<section class="space min">
				<div class="container">

					<div class="row justify-content-center">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="sec_title position-relative text-center mb-5">
								<h6 class="theme-cl mb-0">Related Listing</h6>
								<h2 class="ft-bold">Recently Viewed Listing</h2>
							</div>
						</div>
					</div>

					<!-- row -->
					<div class="row justify-content-center">
                    @foreach ($relatedbusiness as $item)
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
                                </div>
                                <div class="Goodup-grid-fl-wrap">
                                    <div class="Goodup-caption px-3 py-2">
                                        <div class="Goodup-author"><a href="{{route('business.single')}}/{{$item->slug}}"><img
                                                    src="{{asset('business/logo')}}/{{$item->logo}}" class="img-fluid circle" alt=""></a></div>
                                        <h4 class="mb-0 ft-medium medium"><a href="{{route('business.single')}}/{{$item->slug}}"
                                                class="text-dark fs-md">{{$item->name}}</a></h4>
                                        <div class="Goodup-location"><i class="fas fa-map-marker-alt me-1 theme-cl"></i>{{$item->address}}</div>
                                        <div class="Goodup-middle-caption mt-3">
                                            <p>{!! Str::limit($item->description, 100) !!}</p>

                                        </div>
                                    </div>
                                    <div class="Goodup-grid-footer py-2 px-3">
                                        <div class="Goodup-ft-last">
                                            <div class="Goodup-inline">
                                                <div class="Goodup-bookmark-btn"><a href="mailto:{{$item->email}}"><i
                                                            class="lni lni-envelope position-absolute"></i></a></div>
                                                <div class="Goodup-bookmark-btn"><a href="tel:{{$item->phone}}"><i
                                                            class="lni lni-phone position-absolute"></i></a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach


					</div>
					<!-- row -->

				</div>
			</section>
			<!-- ======================= Related Listings ======================== -->
			@endif

    @include('layouts.partials.footer')


    <!-- Back To Top Button -->
    <a id="tops-button" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>


    </div>
    <!-- Wrapper / End -->

    @include('sweetalert::alert')
    @yield('js')
    @include('layouts.partials.front-scripts')
    <script>
    $(document).ready(function() {
        $('#see-more-reviews').on('click', function() {
            var businessId = $(this).data('business-id');
            var page = $(this).data('page');

            $.ajax({
                url: '/businesses/' + businessId + '/reviews?page=' + page,
                type: 'GET',
                success: function(response) {
                    if (response.data.length > 0) {
                        response.data.forEach(function(review) {
                            var reviewHtml = '<li>' +
                                             '<div class="avatar"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /></div>' +
                                             '<div class="comment-content">' +
                                             '<div class="arrow-comment"></div>' +
                                             '<div class="comment-by">' + review.user.name;
                            if (review.user.status == 1) {
                                reviewHtml += '&nbsp;<i class="tip" data-tip-content="Verified User"></i>';
                            }
                            reviewHtml += '<span class="date">' + new Date(review.created_at).toLocaleString('default', { month: 'long', year: 'numeric' }) + '</span>' +
                                          '<div class="star-rating" data-rating="' + review.stars + '"></div>' +
                                          '</div>' +
                                          '<p>' + review.review + '</p>' +
                                          '<div class="review-images mfp-gallery-container">';
                            if (review.images) {
                                review.images.forEach(function(image) {
                                    reviewHtml += '<a href="/business/review_images/' + image + '" class="mfp-gallery"><img src="/business/review_images/' + image + '" alt=""></a>';
                                });
                            }
                            reviewHtml += '</div></div></li>';

                            $('#reviews-container').append(reviewHtml);
                        });

                        if (response.next_page_url) {
                            $('#see-more-reviews').data('page', page + 1);
                        } else {
                            $('#see-more-reviews').hide();
                        }
                    } else {
                        $('#see-more-reviews').hide();
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error: ', status, error);
                }
            });
        });
    });
    </script>

</script>
<script>
    $(document).ready(function() {
        $('#upload').change(function() {
            var fileList = this.files;
            var imageList = $('#selectedImagesList');

            imageList.empty(); // Clear previous selections

            for (var i = 0; i < fileList.length; i++) {
                var file = fileList[i];
                var reader = new FileReader();

                reader.onload = function(e) {
                    var imgSrc = e.target.result;
                    var listItem = $('<li class="selected-image-item"><img src="' + imgSrc + '" /><span class="remove-image">Remove</span></li>');
                    listItem.find('.remove-image').click(function() {
                        $(this).parent().remove();
                    });
                    imageList.append(listItem);
                }

                reader.readAsDataURL(file);
            }
        });
    });
</script>

    </script>
</body>
</html>
