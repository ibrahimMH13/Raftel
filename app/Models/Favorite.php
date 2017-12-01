<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    //

    protected $guarded=[];
    //relationship

    public function favorite(){
         return $this->morphTo();
    }
}
