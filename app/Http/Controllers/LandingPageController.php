<?php

namespace App\Http\Controllers;

use App\Helpers\GlobalHelper;
use App\Models\BannerLandPage;
use App\Models\Business;
use App\Models\FeaturesLandPage;
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
        $srno = 1;
        return view('landingPage.index', compact('landingPage', 'srno'));
    }
    public function show($slug)
    {
        $land_page = LandingPage::where('slug', $slug)->first();
        return view('websitePage.index');
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
        // if($request->services_check == true) {
        //     dd("sdfjhsdkjf");
        // }

        // dd($request->all());
        $request->validate([
            'title' => 'required',
            'slug' => 'required | unique:landing_pages,slug',
        ]);
        $businessId = Business::where('id', $request->business_id)->pluck('lp_id')->first();
        // dd($businessId);
        $slug = preg_replace('/\s+/', '-', $request->slug);
        $comp_slug = $businessId.'-'.$slug;
        $about = $request->only('about_heading','about_description');
        $about_encoded = json_encode($about);
        $content = $request->only('content_title', 'content_description');
        $content_encoded = json_encode($content);
        if(isset($request->logo )) {
            $logo_path = GlobalHelper::fts_upload_img($request->logo, 'logo');
        }
        else {
            $logo_path = "";
        }

        $landingPage = LandingPage::create([
            'business_id' => $request->business_id,
            'title' => $request->title,
            'slug' => $comp_slug,
            'meta_title' => $request->meta_title,
            'meta_keywords' => $request->meta_keyword,
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

        // dd($landingPage_id);

        if(count($request->service_title) > 0 && $request->services_check == true) {

            foreach ($request->service_title as $key=>$title) {
                // dd($key, $request->service_description);
                if(isset($title)) {
                    $service['land_page_id'] = $landingPage_id;
                    $service['service_title'] = $title;
                    $service['service_description'] = $request->service_description[$key];
                    ServiceLandPage::create($service);
                }
            }
        }

        if($request->feature_check == true && count($request->feature_title) > 0) {
            // $service
            foreach ($request->feature_title as $key=>$title) {
                if(isset($title)) {
                    $feature['land_page_id'] = $landingPage_id;
                    $feature['feature_title'] = $title;
                    $feature['feature_description'] = $request->feature_description[$key];
                    FeaturesLandPage::create($feature);
                }
            }
        }

        if($request->testimonials_check == true && count($request->testimonial_title) > 0) {
            // $testimonial
            foreach ($request->testimonial_title as $key=>$title) {
                if(isset($title)) {
                    $testimonial['land_page_id'] = $landingPage_id;
                    $testimonial['testimonial_title'] = $title;
                    $testimonial['testimonial_description'] = $request->testimonial_description[$key];
                    TestimonialsLandPage::create($testimonial);
                }
            }
        }

        if( $request->gallery_check == true && count($request->gallery_image) > 0) {
            foreach($request->gallery_image as $image) {
                $gallery['land_page_id'] = $landingPage_id;
                $gallery['image'] = GlobalHelper::fts_landpage_img($image, 'gallery');
                GalleryLandPage::create($gallery);
            }
        }

       if(isset($request->banner_heading)){
            $banner['heading'] = $request->banner_heading;
            $banner['subheading'] = $request->banner_subheading;
            $banner['heading_color'] = $request->banner_heading_color;
            $banner['subheading_color'] = $request->banner_subheading_color;
            $banner['desktop_image'] = GlobalHelper::fts_landpage_img($request->desktop_image, 'desk_banner');
            $banner['mobile_image'] = GlobalHelper::fts_landpage_img($request->mobile_image, 'mob_banner');
            $banner['land_page_id'] = $landingPage_id;
            BannerLandPage::create($banner);
       }

       Alert::success('Success', "LandingPage Added Successfully");
       return redirect()->route('landingpage.index');

    }

    /**
     * Display the specified resource.



     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LandingPage  $landingPage
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $land_page = LandingPage::find($id);
       $business = Business::all();
       $about = json_decode($land_page->about_us);
       $content = json_decode($land_page->content);
    //    dd($land_page);
       return view('landingpage.edit', compact('land_page','business', 'about','content'));
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
