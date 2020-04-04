<?php

$app->get('/users', function() use ($app) {

    $users = $app->user->where('ativo', true)->get();
    $app->render('user/all.php', [
        'users' => $users
    ]);
})->name('user.all');