<?php

$router->get('/admin/catalog', '/admin/catalog/index.php');

$router->post('/admin/catalog', '/admin/catalog/store.php');


// Product Routes
$router->get('/admin/products', 'admin/products/index.php');
$router->get('/admin/products/edit', 'admin/products/edit.php');
$router->post('/admin/products/update', 'admin/products/update.php');
$router->post('/admin/products/toggle', 'admin/products/toggleAvailability.php');
$router->post('/admin/products/delete', 'admin/products/delete.php');


// checks Routes
$router->get('/admin/checks', 'admin/checks/index.php');




// screen-2 route
$router->post('/user/catalog/', "/user/catalog/create.php");


