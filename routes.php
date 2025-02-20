<?php

// Add authorization rules to each route {admin, user}
$router->get('/admin/catalog', '/admin/catalog/index.php');
$router->post('/admin/catalog', '/admin/catalog/store.php');

$router->get('/admin/users/edit', '/admin/users/edit.php');
$router->post('/admin/users/delete', '/admin/users/destroy.php');

$router->get('/admin/users', '/admin/users/index.php');
$router->post('/admin/users/edit', '/admin/users/update.php');