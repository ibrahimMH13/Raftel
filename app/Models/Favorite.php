<?php

namespace App\Models;

use App\RecordActivites;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    //

    protected $guarded=[];
    use RecordActivites;
    //relationship

    public function favorite(){
         return $this->morphTo();
    }
}
