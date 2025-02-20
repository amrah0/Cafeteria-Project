<?php
session_start();
require_once __DIR__ . '/../../../vendor/autoload.php';
use core\Database;

$db = new Database();
$user_id = $_SESSION['user_id'];

// استقبال تاريخ البداية والنهاية من الـ GET
$start_date = $_GET['start_date'] ?? '';
$end_date = $_GET['end_date'] ?? '';

// تجهيز استعلام SQL بناءً على الفلترة
$query = "SELECT * FROM `order` WHERE user_id = ?";
$params = [$user_id];

if (!empty($start_date) && !empty($end_date)) {
    $query .= " AND DATE(created_at) BETWEEN ? AND ?";
    $params[] = $start_date;
    $params[] = $end_date;
}

$query .= " ORDER BY created_at DESC";
$orders = $db->fetchAll($query, $params);
?>
