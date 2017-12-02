<?php
/**
 * Created by PhpStorm.
 * User: m_ibr
 * Date: 2/12/2017
 * Time: 12:46 PM
 */

namespace App;


use App\Models\Activity;

trait RecordActivites
{

    protected static function bootRecordActivites(){

        static::created(function ($t){
            $e="created";
           $t->recordActivities($e);
        });
    }

    protected  function recordActivities($e){

        Activity::create([
            "user_id" => auth()->user()->id,
            "type" => $this->getAcitviyType($e),
            "subject_id" => $this->id,
            "subject_type" => get_class($this)
        ]);
    }

    protected function getAcitviyType($e){

        return $e.'_'.strtolower((new\ReflectionClass($this))->getShortName());
    }


}