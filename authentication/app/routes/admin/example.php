<?php

$app->get('/admin/example', $admin(), function() use ($app) {
    $app->render('admin/example.php');
})->name('admin.example');

/**
 * OBS: Para criar outros níveis de acesso, basta criar uma coluna no banco de dados 'usuarios_permissoes' e 
 * para cada um destes níveis. Ou seja, cada coluna corresponderá a um perfil de acesso (ex.: consulta, registro, exclusão etc)
 * Depois é só criar as rotinas de acesso, da forma como ensinado na aula 26/30 do Codecourse, no link abaixo:
 * 
 * https://www.youtube.com/watch?v=LJJXCni8mNc&list=PLfdtiltiRHWGKUvioJly40RJZchSG2-34&index=26
 */