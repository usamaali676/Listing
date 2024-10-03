<!DOCTYPE html>
<head>
    @include('layouts.partials.head')
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


    <div id="titlebar">
        <div class="row">
            <div class="col-md-12">
                <h2>Blogs</h2>
                <!-- Breadcrumbs -->
                <nav id="breadcrumbs">
                    <a href="{{route('blog.add')}}" class="button">Add Blog</a>
                </nav>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <table id="example" class="table table-bordered table-hover dt-responsive">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Category</td>
                        <td>Title</td>
                        <td>Slug</td>
                        <td>Show</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                   @foreach ( $blog as $item)
                   <tr>
                    <td>{{$srno++}}</td>
                    <td> {{ $item->category->name }} </td>
                    <td>{{ $item->title}}</td>
                    <td>{{$item->slug}}</td>
                    <td>@if ($item->status == 1)
                        Yes
                    @else
                        No
                    @endif</td>
                    <td><a href="{{route('blog.edit')}}/{{ $item->id}}" class="button">Edit</a> <a onclick="return confirm('Are you sure you want to delete this item')"  href="{{route('blog.delete')}}/{{ $item->id}}" class="button">Delete</a></td>
                </tr>
                   @endforeach


                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- Dashboard / End -->


</div>
<!-- Wrapper / End -->


<!-- Scripts
================================================== -->
@yield('js')
@include('sweetalert::alert')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function () {
    $('#example').DataTable();
});
</script>
<script type="text/javascript" src="{{asset('assets/scripts/jquery-migrate-3.3.2.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/scripts/mmenu.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/scripts/chosen.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/scripts/slick.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/scripts/rangeslider.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/scripts/magnific-popup.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/scripts/waypoints.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/scripts/counterup.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/scripts/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/scripts/tooltips.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/scripts/custom.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/scripts/dropzone.js')}}"></script>
{{-- @include('layouts.partials.scripts') --}}

</body>
</html>

