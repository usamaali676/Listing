<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestimonialsLandPage extends Model
{
    use HasFactory;
    protected $fillable = ['testimonial_check' ,'testimonial_title' ,'testimonial_description' ];
}
