<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    //

 protected $guarded=[];
    //relationShip



    public function thread(){

        return $this->belongsTo(Reply::class);
    }

    public function user(){

        return $this->belongsTo(User::class);
    }
}
