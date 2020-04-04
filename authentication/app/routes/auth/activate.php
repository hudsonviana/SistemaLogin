<?php

$app->get('/activate', $guest(), function() use ($app) {

    $request = $app->request;

    $email = $request->get('email');
    $indentifier = $request->get('identifier');

    $hashedIdentifier = $app->hash->hash($indentifier);

    $user = $app->user->where('email', $email)
    ->where('ativo', false)
    ->first();

    if (!$user || !$app->hash->hashCheck($user->hash_ativo, $hashedIdentifier)) {
        $app->flash('global', 'Ocorreu um erro ao tentar ativar a conta.');
        $app->response->redirect($app->urlFor('home'));
    } else {
        $user->activateAccount();
        $app->flash('global', 'Sua conta foi ativada! Você já pode fazer o login.');
        $app->response->redirect($app->urlFor('home'));
    }

})->name('activate');