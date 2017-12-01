<?php

namespace App\Models;

 use App\User;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    //

 protected $guarded=[];


    public function addFavorite(){


        if(!$this->favorite()->where('user_id',auth()->user()->id)->exists()){
            return $this->favorite()->create([

               "user_id" => auth()->user()->id,
               "favorite_id" => $this->id,
               "favorite_type" => get_class($this)
           ]);
       }

     }
    //relationShip
    public function thread(){

        return $this->belongsTo(Reply::class);
    }

    public function user(){

        return $this->belongsTo(User::class);
    }
    public function favorite(){

        return $this->morphMany(Favorite::class,'favorite');
    }

    public function isFavorite(){

        return $this->favorite()->where('user_id',auth()->user()->id)->exists();
    }

}
