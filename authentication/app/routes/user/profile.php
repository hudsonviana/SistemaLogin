<?php

$app->get('/u/:username', $authenticated(), function($username) use ($app) {
    
    $user = $app->user->where('usuario', $username)->first();

    if (!$user) {
       $app->notFound();
    }

    $app->render('user/profile.php', [
        'user' => $user
    ]);
})->name('user.profile');