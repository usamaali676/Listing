<?php

namespace App\Http\Controllers;

use App\Helpers\GlobalHelper;
use App\Models\BannerLandPage;
use App\Models\Business;
use App\Models\GalleryLandPage;
use App\Models\LandingPage;
use App\Models\ServiceLandPage;
use App\Models\TestimonialsLandPage;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $landingPage = LandingPage::all();
        return view('landingPage.index', compact('landingPage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $business = Business::all();
        return view('landingPage.add', compact('business'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required | unique:landing_pages,',
        ]);
        $slug = preg_replace('/\s+/', '-', $request->slug);
        $about = $request->only('about_heading','about_description');
        $about_encoded = json_encode($about);
        $content = $request->only('content_title', 'content_description');
        $content_encoded = json_encode($content);
        if(isset($request->logo)) {
            $logo_path = GlobalHelper::fts_upload_img($request->logo, 'logo');
        }

        $landingPage = LandingPage::create([
            'business_id' => $request->business_id,
            'title' => $request->title,
            'slug' => $slug,
            'meta_title' => $request->meta_title,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'about_check' => $request->about_check? 1 : 0,
            'content_check' => $request->content_check? 1 : 0,
            'about_us' => $about_encoded,
            'content' => $content_encoded,
            'address' =>$request->address,
            'google_map' => $request->google_map,
            'phone' => $request->phone,
            'email' => $request->email,
            'logo' => $logo_path,
            'form_check' => $request->form_check? 1 : 0,
            'video_check' => $request->video_check? 1 : 0,
            'service_check' => $request->service_check? 1 : 0,
            'testimonial_check' => $request->testimonial_check? 1 : 0,
            'gallery_check' => $request->gallery_check? 1 : 0,
            'feature_check' => $request->feature_check? 1 : 0,
            'status' => $request->status? 1 : 0,

        ]);
        $landingPage_id = $landingPage->id ;

        if(count($request->service_title) > 0 && $request->service_check == 1) {
            // $service
            foreach ($request->service_title as $title) {
                if(isset($title)) {
                    $service['landing_page_id'] = $landingPage_id;
                    $service['title'] = $title;
                    $service['description'] = $request->service_description[$title];
                    ServiceLandPage::create($service);
                }
            }
        }

        if(count($request->testimonial_title) > 0 && $request->testimonial_check == 1) {
            // $testimonial
            foreach ($request->testimonial_title as $title) {
                if(isset($title)) {
                    $testimonial['landing_page_id'] = $landingPage_id;
                    $testimonial['testimonial_title'] = $title;
                    $testimonial['testimonial_description'] = $request->testimonial_description[$title];
                    TestimonialsLandPage::create($testimonial);
                }
            }
        }

        if(count($request->gallery_image) > 0 && $request->gallery_check == 1) {
            foreach($request->gallery_image as $image) {
                $gallery['landing_page_id'] = $landingPage_id;
                $gallery['image'] = GlobalHelper::fts_landpage_img($image, 'gallery');
                GalleryLandPage::create($gallery);
            }
        }

       if($request->banner_check){
            $banner['heading'] = $request->banner_heading;
            $banner['subheading'] = $request->banner_subheading;
            $banner['heading_color'] = $request->banner_heading_color;
            $banner['subheading_color'] = $request->banner_subheading_;
            $banner['desktop_image'] = GlobalHelper::fts_landpage_img($request->desktop_image, 'desk_banner');
            $banner['mobile_image'] = GlobalHelper::fts_landpage_img($request->mobile_image, 'mob_banner');
            $banner['land_page_id'] = $request->land_page_id;
            BannerLandPage::create($banner);
       }

       Alert::success('Success', "LandingPage Added Successfully");
       return redirect()->route('landingPage.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LandingPage  $landingPage
     * @return \Illuminate\Http\Response
     */
    public function show(LandingPage $landingPage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LandingPage  $landingPage
     * @return \Illuminate\Http\Response
     */
    public function edit(LandingPage $landingPage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LandingPage  $landingPage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LandingPage $landingPage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LandingPage  $landingPage
     * @return \Illuminate\Http\Response
     */
    public function destroy(LandingPage $landingPage)
    {
        //
    }
}
