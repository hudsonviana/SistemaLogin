<?php

namespace Violin\Rules;

use Violin\Contracts\RuleContract;

class BetweenRule implements RuleContract
{
    public function run($value, $input, $args)
    {
        return ($value >= $args[0] && $value <= $args[1]) ? true : false;
    }

    public function error()
    {
       // return '{field} must be between {$0} and {$1}.';
        return '{field} deve estar entre {$0} e {$1}.';
    }

    public function canSkip()
    {
        return true;
    }
}
