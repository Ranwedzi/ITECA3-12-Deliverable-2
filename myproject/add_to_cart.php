<?php
session_start();
require 'includes/dbh.inc.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['service_id'])) {
    $service_id = $_POST['service_id'];

    
    $stmt = $pdo->prepare("SELECT * FROM services WHERE id = ?");
    $stmt->execute([$service_id]);
    $service = $stmt->fetch(PDO::FETCH_ASSOC);

    
    if ($service) {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        
        $item_exists = false;
        foreach ($_SESSION['cart'] as &$item) {
            if ($item['id'] == $service_id) {
                $item_exists = true;
                break;
            }
        }
        if (!$item_exists) {
            $_SESSION['cart'][] = $service;
        }
    }
}

header("Location: cart.php");
exit();
?>
