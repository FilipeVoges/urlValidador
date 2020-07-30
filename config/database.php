<?php

return [
    'default' => env('DB_DATABASE', 'validador'),
    'connections' => [
        'validador' => [
            'driver'    => env('DB_CONNECTION'),
            'host'      => env('DB_HOST'),
            'port'      => env('DB_PORT'),
            'database'  => env('DB_DATABASE'),
            'username'  => env('DB_USERNAME'),
            'password'  => env('DB_PASSWORD'),
            'charset'   => env('DB_CHARSET')
        ]
    ],
    'migrations' => 'migrations'
];
