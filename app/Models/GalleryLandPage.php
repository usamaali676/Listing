<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryLandPage extends Model
{
    use HasFactory;
    protected $fillable = ['land_page_id','image'];
}
