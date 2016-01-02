<?php
namespace App\Services;

use App\Services\OverallSetupInterface;

use App\Option;
class OverallSetup implements OverallSetupInterface
{
    public function getOption($optionName)
    {
        // TODO: Implement getOption() method.
        $option = Option::where('name',$optionName)->first();
        return $option->value;
    }
}