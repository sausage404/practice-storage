<?php
$REQUEST = $_SERVER['REQUEST_URI'];

switch ($REQUEST) {
    case "/":
        require __DIR__ . '/routes/home.php';
        break;
    case "/about":
        require __DIR__ . '/routes/about.php';
        break;
    case "/auth/register":
        require __DIR__ . '/routes/auth/register.php';
        break;
    case "/auth/login":
        require __DIR__ . "/routes/auth/login.php";
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/routes/404.php';
        break;
}
