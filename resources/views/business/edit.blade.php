@php
    $Activeuser = Auth::user();
@endphp
@extends('layouts.app')
@section('content')

		<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>Add Listing</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="#">Home</a></li>
							<li><a href="#">Dashboard</a></li>
							<li>Add Listing</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12">
                <form action="{{route('business.update')}}/{{$business->id}}" method="POST" enctype="multipart/form-data">
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
                    <div id="add-listing">

                        <!-- Section -->
                        <div class="add-listing-section">

                                    <!-- Headline -->
                                    <div class="add-listing-headline">
                                        <h3><i class="sl sl-icon-doc"></i> Basic Informations</h3>
                                    </div>
                                        <!-- Title -->
                                        <div class="row with-forms">
                                            <div class="col-md-6">
                                                <h5>Listing Title <i class="tip" data-tip-content="Name of your business"></i></h5>
                                                <input class="search-field" type="text" name="name" value="{{$business->name}}"/>
                                            </div>
                                            <div class="col-md-6">
                                                <h5>Listing Slug </h5>
                                                <input class="search-field" type="text" name="slug" value="{{$business->slug}}"/>
                                            </div>
                                        </div>

                                        <!-- Row -->
                                        <div class="row with-forms">

                                            <!-- Status -->
                                            <div class="col-md-6 " >
                                                <h5>Business Category</h5>
                                                <select  name="cat_id[]" class="selectpicker chosen-select-no-single" data-style="btn btn-success btn-round" data-live-search="true"  multiple>

                                                    @if ($category!=null)
                                                    @foreach ($category as $item)
                                                    <option value="{{ $item->id }}" selected >{{ $item->name }}</option>
                                                    @endforeach
                                                    @else
                                                    <option value="">Please Select</option>
                                                    @endif
                                                    @foreach ($bcat as $list)
                                                        <option value="{{ $list->id }}">{{ $list->name }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <h5>Logo</h5>
                                                <div class="uploadButton margin-top-15 text-center">
                                                    <input type="file" name="logo" accept="image/*, application/pdf" id="upload">
                                                </div>
                                            </div>


                                        </div>
                                        <!-- Row / End -->

                                        <!-- Row -->
                                        <div class="row with-forms">

                                            <!-- Status -->
                                            <div class="col-md-6">
                                                <h5>Meta Title</h5>
                                                <input class="search-field" type="text" name="meta_title" value="{{$business->meta_title}}"/>
                                            </div>
                                            <div class="col-md-6">
                                                <h5>Meta Keyword</h5>
                                                <input class="search-field" type="text" name="meta_keyword" value="{{$business->meta_keywords}}"/>
                                            </div>


                                        </div>
                                        <!-- Row / End -->
                                        <!-- Row -->
                                        <div class="row with-forms">

                                            <!-- Status -->
                                            <div class="col-md-12">
                                                <h5>Meta Description</h5>
                                                <input class="search-field" type="text" name="meta_description" value="{{$business->meta_description}}"/>
                                            </div>


                                        </div>
                                        <!-- Row / End -->

                                    </div>
                                    <!-- Section / End -->

                                    <!-- Section -->
                                    <div class="add-listing-section margin-top-45">

                                        <!-- Headline -->
                                        <div class="add-listing-headline">
                                            <h3><i class="sl sl-icon-location"></i> Location</h3>
                                        </div>

                                        <div class="submit-section">

                                            <!-- Row -->
                                            <div class="row with-forms">



                                                <!-- Address -->
                                                <div class="col-md-12">
                                                    <h5>Address</h5>
                                                    <input type="text" placeholder="" name="address" value="{{$business->address}}">
                                                </div>
                                                @if ($Activeuser->status == 1)
                                                <div class="col-md-12">
                                                    <h5>Map</h5>
                                                    <input type="text" placeholder="" name="map" value="{{$business->map}}">
                                                </div>
                                                @endif



                                            </div>
                                            <!-- Row / End -->

                                        </div>
                                    </div>
                                    <!-- Section / End -->


                                    <!-- Section -->
                                    <div class="add-listing-section margin-top-45">

                                        <!-- Headline -->
                                        <div class="add-listing-headline">
                                            <h3><i class="sl sl-icon-picture"></i> Gallery</h3>
                                        </div>

                                        <!-- Dropzone -->
                                        @php
                                            $img = $business->gallery;
                                        @endphp
                                        <div class="submit-section">

                                            <div style="display: flex; gap: 30px; padding-bottom: 20px">
                                                @foreach ($img as $list)
                                                {{-- <img src="{{asset('business/gallery_images')}}/{{$list->images}}" alt="" style="width: 150px; height: 150px;"> --}}
                                                <input type="hidden" name="img_id[]" value="{{$list->id}}">

                                                    <div class="dz-preview active-thumb _gallery30506 dz-complete ui-sortable-handle dz-image-preview">
                                                        <div class="dz-image" style="width: 120px; height: 120px"><img data-dz-thumbnail="" alt="Frame-10421-1.png"
                                                                src="{{asset('business/gallery_images')}}/{{$list->images}}"></div>
                                                            <a id="deletegallery_{{ $list->id }}" class="dz-remove" href="javascript:undefined;"  data-remove="{{ $list->id }}">Remove file</a>
                                                    </div>
                                                @endforeach
                                            </div>


                                            <input type="file"  name="images[]" multiple>

                                        </div>
                                    </div>
                                    <!-- Section / End -->


                                    <!-- Section -->
                                    <div class="add-listing-section margin-top-45">

                                        <!-- Headline -->
                                        <div class="add-listing-headline">
                                            <h3><i class="sl sl-icon-docs"></i> Details</h3>
                                        </div>

                                        <!-- Description -->
                                        <div class="form">
                                            <h5>Description</h5>
                                            <textarea class="ckeditor WYSIWYG" name="description" cols="40" rows="3" id="summary" spellcheck="true">{{$business->description}}</textarea>
                                        </div>

                                        <!-- Row -->
                                        <div class="row with-forms">

                                            <!-- Phone -->
                                            <div class="col-md-4">
                                                <h5>Phone </h5>
                                                <input type="text" name="phone" value="{{$business->phone}}">
                                            </div>

                                            <!-- Website -->
                                            <div class="col-md-4">
                                                <h5>Website <span>(optional)</span></h5>
                                                <input type="text" name="website" value="{{$business->website}}">
                                            </div>

                                            <!-- Email Address -->
                                            <div class="col-md-4">
                                                <h5>E-mail </h5>
                                                <input type="text" name="email" value="{{$business->email}}">
                                            </div>

                                        </div>
                                        <!-- Row / End -->
                                                                <!-- Row -->
                                        <div class="row with-forms">
                                            @if ($Activeuser->status == 1)
                                            <!-- Phone -->
                                            <div class="col-md-4">
                                                <h5>SMS No. <span>(optional)</span></h5>
                                                <input type="text"  name="sms" value="{{$business->sms}}">
                                            </div>
                                            @endif
                                            <!-- Website -->
                                            <div class="col-md-4">
                                                <h5>Gmb Link <span>(optional)</span></h5>
                                                <input type="text" name="gmb" value="{{$business->gmb}}">
                                            </div>
                                            @if ($Activeuser->status == 1)
                                            <!-- Email Address -->
                                            <div class="col-md-4">
                                                <h5>Whatsapp <span>(optional)</span></h5>
                                                <input type="text" name="whatsapp" value="{{$business->whatsapp}}">
                                            </div>
                                            @endif
                                        </div>
                                        <!-- Row / End -->


                                        <!-- Row -->
                                        <div class="row with-forms">
                                            @if ($Activeuser->status == 1)
                                            <!-- Phone -->
                                            <div class="col-md-4">
                                                <h5 class="fb-input"><i class="fa fa-facebook-square"></i> Facebook <span>(optional)</span></h5>
                                                <input type="text" placeholder="https://www.facebook.com/" name="fb" value="{{$business->fb}}">
                                            </div>
                                            @endif
                                            @if ($Activeuser->status == 1)
                                            <!-- Website -->
                                            <div class="col-md-4">
                                                <h5 class="insta-input" style="color: #E1306C"><i class="fa fa-instagram" aria-hidden="true"></i>Insta <span>(optional)</span></h5>
                                                <input type="text" placeholder="https://www.instagram.com/" name="inst" value="{{$business->inst}}">
                                            </div>
                                            @endif

                                            @if ($Activeuser->status == 1)
                                            <!-- Email Address -->
                                            <div class="col-md-4">
                                                <h5 class="gplus-input"><i class="fa fa-youtube-play" aria-hidden="true"></i> Youtube <span>(optional)</span></h5>
                                                <input type="text" placeholder="https://youtube.com" name="youtube" value="{{$business->youtube}}">
                                            </div>
                                            @endif
                                            @if ($Activeuser->status == 1)
                                            <!-- Email Address -->
                                            <div class="col-md-4">
                                                <h5 class="gplus-input"><i class="fa fa-yelp" aria-hidden="true"></i> Yelp <span>(optional)</span></h5>
                                                <input type="text" placeholder="https://yelp.com" name="yelp" value="{{$business->yelp}}">
                                            </div>
                                            @endif
                                            <div class="col-md-4">
                                                <h5>Feature Image</h5>
                                                <div class="uploadButton margin-top-15 text-center">
                                                    <input type="file" name="feature" accept="image/*, application/pdf" id="upload">
                                                </div>
                                            </div>

                                        </div>
                                        <!-- Row / End -->



                                    </div>
                                    <!-- Section / End -->



                                    @if ($business->hours->count() != 0)

                                    <!-- Section -->
                                    <div class="add-listing-section margin-top-45">

                                        <!-- Headline -->
                                        <div class="add-listing-headline">
                                            <h3><i class="sl sl-icon-clock"></i> Opening Hours</h3>
                                            <!-- Switcher -->
                                            <label class="switch"><input type="checkbox" name="timing_status" @if ($business->timing_status == '1') checked @endif><span class="slider round"></span></label>
                                        </div>

                                        <!-- Switcher ON-OFF Content -->
                                        <div class="switcher-content">

                                            @php
                                                $days = $business->hours;
                                            @endphp

                                            @foreach ($days as $item )

                                            <!-- Day -->
                                            <div class="row opening-day">
                                                <div class="col-md-2"><h5>{{$item->day}} <input type="hidden" name="day[]" value="{{$item->day}}"> <input type="hidden" name="day_id[]" value="{{$item->id}}"></h5></div>
                                                <div class="col-md-5">
                                                    <select class="chosen-select" data-placeholder="Opening Time" name="opening[]">
                                                        @if ($item->open_hour != null)
                                                        <option selected>{{$item->open_hour}}</option>
                                                        @else
                                                        <option label="Opening Time"></option>
                                                        @endif
                                                        <option>&nbsp;</option>
                                                        <option>Closed</option>
                                                        <option>Open 24 Hours</option>
                                                        <option>1 AM</option>
                                                        <option>2 AM</option>
                                                        <option>3 AM</option>
                                                        <option>4 AM</option>
                                                        <option>5 AM</option>
                                                        <option>6 AM</option>
                                                        <option>7 AM</option>
                                                        <option>8 AM</option>
                                                        <option>9 AM</option>
                                                        <option>10 AM</option>
                                                        <option>11 AM</option>
                                                        <option>12 AM</option>
                                                        <option>1 PM</option>
                                                        <option>2 PM</option>
                                                        <option>3 PM</option>
                                                        <option>4 PM</option>
                                                        <option>5 PM</option>
                                                        <option>6 PM</option>
                                                        <option>7 PM</option>
                                                        <option>8 PM</option>
                                                        <option>9 PM</option>
                                                        <option>10 PM</option>
                                                        <option>11 PM</option>
                                                        <option>12 PM</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-5">
                                                    <select class="chosen-select" data-placeholder="Closing Time"  name="closing[]">
                                                        @if ($item->close_hour != null)
                                                        <option selected>{{$item->close_hour}}</option>
                                                        @else
                                                        <option label="Opening Time"></option>
                                                        @endif
                                                        <option>&nbsp;</option>
                                                        <option>Closed</option>
                                                        <option>Open 24 Hours</option>
                                                        <option>1 AM</option>
                                                        <option>2 AM</option>
                                                        <option>3 AM</option>
                                                        <option>4 AM</option>
                                                        <option>5 AM</option>
                                                        <option>6 AM</option>
                                                        <option>7 AM</option>
                                                        <option>8 AM</option>
                                                        <option>9 AM</option>
                                                        <option>10 AM</option>
                                                        <option>11 AM</option>
                                                        <option>12 AM</option>
                                                        <option>1 PM</option>
                                                        <option>2 PM</option>
                                                        <option>3 PM</option>
                                                        <option>4 PM</option>
                                                        <option>5 PM</option>
                                                        <option>6 PM</option>
                                                        <option>7 PM</option>
                                                        <option>8 PM</option>
                                                        <option>9 PM</option>
                                                        <option>10 PM</option>
                                                        <option>11 PM</option>
                                                        <option>12 PM</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- Day / End -->
                                            @endforeach


                                        </div>
                                        <!-- Switcher ON-OFF Content / End -->

                                    </div>
                                    <!-- Section / End -->
                                    @else
                                        <!-- Section -->
                                        <div class="add-listing-section margin-top-45">

                                            <!-- Headline -->
                                            <div class="add-listing-headline">
                                                <h3><i class="sl sl-icon-clock"></i> Opening Hours</h3>
                                                <!-- Switcher -->
                                                <label class="switch"><input type="checkbox" name="timing_status" @if ($business->timing_status == '1') checked @endif ><span
                                                        class="slider round"></span></label>
                                            </div>

                                            <!-- Switcher ON-OFF Content -->
                                            <div class="switcher-content">

                                                <!-- Day -->
                                                <div class="row opening-day">
                                                    <div class="col-md-2">
                                                        <h5>Monday <input type="hidden" name="day[]" value="Monday"><input type="hidden" name="day_id[]" ></h5>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <select class="chosen-select" data-placeholder="Opening Time" name="opening[]">
                                                            <option label="Opening Time"></option>
                                                            <option>Closed</option>
                                                            <option>1 AM</option>
                                                            <option>2 AM</option>
                                                            <option>3 AM</option>
                                                            <option>4 AM</option>
                                                            <option>5 AM</option>
                                                            <option>6 AM</option>
                                                            <option>7 AM</option>
                                                            <option>8 AM</option>
                                                            <option>9 AM</option>
                                                            <option>10 AM</option>
                                                            <option>11 AM</option>
                                                            <option>12 AM</option>
                                                            <option>1 PM</option>
                                                            <option>2 PM</option>
                                                            <option>3 PM</option>
                                                            <option>4 PM</option>
                                                            <option>5 PM</option>
                                                            <option>6 PM</option>
                                                            <option>7 PM</option>
                                                            <option>8 PM</option>
                                                            <option>9 PM</option>
                                                            <option>10 PM</option>
                                                            <option>11 PM</option>
                                                            <option>12 PM</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <select class="chosen-select" data-placeholder="Closing Time" name="closing[]">
                                                            <option label="Closing Time"></option>
                                                            <option>Closed</option>
                                                            <option>1 AM</option>
                                                            <option>2 AM</option>
                                                            <option>3 AM</option>
                                                            <option>4 AM</option>
                                                            <option>5 AM</option>
                                                            <option>6 AM</option>
                                                            <option>7 AM</option>
                                                            <option>8 AM</option>
                                                            <option>9 AM</option>
                                                            <option>10 AM</option>
                                                            <option>11 AM</option>
                                                            <option>12 AM</option>
                                                            <option>1 PM</option>
                                                            <option>2 PM</option>
                                                            <option>3 PM</option>
                                                            <option>4 PM</option>
                                                            <option>5 PM</option>
                                                            <option>6 PM</option>
                                                            <option>7 PM</option>
                                                            <option>8 PM</option>
                                                            <option>9 PM</option>
                                                            <option>10 PM</option>
                                                            <option>11 PM</option>
                                                            <option>12 PM</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- Day / End -->

                                                <!-- Day -->
                                                <div class="row opening-day js-demo-hours">
                                                    <div class="col-md-2">
                                                        <h5>Tuesday <input type="hidden" name="day[]" value="Tuesday"><input type="hidden" name="day_id[]" ></h5>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <select class="chosen-select" data-placeholder="Opening Time" name="opening[]">
                                                            <!-- Hours added via JS (this is only for demo purpose) -->
                                                        </select>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <select class="chosen-select" data-placeholder="Closing Time" name="closing[]">
                                                            <!-- Hours added via JS (this is only for demo purpose) -->
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- Day / End -->

                                                <!-- Day -->
                                                <div class="row opening-day js-demo-hours">
                                                    <div class="col-md-2">
                                                        <h5>Wednesday <input type="hidden" name="day[]" value="Wednesday"><input type="hidden" name="day_id[]" ></h5>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <select class="chosen-select" data-placeholder="Opening Time" name="opening[]">
                                                            <!-- Hours added via JS (this is only for demo purpose) -->
                                                        </select>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <select class="chosen-select" data-placeholder="Closing Time" name="closing[]">
                                                            <!-- Hours added via JS (this is only for demo purpose) -->
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- Day / End -->

                                                <!-- Day -->
                                                <div class="row opening-day js-demo-hours">
                                                    <div class="col-md-2">
                                                        <h5>Thursday <input type="hidden" name="day[]" value="Thursday"><input type="hidden" name="day_id[]" ></h5>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <select class="chosen-select" data-placeholder="Opening Time" name="opening[]">
                                                            <!-- Hours added via JS (this is only for demo purpose) -->
                                                        </select>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <select class="chosen-select" data-placeholder="Closing Time" name="closing[]">
                                                            <!-- Hours added via JS (this is only for demo purpose) -->
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- Day / End -->

                                                <!-- Day -->
                                                <div class="row opening-day js-demo-hours">
                                                    <div class="col-md-2">
                                                        <h5>Friday <input type="hidden" name="day[]" value="Friday"><input type="hidden" name="day_id[]" ></h5>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <select class="chosen-select" data-placeholder="Opening Time" name="opening[]">
                                                            <!-- Hours added via JS (this is only for demo purpose) -->
                                                        </select>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <select class="chosen-select" data-placeholder="Closing Time" name="closing[]">
                                                            <!-- Hours added via JS (this is only for demo purpose) -->
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- Day / End -->

                                                <!-- Day -->
                                                <div class="row opening-day js-demo-hours">
                                                    <div class="col-md-2">
                                                        <h5>Saturday <input type="hidden" name="day[]" value="Saturday"><input type="hidden" name="day_id[]" ></h5>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <select class="chosen-select" data-placeholder="Opening Time" name="opening[]">
                                                            <!-- Hours added via JS (this is only for demo purpose) -->
                                                        </select>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <select class="chosen-select" data-placeholder="Closing Time" name="closing[]">
                                                            <!-- Hours added via JS (this is only for demo purpose) -->
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- Day / End -->

                                                <!-- Day -->
                                                <div class="row opening-day js-demo-hours">
                                                    <div class="col-md-2">
                                                        <h5>Sunday <input type="hidden" name="day[]" value="Sunday"><input type="hidden" name="day_id[]" ></h5>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <select class="chosen-select" data-placeholder="Opening Time" name="opening[]">
                                                            <!-- Hours added via JS (this is only for demo purpose) -->
                                                        </select>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <select class="chosen-select" data-placeholder="Closing Time" name="closing[]">
                                                            <!-- Hours added via JS (this is only for demo purpose) -->
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- Day / End -->

                                            </div>
                                            <!-- Switcher ON-OFF Content / End -->

                                        </div>
                                        <!-- Section / End -->

                                    @endif

                    @if ($Activeuser->status == 1)
                    <!-- Section -->
					<div class="add-listing-section margin-top-45">

						<!-- Headline -->
						<div class="add-listing-headline">
							<h3><i class="sl sl-icon-book-open"></i> Areas We Serve</h3>
							<!-- Switcher -->
							<label class="switch"><input type="checkbox" name="area_status" @if ($business->area_status == 1) checked @endif><span class="slider round"></span></label>
						</div>

						<!-- Switcher ON-OFF Content -->
						<div class="switcher-content">

							<div class="row">
								<div class="col-md-12">
									<table id="pricing-list-container">
										<tr class="pricing-list-item pattern">
                                            @php
                                            $area = $business->areas;
                                            // $state = \App\Models\State::where('id', $area->state_id);
                                        @endphp
                                         @foreach ($area as $item)
											<td>
												<div class="fm-move"><i class="sl sl-icon-cursor-move"></i></div>
                                                <input type="hidden" name="area_id[]" value="{{$item->id}}" id="">
                                                <div class="fm-input"><input type="text" name="areaserve[]" value="{{$item->area}}" /></div>
                                                <div class="fm-input"><input type="text" name="area_slug[]" value="{{$item->slug}}" /></div>
                                                @php
                                                    $state = \App\Models\State::where('id', $item->state_id)->first();
                                                @endphp

                                                <div class="fm-input state-name">
                                                    <select name="state_id[]" id="state">
                                                        @if ($state!=null)
                                                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                                                        @else
                                                        <option value="">Please Select</option>
                                                        @endif
                                                        @foreach ($states as $list)
                                                            <option value="{{ $list->id }}">{{ $list->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
												<div class="fm-close"><a onclick="return confirm('Are you sure? Please Save the Data first. The page will reload.');"  href="{{route('area.destroy')}}/{{$item->id}}" ><i class="fa fa-remove"></i></a></div>
											</td>
                                            @endforeach
										</tr>
									</table>
									{{-- <a href="#" class="button add-pricing-list-item">Add Item</a> --}}
									<a href="#" class="button add-pricing-submenu">Add Area</a>
								</div>
							</div>

						</div>
						<!-- Switcher ON-OFF Content / End -->

                    </div>
                    @endif

                    <div class="add-listing-section margin-top-45">

                            <!-- Headline -->
                            <div class="add-listing-headline">
                                <h3><i class="sl sl-icon-book-open"></i>Tags</h3>
                                <!-- Switcher -->
                                {{-- <label class="switch"><input type="checkbox" name="area_status" checked><span class="slider round"></span></label> --}}
                            </div>
                        <!-- Switcher ON-OFF Content -->

							<div class="row">
								<div class="col-md-12">
									<table id="tag-list-container">
										<tr class="tag-list-item pattern">
                                            @php
                                            $tags = $business->tags;
                                            // $state = \App\Models\State::where('id', $area->state_id);
                                        @endphp
                                        @foreach ($tags as $item)
                                        <td>
                                            <div class="ft-move"><i class="sl sl-icon-cursor-move"></i></div>
                                            <input type="hidden" name="tag_id[]" value="{{$item->id}}" id="">
                                            <div class="ft-input"><input type="text" placeholder="Tag Name" name="tag[]" value="{{$item->name}}"/></div>
                                            <div class="ft-close"><a onclick="return confirm('Are you sure? Please Save the Data first. The page will reload.');"  href="{{route('tag.delete')}}/{{$item->id}}"><i class="fa fa-remove"></i></a></div>
                                        </td>
                                        @endforeach
										</tr>
									</table>
									<a href="#" class="button add-tag-submenu">Add Tag</a>
								</div>
							</div>



						<!-- Switcher ON-OFF Content / End -->.

                    </div>
                    @if ($Activeuser->role_id == 1)
                    <div class="add-listing-section margin-top-45">
                        <div class="row">
                            <div class="col-md-12">
                                <h3></i>Status</h3>
                                <label class="switch" style="position: relative; right: 0; top: 16px; z-index: 100"><input type="checkbox" name="status" @if ($business->status == 1) checked @endif><span class="slider round"></span></label>
                            </div>
                        </div>
                    </div>
					<!-- Section / End -->
                    @endif



                                    <button  class="button preview">Update <i class="fa fa-arrow-circle-right"></i></button>
                    </div>
                </form>
			</div>


		</div>

@endsection
@section('js')
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    $(document).ready(function() {
       $('.ckeditor').ckeditor();
    });
</script>
<script>
    $('[id^="deletegallery_"]').click(function (e) {
        // e.preventDefault();
        var data = $(this).attr('data-remove');
        alert("Please Save Data Page Will Reload!");
        $.ajax({
            type: "GET",
            url: "{{ route('deletegallery') }}",
            data:{'data': data},
            success: function(data) {
               var image = data.image;
               location.reload()
                // if(image.success == true){ // if true (1)
                //     setTimeout(function(){// wait for 5 secs(2)
                //         location.reload(); // then reload the page.(3)
                //     }, 5000);
                // }
                // var gallery = data.gallery;
                // alert(gallery);
                // console.log(gallery);

            }
        });
    });
</script>
@endsection
