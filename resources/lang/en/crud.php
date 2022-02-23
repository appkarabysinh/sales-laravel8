<?php

return [
    'common' => [
        'actions' => 'Actions',
        'create' => 'Create',
        'edit' => 'Edit',
        'update' => 'Update',
        'new' => 'New',
        'cancel' => 'Cancel',
        'save' => 'Save',
        'delete' => 'Delete',
        'delete_selected' => 'Delete selected',
        'search' => 'Search...',
        'back' => 'Back to Index',
        'are_you_sure' => 'Are you sure?',
        'no_items_found' => 'No items found',
        'created' => 'Successfully created',
        'saved' => 'Saved successfully',
        'removed' => 'Successfully removed',
    ],

    'users' => [
        'name' => 'Users',
        'index_title' => 'Users List',
        'new_title' => 'New User',
        'create_title' => 'Create User',
        'edit_title' => 'Edit User',
        'show_title' => 'Show User',
        'inputs' => [
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
        ],
    ],

    'orders' => [
        'name' => 'Orders',
        'index_title' => 'Orders List',
        'new_title' => 'New Order',
        'create_title' => 'Create Order',
        'edit_title' => 'Edit Order',
        'show_title' => 'Show Order',
        'inputs' => [
            'order_title' => 'Order Title',
            'store_id' => 'Store',
        ],
    ],

    'order_details' => [
        'name' => 'Order Details',
        'index_title' => 'OrderDetails List',
        'new_title' => 'New Order detail',
        'create_title' => 'Create OrderDetail',
        'edit_title' => 'Edit OrderDetail',
        'show_title' => 'Show OrderDetail',
        'inputs' => [
            'product_id' => 'Product Id',
            'order_id' => 'Order Id',
            'price' => 'Price',
            'product_count' => 'Product Count',
        ],
    ],

    'payments' => [
        'name' => 'Payments',
        'index_title' => 'Payments List',
        'new_title' => 'New Payment',
        'create_title' => 'Create Payment',
        'edit_title' => 'Edit Payment',
        'show_title' => 'Show Payment',
        'inputs' => [
            'order_id' => 'Order',
            'payment_title' => 'Payment Title',
            'price_payment' => 'Price Payment',
        ],
    ],

    'products' => [
        'name' => 'Products',
        'index_title' => 'Products List',
        'new_title' => 'New Product',
        'create_title' => 'Create Product',
        'edit_title' => 'Edit Product',
        'show_title' => 'Show Product',
        'inputs' => [
            'user_id' => 'User',
            'pd_name' => 'Pd Name',
            'price_head' => 'Price Head',
            'number_box' => 'Number Box',
            'number_in_one_box' => 'Number In One Box',
        ],
    ],

    'stocks' => [
        'name' => 'Stocks',
        'index_title' => 'Stocks List',
        'new_title' => 'New Stock',
        'create_title' => 'Create Stock',
        'edit_title' => 'Edit Stock',
        'show_title' => 'Show Stock',
        'inputs' => [
            'product_count_remaining' => 'Product Count Remaining',
        ],
    ],

    'cards' => [
        'name' => 'Cards',
        'index_title' => 'Cards List',
        'new_title' => 'New Card',
        'create_title' => 'Create Card',
        'edit_title' => 'Edit Card',
        'show_title' => 'Show Card',
        'inputs' => [
            'card_title' => 'Card Title',
            'card_description' => 'Card Description',
            'product_count' => 'Product Count',
            'card_price_sale' => 'Card Price Sale',
            'product_id' => 'Product',
        ],
    ],
];
