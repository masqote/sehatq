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

    /* Social Media */
    'facebook' => [
        'client_id'     => '652187032203029',
        'client_secret' => 'cea1908b3a3c8c3da6f9593c64a1d193',
        'redirect'      => 'http://localhost:8000/auth/facebook/callback',
    ],

    'google' => [
        'client_id'     => '583662644276-cuo0akrvrl1p2pa2keeuo97klmigjekf.apps.googleusercontent.com',
        'client_secret' => '_VIvwX5FN-9nM0jDDanbFkNX',
        'redirect'      => 'http://localhost:8000/auth/google/callback',
    ],

];
