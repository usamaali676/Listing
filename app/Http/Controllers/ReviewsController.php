<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\GlobalHelper;
use RealRashid\SweetAlert\Facades\Alert;

class ReviewsController extends Controller
{
    public function store(Request $request){
        // dd($request->all());
        $request->validate([
            'business_id' => 'required|exists:businesses,id',
            'name' => 'required|string|max:255',
            'review' => 'required|string',
            'stars' => 'required|Integer',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);
        $images = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = GlobalHelper::fts_upload_img($image, 'review_images');
                $images[] = $path;
            }
        }

            Review::create([
                'business_id' => $request->business_id,
                'user_id' => Auth::id(),
                'name' => $request->name,
                'stars' => $request->stars,
                'review' => $request->review,
                'images' => $images,
            ]);
            Alert::success('Success', "Review Added Successfully");
            return redirect()->back();
    }

    public function fetchReviews(Request $request, $businessId)
    {
        $reviews = Review::where('business_id', $businessId)
                         ->with('user')
                         ->orderBy('created_at', 'desc')
                         ->paginate(5);

        return response()->json($reviews);
    }



}
