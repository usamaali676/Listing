@extends('layouts.master')
@section('front')

<!-- ============================ Search Tag & Filter Start ================================== -->
{{-- <section class="cats-filters py-3">
    <div class="container">
        <div class="row justify-content-between align-items-center">

            <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                <div class="Goodup-all-drp">

                    <div class="Goodup-single-drp small">
                        <div class="btn-group">
                            <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Restaurants</button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#"><img src="assets/img/icons/fast-delivery.png" class="img-fluid" width="20" alt="" />Delivery</a></li>
                                <li><a class="dropdown-item" href="#"><img src="assets/img/icons/burger.png" class="img-fluid" width="20" alt="" />Burgers</a></li>
                                <li><a class="dropdown-item" href="#"><img src="assets/img/icons/booking.png" class="img-fluid" width="20" alt="" />Reservations</a></li>
                                <li><a class="dropdown-item" href="#"><img src="assets/img/icons/house.png" class="img-fluid" width="20" alt="" />Japanese</a></li>
                                <li><a class="dropdown-item" href="#"><img src="assets/img/icons/chinese-food.png" class="img-fluid" width="20" alt="" />Chinese</a></li>
                                <li><a class="dropdown-item" href="#"><img src="assets/img/icons/mexican-hat.png" class="img-fluid" width="20" alt="" />Mekician</a></li>
                                <li><a class="dropdown-item" href="#"><img src="assets/img/icons/dish.png" class="img-fluid" width="20" alt="" />Italian</a></li>
                                <li><a class="dropdown-item" href="#"><img src="assets/img/icons/tom-yum.png" class="img-fluid" width="20" alt="" />Thai</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="Goodup-single-drp small">
                        <div class="btn-group">
                            <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Home Services</button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#"><img src="assets/img/icons/hammer.png" class="img-fluid" width="20" alt="" />Contractors</a></li>
                                <li><a class="dropdown-item" href="#"><img src="assets/img/icons/coconut-tree.png" class="img-fluid" width="20" alt="" />Landscaping</a></li>
                                <li><a class="dropdown-item" href="#"><img src="assets/img/icons/broken-cable.png" class="img-fluid" width="20" alt="" />Electricians</a></li>
                                <li><a class="dropdown-item" href="#"><img src="assets/img/icons/padlock.png" class="img-fluid" width="20" alt="" />Locksmiths</a></li>
                                <li><a class="dropdown-item" href="#"><img src="assets/img/icons/basket.png" class="img-fluid" width="20" alt="" />Home Cleaning</a></li>
                                <li><a class="dropdown-item" href="#"><img src="assets/img/icons/delivery-truck.png" class="img-fluid" width="20" alt="" />Movers</a></li>
                                <li><a class="dropdown-item" href="#"><img src="assets/img/icons/home.png" class="img-fluid" width="20" alt="" />HVAC</a></li>
                                <li><a class="dropdown-item" href="#"><img src="assets/img/icons/plumbering.png" class="img-fluid" width="20" alt="" />Plumbers</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="Goodup-single-drp small">
                        <div class="btn-group">
                            <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Auto Services</button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#"><img src="assets/img/icons/wrench.png" class="img-fluid" width="20" alt="" />Auto Repairs</a></li>
                                <li><a class="dropdown-item" href="#"><img src="assets/img/icons/rental-car.png" class="img-fluid" width="20" alt="" />Car Dealers</a></li>
                                <li><a class="dropdown-item" href="#"><img src="assets/img/icons/sketch.png" class="img-fluid" width="20" alt="" />Auto Detailing</a></li>
                                <li><a class="dropdown-item" href="#"><img src="assets/img/icons/oil.png" class="img-fluid" width="20" alt="" />Oil Change</a></li>
                                <li><a class="dropdown-item" href="#"><img src="assets/img/icons/shopping-bag.png" class="img-fluid" width="20" alt="" />Body Shops</a></li>
                                <li><a class="dropdown-item" href="#"><img src="assets/img/icons/parking.png" class="img-fluid" width="20" alt="" />Parking</a></li>
                                <li><a class="dropdown-item" href="#"><img src="assets/img/icons/car-wash.png" class="img-fluid" width="20" alt="" />Car Wash</a></li>
                                <li><a class="dropdown-item" href="#"><img src="assets/img/icons/tow-truck.png" class="img-fluid" width="20" alt="" />Towing</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="Goodup-single-drp small">
                        <div class="btn-group">
                            <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">More</button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#"><img src="assets/img/icons/towel-hanger.png" class="img-fluid" width="20" alt="" />Dry Cleaning</a></li>
                                <li><a class="dropdown-item" href="#"><img src="assets/img/icons/salon.png" class="img-fluid" width="20" alt="" />Hair salons</a></li>
                                <li><a class="dropdown-item" href="#"><img src="assets/img/icons/smartphone.png" class="img-fluid" width="20" alt="" />Phone Repair</a></li>
                                <li><a class="dropdown-item" href="#"><img src="assets/img/icons/weights.png" class="img-fluid" width="20" alt="" />Gyms</a></li>
                                <li><a class="dropdown-item" href="#"><img src="assets/img/icons/cocktail.png" class="img-fluid" width="20" alt="" />Bars & cafe</a></li>
                                <li><a class="dropdown-item" href="#"><img src="assets/img/icons/spa.png" class="img-fluid" width="20" alt="" />Massage</a></li>
                                <li><a class="dropdown-item" href="#"><img src="assets/img/icons/poinsettia.png" class="img-fluid" width="20" alt="" />Nightlife</a></li>
                                <li><a class="dropdown-item" href="#"><img src="assets/img/icons/online-shopping.png" class="img-fluid" width="20" alt="" />Shopping</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="Goodup-single-drp small">
                        <div class="btn-group">
                            <button type="button" class="btn bg-dark text-light">Update</button>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section> --}}
