<?php

$router->get('/admin/catalog', '/admin/catalog/index.php');



// Product Routes
$router->get('/admin/products', 'admin/products/index.php');
$router->get('/admin/products/edit', 'admin/products/edit.php');
$router->post('/admin/products/update', 'admin/products/update.php');
$router->post('/admin/products/toggle', 'admin/products/toggleAvailability.php');
$router->post('/admin/products/delete', 'admin/products/delete.php');


