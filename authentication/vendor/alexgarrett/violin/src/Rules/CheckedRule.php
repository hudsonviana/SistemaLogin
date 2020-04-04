<?php

namespace Violin\Rules;

use Violin\Contracts\RuleContract;

class CheckedRule implements RuleContract
{
    public function run($value, $input, $args)
    {
        return in_array($value, ['yes', 'on', '1', 1, true, 'true'], true);
    }

    public function error()
    {
       // return 'You need to check the {field} field.';
        return 'Você precisa checar o campo {field}.';
    }

    public function canSkip()
    {
        return true;
    }
}
