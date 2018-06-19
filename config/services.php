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

    'firebase' => [
        'api_key' => 'AIzaSyDmfLgzR2j46x3pzhdQ876cdf2CNqHlwlw',
        'auth_domain' => 'verduranet-dec15.firebaseapp.com',
        'database_url' => 'https://verduranet-dec15.firebaseio.com',
        'secret' => 'knC2Olkejm6uNqAbk97itnamX1frQv3vXci73vio',
        'storage_bucket' => 'verduranet-dec15.appspot.com',
    ]

];
