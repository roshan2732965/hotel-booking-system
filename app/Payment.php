<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $guarded = [];

    public function booking()
    {
        return $this->belongsTo(Booking::class,'booking_id');
    }
}
