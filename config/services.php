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
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'google' => [
        'client_id' => '401596630546-9mspga1l3rs2s5fvghfe4mun6ggg6cpr.apps.googleusercontent.com',
        'client_secret' => 'D3FvE1vUZq-rbhJfPDievGO0',
        'redirect' => 'http://source.planet.php.a-level.com.ua/auth/google/callback', // Ссылка на перенаправление при удачной авторизации (3)
    ],

    'github' => [
        'client_id' => '24886c85f03e15ac5b3c',         // Your GitHub Client ID
        'client_secret' => 'e3de03213f9a6f5ee7c6dd89cd2118c434257b8c', // Your GitHub Client Secret
        'redirect' => 'http://source.planet.php.a-level.com.ua/auth/github/callback',
    ],


];
