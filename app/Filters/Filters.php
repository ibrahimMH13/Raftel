<?php
/**
 * Created by PhpStorm.
 * User: m_ibr
 * Date: 27/11/2017
 * Time: 7:26 PM
 */

namespace App\Filters;
use Illuminate\Http\Request;

abstract class Filters
{
    protected $request,$builder;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function apply($builder){

        $this->builder = $builder;

        if($this->request->has('by'))
            return $this->by($this->request->by);
        else
            return $builder;

    }

    public function getFilters(){

        return $this->request->only($this->filters);
    }

}