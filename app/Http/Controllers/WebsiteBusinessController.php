<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class WebsiteBusinessController extends Controller
{
    // public function index()
    // {
    //     return view('website_landingpage.index');
    // }
    public function index($slug)
    {
        $business = Business::where('slug', $slug)->first();
        if($business){
        $relatedbusiness = $business->cat()->first()->businesses()->where('business_id', '!=', $business->id)->where('status', 1)->take(4)->get();
        $initialReviews = $business->reviews()->orderBy('created_at', 'desc')->take(5)->get();
        $averageRating = $business->averageRating();
        // dd($business->slug);
        return view('FrontEnd.business', compact('business','relatedbusiness', 'initialReviews', 'averageRating'));
        }
        else{
            $blog = Blog::where('slug',$slug)->first();
            if ($blog) {
                // dd($blog->banner);
                $relatedPost=Blog::where('category_id',$blog->category_id)->where('id','!=',$blog->id)->latest()->take(6)->get();
                return view('FrontEnd.single_blog', compact('relatedPost','blog'));
            }
            else{
                return view('error_page');

            }

        }
    }

}
