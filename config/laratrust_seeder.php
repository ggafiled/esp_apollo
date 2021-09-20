<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => true,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'superadministrator' => [
            'users' => 'c,r,u,d',
            'manage-users' => 'c,r,u,d',
            'payments' => 'c,r,u,d',
            'profile' => 'r,u',
            'password' => 'c,r,u',
            'building' => 'c,r,u,d',
            'constarution' => 'c,r,u,d',
            'status-operator' => 'c,r,u,d',
            'technician-opertor' => 'c,r,u,d',
        ],
        'administrator' => [
            'users' => 'c,r,u,d',
            'manage-users' => 'c,r',
            'profile' => 'r,u',
            'payments' => 'c,r,u',
            'password' => 'c,r,u',
            'building' => 'c,r,u',
            'constarution' => 'c,r,u,d',
            'status-operator' => 'c,r,u,d',
            'technician-opertor' => 'c,r,u,d',
        ],
        'user' => [
            'users' => 'r,u',
            'profile' => 'r,u',
            'password' => 'u',
            'building' => 'c,r',
            'constarution' => 'c,r,u',
            'status-operator' => 'c,r,u',
            'technician-opertor' => 'c,r,u',
        ],
        'guest' => [
            'users' => 'r,u',
            'profile' => 'r,u',
            'password' => 'u',
            'building' => 'r'
        ],
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];