<?php

$router->get('/admin/catalog', '/admin/catalog/index.php');
require_once 'controllers/user/OrderController.php';

$router->get('/user/orders', function () {
    $controller = new OrderController();
    $controller->index();
});

$router->post('/user/orders/cancel', function () {
    $controller = new OrderController();
    $controller->cancel();
});
?>