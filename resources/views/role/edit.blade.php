@extends('layouts.app')
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

				<div id="add-listing" class="separated-form">

					<!-- Section -->
					<div class="add-listing-section">

						<!-- Headline -->
						<div class="add-listing-headline">
							<h3><i class="sl sl-icon-doc"></i> Basic Informations</h3>
						</div>

						<!-- Title -->
                        <form action="{{route('role.update')}}" method="POST">
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
								<h5>BusinessCategory Name <i class="tip" data-tip-content="Name of your business"></i></h5>
								<input class="search-field" type="text" name="name" value="{{ $role->name}}"/>
                                <input type="hidden" name="id" value="{{ $role->id}}">
							</div>
						</div>
                        <h5 class="margin-top-30 margin-bottom-10">Roles <span>(Permission)</span></h5>
                        <div class="checkboxes in-row margin-bottom-20">

                            <input  type="hidden" value="0" name="role_create">
                            <input id="check-1" type="checkbox" value="1" name="role_create" @if ($perm_role->create == 1) checked @endif>
                            <label for="check-1">Create</label>

                            <input   type="hidden" value="0" name="role_view">
                            <input id="check-2" type="checkbox" value="1" name="role_view" @if ($perm_role->view == 1) checked @endif>
                            <label for="check-2">View</label>

                            <input  type="hidden" value="0" name="role_edit">
                            <input id="check-3" type="checkbox" value="1" name="role_edit" @if ($perm_role->edit == 1) checked @endif>
                            <label for="check-3">Edit</label>

                            <input  type="hidden" value="0" name="role_update">
                            <input id="check-4" type="checkbox" value="1" name="role_update" @if ($perm_role->update == 1) checked @endif>
                            <label for="check-4">Update</label>

                            <input type="hidden" value="0" name="role_delete">
                            <input id="check-5" type="checkbox" value="1" name="role_delete" @if ($perm_role->delete == 1) checked @endif>
                            <label for="check-5">Delete</label>

                        </div>
                        <h5 class="margin-top-30 margin-bottom-10">User <span>(Permission)</span></h5>
                        <div class="checkboxes in-row margin-bottom-20">

                            <input  type="hidden" value="0" name="user_create">
                            <input id="check-6" type="checkbox" value="1"  name="user_create" @if ($perm_user->create == 1) checked @endif>
                            <label for="check-6">Create</label>

                            <input type="hidden" value="0" name="user_view">
                            <input id="check-7" type="checkbox" value="1" name="user_view" @if ($perm_user->view == 1) checked @endif>
                            <label for="check-7">View</label>

                            <input type="hidden" value="0" name="user_edit">
                            <input id="check-8" type="checkbox" value="1" name="user_edit" @if ($perm_user->edit == 1) checked @endif>
                            <label for="check-8">Edit</label>

                            <input type="hidden" value="0" name="user_update">
                            <input id="check-9" type="checkbox" value="1" name="user_update" @if ($perm_user->update == 1) checked @endif>
                            <label for="check-9">Update</label>

                            <input type="hidden" value="0" name="user_delete">
                            <input id="check-10" type="checkbox" value="1" name="user_delete" @if ($perm_user->delete == 1) checked @endif>
                            <label for="check-10">Delete</label>

                        </div>
                        <h5 class="margin-top-30 margin-bottom-10">BusinessCategory <span>(Permission)</span></h5>
                        <div class="checkboxes in-row margin-bottom-20">

                            <input type="hidden" value="0" name="bc_create">
                            <input id="check-11" type="checkbox" value="1" name="bc_create" @if ($perm_bc->create == 1) checked @endif>
                            <label for="check-11">Create</label>

                            <input type="hidden" value="0" name="bc_view">
                            <input id="check-12" type="checkbox" value="1" name="bc_view" @if ($perm_bc->view == 1) checked @endif>
                            <label for="check-12">View</label>

                            <input type="hidden" value="0" name="bc_edit">
                            <input id="check-13" type="checkbox" value="1" name="bc_edit" @if ($perm_bc->edit == 1) checked @endif>
                            <label for="check-13">Edit</label>

                            <input type="hidden" value="0" name="bc_update">
                            <input id="check-14" type="checkbox" value="1" name="bc_update" @if ($perm_bc->update == 1) checked @endif>
                            <label for="check-14">Update</label>

                            <input type="hidden" value="0" name="bc_delete">
                            <input id="check-15" type="checkbox" value="1" name="bc_delete" @if ($perm_bc->delete == 1) checked @endif>
                            <label for="check-15">Delete</label>

                        </div>
                        <h5 class="margin-top-30 margin-bottom-10">Business <span>(Permission)</span></h5>
                        <div class="checkboxes in-row margin-bottom-20">

                            <input type="hidden" value="0" name="business_create">
                            <input id="check-16" type="checkbox" value="1" name="business_create" @if ($perm_business->create == 1) checked @endif>
                            <label for="check-16">Create</label>

                            <input type="hidden" value="0" name="business_view">
                            <input id="check-17" type="checkbox" value="1" name="business_view" @if ($perm_business->view == 1) checked @endif>
                            <label for="check-17">View</label>

                            <input type="hidden" value="0" name="business_edit">
                            <input id="check-18" type="checkbox" value="1" name="business_edit" @if ($perm_business->edit == 1) checked @endif>
                            <label for="check-18">Edit</label>

                            <input type="hidden" value="0" name="business_update">
                            <input id="check-19" type="checkbox" value="1" name="business_update" @if ($perm_business->update == 1) checked @endif>
                            <label for="check-19">Update</label>

                            <input type="hidden" value="0" name="business_delete">
                            <input id="check-20" type="checkbox" value="1" name="business_delete" @if ($perm_business->delete == 1) checked @endif>
                            <label for="check-20">Delete</label>

                        </div>
                        <h5 class="margin-top-30 margin-bottom-10">State <span>(Permission)</span></h5>
                        <div class="checkboxes in-row margin-bottom-20">

                            <input type="hidden" value="0" name="state_create">
                            <input id="check-21" type="checkbox" value="1" name="state_create" @if ($perm_state->create == 1) checked @endif>
                            <label for="check-21">Create</label>

                            <input type="hidden" value="0" name="state_view">
                            <input id="check-22" type="checkbox" value="1" name="state_view"  @if ($perm_state->view == 1) checked @endif>
                            <label for="check-22">View</label>

                            <input type="hidden" value="0" name="state_edit">
                            <input id="check-23" type="checkbox" value="1"  name="state_edit"  @if ($perm_state->edit == 1) checked @endif>
                            <label for="check-23">Edit</label>

                            <input type="hidden" value="0" name="state_update">
                            <input id="check-24" type="checkbox" value="1" name="state_update"  @if ($perm_state->update == 1) checked @endif>
                            <label for="check-24">Update</label>

                            <input type="hidden" value="0" name="state_delete">
                            <input id="check-25" type="checkbox" value="1" name="state_delete"  @if ($perm_state->delete == 1) checked @endif>
                            <label for="check-25">Delete</label>

                        </div>
                        <h5 class="margin-top-30 margin-bottom-10">Blogs <span>(Permission)</span></h5>
                        <div class="checkboxes in-row margin-bottom-20">

                            <input type="hidden" value="0" name="blog_create">
                            <input id="check-26" type="checkbox" value="1" name="blog_create" @if ($perm_blog->create == 1) checked @endif>
                            <label for="check-26">Create</label>

                            <input type="hidden" value="0" name="blog_view">
                            <input id="check-27" type="checkbox" value="1" name="blog_view"  @if ($perm_blog->view == 1) checked @endif>
                            <label for="check-27">View</label>

                            <input type="hidden" value="0" name="blog_edit">
                            <input id="check-28" type="checkbox" value="1"  name="blog_edit"  @if ($perm_blog->edit == 1) checked @endif>
                            <label for="check-28">Edit</label>

                            <input type="hidden" value="0" name="blog_update">
                            <input id="check-29" type="checkbox" value="1" name="blog_update"  @if ($perm_blog->update == 1) checked @endif>
                            <label for="check-29">Update</label>

                            <input type="hidden" value="0" name="blog_delete">
                            <input id="check-30" type="checkbox" value="1" name="blog_delete"  @if ($perm_blog->delete == 1) checked @endif>
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
