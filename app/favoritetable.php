<?php
/**
 * Created by PhpStorm.
 * User: m_ibr
 * Date: 6/12/2017
 * Time: 7:30 PM
 */

namespace App;


use App\Models\Favorite;

trait favoritetable
{

    public function addFavorite(){


        if(!$this->favorite()->where('user_id',auth()->user()->id)->exists()){
            return $this->favorite()->create([

                "user_id" => auth()->user()->id,
                "favorite_id" => $this->id,
                "favorite_type" => get_class($this)
            ]);
        }

    }
    public function favorite(){

        return $this->morphMany(Favorite::class,'favorite');
    }

    public function isFavorite(){

        return $this->favorite()->where('user_id',auth()->user()->id)->exists();
    }

}