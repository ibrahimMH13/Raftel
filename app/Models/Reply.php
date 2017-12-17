<?php

namespace App\Models;

 use App\favoritetable;
 use App\RecordActivites;
 use App\User;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    //
 protected $guarded=[];
    use favoritetable, RecordActivites;
        protected $with=['user','favorite'];
        protected $appends=['FavoriteCount','isFavorite'];



    //relationShip

    public function path(){

        return "/".$this->thread->path();
    }
    public function thread(){

        return $this->belongsTo(Reply::class);
    }

    public function user(){

        return $this->belongsTo(User::class);
    }

}
