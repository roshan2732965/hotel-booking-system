<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    protected $guarded = [];

    public function client(){
        return $this->belongsTo(Client::class,'client_id');
    }
}
