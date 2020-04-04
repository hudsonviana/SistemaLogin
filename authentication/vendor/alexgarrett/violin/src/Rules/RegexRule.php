<?php

namespace Violin\Rules;

use Violin\Contracts\RuleContract;

class RegexRule implements RuleContract
{
    public function run($value, $input, $args)
    {
        return (bool) preg_match($args[0], $value);
    }

    public function error()
    {
       // return '{field} was not in the correct format.';
        return '{field} não estava no formato correto.';
    }

    public function canSkip()
    {
        return true;
    }
}
