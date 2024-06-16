<?php

require_once 'includes/config_session.inc.php';
require_once 'includes/register_view.inc.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signup.css">
    <title>Register</title>
</head>

<body>

<header class="header">
    <div class="container">
        <div class="brand">
            <img src="logo.png" alt="Brand Logo">
        </div>
        <nav class="navbar">
            <ul class="navbar-nav">
                <li><a href="index.php">Home</a></li>
                <li><a href="about.html">About Us</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </nav>
    </div>
</header>

<main>
    <div class="login-container">
        <h3>Register</h3>
        <form action="includes/register.inc.php" method="post">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <input type="text" name="email" placeholder="E-Mail">
            <button type="submit">Register</button>
        </form>
        <?php
        check_signup_errors();
        ?>
    </div>
</main>

<footer class="footer">
    <div class="container">
        <div class="footer-row">
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
    </div>
</footer>

</body>
</html>
