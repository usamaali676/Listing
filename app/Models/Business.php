<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tags;

class Business extends Model
{
    use HasFactory;

    protected $fillable = ['name','description','phone','address','email','website','sms','fb','inst','gmb','whatsapp','youtube','yelp','status','map','logo','featureImage','slug','timing_status','area_status','longitude','latitude','meta_title','meta_keywords','meta_description','user_id','video_link','theme_color','g_review_check','g_review_slug','lp_id'];


 /**
         * The roles that belong to the Business
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
         */
        public function cat()
        {
            return $this->belongsToMany(BusinessCategory::class, 'cat_business',  'business_id' , 'cat_id');
        }
        public function areas()
        {
            return $this->hasMany(AreaWeServe::class, 'business_id');
        }
        public function hours()
        {
            return $this->hasMany(OpeningHours::class, 'business_id');
        }
        public function gallery()
        {
            return $this->hasMany(BusinessGallery::class, 'business_id');
        }
        public function category()
        {
            return $this->belongsTo(BusinessCategory::class, 'cat_id');
        }
        public function tags()
        {
            return $this->hasMany(Tags::class, 'business_id');
        }
        public function reviews()
        {
            return $this->hasMany(Review::class);
        }
        public function averageRating()
        {
            return $this->reviews()->avg('stars');
        }
        public function landingpage() {
            return $this->hasMany(LandingPage::class, 'business_id');
        }
}
