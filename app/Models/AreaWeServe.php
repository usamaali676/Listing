<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaWeServe extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Areabusinesses()
    {
        return $this->belongsTo(Business::class, );
    }
    public function States()
    {
        return $this->belongsTo(State::class, 'state_id' );
    }
}
