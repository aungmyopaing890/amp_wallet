<?php
use Illuminate\Support\Facades\Facade;

return [
    'levels' => [
        [
            'id' => '1',
            'name' => 'Level-1',
            'description' => 'new users and not verified users'
        ],
        [
            'id' => '2',
            'name' => 'Level-2',
            'description' => 'verified users'
        ],
    ],
    'roles' => [
        [
            'id' => '1',
            'name' => 'Admin',
        ],
        [
            'id' => '2',
            'name' => 'Staff',
        ],
        [
            'id' => '3',
            'name' => 'Customer',
        ],
        [
            'id' => '4',
            'name' => 'Merchant',
        ],
    ],
];

