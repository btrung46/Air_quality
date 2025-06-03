<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */
    'paths' => ['broadcasting/auth', 'login', 'logout', 'api/*'],
'allowed_origins' => ['https://airquality.up.railway.app'],
'supports_credentials' => true,

'allowed_methods' => ['*'],

'allowed_origins_patterns' => [],

'allowed_headers' => ['*'],

'exposed_headers' => [],

'max_age' => 0,


];
