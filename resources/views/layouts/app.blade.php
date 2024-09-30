<!DOCTYPE html>
<head>

@include('layouts.partials.head')
@yield('css')
</head>

<body>

<!-- Wrapper -->
<div id="wrapper">

<!-- Header Container
================================================== -->
@include('layouts.partials.dasboard_nav')

<div class="clearfix"></div>
<!-- Header Container / End -->


<!-- Dashboard -->
<div id="dashboard">

@include('layouts.partials.sidebar')

<div class="dashboard-content">
@yield('content')
</div>

</div>
<!-- Dashboard / End -->


</div>
<!-- Wrapper / End -->


<!-- Scripts
================================================== -->

@include('sweetalert::alert')
@include('layouts.partials.scripts')
@yield('js')
</body>
</html>
