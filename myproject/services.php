<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/login_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Services - Profound Productions</title>
    <link rel="stylesheet" href="product.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="cart.php"><i class="fa fa-shopping-cart"></i></a></li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="container">
            <h1>Our Services</h1>
            <div class="services-container">
                <?php
                require 'includes/dbh.inc.php';

                // Query for Graphic Design service
                $stmt_graphic = $pdo->query("SELECT * FROM services WHERE service_name='Graphic Design'");
                while ($service = $stmt_graphic->fetch(PDO::FETCH_ASSOC)) {
                    echo '<div class="product">';
                    echo '<img src="' . htmlspecialchars($service['image']) . '" alt="' . htmlspecialchars($service['service_name']) . ' Image">';
                    echo '<div class="product-content">';
                    echo '<h3>' . htmlspecialchars($service['service_name']) . '</h3>';
                    echo '<p>' . htmlspecialchars($service['description']) . '</p>';
                    echo '<p>Price: R' . number_format($service['price'], 2) . '</p>';
                    echo '<form action="add_to_cart.php" method="POST">';
                    echo '<input type="hidden" name="service_id" value="' . $service['id'] . '">';
                    echo '<button type="submit">Add to Cart</button>';
                    echo '</form>';
                    echo '</div>'; // Closing product-content div
                    echo '</div>'; // Closing product div
                }

                // Query for Video Editing service
                $stmt_video = $pdo->query("SELECT * FROM services WHERE service_name='Video Editing'");
                while ($service = $stmt_video->fetch(PDO::FETCH_ASSOC)) {
                    echo '<div class="product">';
                    echo '<img src="' . htmlspecialchars($service['image']) . '" alt="' . htmlspecialchars($service['service_name']) . ' Image">';
                    echo '<div class="product-content">';
                    echo '<h3>' . htmlspecialchars($service['service_name']) . '</h3>';
                    echo '<p>' . htmlspecialchars($service['description']) . '</p>';
                    echo '<p>Price: R' . number_format($service['price'], 2) . '</p>';
                    echo '<form action="add_to_cart.php" method="POST">';
                    echo '<input type="hidden" name="service_id" value="' . $service['id'] . '">';
                    echo '<button type="submit">Add to Cart</button>';
                    echo '</form>';
                    echo '</div>'; // Closing product-content div
                    echo '</div>'; // Closing product div
                }
                ?>
            </div> <!-- Closing services-container -->
        </div> <!-- Closing container -->
    </main>

    <footer class="footer">
        <div class="container">
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
