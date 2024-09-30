<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="index, follow">
    <title>{{$blog->meta_title}}</title>
    <meta name="keywords" content="{{$blog->meta_keyword}}">
    <meta name="description" content="{{$blog->meta_description}}">
    @include('layouts.partials.headFront')
    <style>
        p img {
            width: 800px !important;
            height: 400px !important;
        }
    </style>
    {{-- <style>
        p img {
            width: 800px !important;
            height: 400px !important;
        }
    </style> --}}

</head>

<body class="dark-header_">

    <!-- Wrapper -->
    <div id="main-wrapper">

        @include('layouts.partials.nav')
        <div class="clearfix"></div>

        <!-- ============================ Page Title Start================================== -->
        <section class="page-title gray">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">

                        <div class="breadcrumbs-wrap">
                            <h2 class="mb-0 ft-medium">{{$blog->title}}</h1>
                                <nav class="transparent">
                                    <ol class="breadcrumb p-0">
                                        <li class="breadcrumb-item"><a href="{{route('front')}}">Home</a></li>
                                        <li class="breadcrumb-item active theme-cl" aria-current="page">{{$blog->title}}
                                        </li>
                                    </ol>
                                </nav>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- ============================ Page Title End ================================== -->

        <!-- ============================ Blog Detail Start ================================== -->
        <section>

            <div class="container">

                <!-- row Start -->
                <div class="row">

                    <!-- Blog Detail -->
                    <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                        <div class="article_detail_wrapss single_article_wrap format-standard">
                            <div class="article_body_wrap">

                                <div class="article_featured_image">
                                    <img class="img-fluid" style="height: 450px; width: 100%;"
                                        src="{{asset('business/blog_banner/')}}/{{$blog->banner}}" alt="">
                                </div>

                                <div class="article_top_info">
                                    <ul class="article_middle_info">
                                        <li><a href="#"><span class="icons"><i class="fa fa-clock "></i></span>{{
                                                Carbon\Carbon::parse($blog->created_at)->format('d M Y') }}</a>
                                        </li>
                                        <li><a href="#"><span class="icons"><i
                                                        class="lni lni-bookmark me-2"></i></span>{{$blog->category->name}}</a>
                                        </li>
                                    </ul>
                                </div>
                                <h2 class="post-title">{{$blog->title}}</h2>
                                <p>{!! $blog->description !!}</p>
                            </div>
                        </div>




                    </div>

                    <!-- Single blog Grid -->
                    <div class="col-lg-4 col-md-12 col-sm-12 col-12">

                        <!-- Trending Posts -->
                        @if ($relatedPost != NULL)
                        <div class="single_widgets widget_thumb_post">
                            <h4 class="title">Recent Posts</h4>
                            <ul>
                                @foreach ($relatedPost as $item)
                                <li>
                                    <span class="left">
                                        <img src="{{asset('business/blog_feature')}}/{{$item->image}}" alt="" class="">
                                    </span>
                                    <span class="right">
                                        <a class="feed-title"
                                            href="{{route('business.single')}}/{{$item->slug}}">{{$item->title}}</a>
                                        <span class="post-date"><i class="fa fa-clock"></i>{{
                                            Carbon\Carbon::parse($item->created_at)->format('d M Y') }}</span>
                                    </span>
                                </li>
                                @endforeach

                            </ul>
                        </div>
                        @endif



                    </div>

                </div>
                <!-- /row -->

            </div>

        </section>
        <!-- ============================ Blog Detail End ================================== -->


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
                                        <input type="text" class="form-control b-0"
                                            placeholder="Enter Your Email Address">
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-4">
                                    <div class="form-group mb-0 position-relative">
                                        <button class="btn full-width btn-height theme-bg text-light fs-md"
                                            type="button">Subscribe</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </section>
        <!-- ======================= Newsletter Start ============================ -->



        @include('layouts.partials.footer')

        <a id="tops-button" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>


    </div>
    {{-- @include('layouts.partials.scripts') --}}
</body>

</html>
