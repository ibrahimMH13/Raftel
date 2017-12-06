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
    use favoritetable;
    use RecordActivites;




    //relationShip

    public function path(){

        return "/".$this->thread->path()."#reply-".$this->id;
    }
    public function thread(){

        return $this->belongsTo(Reply::class);
    }

    public function user(){

        return $this->belongsTo(User::class);
    }

}
