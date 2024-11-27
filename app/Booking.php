<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Booking extends Model
{
    protected $guarded = [];

    public function room()
    {
        return $this->belongsTo(Room::class)->withDefault();
    }

    public function client()
    {
        return $this->belongsTo(Client::class)->withDefault();
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function payments()
    {
        return $this->hasOne(Payment::class,'booking_id');
    }
}
