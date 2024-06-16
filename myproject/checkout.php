<?php
session_start();
require 'includes/dbh.inc.php';
require __DIR__ . '/vendor/autoload.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
    $user_id = $_SESSION['user_id'];

    
    $total_price = 0;
    foreach ($_SESSION['cart'] as $item) {
        $total_price += $item['price'] * $item['quantity'];
    }

    
    $stmt = $pdo->prepare("INSERT INTO orders (user_id, total_price, status) VALUES (?, ?, 'Pending')");
    $stmt->execute([$user_id, $total_price]);

    $order_id = $pdo->lastInsertId();

    
    foreach ($_SESSION['cart'] as $item) {
        $stmt = $pdo->prepare("INSERT INTO order_items (order_id, service_id, quantity, price) VALUES (?, ?, ?, ?)");
        $stmt->execute([$order_id, $item['service_id'], $item['quantity'], $item['price']]);
    }

    
    $stripe_secret_key = "sk_test_51OP1b3IwneBe4SAIf19svlRBBKb6vEB7jjVJDZhtt3jpe1ZZnIPt324OkoLiqGQy0kNyc29srA3fdBObwG5819K20008U7DAKT";
    \Stripe\Stripe::setApiKey($stripe_secret_key);

    
    $line_items = [];
    foreach ($_SESSION['cart'] as $item) {
        $line_items[] = [
            'quantity' => $item['quantity'],
            'price_data' => [
                'currency' => 'usd',
                'unit_amount' => intval($item['price'] * 100), 
                'product_data' => [
                    'name' => $item['service_name'],
                ],
            ],
        ];
    }

    
    $checkout_session = \Stripe\Checkout\Session::create([
        'mode' => 'payment',
        'success_url' => 'http://localhost/success.php',
        'cancel_url' => 'http://localhost/index.html',
        'locale' => 'auto',
        'line_items' => $line_items,
    ]);

    
    unset($_SESSION['cart']);

    http_response_code(303);
    header("Location: " . $checkout_session->url);
    exit();
}

header("Location: cart.php");
exit();
?>
