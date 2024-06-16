<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    try {
        require_once 'dbh.inc.php';
        require_once 'register_model.inc.php';
        require_once 'register_contr.inc.php';
        require_once 'config_session.inc.php';

        // ERROR HANDLERS

        $errors = [];

        if (is_input_empty($username, $password, $email)) {
            $errors["empty_input"] = "Fill in all the fields!";
        }
        if (is_email_invalid($email)) {
            $errors["invalid_email"] = "Invalid email address!";
        }
        if (is_username_taken($pdo, $username)) {
            $errors["username_invalid"] = "Username already taken!";
        }
        if (is_email_registered($pdo, $email)) {
            $errors["email_used"] = "Email already registered!";
        }
        if (strlen($password) < 8) {
            $errors["password_length"] = "Password must be at least 8 characters long!";
        }

        if ($errors) {
            $_SESSION["errors_signup"] = $errors;
            header("Location: ../register.php");
            die();
        }

        create_user($pdo, $username, $password, $email);

        header("Location: ../register.php?signup=success");
        die();

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../register.php");
    die();
}
?>
