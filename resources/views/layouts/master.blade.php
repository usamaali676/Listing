<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="google-site-verification" content="52eIniLS6zaGIatDoEabzFlUlr6nUkTeN9SKxtjgriY" />
    <!--<title>Local Beings | Business Directory </title>-->
    <link rel="canonical" href="{{Request::url()}}"/>
    <meta name="robots" content="index">
    @yield('meta')
    @include('layouts.partials.headFront')
    @yield('css')
</head>
<body class="dark-header_">

    <!-- Wrapper -->
<div id="main-wrapper">

    <!-- Header Container
    ================================================== -->
    @include('layouts.partials.nav')
    <div class="clearfix"></div>
    <!-- Header Container / End -->


@yield('front')


@include('layouts.partials.footer')


    <!-- Back To Top Button -->
    <a id="tops-button" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>


    </div>
    <!-- Wrapper / End -->

    @include('sweetalert::alert')
    @yield('js')
    @include('layouts.partials.front-scripts')
</body>
</html>
