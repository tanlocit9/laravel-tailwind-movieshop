<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'google' => [
        'client_id' => env('GOOGLE_CLIENT_ID'),
        'client_secret' => env('GOOGLE_CLIENT_SECRET'),
        'redirect' => (env('APP_ENV') ==='production')?env('REDIRECT_CALLBACK_GOOGLE_HOST'):env('REDIRECT_CALLBACK_GOOGLE_LOCAL'),
    ],
    'facebook' => [
        'client_id' => env('166413261873291'),
        'client_secret' => env('61a1e10aaeb07fe94698696a89942cc7'),
        'redirect' => (env('APP_ENV') ==='production')?env('REDIRECT_CALLBACK_FACEBOOK_HOST'):env('REDIRECT_CALLBACK_FACEBOOK_LOCAL'),
    ],

];
