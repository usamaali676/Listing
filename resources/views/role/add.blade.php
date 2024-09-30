@extends('layouts.app')
@section('content')
<!-- Container -->


<!-- Titlebar
================================================== -->
<div id="titlebar" class="gradient">
	<div class="container" style="width: 100%">
		<div class="row">
			<div class="col-md-12">

				<h2><i class="sl sl-icon-plus"></i> Add Role</h2>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="#">Home</a></li>
						<li>Add Role</li>
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
                        <form action="{{route('role.store')}}" method="POST">
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
							<div class="col-md-12">
								<h5>Role Name <i class="tip" data-tip-content="Name of your Role"></i></h5>
								<input class="search-field" type="text" name="name" />
							</div>
						</div>
                            <h5 class="margin-top-30 margin-bottom-10">Roles <span>(Permission)</span></h5>
                            <div class="checkboxes in-row margin-bottom-20">

                                <input  type="hidden" value="0" name="role_create">
                                <input id="check-1" type="checkbox" value="1" name="role_create">
                                <label for="check-1">Create</label>

                                <input   type="hidden" value="0" name="role_view">
                                <input id="check-2" type="checkbox" value="1" name="role_view">
                                <label for="check-2">View</label>

                                <input  type="hidden" value="0" name="role_edit">
                                <input id="check-3" type="checkbox" value="1" name="role_edit">
                                <label for="check-3">Edit</label>

                                <input  type="hidden" value="0" name="role_update">
                                <input id="check-4" type="checkbox" value="1" name="role_update">
                                <label for="check-4">Update</label>

                                <input type="hidden" value="0" name="role_delete">
                                <input id="check-5" type="checkbox" value="1" name="role_delete">
                                <label for="check-5">Delete</label>

                            </div>
                            <h5 class="margin-top-30 margin-bottom-10">User <span>(Permission)</span></h5>
                            <div class="checkboxes in-row margin-bottom-20">

                                <input  type="hidden" value="0" name="user_create">
                                <input id="check-6" type="checkbox" value="1"  name="user_create">
                                <label for="check-6">Create</label>

                                <input type="hidden" value="0" name="user_view">
                                <input id="check-7" type="checkbox" value="1" name="user_view">
                                <label for="check-7">View</label>

                                <input type="hidden" value="0" name="user_edit">
                                <input id="check-8" type="checkbox" value="1" name="user_edit">
                                <label for="check-8">Edit</label>

                                <input type="hidden" value="0" name="user_update">
                                <input id="check-9" type="checkbox" value="1" name="user_update">
                                <label for="check-9">Update</label>

                                <input type="hidden" value="0" name="user_delete">
                                <input id="check-10" type="checkbox" value="1" name="user_delete">
                                <label for="check-10">Delete</label>

                            </div>
                            <h5 class="margin-top-30 margin-bottom-10">BusinessCategory <span>(Permission)</span></h5>
                            <div class="checkboxes in-row margin-bottom-20">

                                <input type="hidden" value="0" name="bc_create">
                                <input id="check-11" type="checkbox" value="1" name="bc_create">
                                <label for="check-11">Create</label>

                                <input type="hidden" value="0" name="bc_view">
                                <input id="check-12" type="checkbox" value="1" name="bc_view">
                                <label for="check-12">View</label>

                                <input type="hidden" value="0" name="bc_edit">
                                <input id="check-13" type="checkbox" value="1" name="bc_edit">
                                <label for="check-13">Edit</label>

                                <input type="hidden" value="0" name="bc_update">
                                <input id="check-14" type="checkbox" value="1" name="bc_update">
                                <label for="check-14">Update</label>

                                <input type="hidden" value="0" name="bc_delete">
                                <input id="check-15" type="checkbox" value="1" name="bc_delete">
                                <label for="check-15">Delete</label>

                            </div>
                            <h5 class="margin-top-30 margin-bottom-10">Business <span>(Permission)</span></h5>
                            <div class="checkboxes in-row margin-bottom-20">

                                <input type="hidden" value="0" name="business_create">
                                <input id="check-16" type="checkbox" value="1" name="business_create">
                                <label for="check-16">Create</label>

                                <input type="hidden" value="0" name="business_view">
                                <input id="check-17" type="checkbox" value="1" name="business_view">
                                <label for="check-17">View</label>

                                <input type="hidden" value="0" name="business_edit">
                                <input id="check-18" type="checkbox" value="1" name="business_edit">
                                <label for="check-18">Edit</label>

                                <input type="hidden" value="0" name="business_update">
                                <input id="check-19" type="checkbox" value="1" name="business_update">
                                <label for="check-19">Update</label>

                                <input type="hidden" value="0" name="business_delete">
                                <input id="check-20" type="checkbox" value="1" name="business_delete">
                                <label for="check-20">Delete</label>

                            </div>
                            <h5 class="margin-top-30 margin-bottom-10">State <span>(Permission)</span></h5>
                            <div class="checkboxes in-row margin-bottom-20">

                                <input type="hidden" value="0" name="state_create">
                                <input id="check-21" type="checkbox" value="1" name="state_create">
                                <label for="check-21">Create</label>

                                <input type="hidden" value="0" name="state_view">
                                <input id="check-22" type="checkbox" value="1" name="state_view">
                                <label for="check-22">View</label>

                                <input type="hidden" value="0" name="state_edit">
                                <input id="check-23" type="checkbox" value="1"  name="state_edit">
                                <label for="check-23">Edit</label>

                                <input type="hidden" value="0" name="state_update">
                                <input id="check-24" type="checkbox" value="1" name="state_update">
                                <label for="check-24">Update</label>

                                <input type="hidden" value="0" name="state_delete">
                                <input id="check-25" type="checkbox" value="1" name="state_delete">
                                <label for="check-25">Delete</label>

                            </div>
                            <h5 class="margin-top-30 margin-bottom-10">Blogs <span>(Permission)</span></h5>
                            <div class="checkboxes in-row margin-bottom-20">

                                <input type="hidden" value="0" name="blog_create">
                                <input id="check-26" type="checkbox" value="1" name="blog_create">
                                <label for="check-26">Create</label>

                                <input type="hidden" value="0" name="blog_view">
                                <input id="check-27" type="checkbox" value="1" name="blog_view">
                                <label for="check-27">View</label>

                                <input type="hidden" value="0" name="blog_edit">
                                <input id="check-28" type="checkbox" value="1"  name="blog_edit">
                                <label for="check-28">Edit</label>

                                <input type="hidden" value="0" name="blog_update">
                                <input id="check-29" type="checkbox" value="1" name="blog_update">
                                <label for="check-29">Update</label>

                                <input type="hidden" value="0" name="blog_delete">
                                <input id="check-30" type="checkbox" value="1" name="blog_delete">
                                <label for="check-30">Delete</label>

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
