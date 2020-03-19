<?php

return [
    'roles' => [
        0 => 'Super Admin',
        1 => 'Admin',
        2 => 'Editor',
        3 => 'User',
    ],
    'bill_statuses' => [
        'not_confirm' => [
            'code' => 0,
            'message' => 'Chưa xác nhận',
        ],
        'confirmed' => [
            'code' => 1,
            'message' => 'Đã xác nhận',
        ]
    ],
    'product_status' => [
        0 => [
            'name' => 'not_active',
            'message' => 'Ẩn'
        ],
        1 => [
            'name' => 'active',
            'message' => 'Hiện',
        ],
        2 => [
            'name' => 'out_of_stock',
            'message' => 'Hết hàng'
        ]
    ],
    'upload' => [
        1 => 'one_file',
        2 => 'multiple'
    ]
];
