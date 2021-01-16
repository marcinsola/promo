<?php

return [
    'url' => env('PROMO_API_URL', 'http://localhost:9999'),
    'headers' => [
        'X-token' => env('PROMO_API_TOKEN'),
    ]
];
