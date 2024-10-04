<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingPage extends Model
{
    use HasFactory;

    protected $fillable = ['business_id','title','slug','meta_title','meta_keywords','meta_description','google_map','address', 'about_check','about_us', 'content_check','content','phone','email','logo','form_check','video_check'];

    public function business() {
        return $this->belongsTo(Business::class, 'business_id');
    }
    public function banner() {
        return $this->hasOne(BannerLandPage::class, 'land_page_id');
    }
    public function service() {
        return $this->hasMany(ServiceLandPage::class, 'land_page_id');
    }
    public function testimonial() {
        return $this->hasMany(TestimonialsLandPage::class, 'land_page_id');
    }
    public function features() {
        return $this->hasMany('FeaturesLandPage', 'land_page_id');
    }
    public function gallery() {
        return $this->hasMany(GalleryLandPage::class, 'land_page_id');
    }

}
