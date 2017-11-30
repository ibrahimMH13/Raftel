<?php
/**
 * Created by PhpStorm.
 * User: m_ibr
 * Date: 27/11/2017
 * Time: 7:51 PM
 */

namespace App\Filters;


use App\User;
use Illuminate\Http\Request;

class ThreadFilter extends Filters
{

 protected $filterNameFunctions = ["by","fuck"];

     protected function by($username){

        $user = User::where('name',$username)->firstOrFail();
        return $this->builder->where('user_id',$user->id);
    }
}