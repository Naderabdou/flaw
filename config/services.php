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
    'facebook' => [
        'client_id' => env('FB_CLIENT_ID'), //USE FROM FACEBOOK DEVELOPER ACCOUNT
        'client_secret' => env('fb_client_secret'), //USE FROM FACEBOOK DEVELOPER ACCOUNT
        'redirect' => env('FB_REDIRECT')
    ],
    'google' => [
        'client_id' => env('GO_CLIENT_ID'),
        'client_secret' => env('GO_CLIENT_SECRET'),
        'redirect' => env('GO_REDIRECT')
    ],
    'github' => [
        'client_id' => env('gt_CLIENT_ID'),
        'client_secret' => env('gt_CLIENT_SECRET'),
        'redirect' => env('gt_REDIRECT')
    ],
    'nexmo' => [
        'sms_from' => '15556666666',
    ],

];
