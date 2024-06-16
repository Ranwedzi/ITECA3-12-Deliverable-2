<?php

declare(strict_types=1);

function is_input_empty(string $username, string $password): bool {
    return empty($username) || empty($password);
}

function is_username_wrong($result): bool {
    return !$result;
}

function is_password_wrong(string $password, string $hashedPassword): bool {
    return !password_verify($password, $hashedPassword);
}
?>
