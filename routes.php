<?php

$router->get('/admin/catalog', '/admin/catalog/index.php');
$router->post('/admin/catalog', '/admin/catalog/store.php');


$router->get('/login', '/user/login/index.php');
$router->post('/login', '/user/login/store.php');
