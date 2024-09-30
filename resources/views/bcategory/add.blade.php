@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://itsjavi.com/fontawesome-iconpicker/dist/css/fontawesome-iconpicker.min.css">

@endsection
@section('content')
<!-- Container -->


<!-- Titlebar
================================================== -->
<div id="titlebar" class="gradient">
	<div class="container" style="width: 100%">
		<div class="row">
			<div class="col-md-12">

				<h2><i class="sl sl-icon-plus"></i> Add BusinessCategory</h2>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="#">Home</a></li>
						<li>Add BusinessCategory</li>
					</ul>
				</nav>

			</div>
		</div>
	</div>
</div>


<!-- Content
================================================== -->


<!-- Container -->
<div class="container" style="width: 100%">

		<div class="row">
			<div class="col-lg-12">

				{{-- <div class="notification notice large margin-bottom-55">
					<h4>Don't Have an Account? 🙂</h4>
					<p>If you don't have an account you can create one by entering your email address in contact details section. A password will be automatically emailed to you.</p>
				</div> --}}

				<div id="add-listing" class="separated-form">

					<!-- Section -->
					<div class="add-listing-section">

						<!-- Headline -->
						<div class="add-listing-headline">
							<h3><i class="sl sl-icon-doc"></i> Basic Informations</h3>
						</div>

						<!-- Title -->
                        <form action="{{route('bc.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if ($errors->any())
                            <div class="alert alert-danger" style="color: red">
                                <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                                </ul>
                            </div>
                        @endif
                            <div class="row with-forms">
                                <div class="col-md-6">
                                    <h5>BusinessCategory Name <i class="tip" data-tip-content="Name of your business"></i></h5>
                                    <input class="search-field" type="text" name="name" />
                                </div>
                                <div class="col-md-6">
                                    <h5>Slug</h5>
                                    <input class="search-field" type="text" name="slug" />
                                </div>

                            </div>
                                <div class="row with-forms">
                                <div class="col-md-6">
                                    <h5>Icon </h5>

                                    <input class="form-control icp icp-auto" name="icon" value="fas fa-anchor" type="text"/>

                                </div>
                                {{-- <div class="col-md-6">
                                    <h5>Image </h5>
                                    <input  type="file" name="image"   accept="image/*, application/pdf" id="upload"/>
                                </div> --}}

                                </div>
                            <!-- Section / End -->
					            <button type="submit" class="button preview">Submit <i class="fa fa-arrow-circle-right"></i></button>
                        </form>
                    </div>

				</div>
			</div>

		</div>

	</div>
	<!-- Content / End -->
<!-- Container / End -->

@endsection
@section('js')
<script src="https://code.jquery.com/jquery-2.2.1.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://itsjavi.com/fontawesome-iconpicker/dist/js/fontawesome-iconpicker.js"></script>
<script>
    $('.icp-auto').iconpicker();
</script>
@endsection
