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

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => env('SES_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'github' => [
        'client_id' => 'af44b984df0372ef9d1d',         // Your GitHub Client ID
        'client_secret' => 'ddc904e9e1dece829423d9beef6fb56f109a54b1', // Your GitHub Client Secret
        'redirect' => 'http://localhost:8000/auth/github/callback',
    ],

    'facebook' => [
        'client_id' => '459051027913458',         // Your Facebook Client ID
        'client_secret' => '6b8193e9efac7d4b551765e083930ed4', // Your Facebook Client Secret
        'redirect' => 'http://localhost:8000/auth/facebook/callback',
    ],

    'google' => [
        'client_id' => '882524855538-0pu5jgl88pjs6g5ucgolj7h925pbnsup.apps.googleusercontent.com',         // Your Google Client ID
        'client_secret' => 'JxPmQ3kl53U5FAZDQK8pQXx-', // Your Google Client Secret
        'redirect' => 'http://localhost:8000/auth/google/callback',
    ],

];
