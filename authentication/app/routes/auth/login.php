<?php

use Carbon\Carbon;

$app->get('/login', $guest(), function() use ($app) {
    $app->render('auth/login.php');
})->name('login');

$app->post('/login', $guest(), function() use ($app) {
    
    $request = $app->request;

    $identifier = $request->post('identificador');
    $password = $request->post('senha');
    $remember = $request->post('lembrar');

    $v = $app->validation;

    $v->validate([
        'identificador' => [$identifier, 'required'],
        'senha' => [$password, 'required']
    ]);

    if ($v->passes()) {
        
        $user = $app->user
        ->where('usuario', $identifier)
        ->where('ativo', true)
        ->orWhere('email', $identifier)
        ->where('ativo', true)
        ->first();

        if ($user && $app->hash->passwordCheck($password, $user->senha)) {
            $_SESSION[$app->config->get('auth.session')] = $user->id;
            
            if ($remember === 'on') {
                $rememberIdentifier = $app->randomlib->generateString(128);
                $rememberToken = $app->randomlib->generateString(128);

                $user->updateRememberCredentials(
                    $rememberIdentifier,
                    $app->hash->hash($rememberToken)
                );

                $app->setcookie(
                    $app->config->get('auth.remember'),
                    "{$rememberIdentifier}___{$rememberToken}",
                    Carbon::parse('+1 week')->timestamp
                );
            }
            
            $app->flash('global', 'Você está logado!');
            $app->response->redirect($app->urlFor('home'));
        } else {
            $app->flash('global', 'Erro ao logar. Certifique-se de que sua conta tenha sido previamente ativada. Verifique se usuário e senha estão corretos.');
            $app->response->redirect($app->urlFor('login'));
        }
    }

    $app->render('auth/login.php', [
        'errors' => $v->errors(),
        'request' => $request
    ]);

})->name('login.post');