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

        if(auth()->guest())
            return false;
            foreach (static::getTypeEvent() as $e) {
                static::$e(function ($model) use ($e) {
                    $model->recordActivities($e);
                });
             }

        static::deleting(function ($model){
            $model->activity()->delete();
        });
    }

    protected function recordActivities($e){

        $this->activity()->create([
            "user_id" => auth()->user()->id,
            "type" => $this->getAcitviyType($e),
        ]);


    }


    protected static function getTypeEvent(){
        return ['created'];
    }
    protected function getAcitviyType($e){
        return $e.'_'.strtolower((new\ReflectionClass($this))->getShortName());
    }

    public function activity(){
        return $this->morphMany(Activity::class,'subject');
    }

}