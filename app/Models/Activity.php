<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    //
    protected $guarded= [];


    public function subject(){

        return $this->morphTo();
    }

    public static function feed($take,$user){

        return static::where('user_id',$user->id)->latest()->with('subject')->take($take)->get()->groupBy(function ($a){
            return $a->created_at->format('Y-M');
        });
    }
}
