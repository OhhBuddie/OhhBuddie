<?php

return [
    'mode' => env('PAYU_MODE', 'live'), // live or test
    'key' => env('PAYU_KEY', ''),
    'salt' => env('PAYU_SALT', ''),
    'success_url' => env('PAYU_SUCCESS_URL', ''),
    'failure_url' => env('PAYU_FAILURE_URL', ''),
];