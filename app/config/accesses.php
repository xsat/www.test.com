<?php

return [
    'User' => [
        'index' => ['*'],
        'person' => ['*'],
        'phone' => ['*'],
        'place' => ['*'],
        'position' => ['*'],
        'user' => ['*'],
    ],
    'Guest' => [
        'index' => [
            'index',
            'search',
            'error',
            'login',
        ]
    ],
];