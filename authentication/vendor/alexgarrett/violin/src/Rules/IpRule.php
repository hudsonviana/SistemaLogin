<?php

namespace Violin\Rules;

use Violin\Contracts\RuleContract;

class IpRule implements RuleContract
{
    public function run($value, $input, $args)
    {
        return filter_var($value, FILTER_VALIDATE_IP) !== false;
    }

    public function error()
    {
       // return '{field} must be a valid IP address.';
        return '{field} deve ser um endereço de IP válido.';
    }

    public function canSkip()
    {
        return true;
    }
}
