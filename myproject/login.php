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
    <title>Login - Profound Productions</title>
    <link rel="stylesheet" href="log.css?v=<?php echo time(); ?>">
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
                    <li><a href="http://localhost/myproject/services.php">Services</a></li>
                    <li><a href="contact.html">Contact</a></li>
                    <li><a href="http://localhost/myproject/login.php">Login</a></li>
                    <li id="sh-bag"><a href="http://localhost/myproject/cart.php"><i class="fa-solid fa-cart-shopping"></i></a></li>
                </ul>
            </div>
        </div>
    </div>

    <main>
        <div class="login-container">
            <h3>Login</h3>
            <form action="includes/login.inc.php" method="post">
                <input type="text" name="username" placeholder="Username">
                <input type="password" name="password" placeholder="Password">
                <button type="submit">Login</button>
            </form>
            <?php check_login_errors(); ?>
            <p>Not registered yet? <a href="register.php">Register here</a></p>
        </div>
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
            <p>2024 Profound Productions, All Right Reserved.</p>
            <p>Designed By: RANWEDZI NENGWEKHULU</p>
        </div>
    </footer>

</body>
</html>
