@php
    $Activeuser = Auth::user();
@endphp
@extends('layouts.app')
@section('content')
<!-- Container -->


<!-- Titlebar
================================================== -->
<div id="titlebar" class="gradient">
	<div class="container" style="width: 100%">
		<div class="row">
			<div class="col-md-12">

				<h2><i class="sl sl-icon-plus"></i> Edit User</h2>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="#">Home</a></li>
						<li>Edit User</li>
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

				<div id="Edit-listing" class="separated-form">

					<!-- Section -->
					<div class="add-listing-section">

						<!-- Headline -->
						<div class="add-listing-headline">
							<h3><i class="sl sl-icon-doc"></i> Basic Informations</h3>
						</div>

						<!-- Title -->
                        <form action="{{route('user.update')}}" method="POST">
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
								<input class="search-field" type="text" name="name" value="{{$user->name}}"/>
                                <input type="hidden" name="id" value="{{$user->id}}">
							</div>
                            <div class="col-md-6">
								<h5>Select Role <i class="tip" data-tip-content="User Role"></i></h5>
								<select  name="role_id" class="chosen-select-no-single" >
                                    @if ($selectedRole!=null)
                                    <option value="{{ $selectedRole->id }}">{{ $selectedRole->name }}</option>
                                    @else
                                    <option value="">Please Select</option>
                                    @endif
                                    @foreach ($role as $list)
                                        <option value="{{ $list->id }}">{{ $list->name }}</option>
                                    @endforeach
                                </select>
							</div>

						</div>
                        <div class="row with-forms">
							<div class="col-md-6">
								<h5>User Email </h5>
								<input class="search-field" type="email" name="email" value="{{$user->email}}"/>
							</div>
                            <div class="col-md-6">
								<h5>Password<i class="tip" data-tip-content="Password"></i></h5>
								<input class="search-field" type="password" name="password" />
							</div>

						</div>
                        @if ($Activeuser->role_id == 1)
                        <div class="row with-forms">
							<div class="col-md-12">
								<h5>Status</h5>
                                <label class="switch" style="position: relative; right: 0; top: 16px; z-index: 100"><input type="checkbox" name="status" @if ($user->status == 1) checked @endif><span class="slider round"></span></label>
							</div>
						</div>
                        @endif


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
