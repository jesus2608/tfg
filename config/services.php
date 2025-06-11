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

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],
    'stripe' => [
    'key' => 'pk_test_51RTRKnPRkE9SeMK1hapHcOgkDCktchhYU8QsEvRGrM1UqR5cALThMrXRvqkY1aFgjMnBR80cvpffq4hVLXk67DQC002dvuXDkJ',
    'secret' => 'sk_test_51RTRKnPRkE9SeMK1TgcI3cWk7sCwdEr0KokCnZhQzRes5VLtcP3wBnQ9wiRQg3SGmcm3SST5bNb9h7E8McJrSl0v004LUOEkKp',
],

];

