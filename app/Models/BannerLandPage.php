<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerLandPage extends Model
{
    use HasFactory;
    protected $fillable = ['land_page_id', 'heading','subheading',  'heading_color', 'subheading_color',  'desktop_image', 'mobile_image'];

    public function banner() {
        return $this->belongsTo(BannerLandPage::class, 'land_page_id');
    }
}
