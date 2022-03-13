<?php

/*
|--------------------------------------------------------------------------
| Authentication Language Lines
|--------------------------------------------------------------------------
|
| The following language lines are used during authentication for various
| messages that we need to display to the user. You are free to modify
| these language lines according to your application's requirements.
|
*/

return [
    'failed'   => 'Ces identifiants ne correspondent pas à nos enregistrements.',
    'password' => 'Le mot de passe fourni est incorrect.',
    'throttle' => 'Tentatives de connexion trop nombreuses. Veuillez essayer de nouveau dans :seconds secondes.',

    'label-name' => 'Nom',
    'label-email' => 'E-mail',
    'label-password' => 'Mot de passe',
    'label-confirm-password' => 'Confirmez le mot de passe',

    'confirm-password' => [
        'title' => 'Confirmer votre mot de passe',
        'description' => "Il s'agit d'une zone sécurisée de l'application. Veuillez confirmer votre mot de passe avant de continuer.",
        'label-password' => 'Mot de passe',
        'submit' => 'Confirmez le mot de passe'
    ],

    'forgot-password' => [
        'title' => 'Mot de passe oublié?',
        'description' => "Nous vous enverrons par e-mail un lien de réinitialisation du mot de passe qui vous permettra d'en choisir un nouveau.",
        'submit' => 'Demander un lien de réinitialisation',
        'back' => 'Retour connexion'
    ],

    'login' => [
        'title' => 'Connexion',
        'description' => 'Connectez-vous à votre compte.',
        'forgot' => 'Oublié?',
        'remember-me' => 'Se souvenir de moi',
        'submit' => 'Se connecter',
        'no-account' => "Vous n'avez pas de compte ?",
        'get-started' => "S'inscrire"
    ],

    'register' => [
        'title' => "Commencer",
        'description' => 'Lancez-vous sur notre incroyable plateforme.',
        'submit' => "S'inscrire",
        'have-account' => 'Vous avez déjà un compte?',
        'login' => 'Connexion'
    ],

    'reset-password' => [
        'title' => 'Réinitialiser le mot de passe',
        'description' => 'Réinitialisez votre mot de passe.',
        'submit' => 'Réinitialiser le mot de passe'
    ]
];
