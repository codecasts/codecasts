<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    /*
     * MailGun Config
     */
    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    /*
     * Iugu Config
     */
    'iugu' => [
        'client_id' => env('IUGU_CLIENT_ID'),
        'api_token' => env('IUGU_API_TOKEN'),
    ],

];
