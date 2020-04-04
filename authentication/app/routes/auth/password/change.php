<?php

$app->get('/change-password', $authenticated(), function() use ($app) {
    $app->render('auth/password/change.php');
})->name('password.change');

$app->post('/change-password', $authenticated(), function() use ($app) {
    
    $request = $app->request;

    $passwordOld = $app->request->post('senha_atual');
    $password = $app->request->post('senha');
    $passwordConfirm = $app->request->post('confirmar_senha');

    $v = $app->validation;

    $v->validate([
        'senha_atual' => [$passwordOld, 'required|matchesCurrentPassword'],
        'senha' => [$password, 'required|min(6)'],
        'confirmar_senha' => [$passwordConfirm, 'required|matches(senha)']
    ]);

    if ($v->passes()) {

        $user = $app->auth;
        
        $user->update([
            'senha' => $app->hash->password($password)
        ]);

        // enviar email
        $app->mail->send('email/auth/password/changed.php', [], function($message) use ($user) {
            $message->to($user->email);
            $message->subject('Senha modificada');
        });

        $app->flash('global', 'Sua senha foi modificada.');
        $app->response->redirect($app->urlFor('home'));
    }

    $app->render('auth/password/change.php', [
        'errors' => $v->errors()
    ]);

})->name('password.change.post');