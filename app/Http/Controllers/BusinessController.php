<?php

namespace App\Http\Controllers;

use App\Helpers\GlobalHelper;
use App\Models\Business;
use App\Models\BusinessCategory;
use App\Models\AreaWeServe;
use App\Models\OpeningHours;
use App\Models\BusinessGallery;
use App\Models\State;
use App\Models\Tags;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Geocoder\Query\GeocodeQuery;
use Illuminate\Support\Facades\Auth;


class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $user = Auth::user();
        $srno = 1;
        if($user->role_id == 1 || 6){
            $business = Business::where('status', 1)->latest()->paginate(10);
        }
        else{
            $business = Business::where('user_id', $user->id)->where('status', 1)->latest()->paginate(10);
        }
        return view('business.index', compact('business', 'srno'));
    }
    public function search(Request $request)
    {
        $user = Auth::user();
        $query = $request->input('search');
        if($user->status == 1)
        $business = Business::where('name', 'LIKE', "%{$query}%")
                             ->where('status', 1)
                                            ->paginate(10);
        else{
            $business = Business::where('name', 'LIKE', "%{$query}%")
            ->where('status', 1)
            ->where('user_id', $user->id)
            ->paginate(10);
        }
        $resultHtml = view('layouts.partials.business', ['business' => $business])->render();

        return response()->json($resultHtml);
    }

    public function index_pending()
    {
        $user = Auth::user();
        if($user->role_id == 1){
            $business = Business::where('status', 0)->latest()->paginate(10);
        }
        else{
            $business = Business::where('user_id', $user->id)->where('status', 0)->latest()->paginate(10);
        }
        return view('business.pending_index', compact('business'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $business = Business::where('user_id', $user->id)->get();
        if($user->status == 0){
            if($business->count() >= 1) {
            Alert::error('Error', "You Reached Maximum Free Listing Limit");
            return redirect()->back();
            }
            else {
                $bcat = BusinessCategory::all();
                $state = State::all();
                return view('business.add', compact('bcat', 'state'));
            }
        }
        else {
            $bcat = BusinessCategory::all();
            $state = State::all();
            return view('business.add', compact('bcat', 'state'));
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request->all());
        $user = Auth::user();

        $request->validate([
            'slug' => 'required|unique:businesses',
            'name'=> 'required',
            'description' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'email' => 'required',
            'logo' => 'required',
            'feature' => 'required',
            // 'meta_title' => 'required',
            // 'meta_keyword' => 'required',
            // 'meta_description' => 'required'
        ]);
        // $buss = Business::insert([

        // ]);
        $business = new Business();

        $business->name = $request->name;
        $business->user_id = $user->id;
        $request->slug = preg_replace('/\s+/', '-', $request->slug);
        $business->slug = $request->slug;
        if($request->hasFile('logo'))
        {
            $img_file = $request->file('logo');
            $business->logo= GlobalHelper::fts_upload_img($img_file,'logo');
        }
        $business->address = $request->address;
        $business->description = $request->description;
        $business->phone = $request->phone;
        $business->website = $request->website;
        $business->email = $request->email;
        $business->sms = $request->sms;
        $business->gmb = $request->gmb;
        $business->whatsapp = $request->whatsapp;
        $business->fb = $request->fb;
        $business->inst = $request->inst;
        $business->youtube = $request->youtube;
        $business->area_status = $request->area_status ? 1 : 0 ?? 0;
        $business->timing_status = $request->timing_status ? 1 : 0 ?? 0;
        $business->yelp = $request->yelp;
        $business->meta_title = $request->meta_title;
        $business->meta_keywords = $request->meta_keywords;
        $business->meta_description = $request->meta_description;
        $business->video_link = $request->video_link;
        $business->theme_color = $request->theme_color;
        $business->g_review_check = $request->g_review_check;
        $business->g_review_slug = $request->g_review_slug;
        if($user->status == 1){
            $business->status = 1;
        }
        else{
            $business->status = 0;
        }
        if($request->hasFile('feature'))
        {
            $img_file = $request->file('feature');
            $business->featureImage= GlobalHelper::fts_upload_img($img_file,'feature');
        }
        $business->map= $request->map;
        $business->save();
        $business->cat()->attach($request->cat_id);


        if($request->has('area_status'))
        {
            if(isset($request->areaserve) and sizeof($request->areaserve)>0)
            {
                foreach ($request->areaserve as $key => $v)
                {
                    $area['business_id']=$business->id;
                    $area['area']= $v;
                    $area['slug']= $request->area_slug[$key];
                    $area['state_id'] = $request->state_id[$key];
                    AreaWeServe::create($area);
                }
            }
        }


        if($request->has('timing_status'))
        {
            foreach ($request->day as $key => $v)
            {
                $day['business_id'] = $business->id;
                $day['day'] = $v;
                $day['open_hour'] = $request->opening[$key];
                $day['close_hour'] = $request->closing[$key];
                OpeningHours::create($day);
            }
        }



        if(isset($request->images) and sizeof($request->images)>0)
        {
            foreach ($request->file('images') as $key =>$v)
            {
                $gallery['images']= GlobalHelper::fts_upload_img($v, 'gallery_images');
                $gallery['business_id']=  $business->id;
                BusinessGallery::create($gallery);
            }
        }
        if(isset($request->tag) and sizeof($request->tag)>0)
            {
                foreach ($request->tag as $key => $v)
                {
                    $tag['business_id']=$business->id;
                    $tag['name']= $v;
                    Tags::create($tag);
                }
            }

        Alert::success('Success', 'Business Added Successfully');
        return redirect()->route('business.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function show(Business $business)
    {
        //
    }

    public function single($slug)
    {
        $id = Business::where('slug', $slug)->value('id');
        $business = Business::where('id', $id)->first();
        $relatedbusiness = $business->cat()->first()->businesses()->where('business_id', '!=', $business->id)->take(4)->get();
        return view('FrontEnd.business', compact('business','relatedbusiness'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $business = Business::where('id', $id)->first();
        // dd($business->area);
        $category = $business->cat;
        $bcat = BusinessCategory::all();
        // $selectedstate = State::where('id', $business->areas->state_id)->first();
        $states = State::all();
        return view('business.edit', compact('business', 'bcat', 'category', 'states'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        $request->validate([
            'slug' => 'required|unique:businesses,slug,'.$id,
            'name'=> 'required',
            'description' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'email' => 'required',
            // 'meta_title' => 'required',
            // 'meta_keyword' => 'required',
            // 'meta_description' => 'required'
        ]);
        $user = Auth::user();
        $input['name']= $request->name;
        $request->slug = preg_replace('/\s+/', '-', $request->slug);
        $input['slug']= $request->slug;
        $input['address'] = $request->address;
        $input['description'] = $request->description;
        $input['phone'] = $request->phone;
        $input['website'] = $request->website;
        $input['email'] = $request->email;
        $input['sms'] = $request->sms;
        $input['gmb'] = $request->gmb;
        $input['whatsapp'] = $request->whatsapp;
        $input['fb'] = $request->fb;
        $input['inst'] = $request->inst;
        $input['area_status'] = $request->area_status ? 1 : 0 ?? 0;
        $input['timing_status'] = $request->timing_status ? 1 : 0 ?? 0;
        $input['youtube'] = $request->youtube;
        $input['meta_title'] = $request->meta_title;
        $input['meta_keywords'] = $request->meta_keyword;
        $input['meta_description'] = $request->meta_description;

        if($request->hasFile('logo'))
        {
            $img_file = $request->file('logo');
            $input['logo']=GlobalHelper::fts_upload_img($img_file,'logo');
        }
        if($request->hasFile('feature'))
        {
            $img_file = $request->file('feature');
            $input['featureImage']=GlobalHelper::fts_upload_img($img_file,'feature');
        }
        $input['yelp'] = $request->yelp;
        $input['map']= $request->map;
        if($user->role_id == 1){
             $input['status']= $request->status  ? 1 : 0 ?? 0;
        }
        else{
            if($user->status == 0)
            {
                $input['status']= 0;
            }
            else
            {

                $input['status']= 1;
            }

        }
        Business::where('id', $id)->update($input);
        $business = Business::find($id);
        $business->cat()->sync($request->cat_id);

        $bussiness_id= $id;
        if(isset($bussiness_id))
        {



            // dd($existarea);

            if($request->has('area_status'))
            {

                if(isset($request->areaserve))
                {
                    // dd("working");
                    if(count($request->areaserve)>0)
                    {
                        foreach ($request->areaserve as $key => $value) {

                            $area['area']=$value;
                            $area['business_id']=$business->id;
                            $area['slug']= $request->area_slug[$key];
                            $area['state_id']= $request->state_id[$key];
                            if($request->area_id[$key] != NULL){
                                AreaWeServe::where('id', $request->area_id[$key])->update($area);
                            }else{
                                AreaWeServe::create($area);
                            }
                        }
                    }
                }
            }








            if($request->has('timing_status')){
                if(count($request->day)>0)
                {
                    foreach ($request->day as $key => $v)
                    {
                        if(isset($v))
                        {
                            $day['business_id'] = $business->id;
                            $day['day'] = $v;
                            // $day['status'] = $request->status;
                            $day['open_hour'] = $request->opening[$key];
                            $day['close_hour'] = $request->closing[$key];
                            if($request->day_id[$key] != NULL)
                            {
                                OpeningHours::where('id',$request->day_id[$key])->update($day);
                            }
                            else
                            {
                                OpeningHours::create($day);
                            }
                        }

                    }
                }
            }
            // else{
            //     foreach ($request->day as $key => $v)
            // {
            //     $day['business_id'] = $business->id;
            //     $day['day'] = $v;
            //     $day['open_hour'] = $request->opening[$key];
            //     $day['close_hour'] = $request->closing[$key];
            //     OpeningHours::create($day);
            // }
            // }



            if(isset($request->images) and sizeof($request->images)>0)
            {
                foreach ($request->file('images') as $key =>$v)
                {
                    $gallery['images']=GlobalHelper::fts_upload_img($v,'gallery_images');
                    $gallery['business_id']=$business->id;
                    $img_id = $request->img_id;
                    $old_data=BusinessGallery::where('id',$img_id[$key])->get();
                        if(isset($old_data) and sizeof($old_data)>0)
                        {
                    BusinessGallery::where('id',$img_id[$key])->update($gallery);
                        }
                        else
                        {
                            BusinessGallery::create($gallery);
                        }
                }

            }

            if(isset($request->tag))
            {
                // dd("working");
                if(count($request->tag)>0)
                {
                    foreach ($request->tag as $key => $value) {

                        $tag['name']=$value;
                        $tag['business_id']=$business->id;
                        if($request->tag_id[$key] != NULL){
                            Tags::where('id', $request->tag_id[$key])->update($tag);
                        }else{
                            Tags::create($tag);
                        }
                    }
                }
            }
        }

        Alert::success('Success');
        return redirect()->route('business.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $bussiness_id =  $id;
    //    dd($bussiness_id);

       $area = AreaWeServe::where('business_id', $bussiness_id)->get();
       if(isset($area) and sizeof($area) > 0)
       {
        AreaWeServe::where('business_id', $bussiness_id)->delete();
       }

       $opening_areas = OpeningHours::where('business_id', $bussiness_id)->get();
       if (isset($opening_areas) and sizeof($opening_areas)>0){
            OpeningHours::where('business_id', $bussiness_id)->delete();
       }

       // Area We Serve


       $business_gallery = BusinessGallery::where('business_id', $bussiness_id)->get();
       if(isset($business_gallery) and sizeof($business_gallery)>0){
        BusinessGallery::where('business_id', $bussiness_id)->delete();
        foreach ($business_gallery as $key => $v)
        {
            GlobalHelper::delete_img($v->images,'gallery_images');
        }

       }

       Business::where('id', $bussiness_id)->delete();
       Alert::success('Success', "Business  deleted successfully");
       return redirect()->route('business.index');

    }

    public function destroyarea($id){
        $area = AreaWeServe::find($id);
        $area->delete();
        return redirect()->back();
    }
    public function destroytag($id){
        $tag = Tags::find($id);
        $tag->delete();
        return redirect()->back();
    }
        public function deletegallery(Request $request){
        if($request->ajax()){
            $image = BusinessGallery::find($request->data);
            // $business = $image->business_id;
            // $gallery = BusinessGallery::where('business_id', $business)->get();
            $image->delete();
        //    return response()->json(['business' => $business]);
           return response()->json(['image' => $image]);
        }
    }
}
