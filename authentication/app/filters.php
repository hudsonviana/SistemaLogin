<?php

$authenticationCheck = function($required) use ($app) {
    return function() use ($required, $app) {
        if ((!$app->auth && $required) || ($app->auth && !$required)) {
            $app->redirect($app->urlFor('home'));
        }
    };
};

// Filtro para quem NÃO está logado
$authenticated = function() use ($authenticationCheck) {
    return $authenticationCheck(true);
};

// Filtro para quem já está logado
$guest = function() use ($authenticationCheck) {
    return $authenticationCheck(false);
};

// Administrador
$admin = function() use ($app) {
    return function() use ($app) {
        if (!$app->auth || !$app->auth->isAdmin()) {
            $app->redirect($app->urlFor('home'));
        }
    };
};