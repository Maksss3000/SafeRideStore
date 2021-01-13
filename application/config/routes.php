<?php
return [
    '' => [
        'controller' => 'main',
        'action' => 'index',
        'view' => 'index'
    ],
    'account/login' => [
        'controller' => 'account',
        'action' => 'login',
        'view' => 'login'
    ],
    'account/register' => [
        'controller' => 'account',
        'action' => 'register',
        'view' => 'editRegister'
    ],
    'account/logout' => [
        'controller' => 'account',
        'action' => 'logout',
        'view' => ''
    ],
    'account/editAccount' => [
        'controller' => 'account',
        'action' => 'editAccount',
        'view' => 'editRegister'
    ],
    'account/changePassword' => [
        'controller' => 'account',
        'action' => 'changePassword',
        'view' => ''
    ],
    'accaunt/orderHistory' => [
        'controller' => 'orders',
        'action' => 'orderHistory',
        'view' => 'orders'
    ],
    'order/products/[0-9]+' => [
        'controller' => 'orders',
        'action' => 'orderProducts',
        'view' => 'orders',
        'id' => ''
    ],
    'contact' => [
        'controller' => 'account',
        'action' => 'contact',
        'view' => 'contact'
    ],
    'message' => [
        'controller' => 'account',
        'action' => 'message',
        'view' => 'contact'
    ],
    'cart' => [
        'controller' => 'cart',
        'action' => 'cart',
        'view' => 'cart'

    ],
    'cart/addAjax/[A-Za-z]+/[A-Za-z]+/[0-9]+/[0-9]+' => [
        'controller' => 'cart',
        'action' => 'addAjax',
        'view' => 'cart',
        'id' => '',
        'amount' => '',
        'size' => '',
        'color' => ''

    ],
    'cart/incAjax/[0-9]+' => [
        'controller' => 'cart',
        'action' => 'incAjax',
        'view' => 'cart',
        'id' => '',

    ], 'cart/decAjax/[0-9]+' => [
        'controller' => 'cart',
        'action' => 'decAjax',
        'view' => 'cart',
        'id' => '',

    ],
    'cart/delete/[0-9]+' => [
        'controller' => 'cart',
        'action' => 'delete',
        'view' => 'cart',
        'id' => ''
    ],
    'order/checkout' => [
        'controller' => 'order',
        'action' => 'checkOut',
        'view' => 'payPal',
    ],
    'productDetails/[0-9]+' => [
        'controller' => 'products',
        'action' => 'productDetails',
        'view' => 'productDetails',
        'id' => ''
    ],
    'products/helmets' => [
        'controller' => 'products',
        'action' => 'productByCategory',
        'view' => 'products',
        'category' => 'helmet'
    ],
    'products/full-face-helmets' => [
        'controller' => 'products',
        'action' => 'productBySubCategory',
        'view' => 'products',
        'category' => 'fullFace'
    ],
    'products/modular' => [
        'controller' => 'products',
        'action' => 'productBySubCategory',
        'view' => 'products',
        'category' => 'modular'
    ],
    'products/dualSport' => [
        'controller' => 'products',
        'action' => 'productBySubCategory',
        'view' => 'products',
        'category' => 'Dual Sport'
    ],
    'products/dirt-helmet' => [
        'controller' => 'products',
        'action' => 'productBySubCategory',
        'view' => 'products',
        'category' => 'Dirt'
    ],
    'products/half-helmet' => [
        'controller' => 'products',
        'action' => 'productBySubCategory',
        'view' => 'products',
        'category' => 'Half'
    ],
    'products/open-face-helmet' => [
        'controller' => 'products',
        'action' => 'productBySubCategory',
        'view' => 'products',
        'category' => 'openFace'
    ],
    'products/accessories' => [
        'controller' => 'products',
        'action' => 'productByCategory',
        'view' => 'products',
        'category' => 'accessories'
    ],
    'products/jeans' => [
        'controller' => 'products',
        'action' => 'productBySubCategory',
        'view' => 'products',
        'category' => 'jeans'

    ],
    'products/RainGear' => [
        'controller' => 'products',
        'action' => 'productBySubCategory',
        'view' => 'products',
        'category' => 'RainGear'

    ],
    'products/protection/[A-Za-z0-9]+' => [
        'controller' => 'products',
        'action' => 'productByBrand',
        'view' => 'products',
        'brand' => ''
    ],
    'products/brands/[A-Za-z0-9]+' => [
        'controller' => 'products',
        'action' => 'productByBrand',
        'view' => 'products',
        'brand' => ''
    ],
    'products/search' => [
        'controller' => 'products',
        'action' => 'productSearch',
        'view' => 'products',
    ],
    'products/sizesAjax/[A-Za-z]+/[0-9]+' => [
        'controller' => 'products',
        'action' => 'sizesAjax',
        'view' => 'productDetails',
        'id' => '',
        'color' => ''
    ],
    'admin' => [
        'controller' => 'admin',
        'action' => 'admin',
        'view' => 'admin',
    ],
    'notify' => [
        'controller' => 'admin',
        'action' => 'notify',
        'view' => 'admin',
    ],
    'admin/products' => [
        'controller' => 'admin',
        'action' => 'adminProducts',
        'view' => 'adminProducts',
        'model' => 'products'
    ],
    'admin/products/edit/[0-9]+' => [
        'controller' => 'admin',
        'action' => 'adminProductEdit',
        'view' => 'adminProductEdit',
        'model' => 'products',
        'id' => ''
    ],
    'admin/products/add' => [
        'controller' => 'admin',
        'action' => 'adminProductAdd',
        'view' => 'adminProductEdit',
        'model' => 'products'
    ],
    'admin/products/delete/[0-9]+' => [
        'controller' => 'admin',
        'action' => 'adminProductDelete',
        'view' => 'adminProducts',
        'model' => 'products',
        'id' => ''
    ],
    'admin/products/filter' => [
        'controller' => 'admin',
        'action' => 'adminProductsFilter',
        'view' => 'adminProducts',
        'model' => 'products'
    ],
    'admin/products/manage-stock/[0-9]+' => [
        'controller' => 'admin',
        'action' => 'adminManageStock',
        'view' => 'adminManageStock',
        'model' => 'products',
        'id' => ''
    ],
    'admin/products/addStock/[A-Za-z]+/[A-Za-z]+/[0-9]+/[0-9]+' => [
        'controller' => 'admin',
        'action' => 'addStock',
        'model' => 'products',
        'view' => 'adminManageStock',
        'id' => '',
        'amount' => '',
        'size' => '',
        'color' => ''
    ],
    'admin/products/updateStock/[0-9]+/[0-9]+' => [
        'controller' => 'admin',
        'action' => 'updateStock',
        'model' => 'products',
        'view' => 'adminManageStock',
        'id' => '',
        'amount' => '',
    ],
    'admin/orders' => [
        'controller' => 'admin',
        'action' => 'adminOrders',
        'view' => 'adminOrders',
        'model' => 'orders'
    ],
    'admin/orders/dates' => [
        'controller' => 'admin',
        'action' => 'adminOrdersDates',
        'view' => 'adminOrders',
        'model' => 'orders',

    ],
    'admin/orders/user' => [
        'controller' => 'admin',
        'action' => 'adminOrdersUser',
        'view' => 'adminOrders',
        'model' => 'orders',

    ],
    'admin/order/viewOrder/[0-9]+' => [
        'controller' => 'admin',
        'action' => 'adminViewOrder',
        'view' => 'adminViewOrder',
        'model' => 'orders',
        'id' => ''
    ],
    'admin/customers' => [
        'controller' => 'admin',
        'action' => 'adminCustomers',
        'view' => 'adminCustomers',
        'model' => 'account'
    ],
    'admin/changeVat' => [
        'controller' => 'admin',
        'action' => 'changeVat',
        'view' => '',
    ],
    'admin/salesStatistics' => [
        'controller' => 'admin',
        'action' => 'salesStatistics',
        'view' => 'salesStatistics',
    ],
    'admin/loadSales/[0-9]+' => [
        'controller' => 'admin',
        'action' => 'loadSales',
        'view' => '',
        'id' => ''
    ],
    'admin/customersStatistics' => [
        'controller' => 'admin',
        'action' => 'customersStatistics',
        'view' => 'customersStatistics',
    ],
    'admin/loadCustomers/[0-9]+' => [
        'controller' => 'admin',
        'action' => 'loadCustomers',
        'view' => '',
        'id' => ''
    ],
    'admin/discount' => [
        'controller' => 'admin',
        'action' => 'discount',
        'view' => 'discount',
    ],
    'admin/discount/delete/[0-9]+' => [
        'controller' => 'admin',
        'action' => 'discountDelete',
        'view' => 'discount',
        'id' => ''
    ]

];
