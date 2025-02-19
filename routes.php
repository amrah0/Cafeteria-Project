<?php

// Add authorization rules to each route {admin, user}
$router->get('/admin/catalog', '/admin/catalog/index.php');
$router->post('/admin/catalog', '/admin/catalog/store.php');

$router->get('/admin/users', '/admin/users/index.php');