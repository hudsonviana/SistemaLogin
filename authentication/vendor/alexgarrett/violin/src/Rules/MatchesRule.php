<?php

namespace Violin\Rules;

use Violin\Contracts\RuleContract;

class MatchesRule implements RuleContract
{
    public function run($value, $input, $args)
    {
        return $value === $input[$args[0]];
    }

    public function error()
    {
       // return '{field} must match {$0}.';
        return 'o campo {field} deve ser igual a {$0}.';
    }

    public function canSkip()
    {
        return true;
    }
}
