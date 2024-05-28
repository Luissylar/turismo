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

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    /*
    |--------------------------------------------------------------------------|
    | Integración con CULQI                                                    |
    |--------------------------------------------------------------------------|
    |                                                                          |
    | Configuracion para culqi, falta integrar                                 |
    |                                                                          |
    */

    'culqi' => [
        'public_key' => env('CULQI_PUBLIC_KEY'),
        'secret_key' => env('CULQI_SECRET_KEY'),
        'rsa_id' => env('CULQI_RSA_ID'),
        'rsa_public_key' => env('CULQI_RSA_PUBLIC_KEY'),

    ],
    /*
    |--------------------------------------------------------------------------|
    | Integración con IZIPAY                                                   |
    |--------------------------------------------------------------------------|
    |                                                                          |
    | Configuracion para IZIPAY, falta integrar                                |
    |                                                                          |
    */


    'izipay' => [
        'url' => env('IZIPAY_URL'),
        'client_id' => env('IZIPAY_CLIENT_ID'),
        'client_secret' => env('IZIPAY_CLIENT_SECRET'),
        'public_key' => env('IZIPAY_PUBLIC_KEY'),
        'hash_key' => env('IZIPAY_HASH_KEY'),
    ],


    /*
    |--------------------------------------------------------------------------|
    | Integración con NIUBIZ                                                   |
    |--------------------------------------------------------------------------|
    |                                                                          |
    | Configuracion para NIUBIZ, falta integrar                                |
    |                                                                          |
    */
    'niubiz' => [
        'url' => env('IZIPAY_URL'),
        'client_id' => env('IZIPAY_CLIENT_ID'),
        'client_secret' => env('IZIPAY_CLIENT_SECRET'),
        'public_key' => env('IZIPAY_PUBLIC_KEY'),
        'hash_key' => env('IZIPAY_HASH_KEY'),
    ],






];
