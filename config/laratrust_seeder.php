<?php

return [
    'role_structure' => [
        'superadministrator' => [
            'users' => 'c,r,u,d',
            'brand' => 'c,r,u,d',
            'mdoel' => 'c,r,u,d',
            'car' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'administrator' => [
            'users' => 'c,r,u,d',
            'brand' => 'c,r,u,d',
            'mdoel' => 'c,r,u,d',
            'car' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'checkup' => [
            'car' => 'c,r,u',
            'profile' => 'r,u'
        ],
        'user' => [
            'profile' => 'r,u'
        ],
        'dealer' => [
            'brand' => 'c,r,u',
            'mdoel' => 'c,r,u',
            'car' => 'c,r,u',
            'profile' => 'r,u'
        ],
    ],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
