<?php

// Screen 1
$router->get('/login', '/user/login/index.php')->only('guest');
$router->post('/login', '/user/login/store.php')->only('guest');
//logout
$router->get('/logout', '/user/logout/destroy.php')->only('auth');

// Screen-2 route
$router->get('/', "/user/catalog/index.php")->only('auth');
$router->post('/', "/user/catalog/create.php")->only('auth');

// Screen 3
$router->get('/admin/catalog', '/admin/catalog/index.php')->only('auth');
$router->post('/admin/catalog', '/admin/catalog/store.php')->only('auth');

//screen 4
$router->get('/user/orders', '/user/orders/index.php')->only('auth');
$router->post('/user/orders', '/user/orders/index.php')->only('auth');

// Screen 7 route
// users  add
$router->get('/admin/users/create', '/admin/users/indexadd.php')->only('auth');
$router->post('/admin/users/create', '/admin/users/create.php')->only('auth');

$router->post('/admin/catalog', '/admin/catalog/store.php')->only('auth');


// Product Routes
$router->get('/admin/products', '/admin/products/index.php')->only('auth');
$router->get('/admin/products/edit', '/admin/products/edit.php')->only('auth');
$router->post('/admin/products/update', '/admin/products/update.php')->only('auth');
$router->post('/admin/products/toggle', '/admin/products/toggleAvailability.php')->only('auth');
$router->post('/admin/products/delete', '/admin/products/delete.php')->only('auth');


// checks Routes
$router->get('/admin/checks', 'admin/checks/index.php')->only('auth');


// screen-8 route
$router->get('/admin/products/create', '/admin/product/index.php')->only('auth');
$router->post('/admin/products/create', '/admin/product/create.php')->only('auth');
// category route
$router->get('/admin/categories/create', '/admin/category/index.php')->only('auth');
$router->post('/admin/categories/create', '/admin/category/create.php')->only('auth');

// Add authorization rules to each route {admin, user}
$router->get('/admin/catalog', '/admin/catalog/index.php');
$router->post('/admin/catalog', '/admin/catalog/store.php');

$router->get('/admin/users/edit', '/admin/users/edit.php');
$router->post('/admin/users/delete', '/admin/users/destroy.php');

$router->get('/admin/users', '/admin/users/index.php');
$router->post('/admin/users/edit', '/admin/users/update.php');

// screen 10
$router->get('/admin/orders', '/admin/orders/index.php')->only('auth');
$router->post('/admin/orders', '/admin/users/update.php')->only('auth');

$router->get('/404', '/404.php');