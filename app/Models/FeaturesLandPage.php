<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeaturesLandPage extends Model
{
    use HasFactory;
    protected $fillable = [ 'feature_check' , 'feature_title' , 'feature_description' ];

    
}
