<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BusinessCategory;

class Blog extends Model
{
    protected $filable = ['category_id','title', 'slug', 'meta_title', 'meta_description', 'meta_keyword', 'heading', 'description', 'banner', 'image', 'anner_alt', 'status'];

    public function category()
    {
        return $this->belongsTo(BusinessCategory::class,'category_id');
    }
}
