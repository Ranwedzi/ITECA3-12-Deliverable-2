<?php

// Ensure that PHP's session cookie settings are set correctly
ini_set('session.use_only_cookies', 1);
ini_set('session.use_strict_mode', 1);

// Configure session cookie parameters
session_set_cookie_params([
    'lifetime' => 1800, // 30 minutes
    'domain' => 'localhost',
    'path' => '/',
    'secure' => true, // Ensure the session cookie is sent only over HTTPS
    'httponly' => true, // Ensure the session cookie is accessible only through the HTTP protocol
]);

session_start();

if (isset($_SESSION["user_id"])) {

    if (!isset($_SESSION["last_regeneration"])) {
        regenerate_session_id_loggedin();
    } else {
        $interval = 60 * 60; // 1 hour
        if (time() - $_SESSION["last_regeneration"] >= $interval) {
            regenerate_session_id_loggedin();
        }
    }

} else {
    if (!isset($_SESSION["last_regeneration"])) {
        regenerate_session_id();
    } else {
        $interval = 60 * 60; // 1 hour
        if (time() - $_SESSION["last_regeneration"] >= $interval) {
            regenerate_session_id();
        }
    }
}

function regenerate_session_id_loggedin() {
    session_regenerate_id(true);
    
    $userId = $_SESSION["user_id"];
    $newSessionId = session_create_id();
    $sessionId =  $newSessionId. "_" . $userId;
    session_id($sessionId);

    $_SESSION["last_regeneration"] = time();
}

function regenerate_session_id() {
    session_regenerate_id(true); // Regenerate the session ID
    $_SESSION["last_regeneration"] = time();
}
?>