<div class="clearfix"></div>
<!-- ============================ Search Tag & Filter End ================================== -->


<!-- ============================ Main Section Start ================================== -->
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
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Search</a></li>
                                {{-- <li class="breadcrumb-item active" aria-current="page">Restaurants</li> --}}
                            </ol>
                        </nav>
                        <div class="">
                            @if (isset($search))
                            <h2 class="ft-bold">{!! $search !!}</h2>
                            @endif
                            @if (isset($catsearch))
                            <h2 class="ft-bold">Category: {!! $catsearch !!}</h2>
                            @endif
                            @if (isset($location))
                            <h2 class="ft-bold">Location: {!! $location !!}</h2>
                            @endif

                        </div>
                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                        <div class="d-block grouping-listings">
                            <div class="d-block grouping-listings-title">
                                <h5 class="ft-medium mb-3">Sponsored Results</h5>
                            </div>
                            @if($searchbusiness->count() > 0)
                            @foreach ($searchbusiness as $item)
                            <!-- Single Item -->
                            <div class="grouping-listings-single">
                                <div class="vrt-list-wrap">

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="vrt-list-thumb">
                                                    <div class="vrt-list-thumb-figure" style="height: 220px; width: 600px;">
                                                        <a href="{{route('business.single')}}/{{$item->slug}}"><img src="{{('business/feature')}}/{{$item->featureImage}}" class="img-fluid" alt="" /></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="vrt-list-content">
                                                    <h4 class="mb-0 ft-medium"><a href="{{route('business.single')}}/{{$item->slug}}" class="text-dark fs-md">{{$item->name}}<span class="verified-badge"><i class="fas fa-check-circle"></i></span></a></h4>
                                                    <div class="vrt-list-features mt-2 mb-2">
                                                        <ul>
                                                            @foreach ($item->cat as $list)
                                                            <li><a href="javascript:void(0);">{{$list->name}}</a></li>
                                                            @endforeach

                                                        </ul>
                                                    </div>

                                                    <div class="vrt-list-desc">
                                                        <p class="vrt-qgunke">{{Str::limit($item->description , 100)}}</p>
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
                            @else
                            <h2>No Recode Found</h2>
                            @endif

                        </div>
                    </div>



                    <!--<div class="col-lg-12 col-md-12 col-sm-12">-->
                    <!--    <div class="list-411">-->
                    <!--        <div class="list-412">-->
                    <!--            <h4 class="ft-bold mb-0">Can't find the business?</h4>-->
                    <!--            <span>Adding a business to Goodup is always free.</span>-->
                    <!--        </div>-->
                    <!--        <div class="list-413">-->
                    <!--            <a class="btn text-light theme-bg rounded" href="#">Add business</a>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->



                </div>
                <!-- row -->

            </div>

        </div>
    </div>
</section>
<!-- ============================ Main Section End ================================== -->


@endsection
