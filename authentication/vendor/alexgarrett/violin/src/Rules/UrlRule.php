<?php

namespace Violin\Rules;

use Violin\Contracts\RuleContract;

class UrlRule implements RuleContract
{
    public function run($value, $input, $args)
    {
        return filter_var($value, FILTER_VALIDATE_URL) !== false;
    }

    public function error()
    {
       // return '{field} must be a valid URL.';
        return '{field} deve ser uma URL válida.';
    }

    public function canSkip()
    {
        return true;
    }
}
