@extends('layouts.app')
@section('content')
@section('css')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="{{asset('assets/css/landingPage.css')}}">
@endsection

<!-- Titlebar -->
<div id="titlebar">
    <div class="row">
        <div class="col-md-12">
            <h2>Add Landing Page</h2>
            <!-- Breadcrumbs -->
            <nav id="breadcrumbs">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Dashboard</a></li>
                    <li>Edit Landing Page</li>
                </ul>
            </nav>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <form action="{{route('landingpage.store')}}" method="POST" enctype="multipart/form-data">
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
            <div id="add-landingPage">

                <!-- Section -->
                <div class="landingpage-tabs">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a>
                        </li>
                        <li role="presentation">
                            <a href="#services" aria-controls="services" role="tab" data-toggle="tab">Services</a>
                        </li>
                        <li role="presentation">
                            <a href="#content" aria-controls="content" role="tab" data-toggle="tab">Content</a>
                        </li>
                        <li role="presentation">
                            <a href="#testimonials" aria-controls="testimonials" role="tab" data-toggle="tab">Testimonials</a>
                        </li>
                        <li role="presentation">
                            <a href="#slider" aria-controls="slider" role="tab" data-toggle="tab">Slider</a>
                        </li>
                        <li role="presentation">
                            <a href="#gallery" aria-controls="gallery" role="tab" data-toggle="tab">Gallery</a>
                        </li>
                        <li role="presentation">
                            <a href="#about" aria-controls="about" role="tab" data-toggle="tab">About</a>
                        </li>
                        <li role="presentation" class="last-li">
                            <a href="#feature" aria-controls="feature" role="tab" data-toggle="tab">Features</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home">
                            <!-- Section -->
                            <div class="add-listing-section">

                                <!-- Headline -->
                                <div class="add-listing-headline">
                                    <h3><i class="sl sl-icon-doc"></i> Basic Informations</h3>
                                </div>
                                {{-- <input type="hidden" name="lp_id" id=""> --}}

                                <!-- Title -->
                                <div class="row with-forms">
                                    <div class="col-md-6">
                                        <h5>Business</h5>
                                        <select name="business_id" class="selectpicker chosen-select-no-single"
                                            data-style="btn btn-success btn-round" data-live-search="true" required>
                                            @if (isset($land_page->business_id))
                                                <option value="{{$land_page->business_id}}" selected>{{ $land_page->business->name }}</option>
                                            @else
                                                <option label="blank">Select Business</option>
                                            @endif
                                            @foreach ($business as $item)
                                            <option value="{{$item->id}}">{{ $item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <h5>Title <i class="title" data-tip-content="Name of your business"></i></h5>
                                        <input class="search-field" type="text" value="{{ $land_page->title }}" name="title"  required />
                                    </div>
                                </div>

                                <!-- Row -->
                                <div class="row with-forms">
                                    <!-- Slug -->
                                    <div class="col-md-6">
                                        <h5>Slug</h5>
                                        <input class="search-field" type="text" value="{{ $land_page->slug }}" name="slug"  required />
                                    </div>
                                    <!-- Logo -->
                                    <div class="col-md-6">
                                        <h5>Logo</h5>
                                        <div class="uploadButton margin-top-15 text-center">
                                            @if (isset($land_page->logo))
                                                <img src="{{ asset('uploads/'. $land_page->logo)}}" alt="Logo" width="100%" class="img-responsive">
                                            @endif
                                            <input type="file" name="logo" accept="image/*" id="upload"  >
                                        </div>
                                    </div>
                                </div>

                                <!-- Row -->
                                <div class="row with-forms">
                                    <div class="col-md-6">
                                        <h5>Meta Title</h5>
                                        <input class="search-field" type="text" value="{{ $land_page->meta_title }}" name="meta_title" />
                                    </div>
                                    <div class="col-md-6">
                                        <h5>Meta Keyword</h5>
                                        <input class="search-field" type="text" value="{{$land_page->meta_keywords}}" name="meta_keyword" />
                                    </div>
                                </div>

                                <!-- Row -->
                                <div class="row with-forms">
                                    <div class="col-md-6">
                                        <h5>Meta Description</h5>
                                        <input class="search-field" type="text" value="{{$land_page->meta_description}}" name="meta_description" />
                                    </div>

                                    <div class="col-md-6">
                                        <h5>Google Map</h5>
                                        <input class="search-field" value="{{$land_page->google_map}}" type="text" name="google_map" required />
                                    </div>
                                    <div class="col-md-6">
                                        <h5>Address</h5>
                                        <input class="address" type="text" value="{{$land_page->address}}" name="address" required />
                                    </div>
                                    <div class="col-md-6">
                                        <h5>Phone</h5>
                                        <input class="phone" type="text" value="{{$land_page->phone}}" name="phone" />
                                    </div>
                                    <div class="col-md-6">
                                        <h5>Email</h5>
                                        <input class="email" type="text" value="{{$land_page->email}}" name="email" />
                                    </div>
                                </div>

                                <!-- Additional Options -->
                                <div class="row with-forms">
                                    <div class="col-md-6">
                                        <div class="heading-checkbox" ><h3>Status</h3></div>
                                        <!-- Switcher -->
                                        <label class="switch">
                                            <input type="checkbox" name="status" @if ( $land_page->status == true ) checked @endif>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="heading-checkbox"><h3>Contact Form</h3></div>
                                        <!-- Switcher -->
                                        <label class="switch">
                                            <input type="checkbox" name="form_check" @if($land_page->form_check == true) checked @endif>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>


                                </div>

                            </div>
                            <!-- Section / End -->
                        </div>

                            <!-- Additional Tab Panes -->
                        <div role="tabpanel" class="tab-pane" id="services">
                                <!-- Section -->
                            <div class="add-listing-section">

                                <!-- Headline -->
                                <div class="add-listing-headline">
                                    <h3><i class="sl sl-icon-grid"></i> Services</h3>
                                    <!-- Switcher -->
                                    <label class="switch"><input type="checkbox" name="service_check" @if ($land_page->service_check == true) checked  @endif ><span
                                            class="slider round"></span></label>
                                </div>

                                <!-- Switcher ON-OFF Content -->
                                <div class="switcher-content">
                                                                    <!-- Row -->
                                            <div class="row with-forms">
                                                @foreach ($land_page->service as $key=>$service)
                                                     <!-- Slug -->
                                                <div class="col-md-12">
                                                    <h5>Title {{ $key }}</h5>
                                                    <input class="search-field" type="text" value="{{$service->service_title}}" name="service_title[]"   />

                                                </div>
                                                <div class="col-md-12">
                                                    <h5>Description</h5>
                                                    <textarea  id="editor1" rows="5" name="service_description[]"  cols="80">
                                                        {{ $service->service_description }}
                                                    </textarea>
                                                </div>
                                                @endforeach

                                            </div>
                                </div>
                                <!-- Switcher ON-OFF Content / End -->

                            </div>
                                <!-- Section / End -->
                        </div>
                        <div role="tabpanel" class="tab-pane" id="content">
                            <div class="add-listing-section">

                                <!-- Headline -->
                                <div class="add-listing-headline">
                                    <h3><i class="sl sl-card-checklist"></i> Content</h3>
                                    <!-- Switcher -->
                                    <label class="switch"><input type="checkbox" name="content_check" @if ($land_page->content_check == true) checked @endif ><span
                                            class="slider round"></span></label>
                                </div>

                                <!-- Switcher ON-OFF Content -->
                                <div class="switcher-content">
                                                                    <!-- Row -->
                                            <div class="row with-forms">
                                                <!-- Slug -->
                                                <div class="col-md-12">
                                                    <h5>Title 1</h5>
                                                    <input class="search-field" type="text" name="content_title" value="{{$content->content_title}}"   />
                                                </div>
                                                <div class="col-md-12">
                                                    <h5>Description</h5>
                                                    <textarea  id="editor1" rows="5" name="content_description" cols="80">
                                                        {!! $content->content_description !!}
                                                    </textarea>
                                                </div>

                                            </div>
                                </div>
                                <!-- Switcher ON-OFF Content / End -->

                            </div>
                        </div>

                        <div role="tabpanel" class="tab-pane" id="testimonials">
                            <div class="add-listing-section">

                                <!-- Headline -->
                                <div class="add-listing-headline">
                                    <h3><i class="sl sl-icon-grid"></i>Testimonials</h3>
                                    <!-- Switcher -->
                                    <label class="switch"><input type="checkbox" name="testimonial_check" @if ($land_page->testimonial_check == true)
                                        checked   @endif ><span
                                            class="slider round"></span></label>
                                </div>

                                <!-- Switcher ON-OFF Content -->
                                <div class="switcher-content">
                                                                    <!-- Row -->
                                            <div class="row with-forms">
                                                <!-- Slug -->
                                                @foreach ($land_page->testimonial as $key=>$testimonial)
                                                    <div class="col-md-12">
                                                        <h5>Client Name</h5>
                                                        <input class="search-field" type="text" name="testimonial_title[]" value="{{ $testimonial->testimonial_title }}" />
                                                    </div>
                                                    <div class="col-md-12">
                                                        <h5>Description</h5>
                                                        <textarea  id="editor1" name="testimonial_description[]" rows="5" cols="80">
                                                            {!! $testimonial->testimonial_description !!}
                                                        </textarea>
                                                    </div>
                                                @endforeach




                                            </div>
                                            {{-- <div class="row with-forms">
                                                <!-- Slug -->
                                                @for ($i = 1 ; $i <= 3 ; $i++)
                                                <div class="col-md-12">
                                                    <h5>Client Name</h5>
                                                    <input class="search-field" type="text" name="testimonial_title[]"  />
                                                </div>
                                                <div class="col-md-12">
                                                    <h5>Description</h5>
                                                    <textarea  id="editor1" name="testimonial_description[]" rows="5" cols="80">
                                                    </textarea>
                                                </div>
                                                @endfor

                                            </div> --}}
                                </div>
                                <!-- Switcher ON-OFF Content / End -->

                            </div>
                        </div>


                        <div role="tabpanel" class="tab-pane" id="slider">
                            <div class="add-listing-section">

                                <!-- Headline -->
                                <div class="add-listing-headline">
                                    <h3><i class="sl sl-icon-grid"></i>Slider</h3>
                                    <!-- Switcher -->

                                </div>




                                                                    <!-- Row -->
                                            <div class="row with-forms">
                                                <!-- Slug -->
                                                <div class="col-md-6">
                                                    <h5>Heading</h5>
                                                    <input class="search-field" type="text" name="banner_heading" value="{{ $land_page->banner->heading }}" required  />
                                                </div>
                                                <div class="col-md-6">
                                                    <h5>Sub Heading</h5>
                                                    <input class="search-field" type="text" name="banner_subheading" value="{{ $land_page->banner->subheading }}"  />
                                                </div>
                                                <div class="col-md-6">
                                                    <h5>Slider Heading Color</h5>
                                                    <input class="search-field" type="text" name="banner_heading_color" value="{{ $land_page->banner->heading_color }}"  placeholder="#eee"/>
                                                </div>


                                                <div class="col-md-6 ">
                                                    <h5>Slider Text Color</h5>
                                                   <div class="slider-radio" style="display: block">
                                                    <label class="custom-control custom-radio" style="display: flex; gap: 10px;">
                                                        <input class="form-check-input" type="radio" name="banner_subheading_color" id="slider_text_color" value="1" @if ($land_page->banner->subheading_color == 1) checked @endif>
                                                        <span class="custom-control-description">Black</span>
                                                    </label>
                                                    <label class="custom-control custom-radio" style="display: flex; gap: 10px;">
                                                        <input class="form-check-input" type="radio" name="banner_subheading_color" id="slider_text_color1" value="0"  @if ($land_page->banner->subheading_color == 0) checked @endif>
                                                        <span class="custom-control-description">White</span>
                                                    </label>
                                                   </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <h5>Desktop Banner</h5>
                                                    <div class="">
                                                        <input type="file" name="desktop_image" accept="image/*" id="upload" required >
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <h5>Mobile Banner</h5>
                                                    <div class="">
                                                        <input type="file" name="mobile_image" accept="image/*" id="upload" required >
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="heading-checkbox" ><h3>Video</h3></div>
                                                    <!-- Switcher -->
                                                    <label class="switch">
                                                        <input type="checkbox" name="video_check" value="{{$land_page->video_check}}" checked>
                                                        <span class="slider round"></span>
                                                    </label>
                                                </div>
                                            </div>
                                <!-- Switcher ON-OFF Content / End -->

                            </div>
                        </div>

                        <div role="tabpanel" class="tab-pane" id="gallery">
                            <div class="add-listing-section">

                                <!-- Headline -->
                                <div class="add-listing-headline">
                                    <h3><i class="sl sl-icon-doc"></i> Gallery</h3>
                                    <label class="switch"><input type="checkbox" name="gallery_check" value="{{$land_page->gallery_check}}" checked><span
                                        class="slider round"></span></label>
                                </div>

                                 <!-- Switcher ON-OFF Content --><!-- Switcher ON-OFF Content -->
                                <div class="switcher-content">
                                                                    <!-- Row -->
                                            <div class="row with-forms">
                                                @for ($i = 1; $i <= 12; $i++)
                                                     <!-- Button 1 -->
                                                <div class="col-lg-4  img-gallery-div">
                                                    <label class="btn-upload" for="fileInput">
                                                        <span>Select Image</span>
                                                    </label>
                                                    <!-- Hidden File Input -->
                                                    <input type="file" id="fileInput" name="gallery_image[]">
                                                </div>
                                                @endfor


                                            </div>
                                </div>

                            </div>
                        </div>

                        <div role="tabpanel" class="tab-pane " id="about">
                                <!-- Section -->
                                <div class="add-listing-section">

                                    <!-- Headline -->
                                    <div class="add-listing-headline">
                                        <h3><i class="sl sl-icon-doc"></i> About</h3>
                                    </div>




                                    <!-- Row -->
                                    <div class="row with-forms">
                                        <!-- Slug -->
                                        <div class="col-md-12">
                                            <h5>Title 1</h5>
                                            <input class="search-field" type="text" name="about_heading" value="{{ $about->about_heading}}"  />
                                        </div>
                                        <div class="col-md-12">
                                            <h5>Description</h5>
                                            <textarea  id="editor1" rows="5" name="about_description" cols="80">
                                                {{$about->about_description}}
                                                                        </textarea>
                                        </div>

                                    </div>
                                    <!-- Section / End -->
                                </div>



                        </div>

                        <div role="tabpanel" class="tab-pane " id="feature">
                                <!-- Section -->
                                <div class="add-listing-section">

                                    <!-- Headline -->
                                    <div class="add-listing-headline">
                                        <h3><i class="sl sl-icon-doc"></i> Features</h3>
                                        <label class="switch"><input type="checkbox" name="feature_check" value="{{$land_page->feature_check}}" checked><span
                                            class="slider round"></span></label>
                                    </div>


                                <!-- Switcher ON-OFF Content -->
                                <div class="switcher-content">
                                    <!-- Row -->
                                            <div class="row with-forms">

                                                @foreach ($land_page->features as $key=>$features)
                                                    <!-- Slug -->
                                                    <div class="col-md-12">
                                                        <h5>Title {{ $key }}</h5>
                                                        <input class="search-field" type="text" name="feature_title[]" value="{{ $features->feature_title }}"  />
                                                    </div>
                                                    <div class="col-md-12">
                                                        <h5>Description</h5>
                                                        <textarea  class="ckeditor WYSIWYG" id="editor1" rows="5" name="feature_description[]" cols="80">
                                                            {{ $features->feature_description }}
                                                        </textarea>
                                                    </div>
                                                @endforeach





                                            </div>
                                </div>
                                <!-- Switcher ON-OFF Content / End -->

                                </div>



                        </div>
                </div>
            </div>

            <button class="button preview">Submit <i class="fa fa-arrow-circle-right"></i></button>
    </div>
    </form>
</div>

@endsection

@section('js')
<!-- jQuery -->
<!-- Bootstrap JS for Bootstrap 3 -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
    integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.9.0/ckeditor.js" integrity="sha512-x9cTrtvYtEBMlCpiMPiN66HsNQ0Rf2l9eeFeExYmOWdPFjPrT5a9UPdLTZ+tdxtmE5eeKIril3xXFJGSYKXTYA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
       $('.ckeditor').ckeditor();
    });
</script>
@endsection


