<?php

namespace Conproc\Validation;

use Violin\Violin;
use Conproc\User\User;
use Conproc\Helpers\Hash;

class Validator extends Violin {
    
    protected $user;
    protected $hash;
    protected $auth;
    
    public function __construct(User $user, Hash $hash, $auth = null) {
        
        $this->user = $user;
        $this->hash = $hash;
        $this->auth = $auth;

        $this->addFieldMessages([
            'email' => [
                'uniqueEmail' => 'Este Email já está em uso.'
            ],
            'usuario' => [
                'uniqueUsername' => 'Este Usuário já está em uso.'
            ]
        ]);

        $this->addRuleMessages([
            'matchesCurrentPassword' => 'O dado informado não corresponde à senha atual.'
        ]);
    }

    public function validate_uniqueEmail($value, $input, $args) {
    
        $user = $this->user->where('email', $value);

        if ($this->auth && $this->auth->email === $value) {
            return true;
        }

        return ! (bool) $user->count();
    }

    public function validate_uniqueUsername($value, $input, $args) {
        return ! (bool) $this->user->where('usuario', $value)->count();
    }

    public function validate_matchesCurrentPassword($value, $input, $args) {
        
        if ($this->auth && $this->hash->passwordCheck($value, $this->auth->senha)) {
            return true;
        }
        return false;
    }
}