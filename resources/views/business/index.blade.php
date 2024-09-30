
@extends('layouts.app')
@section('content')

		<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>My Listings</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="#">Home</a></li>
							<li><a href="#">Dashboard</a></li>
							<li>My Listings</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>



        {{-- Model --}}



        {{-- End-Model --}}



		<div class="row">

			<!-- Listings -->
			<div class="col-lg-12 col-md-12">
				<div class="dashboard-list-box margin-top-0">
                    <form id="my-listings-search-form" action="javascript:void(0);">
                        <input type="text" name="search" id="my-listings-search" placeholder="Search listing">
                    </form>
					<h4>Active Listings</h4>

					<ul  id="business-list">
                        @foreach ($business as $item)
                            <li>
                                <div class="list-box-listing">
                                    <div class="list-box-listing-img"><a href="{{route('business.single')}}/{{$item->slug}}"><img src="{{asset('business/feature')}}/{{$item->featureImage}}" alt=""></a></div>
                                    <div class="list-box-listing-content">
                                        <div class="inner">
                                            <h3><a href="{{route('business.single')}}/{{$item->slug}}">{{$item->name}}</a></h3>
                                            <span>{{$item->address}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="buttons-to-right">
                                    <a href="{{route('business.edit')}}/{{$item->id}}" class="button gray"><i class="sl sl-icon-note"></i> Edit</a>
                                    <a onclick="return confirm('Are you sure you want to delete this item')"  href="{{route('business.delete')}}/{{$item->id}}" class="button gray"><i class="sl sl-icon-close"></i> Delete</a>
                                </div>
                            </li>
                        @endforeach
					</ul>
				</div>

			</div>
            <div class="clearfix"></div>
			<div class="row">
				<div class="col-md-12 clearfix text-center py-md-5 pagination" style="padding: 15px 0; margin-top: 30px;">
					<!-- Pagination -->

                    {{$business->links()}}


				</div>
			</div>


		</div>


@endsection
@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#my-listings-search').on('keyup', function() {
            let query = $(this).val();

            $.ajax({
                url: '{{ route("business.search") }}',
                method: 'GET',
                data: { search: query },
                success: function(response) {
                    $('#business-list').html(response);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    });
</script>

@endsection