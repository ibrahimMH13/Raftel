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

class ThreadFilter
{

  //  protected $filters = ["by"];
    protected $request;
    public function __construct(Request $request)
    {
      $this->request = $request;
    }

    public function apply($builder){

        if( $username = $this->request->by) {

            $user = User::where('name',$username)->firstOrfail();
            return $builder->where('user_id', $user->id);
        }

    }
   /* protected function by($username){

        $user = User::where('name',$username)->firstOrFail();
        return $this->builder->where('user_id',$user);
    }*/
}