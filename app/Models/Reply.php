<?php

namespace App\Models;

use App\favorite;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    //

 protected $guarded=[];


    public function addFavorite(){


    }
    //relationShip
    public function thread(){

        return $this->belongsTo(Reply::class);
    }

    public function user(){

        return $this->belongsTo(User::class);
    }
    public function favorite(){

        return $this->morphto(favorite::class);
    }

}
