<?php

namespace Conproc\User;

use illuminate\Database\Eloquent\Model as Eloquent;

class UserPermission extends Eloquent {

    protected $table = 'usuarios_permissoes';

    protected $fillable = [
        'id_admin'
    ];

    public static $defaults = [
        'admin' => false
    ];
}