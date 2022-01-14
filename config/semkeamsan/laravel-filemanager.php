<?php
return [
    'route' => [
        'url' => env('FILEMANAGER_URL', 'filemanager'),
        'middleware' => [
            'auth',
        ]
    ],
    'roles' => [1,2,3]

];
