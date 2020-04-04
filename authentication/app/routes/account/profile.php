<?php

$app->get('/account/profile', $authenticated(), function() use ($app) {
    $app->render('account/profile.php');
})->name('account.profile');

$app->post('/account/profile', $authenticated(), function() use ($app) {
    
    $request = $app->request;

    $email = $request->post('email');
    $firstName = $request->post('primeiro_nome');
    $lastName = $request->post('ultimo_nome');

    $v = $app->validation;

    $v->validate([
        'email' => [$email, 'required|email|uniqueEmail'],
        'primeiro_nome' => [$firstName, 'alpha|max(50)'],
        'ultimo_nome' => [$lastName, 'alpha|max(50)']
    ]);

    if ($v->passes()) {
        $app->auth->update([
            'email' => $email,
            'primeiro_nome' => $firstName,
            'ultimo_nome' => $lastName
        ]);

        $app->flash('global', 'Seu perfil foi atualizado.');
        $app->response->redirect($app->urlFor('account.profile'));
    }

    $app->render('account/profile.php', [
        'errors' => $v->errors(),
        'request' => $request
    ]);

})->name('account.profile.post');