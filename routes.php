<?php

// Screen 1
$router->get('/login', '/user/login/index.php');
$router->post('/login', '/user/login/store.php');

// Screen-2 route
$router->post('/user/catalog/', "/user/catalog/create.php");

// Screen 3
$router->get('/admin/catalog', '/admin/catalog/index.php');
$router->post('/admin/catalog', '/admin/catalog/store.php');


$router->post('/admin/products/create', '/admin/product/create.php');

// Screen 7 route
$router->post('/admin/users/create', '/admin/users/create.php');

$router->post('/admin/catalog', '/admin/catalog/store.php');


// Product Routes
$router->get('/admin/products', '/admin/products/index.php');
$router->get('/admin/products/edit', '/admin/products/edit.php');
$router->post('/admin/products/update', '/admin/products/update.php');
$router->post('/admin/products/toggle', '/admin/products/toggleAvailability.php');
$router->post('/admin/products/delete', '/admin/products/delete.php');


// checks Routes
$router->get('/admin/checks', 'admin/checks/index.php');

// screen-8 route
$router->post('/admin/products/create', '/admin/product/create.php');


// Add authorization rules to each route {admin, user}
$router->get('/admin/catalog', '/admin/catalog/index.php');
$router->post('/admin/catalog', '/admin/catalog/store.php');

$router->get('/admin/users/edit', '/admin/users/edit.php');
$router->post('/admin/users/delete', '/admin/users/destroy.php');

$router->get('/admin/users', '/admin/users/index.php');
$router->post('/admin/users/edit', '/admin/users/update.php');
