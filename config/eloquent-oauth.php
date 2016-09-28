<?php

return [

    /*
    |--------------------------------------------------------------------------
    | User Model
    |--------------------------------------------------------------------------
    |
    | User model that will be auth against.
    |
    */

    'model' => \Codecasts\Domains\Users\User::class,


    /*
    |--------------------------------------------------------------------------
    | Identities Table
    |--------------------------------------------------------------------------
    |
    | Database table that matches the users with the profiles on
    | on the social networks
    |
    */

    'table' => 'oauth_identities',

    /*
    |--------------------------------------------------------------------------
    | Social Providers
    |--------------------------------------------------------------------------
    |
    | Social providers enabled. their alias are used on the routes.
    |
    */

    'providers' => [

        // Github
        'github' => [
            'client_id' => trim(env('GITHUB_CLIENT_ID')),
            'client_secret' => trim(env('GITHUB_CLIENT_SECRET')),
            'redirect_uri' => '',
            'scope' => ['user:email'],
        ],

        // Facebook
        'facebook' => [
            'client_id' => env('FACEBOOK_CLIENT_ID'),
            'client_secret' => env('FACEBOOK_CLIENT_SECRET'),
            'redirect_uri' => (env('APP_SECURE', false) ? 'https://': 'http://').env('APP_DOMAIN').'/auth/callback/facebook',
            'scope' => ['email'],
        ],

        // Google
        'google' => [
            'client_id' => env('GOOGLE_CLIENT_ID'),
            'client_secret' => env('GOOGLE_CLIENT_SECRET'),
            'redirect_uri' => (env('APP_SECURE', false) ? 'https://': 'http://').env('APP_DOMAIN').'/auth/callback/google',
            'scope' => [],
        ],
    ],
];
