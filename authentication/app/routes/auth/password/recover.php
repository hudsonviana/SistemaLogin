<?php

$app->get('/recover-password', $guest(), function() use ($app) {
    $app->render('auth/password/recover.php');
})->name('password.recover');

$app->post('/recover-password', $guest(), function() use ($app) {
    
    $request = $app->request;

    $email = $request->post('email');

    $v = $app->validation;

    $v->validate([
        'email' => [$email, 'required|email']
    ]);

    if ($v->passes()) {
        
        $user = $app->user->where('email', $email)->first();

        if (!$user) {
            $app->flash('global', 'Usuário não encontrado na base de dados.');
            $app->response->redirect($app->urlFor('password.recover'));
        } else {
            
            $identifier = $app->randomlib->generateString(128);

            $user->update([
                'recuperar_hash' => $app->hash->hash($identifier)
            ]);

            $app->mail->send('email/auth/password/recovered.php', ['user' => $user, 'identifier' => $identifier], function($message) use ($user) {
                $message->to($user->email);
                $message->subject('Recupere sua senha');
            });

            $app->flash('global', 'Enviamos um email com instruções para você redefinir sua senha.');
            
            $app->response->redirect($app->urlFor('home'));
        }
    }

    $app->render('auth/password/recover.php', [
        'errors' => $v->errors(),
        'request' => $request
    ]);

})->name('password.recover.post');