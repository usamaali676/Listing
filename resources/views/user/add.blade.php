@extends('layouts.app')
@section('content')
<!-- Container -->


<!-- Titlebar
================================================== -->
<div id="titlebar" class="gradient">
	<div class="container" style="width: 100%">
		<div class="row">
			<div class="col-md-12">

				<h2><i class="sl sl-icon-plus"></i> Add User</h2>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="#">Home</a></li>
						<li>Add User</li>
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
                        <form action="{{route('user.store')}}" method="POST">
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
								<h5>User Name <i class="tip" data-tip-content="Name of your User"></i></h5>
								<input class="search-field" type="text" name="name" />
							</div>
                            <div class="col-md-6">
								<h5>Select Role <i class="tip" data-tip-content="User Role"></i></h5>
								<select  name="role_id" class="chosen-select-no-single" >
                                    <option label="blank">Select Role</option>
                                    @foreach ($role as $item)
                                    <option value="{{$item->id}}" >{{ $item->name}}</option>
                                    @endforeach
                                </select>
							</div>

						</div>
                        <div class="row with-forms">
							<div class="col-md-6">
								<h5>User Email </h5>
								<input class="search-field" type="email" name="email" />
							</div>
                            <div class="col-md-6">
								<h5>Password<i class="tip" data-tip-content="Password"></i></h5>
								<input class="search-field" type="password" name="password" />
							</div>

						</div>


					</div>
					<!-- Section / End -->
					<button class="button preview">Submit <i class="fa fa-arrow-circle-right"></i></button>
                </form>

				</div>
			</div>

		</div>

	</div>
	<!-- Content / End -->
<!-- Container / End -->

@endsection
