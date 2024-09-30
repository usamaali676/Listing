<?php

namespace App\Http\Controllers;

use App\Helpers\GlobalHelper;
use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use App\Models\BusinessCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $srno = 1;
        $blog = Blog::orderBy('id', 'DESC')->get();
        // dd($blog->category->name);
        return view('blog.Index', compact('blog','srno'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = DB::table('business_categories')->get();
        return view('blog.add',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $request)
    {
        // dd($request->all());
        $blog = new Blog();
        $blog->category_id  = $request->cat_id;
        $blog->title  = $request->title;
        $blog->slug  = $request->slug;
        $blog->meta_title  = $request->meta_title;
        $blog->meta_keyword  = $request->meta_keyword;
        $blog->meta_description  = $request->meta_description;
        $blog->description  = $request->description;
        $blog->banner_alt  = $request->banner_alt_text;
        $blog->image_alt  = $request->feature_alt_text;
        $blog->status = $request->status ? 1 : 0 ?? 0;
        if($request->hasFile('banner'))
        {
            $img_file = $request->file('banner');
            $blog->banner= GlobalHelper::fts_upload_img($img_file,'blog_banner');
        }
        if($request->hasFile('feature_image'))
        {
            $img_file = $request->file('feature_image');
            $blog->image= GlobalHelper::fts_upload_img($img_file,'blog_feature');
        }
        $blog->save();

        Alert::success('Success', "Blog created successfully");
        return redirect()->route('blog.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::find($id);
        $category = BusinessCategory::orderBy('id', 'DESC')->get();
        // dd($blog);
        $selectcat = BusinessCategory::where('id', $blog->category_id)->first();

        return view('blog.edit', compact('blog','selectcat','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        // $blog = Blog::find($id);
        $request->validate([
            'title' => 'unique:blogs,title,'.$request->blog_id,
            'slug' => 'unique:blogs,slug,'.$request->blog_id,
            'meta_title' => 'required',
            'meta_keyword' => 'required',
            'meta_description' => 'required',
            'status' => 'required',
        ]);

        $input['category_id']=$request->cat_id;
        $input['title']=$request->title;
        $input['slug']=$request->slug;
        $input['meta_title']=$request->meta_title;
        $input['meta_keyword']=$request->meta_keyword;
        $input['meta_description']=$request->meta_description;
        $input['heading']=$request->heading;
        $input['description']=$request->description;
        $input['banner_alt']=$request->banner_alt_text;
        $input['image_alt']=$request->feature_alt_text;
        $input['status']=$request->status ? 1 : 0 ?? 0;

        // dd($request->banner);
    	if($request->hasFile('banner'))
        {
            // dd("file");
            $img_file = $request->file('banner');
            $input['banner']= GlobalHelper::fts_upload_img($img_file,'blog_banner');
            $old_img=$request->banner;
            GlobalHelper::delete_img($old_img,'blog_banner');
            // dd($input);
        }
    	if($request->hasFile('feature_image'))
        {
            $img_file = $request->file('feature_image');
            $input['image']= GlobalHelper::fts_upload_img($img_file,'blog_feature');
            $old_img=$request->feature_image;
            GlobalHelper::delete_img($old_img,'blog_feature');
            // dd($input);
        }
        Blog::where('id', $request->blog_id)->update($input);
        Alert::success('Success', "Blog Update Successfully");
        return redirect()->route('blog.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Blog::find($id)->delete();
        Alert::success('Success', "Blog Delete Successfully");
        return redirect()->route('blog.index');
    }
    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;

            $request->file('upload')->move('assets/blog_content', $fileName);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('/assets/blog_content/'.$fileName);
            $msg = 'Image uploaded successfully';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }
}
