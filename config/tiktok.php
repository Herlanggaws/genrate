<?php

return [
    /*
    |--------------------------------------------------------------------------
    | TikTok API Configuration
    |--------------------------------------------------------------------------
    |
    | This file contains the configuration for TikTok API integration.
    |
    */

    'client_key' => env('TIKTOK_CLIENT_KEY', 'awxcbi1uouh0j7za'),
    'client_secret' => env('TIKTOK_CLIENT_SECRET', 'PWsKuIOmXn3T435bPalOPEOBYkiXP97h'),
    'redirect_uri' => env('TIKTOK_REDIRECT_URI'),
    'base_url' => env('TIKTOK_BASE_URL', 'https://open.tiktokapis.com/v2'),
    
    'scopes' => [
        'user.info.basic',
        'video.list',
    ],
    
    'auth_url' => 'https://www.tiktok.com/v2/auth/authorize',
    'token_url' => 'https://open.tiktokapis.com/v2/oauth/token/',
    'revoke_url' => 'https://open.tiktokapis.com/v2/oauth/revoke/',
    'user_info_url' => 'https://open.tiktokapis.com/v2/user/info/',
]; 