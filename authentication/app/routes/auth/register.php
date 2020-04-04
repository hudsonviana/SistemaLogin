<?php

use Conproc\User\UserPermission;

$app->get('/register', $guest(), function() use ($app) {
    $app->render('auth/register.php');
})->name('register');

$app->post('/register', $guest(), function() use ($app) {
    
    $request = $app->request;

    $email = $request->post('email');
    $username = $request->post('usuario');
    $password = $request->post('senha');
    $passwordConfirm = $request->post('confirmar_senha');
    
    $v = $app->validation;
    $v->validate([
        'email' => [$email, 'required|email|uniqueEmail'],
        'usuario' => [$username, 'required|alnumDash|max(20)|uniqueUsername'],
        'senha' => [$password, 'required|min(6)'],
        'confirmar_senha' => [$passwordConfirm, 'required|matches(senha)'],
    ]);

    if ($v->passes()) {

        $identifier = $app->randomlib->generateString(128);

        $user = $app->user->create([
            'email' => $email,
            'usuario' => $username,
            'senha' => $app->hash->password($password),
            'ativo' => false,
            'hash_ativo' => $app->hash->hash($identifier)
        ]);

        $user->permissions()->create(UserPermission::$defaults);
        
        $app->mail->send('email/auth/registered.php', ['user' => $user, 'identifier' => $identifier], function($message) use ($user) {
            $message->to($user->email);
            $message->subject('Obrigado por se registrar!');
        });
        
        /*
        $message = "<h1>Legião Urbana<h1><h2>Quase sem querer</h2><p>Eu queria provar pra todo mundo que eu não precisava provar nada pra ninguém...</p>";
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=utf-8';
        $headers[] = "From: CONPROC <conproc.cij.pmp@gmail.com>";
        //$headers[] = "To: $user->email";
        mail("$user->email", "Obrigado por se registrar!", $message, implode("\r\n", $headers));
        */

        $app->flash('global', 'Usuário cadastrado com sucesso! Verifique sua caixa de email. Você recebeu um link para ativar sua conta.');
        $app->response->redirect($app->urlFor('home'));
    }

    $app->render('auth/register.php', [
        'errors' => $v->errors(),
        'request' => $request
    ]);

})->name('register.post');