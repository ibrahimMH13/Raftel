<?php
/**
 * Created by PhpStorm.
 * User: m_ibr
 * Date: 27/11/2017
 * Time: 7:51 PM
 */

namespace App\Filters;


use App\User;

class ThreadFilter extends Filters
{

    protected $filters = ["by"];

    protected function by($username){

        $user = User::where('name',$username)->firstOrFail();
        return $this->builder->where('user_id',$user);
    }
}