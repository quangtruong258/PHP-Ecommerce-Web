<!-- day la nguoi dan duong trong trang web -->

<?php

$routes = [

    '/' => [

        'controller' => 'HomeController',

        'action' => 'index'

    ],

    'ketquatimkiem' => [

        'controller' => 'FlowerController',

        'action' => 'timkiemhoa'

    ],

    'admin' => [

        'controller' => 'AdminHomeController',

        'action' => 'index',
        
        'middleware' => 'auth'

    ],
    
    'admin/register' => [

        'controller' => 'AdminAccountController',

        'action' => 'register',
       

    ],

    'admin/login' => [

        'controller' => 'AdminAccountController',

        'action' => 'login',
       

    ],
    'admin/logout' => [

        'controller' => 'AdminAccountController',

        'action' => 'logout',
       

    ],
    'admin/quanlyhoa' => [

        'controller' => 'AdminFlowerController',

        'action' => 'getDanhSach',
        'middleware' => 'auth'
       

    ],
    'admin/quanlyhoa/themhoa' => [

        'controller' => 'AdminFlowerController',

        'action' => 'addHoa',
        'middleware' => 'auth'
       

    ],

    'admin/quanlyhoadon' => [

        'controller' => 'AdminOrderController',

        'action' => 'getDanhSach',
        'middleware' => 'auth'
       

    ],

    'admin/quanlyhoa/edit' => [

        'controller' => 'AdminFlowerController',

        'action' => 'editHoa',
        'middleware' => 'auth'
       

    ],


    'danhsach' => [

        'controller' => 'FlowerController',

        'action' => 'getDanhSach'

    ],

    'xemchitiet' => [

        'controller' => 'FlowerController',

        'action' => 'xemchitiet'

    ],

    'danhsachloaihoa' => [

        'controller' => 'TypeFlowerController',

        'action' => 'getDanhSachLoaiHoa'

    ],


    'editprofile' => [

        'controller' => 'AccountController',

        'action' => 'editprofile',
        
        'middleware' => 'auth'

    ],

    'login' => [

        'controller' => 'AccountController',

        'action' => 'login'

        

    ],
    'logout' => [

        'controller' => 'AccountController',

        'action' => 'logout'

    ],

    'register' => [

        'controller' => 'AccountController',

        'action' => 'register'

    ],
    'addcart2' =>[
        'controller' =>'FlowerController',
        'action'=>'addCart2',
    ],
    'viewcart' =>[
        'controller' =>'FlowerController',
        'action'=>'viewCart',
    ],
    'empty-cart' =>[
        'controller' =>'FlowerController',
        'action'=>'emptyCart',
    ],
    'update-cart' =>[
        'controller' =>'FlowerController',
        'action'=>'cartUpdate',
        
    ],

    'ordercomplete' =>[
        'controller' =>'CartController',
        'action'=>'ordercomplete',
    ],

    'ordersuccess' =>[
        'controller' =>'CartController',
        'action'=>'ordersuccess',
    ],
    'delete-cart-item' =>[
        'controller' =>'NganhHocController',
        'action'=>'deleteCartItem',
    ]
];
?>