<?php
namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class OverallSetup extends Facade
{
    protected static function getFacadeAccessor()
    {
        //parent::getFacadeAccessor(); // TODO: Change the autogenerated stub
        return 'overallsetup';
    }
}