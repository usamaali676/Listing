@extends('layouts.master')
@section('front')


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
                                <li class="breadcrumb-item"><a href="#">Category</a></li>
                                {{-- <li class="breadcrumb-item active" aria-current="page">Restaurants</li> --}}
                            </ol>
                        </nav>
                        <div class="">
                            <h2 class="ft-bold">{!! $category->name !!}</h2>

                        </div>
                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                        <div class="d-block grouping-listings">
                            <div class="d-block grouping-listings-title">
                                <h5 class="ft-medium mb-3">Sponsored Results</h5>
                            </div>
                            @foreach ($category->businesses as $item)
                            @if ($item->status == 1)
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
                                            <div class="col-sm-6">
                                                <div class="vrt-list-content" style="padding-top: 10px;">
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
                            @endif
                            @endforeach

                        </div>
                    </div>

                    {{-- <div class="col-lg-12 col-md-12 col-sm-12">
                        <ul class="pagination">
                            <li class="page-item">
                              <a class="page-link" href="#" aria-label="Previous">
                                <span class="fas fa-arrow-circle-right"></span>
                                <span class="sr-only">Previous</span>
                              </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item active"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">...</a></li>
                            <li class="page-item"><a class="page-link" href="#">18</a></li>
                            <li class="page-item">
                              <a class="page-link" href="#" aria-label="Next">
                                <span class="fas fa-arrow-circle-right"></span>
                                <span class="sr-only">Next</span>
                              </a>
                            </li>
                        </ul>
                    </div> --}}

                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="list-411">
                            <div class="list-412">
                                <h4 class="ft-bold mb-0">Can't find the business?</h4>
                                <span>Adding a business to Goodup is always free.</span>
                            </div>
                            <div class="list-413">
                                <a class="btn text-light theme-bg rounded" href="{{route('login')}}">Add business</a>
                            </div>
                        </div>
                    </div>



                </div>
                <!-- row -->

            </div>

        </div>
    </div>
</section>
<!-- ============================ Main Section End ================================== -->


@endsection
