<?php

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $username = $_POST["username"];
    $password = $_POST["password"];

    try {
        require_once 'dbh.inc.php';
        require_once 'login_model.inc.php';
        require_once 'login_contr.inc.php';
        require_once 'config_session.inc.php';

        // ERROR HANDLERS
        $errors = [];

        if (is_input_empty($username, $password)) {
            $errors["empty_input"] = "Fill in all the fields!";
        }

        $result = get_user($pdo, $username);

        if (!$result || is_password_wrong($password, $result["password"])) {
            $errors["login_incorrect"] = "Login info is wrong!";
        }

        if ($errors) {
            $_SESSION["errors_login"] = $errors;
            header("Location: ../login.php");
            die();
        }

        $newSessionId = session_create_id();
        $sessionId =  $newSessionId . "_" . $result["id"];
        session_id($sessionId);

        $_SESSION["user_id"] = $result["id"];
        $_SESSION["user_username"] = htmlspecialchars($result["username"]);
        $_SESSION["last_regeneration"] = time();

        header("Location: ../index.html?login=success");
        $pdo = null;
        $stmt = null;

        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../index.html");
    die();
}
?>
