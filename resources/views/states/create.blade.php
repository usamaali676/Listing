@extends('layouts.app')
@section('content')
<!-- Container -->


<!-- Titlebar
================================================== -->
<div id="titlebar" class="gradient">
	<div class="container" style="width: 100%">
		<div class="row">
			<div class="col-md-12">

				<h2><i class="sl sl-icon-plus"></i> Add State Name</h2>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="#">Home</a></li>
						<li>Add State Name</li>
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
                        <form action="{{route('state.store')}}" method="POST" enctype="multipart/form-data">
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
                                    <h5>State Name <i class="tip" data-tip-content="Name of State"></i></h5>
                                    <input class="search-field" type="text" name="name" />
                                </div>
                                <div class="col-md-6">
                                    <h5>Slug</h5>
                                    <input class="search-field" type="text" name="slug" />
                                </div>

                            </div>
                                <div class="row with-forms">
                                <div class="col-md-12">
                                    <h5>Image </h5>
                                    <input  type="file" name="img" accept="image" id="upload"/>
                                </div>

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
