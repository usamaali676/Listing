@extends('layouts.master')
@section('front')

<section class="cats-filters py-3">
    <div class="container">
        <div class="row justify-content-between align-items-center">

            <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                <div class="Goodup-all-drp">


                    @foreach ($cities as $item)
                    @php
                            $i = 1;
                        @endphp
                    <div class="Goodup-single-drp small">
                        <div class="btn-group">
                            <button type="button" class="{{$item->area}}"  id="cities_{{$i++}}" style="padding: 6px 15px 6px 15px; border-radius: 50px; font-size: 13px; box-shadow: none !important; border: 1px solid #e5e6e8; background: white; color: #2f363e;">{{$item->area}}</button>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</section>
<div class="clearfix"></div>


<section class="gray py-5">
    <div class="container">
        <div class="row">

            <!-- Item Wrap Start -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">

                <!-- row -->
                <div class="row justify-content-center g-2">

                    <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">State</a></li>
                                <li class="breadcrumb-item"><a href="#">{{$state->name}}</a></li>
                                {{-- <li class="breadcrumb-item active" aria-current="page">Restaurants</li> --}}
                            </ol>
                        </nav>
                        <div class="">

                            <h2 class="ft-bold">{{$state->name}}</h2>


                        </div>
                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                            <div id="loader" class="lds-dual-ring hidden bg-overlay"></div>
                        <div class="d-block grouping-listings" id="mainajax" >
                            <div class="d-block grouping-listings-title">
                                <h5 class="ft-medium mb-3">Sponsored Results</h5>
                            </div>
                            @foreach ($business as $item)
                            <!-- Single Item -->
                            <div class="grouping-listings-single">
                                <div class="vrt-list-wrap">

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="vrt-list-thumb">
                                                    <div class="vrt-list-thumb-figure" style="height: 220px; width: 600px;">
                                                        <a href="{{route('business.single')}}/{{$item->slug}}"><img src="{{asset('business/feature')}}/{{$item->featureImage}}" class="img-fluid" alt="" /></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6" style="margin: auto">
                                                <div class="vrt-list-content">
                                                    <h4 class="mb-0 ft-medium"><a href="{{route('business.single')}}/{{$item->slug}}" class="text-dark fs-md">{{$item->name}}</a></h4>
                                                    <div class="vrt-list-features mt-2 mb-2">
                                                        <ul>
                                                            @foreach ($item->cat as $list)
                                                            <li><a href="javascript:void(0);">{{$list->name}}</a></li>
                                                            @endforeach

                                                        </ul>
                                                    </div>


                                                    <div class="vrt-list-desc">
                                                        <p class="vrt-qgunke">{!! Str::limit($item->description , 100) !!}</p>
                                                    </div>

                                                    <div class="vrt-list-amenties py-2">
                                                        <i class="fas fa-map" style="color: #F41B3B"></i>&nbsp;&nbsp;<span>{{$item->address}}</span><br>
                                                    </div>
                                                    <div class="vrt-list-amenties">
                                                        <i class="fas fa-phone" style="color: #F41B3B"></i>&nbsp;&nbsp;<span>{{$item->phone}}</span><br>
                                                    </div>
                                                    <div class="vrt-list-amenties py-2">
                                                        <i class="fas fa-envelope" style="color: #F41B3B"></i>&nbsp;&nbsp;<span>{{$item->email}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>





                </div>
                <!-- row -->

            </div>

        </div>
    </div>
</section>


{{-- <div id="titlebar">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>{{$state->name}}</h2>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="#">Home</a></li>
						<li>{{$state->name}}</li>
					</ul>
				</nav>

			</div>
		</div>
	</div>
</div> --}}


<!-- Content
================================================== -->
{{-- <div class="container">
		<div class="row">
			<div class="col-md-12 ">

			<!-- Filters -->



				<div id="filters">
					<ul  class="option-set margin-bottom-30" >
                        <li><a href="" class="new selected" data-filter="*">All</a></li>
                        @foreach ($cities as $item)
                        @php
                            $i = 1;
                        @endphp
                        <li class="{{$item->area}}"  id="cities_{{$i++}}"><a href="#" class="new" >{{$item->area}}</a></li>
                        @endforeach
					</ul>
					<div class="clearfix"></div>
				</div>

			</div>
		</div>

	<div class="row" style="padding-bottom: 100px;">

		<!-- Projects -->
		<div class="projects isotope-wrapper" id="mainajax"  >

            @foreach ($business as $item)
            <!-- Listing Item -->
				<div class="col-lg-4 col-md-6 isotope-item first-filter">
					<a href="{{route('business.single')}}/{{$item->slug}}" class="listing-item-container compact">
						<div class="listing-item">
							<img src="{{asset('business/feature')}}/{{$item->featureImage}}" alt="">

							<div class="listing-badge now-open">Now Open</div>

							<div class="listing-item-content">
								<h3>{{$item->name}}</h3>
								<span>{{$item->address}}</span>
							</div>
							<span class="like-icon"></span>
						</div>
					</a>
				</div>
				<!-- Listing Item / End -->
            @endforeach




		</div>
        <div class="row">
            <div class="col-md-12 clearfix text-center py-md-5" style="padding: 15px 0">
                <!-- Pagination -->
                {{$business->links()}}

            </div>
        </div>

	</div>
</div> --}}


@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
    $(".new").click(function () {
        $(".new").removeClass("selected");
        $(this).addClass("selected");
    });
});
</script>
<script>
    $(document).ready(function(){

        $('[id^="cities_"]').click(function(){
            var city = $(this).attr("class");
            // alert(city);
                        $.ajax({
                url: "{{route('cities')}}/{{$state->name}}",
                type: "GET",
                data:{'city': city},
                beforeSend: function () { // Before we send the request, remove the .hidden class from the spinner and default to inline-block.
                $('#loader').removeClass('hidden')
            },
                success: function(data){
                   var business = data.business;
                   var html = '';
                   if(business.length > 0){
                    for(let i = 0; i < business.length; i++){
                        html += '<div class="grouping-listings-single">\
                                <div class="vrt-list-wrap">\
                                        <div class="row">\
                                            <div class="col-sm-6">\
                                                <div class="vrt-list-thumb">\
                                                    <div class="vrt-list-thumb-figure" style="height: 220px; width: 600px;">\
                                                        <img src="{{asset('business/feature')}}/'+business[i]['featureImage']+'" class="img-fluid" alt="" />\
                                                    </div>\
                                                </div>\
                                            </div>\
                                            <div class="col-sm-6">\
                                                <div class="vrt-list-content">\
                                                    <h4 class="mb-0 ft-medium"><a href="{{route('business.single')}}/'+business[i]['slug']+'" class="text-dark fs-md">'+business[i]['name']+'</a></h4>\
                                                    <div class="vrt-list-desc">\
                                                        <p style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; line-clamp: 2; -webkit-box-orient: vertical;">'+business[i]['description']+'</p>\
                                                    </div>\
                                                    <div class="vrt-list-amenties py-2">\
                                                        <i class="fas fa-map" style="color: #F41B3B"></i>&nbsp;&nbsp;<span>'+business[i]['address']+'</span><br>\
                                                    </div>\
                                                    <div class="vrt-list-amenties">\
                                                        <i class="fas fa-phone" style="color: #F41B3B"></i>&nbsp;&nbsp;<span>'+business[i]['phone']+'</span><br>\
                                                    </div>\
                                                    <div class="vrt-list-amenties py-2">\
                                                        <i class="fas fa-envelope" style="color: #F41B3B"></i>&nbsp;&nbsp;<span>'+business[i]['email']+'</span>\
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

            });
        });
    });
</script>
{{-- <script>
	$(window).load(function(){
	  var $container = $('.isotope-wrapper');
	  $container.isotope({ itemSelector: '.isotope-item', layoutMode: 'masonry' });
	});

	$('#filters a').click(function(e){
	  e.preventDefault();

	  var selector = $(this).attr('data-filter');
	  $('.projects.isotope-wrapper').isotope({ filter: selector });

	  $(this).parents('ul').find('a').removeClass('selected');
	  $(this).addClass('selected');
	});
</script> --}}
@endsection
