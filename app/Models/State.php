<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
        'slug'
    ];
    public function area()
    {
        return $this->belongsTo(AreaWeServe::class, 'id');
    }
    public function cities()
    {
        return $this->belongsTo(AreaWeServe::class, 'id','state_id');
    }
}
