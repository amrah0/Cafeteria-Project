<?php
require_once __DIR__ . '/../../../core/Database.php';
use Core\Database;

$db = new Database();


$fromDate       = $_GET['fromDate'] ?? null;
$toDate         = $_GET['toDate'] ?? null;
$userFilter     = $_GET['userFilter'] ?? 'all';    
$selectedUserId = $_GET['selectedUserId'] ?? null;   
$selectedOrderId= $_GET['selectedOrderId'] ?? null;    



$fromTimestamp = 0;
$toTimestamp = 0;
$applyTimeFilter = false;
if (!empty($fromDate) && !empty($toDate)) {
    $applyTimeFilter = true;
    $fromTimestamp = strtotime($fromDate . ' 00:00:00');
    $toTimestamp   = strtotime($toDate . ' 23:59:59');
}

$users = $db->select('User');


$allOrders = $db->select('`Order`');


$allOrderProducts = $db->select('Order_Product');


$allProducts = $db->select('Product');


$productsById = [];
foreach ($allProducts as $prod) {
    $productsById[$prod['id']] = $prod;
}

// For each user, calculate total price using only orders within the time range
foreach ($users as &$user) {
    $userOrders = array_filter($allOrders, function($order) use ($user, $applyTimeFilter, $fromTimestamp, $toTimestamp) {
        if ($order['user_id'] != $user['id']) {
            return false;
        }
        if ($applyTimeFilter) {
            $orderTime = strtotime($order['created_at']);
            if ($orderTime < $fromTimestamp || $orderTime > $toTimestamp) {
                return false;
            }
        }
        return true;
    });
    $total = 0;
    foreach ($userOrders as $order) {

        if (strtolower(trim($order['status'])) === 'cancelled') {
            continue;
        }

        $orderProducts = array_filter($allOrderProducts, function($op) use ($order) {
            return $op['order_id'] == $order['id'];
        });
        foreach ($orderProducts as $op) {
            if (isset($productsById[$op['product_id']])) {
                $product = $productsById[$op['product_id']];
                $total += $product['price'] * $op['quantity'];
            }
        }
    }
    $user['total_price'] = $total;
}
unset($user);

//    - If "all" is chosen and time filter active: only users with a total > 0 are shown.
//    - If "all" and no time filter: show all users.
//    - If a specific user is chosen show that user.



if ($userFilter === 'all') {

    if ($applyTimeFilter) {

        $filteredUsers = array_filter($users, function($user) {
            return $user['total_price'] > 0;
        });
    } else {
        $filteredUsers = $users;
    }
    // When "all" is selected, do NOT override $filteredUsers if a username is clicked.
    // Instead, set active user for orders/products.
    $activeUserId = !empty($selectedUserId) ? $selectedUserId : '';
} else {

    $filteredUsers = array_filter($users, function($user) use ($userFilter) {
        return $user['id'] == $userFilter;
    });
    $activeUserId = $userFilter;
}




if ($userFilter !== 'all') {
    $activeUserId = $userFilter;
} elseif (!empty($selectedUserId)) {
    $activeUserId = $selectedUserId;
} else {
    $activeUserId = '';
}


$orders = [];
if (!empty($activeUserId)) {
    $orders = array_filter($allOrders, function($order) use ($activeUserId, $applyTimeFilter, $fromTimestamp, $toTimestamp) {
        if ($order['user_id'] != $activeUserId) {
            return false;
        }
        if (strtolower(trim($order['status'])) === 'cancelled') {
            return false;
        }
        if ($applyTimeFilter) {
            $orderTime = strtotime($order['created_at']);
            if ($orderTime < $fromTimestamp || $orderTime > $toTimestamp) {
                return false;
            }
        }
        return true;
    });


    foreach ($orders as &$order) {
        $orderProducts = array_filter($allOrderProducts, function($op) use ($order) {
            return $op['order_id'] == $order['id'];
        });
        $orderTotal = 0;
        foreach ($orderProducts as $op) {
            if (isset($productsById[$op['product_id']])) {
                $orderTotal += $productsById[$op['product_id']]['price'] * $op['quantity'];
            }
        }
        $order['total_price'] = $orderTotal;
    }
    unset($order);
}


$products = [];
if (!empty($selectedOrderId)) {
    $orderProducts = array_filter($allOrderProducts, function($op) use ($selectedOrderId) {
        return $op['order_id'] == $selectedOrderId;
    });
    foreach ($orderProducts as $op) {
        if (isset($productsById[$op['product_id']])) {
            $prod = $productsById[$op['product_id']];
            $products[] = [
                'name'        => $prod['name'],
                'image_url'   => '/Images/' . $prod['image_url'],
                'quantity'    => $op['quantity'],
                'price'       => $prod['price'],
                'total_price' => $prod['price'] * $op['quantity']
            ];
        }
    }
}

require __DIR__ . '/../../../views/admin/checks/index.view.php';
