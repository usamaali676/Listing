@extends('layouts.master')
@section('meta')
<title>Explore Local Listings | Local Beings</title>
<meta name="title" content="Explore Local Listings | Local Beings">
 <meta content="Discover a variety of local businesses in one convenient place. Browse our listings to find and choose the perfect spot for your needs." name="description">
@endsection
@section('front')

    <!-- ======================= Top Breadcrubms ======================== -->
			<div class="bg-dark py-3">
				<div class="container">
					<div class="row">
						<div class="colxl-12 col-lg-12 col-md-12">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{route('front')}}" class="text-light">Home</a></li>
									<li class="breadcrumb-item"><a href="#" class="text-light">Pages</a></li>
									<li class="breadcrumb-item active theme-cl" aria-current="page">Listing</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
			</div>
			<!-- ======================= Top Breadcrubms ======================== -->


<!-- ============================ Main Section Start ================================== -->
<section class="gray py-5">
    <div class="container">
        <div class="row">

            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12">
                <div class="bg-white rounded mb-4">

                    <div class="sidebar_header d-flex align-items-center justify-content-between px-4 py-3 br-bottom">
                        <h4 class="ft-medium fs-lg mb-0">Search Filter</h4>
                        <div class="ssh-header">
                            <a href="{{route('listing')}}" class="clear_all ft-medium text-muted">Clear All</a>
                            <a href="#search_open" data-bs-toggle="collapse" aria-expanded="false" role="button" class="collapsed _filter-ico ml-2"><i class="lni lni-text-align-right"></i></a>
                        </div>
                    </div>

                    <!-- Find New Property -->
                    <div class="sidebar-widgets collapse miz_show" id="search_open" data-bs-parent="#search_open">
                        <div class="search-inner">

                            <div class="side-filter-box">
                                <div class="side-filter-box-body">



                                    <!-- Suggested -->
                                    <div class="inner_widget_link">
                                        <h6 class="ft-medium">Category</h6>
                                        <ul class="no-ul-list filter-list">
                                            @php
                                                $j = 1;
                                            @endphp
                                        @foreach ($businessCategory as $item)
                                            <li class="py-2">
                                                <input id="category_{{$j}}"  value="{{$item->name}}" name="category" type="radio">
                                                <label for="category_{{$j}}" >{{$item->name}}</label>
                                            </li>
                                        @php
                                            $j++;
                                        @endphp
                                        @endforeach

                                        </ul>
                                    </div>


                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Sidebar End -->

            </div>

            <!-- Item Wrap Start -->
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12">
                <div id="loader" class="lds-dual-ring hidden bg-overlay"></div>
                <!-- row -->
                <div class="row justify-content-center gx-3" id="mainajax">
                @foreach ($business as $item)
                    <!-- Single -->
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
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
                                        <p>{!! Str::limit(strip_tags($item->description), 50) !!}</p>
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
                <!-- /row -->

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <ul class="pagination">
                            <li>{{$business->links()}}</li>
                        </ul>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>
<!-- ============================ Main Section End ================================== -->

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
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $('input[name^="category"]').change(function(){
         if(this.checked) {
            var category = $(this).val();
                $.ajax({
            url: "{{route('filter')}}",
            type: "GET",
            data: {'category': category},
            beforeSend: function () { // Before we send the request, remove the .hidden class from the spinner and default to inline-block.
                $('#loader').removeClass('hidden')
            },
            success: function(data) {
                var business = data.business;
                // console.log(business);
                var html = '';

                // Define the function to strip HTML tags
                function stripHtml(html) {
                            let div = document.createElement('div');
                            div.innerHTML = html;
                            return div.textContent || div.innerText || '';
                        }
                // var cat = business['cat'] ;
                // console.log(cat);.
                if(business.length > 0){
                    for(let i = 0; i < business.length; i++){
                        // var cat = business[i].cat;
                        // console.log(cat);
                        // Strip HTML tags from the description
                        let cleanDescription = stripHtml(business[i]['description']);
                        html += '<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">\
                        <div class="Goodup-grid-wrap">\
                            <div class="Goodup-grid-upper">\
                                <div class="Goodup-pos ab-left">\
                                    <div class="Goodup-featured-tag">'+category+'</div>\
                                </div>\
                                <div class="Goodup-grid-thumb">\
                                    <a href="{{route('business.single')}}/'+business[i]['slug']+'" class="d-block text-center m-auto"><img src="{{asset('business/feature')}}/'+business[i]['featureImage']+'" class="img-fluid" alt=""></a>\
                                </div>\
                            </div>\
                            <div class="Goodup-grid-fl-wrap">\
                                <div class="Goodup-caption px-3 py-2">\
                                    <div class="Goodup-author"><a href="{{route('business.single')}}/'+business[i]['slug']+'"><img src="{{asset('business/logo')}}/'+business[i]['logo']+'" class="img-fluid circle" alt=""></a></div>\
                                    <h4 class="mb-0 ft-medium medium"><a href="{{route('business.single')}}/'+business[i]['slug']+'" class="text-dark fs-md">'+business[i]['name']+'</a></h4>\
                                    <div class="Goodup-location"><i class="fas fa-map-marker-alt me-1 theme-cl"></i>'+business[i]['address']+'</div>\
                                    <div class="Goodup-middle-caption mt-3">\
                                        <p style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; line-clamp: 2; -webkit-box-orient: vertical;">'+ cleanDescription +'</p>\
                                    </div>\
                                </div>\
                                <div class="Goodup-grid-footer py-2 px-3">\
                                    <div class="Goodup-ft-last">\
                                        <div class="Goodup-inline">\
                                            <div class="Goodup-bookmark-btn"><a href="mailto:'+business[i]['email']+'"><i class="lni lni-envelope position-absolute"></i></a></div>\
                                            <div class="Goodup-bookmark-btn"><a href="tel:'+business[i]['phone']+'"><i class="lni lni-phone position-absolute"></i></a></div>\
                                        </div>\
                                    </div>\
                                </div>\
                            </div>\
                        </div>\
                    </div>'
                    }
                }
                else{
                    html += '<h2>No Data Found</h2>'
                }
                $("#mainajax").html(html);
            },
            complete: function () { // Set our complete callback, adding the .hidden class and hiding the spinner.
                $('#loader').addClass('hidden')
            },
            error: function() {
                console.log("No Data Available");
            }
        });
    }
    });
});
</script>
@endsection
