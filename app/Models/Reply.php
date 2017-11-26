<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    //


    //relationShip


    public function thread(){

        return $this->belongsTo(Reply::class);
    }
}
