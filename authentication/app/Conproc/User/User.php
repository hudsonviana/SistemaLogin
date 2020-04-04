<?php

namespace Conproc\User;

use illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent {

    protected $table = 'usuarios';

    protected $fillable = [
        'email',
        'usuario',
        'senha',
        'primeiro_nome',
        'ultimo_nome',
        'ativo',
        'hash_ativo',
        'recuperar_hash',
        'lembrar_identificador',
        'lembrar_token'
    ];

    public function getFullName() {
        if (!$this->primeiro_nome || !$this->ultimo_nome) {
            return null;
        }

        return "{$this->primeiro_nome} {$this->ultimo_nome}";
    }

    public function getFullNameOrUsername() {
        return $this->getFullName() ?: $this->usuario;
    }

    public function activateAccount() {
        $this->update([
            'ativo' => true,
            'hash_ativo' => null
        ]);
    }

    public function getAvatarUrl($options = []) {
        $size = isset($options['size']) ? $options['size'] : 45;
        return 'http://www.gravatar.com/avatar/' . md5($this->email) . '?s=' . $size . '&d=mm';
    }

    public function updateRememberCredentials($identifier, $token) {
        $this->update([
            'lembrar_identificador' => $identifier,
            'lembrar_token' => $token
        ]);
    }

    public function removeRememberCredentials() {
        $this->updateRememberCredentials(null, null);
    }

    public function hasPermission($permission) {
        return (bool) $this->permissions->{$permission};
    }

    public function isAdmin() {
        return $this->hasPermission('admin');
    }

    public function permissions() {
        return $this->hasOne('Conproc\User\UserPermission', 'usuario_id');
    }
}