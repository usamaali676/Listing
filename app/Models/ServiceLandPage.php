<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceLandPage extends Model
{
    use HasFactory;
    protected $fillable = [ 'service_check' , 'service_title' , 'service_description' ];
}
