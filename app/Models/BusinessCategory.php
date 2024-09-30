<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Business;

class BusinessCategory extends Model
{

    use HasFactory;
    protected $guarded = [];

    public function businesses()
    {
        return $this->belongsToMany(Business::class, 'cat_business','cat_id', 'business_id'  );
    }
}
