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
    protected $filterNameFunctions=[];

    public function __construct(Request $request)
    {
        $this->request = $request;
    }


    public function apply($builder){

         $this->builder = $builder;

        foreach ($this->getFilters() as $filter=>$value){

            if(method_exists($this,$filter)){
                $this->$filter($value);
            }

        }
    }

    public function getFilters(){

        return $this->request->only($this->filterNameFunctions);
    }

}