<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    //
    protected $guarded=[];

    public function path(){

        return "/threads/{$this->channel->name}/".$this->id;
     }

     public function scopeFilter($query,$filter){

        return $filter->apply($query);
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

    public function channel(){

        return $this->belongsTo(Channel::class);

    }

}
