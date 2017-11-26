<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    //

    public function path(){

        return '/threads/'.$this->id;
    }

    public function addReply($reply){

        $this->reply()->create($reply);
    }
    //RelationShip

    public function user(){

        return $this->belongsTo(User::class);
    }

    public function reply (){

        return $this->hasMany(Reply::class);
    }


}
