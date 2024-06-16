<?php
session_start();


if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

function calculateTotalPrice() {
    $total = 0;
    foreach ($_SESSION['cart'] as $item) {
        $total += $item['price'] * $item['quantity'];
    }
    return $total;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $index = intval($_POST['index']);
    if (isset($_POST['increase_quantity'])) {
        $_SESSION['cart'][$index]['quantity']++;
    } elseif (isset($_POST['decrease_quantity'])) {
        $_SESSION['cart'][$index]['quantity']--;
        if ($_SESSION['cart'][$index]['quantity'] <= 0) {
            array_splice($_SESSION['cart'], $index, 1);
        }
    } elseif (isset($_POST['checkout'])) {
        
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <link rel="stylesheet" href="shop.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<div class="header">
        <div class="container">
            <div class="brand">
                <a href="index.html">
                    <img src="lego.png" alt="Logo">
                </a>
            </div>
            <div class="navbar">
                <ul class="navbar-nav">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="services.php">Services</a></li>
                    <li><a href="contact.html">Contact</a></li>
                    <li><a href="login.php">Login</a></li>
                    <li id="sh-bag"><a href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a></li>
                </ul>
            </div>
        </div>
    </div>

<main>
    <div class="container">
        <h1>Your Cart</h1>
        <div class="cart-container">
            <?php
            if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                echo '<table class="cart-table">';
                echo '<thead><tr><th>Item</th><th>Price</th><th>Quantity</th><th>Actions</th></tr></thead>';
                echo '<tbody>';
                foreach ($_SESSION['cart'] as $index => $item) {
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($item['service_name']) . '</td>';
                    echo '<td>$' . number_format($item['price'], 2) . '</td>';
                    echo '<td>' . $item['quantity'] . '</td>';
                    echo '<td>';
                    
                    echo '<form method="post" action="" style="display:inline-block;">';
                    echo '<input type="hidden" name="index" value="' . $index . '">';
                    echo '<button type="submit" name="increase_quantity">Add</button>';
                    echo '</form>';
                    
                    echo '<form method="post" action="" style="display:inline-block;">';
                    echo '<input type="hidden" name="index" value="' . $index . '">';
                    echo '<button type="submit" name="decrease_quantity">Remove</button>';
                    echo '</form>';
                    echo '</td>';
                    echo '</tr>';
                }
                echo '</tbody>';
                echo '</table>';
            } else {
                echo '<p>Your cart is empty.</p>';
            }
            ?>
        </div>
        <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
        <div class="cart-total">
            <p>Total: $<?php echo number_format(calculateTotalPrice(), 2); ?></p>
            <form method="post" action="">
                <button type="submit" name="checkout" class="checkout-button">Checkout</button>
            </form>
        </div>
        <?php endif; ?>
    </div>
</main>

<footer class="footer">
    <div class="container footer-row">
        <div class="footer-column">
            <h2>Get In Touch</h2>
            <p><i class="fa fa-map-marker-alt"></i> 370 Queen's Crescent, Pretoria, South Africa</p>
            <p><i class="fa fa-phone-alt"></i> +27615247406</p>
            <p><i class="fa fa-envelope"></i> profoundproductionss@gmail.com</p>
            <div class="footer-social">
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-whatsapp"></i></a>
            </div>
        </div>
        <div class="footer-column">
            <h2>Useful Links</h2>
            <a href="about.html">About Us</a>
            <a href="services.php">Our Services</a>
            <a href="contact.html">Contact Us</a>
        </div>
        <div class="footer-column">
            <h2>Customer Support</h2>
            <a href="mailto:profoundproductionss@gmail.com">Customer Support</a>
            <a href="#">FAQs</a>
        </div>
    </div>
    
    <div class="copyright">
        <p>2023 Profound Productions, All Right Reserved.</p>
        <p>Designed By: RANWEDZI NENGWEKHULU</p>
    </div>
</footer>

</body>
</html>
