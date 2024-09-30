@extends('layouts.master')
@section('css')
<style>
    .main-search-item{
        height: 45px;
    }
    .half-column .main-search-item{
        width: 100%;
    }
    .main-search-item .form-control{
        height: 45px !important;
    }
    .main-search-button .btn{
        height: 45px;
    }
    .gup_blg_grid_thumb img {
    height: 250px;
    }

</style>
@endsection
@section('meta')
<title>Blogs | Local Beings</title>
<meta name="title" content="Blogs | Local Beings">
 <meta content="Explore our blog for insightful articles and the latest trends across various industries. Stay informed and inspired with fresh content on local businesses." name="description">
@endsection
@section('front')

			<!-- ======================= Top Breadcrubms ======================== -->
			<div class="bg-dark py-3">
				<div class="container">
					<div class="row">
						<div class="colxl-6 col-lg-6 col-md-6" style="margin: auto;">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="#" class="text-light">Home</a></li>
									<li class="breadcrumb-item"><a href="#" class="text-light">Pages</a></li>
									<li class="breadcrumb-item active theme-cl" aria-current="page">Blogs</li>
								</ol>
							</nav>
						</div>
						<div class="colxl-6 col-lg-6 col-md-6">
							<nav aria-label="breadcrumb">
                                <form class="main-search-wrap fl-wrap half-column" style="margin: 0px;float: right; width: 70%;">
                                    <div class="main-search-item">
                                        <input type="text" class="form-control" placeholder="Category"  id="blog_search"/>
                                    </div>
                                    <div class="main-search-button">
                                        {{-- <button class="btn full-width theme-bg text-white" type="button" ><i class="fas fa-search"></i></button> --}}
                                    </div>
                                </form>
							</nav>
						</div>
					</div>
				</div>
			</div>
			<!-- ======================= Top Breadcrubms ======================== -->

			<!-- ======================= Blog Start ============================ -->
			<section class="middle">
				<div class="container">

					<div class="row justify-content-center">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="sec_title position-relative text-center mb-5">
								<h6 class="theme-cl mb-0">Latest Updates</h6>
								<h2 class="ft-bold">Our Blogs</h2>
							</div>
						</div>
					</div>

					<div class="row justify-content-center" id="mainajax">
                        @foreach ($blog as $item)
                        	<!-- Single Item -->
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                <div class="gup_blg_grid_box">
                                    <div class="gup_blg_grid_thumb">
                                        <a href="{{route('business.single')}}/{{$item->slug}}"><img src="{{asset('business/blog_feature')}}/{{$item->image}}" class="img-fluid" alt=""></a>
                                    </div>
                                    <div class="gup_blg_grid_caption">
                                        <div class="blg_tag"><span>{{$item->category->name}}</span></div>
                                        <div class="blg_title"><h4><a href="{{route('business.single')}}/{{$item->slug}}">{{$item->title}}</a></h4></div>
                                        <div class="blg_desc"><p>{!! Str::limit($item->description, 100) !!}</p></div>
                                    </div>
                                    <div class="crs_grid_foot">
                                        <div class="crs_flex d-flex align-items-center justify-content-between br-top px-3 py-2">
                                            <div class="crs_fl_first">

                                            </div>
                                            <div class="crs_fl_last">
                                                <div class="foot_list_info">
                                                    <ul>
                                                        <li><div class="elsio_ic"><i class="fa fa-clock text-warning"></i></div><div class="elsio_tx">{{ Carbon\Carbon::parse($item->created_at)->format('d M  Y') }}</div></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach


					</div>



				</div>
			</section>
			<!-- ======================= Blog Start ============================ -->


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
@section('js')
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

@endsection
