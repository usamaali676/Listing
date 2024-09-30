@extends('layouts.app')
@section('css')
<style>
    .add-listing-section label.switch {
    position: absolute;
    right: 40px;
    left: 0;
    top: 30px;
    z-index: 100;
    margin: 15px 0;
}
</style>
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

				<div id="add-listing" class="separated-form">

					<!-- Section -->
					<div class="add-listing-section" style="padding: 0 40px 60px 40px">

						<!-- Headline -->
						<div class="add-listing-headline">
							<h3><i class="sl sl-icon-doc"></i> Blog Data</h3>
						</div>

						<!-- Title -->
                        <form action="{{route('blog.update')}}" method="POST" enctype="multipart/form-data">
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

                            <!-- Status -->
                            <div class="col-md-6 " >
                                <h5> Category</h5>
                                <select  name="cat_id" class="selectpicker chosen-select-no-single" data-style="btn btn-success btn-round" data-live-search="true" >

                                    @if ($selectcat != Null)
                                    <option value="{{$selectcat->id}}" selected>{{$selectcat->name}}</option>
                                    @else
                                    <option label="blank">Select Category</option>
                                    @endif
                                    @foreach ($category as $item)
                                    @if ($item->id != $selectcat->id)
                                    <option value="{{$item->id}}" >{{ $item->name}}</option>
                                    @endif

                                    @endforeach

                                </select>
                            </div>
                            <div class="col-md-6">
                                <h5>Title <i class="tip" data-tip-content="Name of your Blog"></i></h5>
                                <input type="hidden" value="{{$blog->id}}" name="blog_id">
								<input class="search-field" type="text" value="{{$blog->title}}" name="title" />
                            </div>


                        </div>
                        <div class="row with-forms">

                            <!-- Status -->
                            <div class="col-md-6 " >
                                <h5>Slug <i class="tip" data-tip-content="Must Be Unique"></i></h5>
								<input class="search-field" type="text" value="{{$blog->slug}}" name="slug" />
                            </div>
                            <div class="col-md-6">
                                <h5>Meta Title </h5>
								<input class="search-field" type="text" value="{{$blog->meta_title}}" name="meta_title" />
                            </div>


                        </div>
                        <div class="row with-forms">

                            <!-- Status -->
                            <div class="col-md-6 " >
                                <h5>Meta Keyword </h5>
								<input class="search-field" type="text" value="{{$blog->meta_keyword}}" name="meta_keyword" />
                            </div>
                            <div class="col-md-6">
                                <h5>Meta Description</h5>
								<input class="search-field" type="text" value="{{$blog->meta_description}}" name="meta_description" />
                            </div>


                        </div>
                        <div class="row with-forms">

                            <!-- Status -->
                            <div class="col-md-6 " >
                                <h5>Banner</h5>
                                <div class="uploadButton margin-top-15 text-center">
                                    <input type="file" name="banner" accept="image" id="bannerfile">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h5>Banner Image Alt Text</h5>
                                <input class="search-field" type="text" value="{{$blog->banner_alt}}" name="banner_alt_text" />
                            </div>


                        </div>

						<div class="row with-forms">
							<div class="col-md-12">
								<h5>Description  </h5>
                                <textarea class="ckeditor search-field" name="description">{!! $blog->description !!}</textarea>

								{{-- <input class="search-field" type="text" name="name" /> --}}
							</div>
						</div>
                        <div class="row with-forms">

                            <!-- Status -->
                            <div class="col-md-6 " >
                                <h5>Feature Image</h5>
                                <div class="uploadButton margin-top-15 text-center">
                                    <input type="file" name="feature_image" accept="image/*, application/pdf" id="upload">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h5>Banner Image Alt Text</h5>
                                <input class="search-field" type="text" value="{{$blog->image_alt}}" name="feature_alt_text" />
                            </div>


                        </div>
                        <div class="row with-forms">
							<div class="col-md-12" style="float: left">
                                <h5>Blog Status</h5>
                                <label class="switch"><input type="checkbox" name="status" @if ($blog->status == 1) checked @else  @endif ><span class="slider round"></span></label>

								{{-- <input class="search-field" type="text" name="name" /> --}}
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
@section('js')
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    $(document).ready(function() {
       $('.ckeditor').ckeditor();
    });
</script>
<script type="text/javascript">
    CKEDITOR.replace('description', {
    filebrowserUploadUrl: "{{route('blog.ckeditor', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
    });
    </script>

<script>
    var uploadField = document.getElementById("bannerfile");

uploadField.onchange = function() {
    // alert("working");
    if(this.files[0].size > 120000){
       alert("File is too big!");
       this.value = "";
    };
};
</script>
@endsection
