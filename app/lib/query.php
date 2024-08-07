<?php
require_once "../../config.php";
function getUserByEmail($email)
{
    global $conn;
    $query = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $query->execute([$email]);
    return $query;
}

function getUserByUsername($username)
{
    global $conn;
    $query = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $query->execute([$username]);
    return $query;
}