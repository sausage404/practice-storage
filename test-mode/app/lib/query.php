<?php
function getUsers()
{
    global $conn;
    $query = $conn->prepare("SELECT * FROM users");
    $query->execute();
    return $query;
}

function getUserByEmail($email)
{
    global $conn;
    $query = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $query->execute([$email]);
    return $query;
}

function getUserByUsername($name)
{
    global $conn;
    $query = $conn->prepare("SELECT * FROM users WHERE name = ?");
    $query->execute([$name]);
    return $query;
}

function getUserById($id)
{
    global $conn;
    $query = $conn->prepare("SELECT * FROM users WHERE id = ?");
    $query->execute([$id]);
    return $query;
}

function getProducts()
{
    global $conn;
    $query = $conn->prepare("SELECT * FROM products");
    $query->execute();
    return $query;
}

function getProductByName($name)
{
    global $conn;
    $query = $conn->prepare("SELECT * FROM products WHERE name = ?");
    $query->execute([$name]);
    return $query;
}

function getProductById($id)
{
    global $conn;
    $query = $conn->prepare("SELECT * FROM products WHERE id = ?");
    $query->execute([$id]);
    return $query;
}

function getOrders()
{
    global $conn;
    $query = $conn->prepare("SELECT * FROM orders");
    $query->execute();
    return $query;
}

function getOrderIsStatusById($id)
{
    global $conn;
    $query = $conn->prepare("SELECT * FROM orders WHERE id = ? AND status = true");
    $query->execute([$id]);
    return $query;
}

function getOrderIsNotStatusById($id)
{
    global $conn;
    $query = $conn->prepare("SELECT * FROM orders WHERE id = ? AND status = false");
    $query->execute([$id]);
    return $query;
}

function getOrderByUserId($id)
{
    global $conn;
    $query = $conn->prepare("SELECT * FROM orders WHERE user_id = ?");
    $query->execute([$id]);
    return $query;
}

function getOrderById($id)
{
    global $conn;
    $query = $conn->prepare("SELECT * FROM orders WHERE id = ?");
    $query->execute([$id]);
    return $query;
}

function getWebboard()
{
    global $conn;
    $query = $conn->prepare("SELECT * FROM webboard");
    $query->execute();
    return $query;
}

function getWebboardById($id)
{
    global $conn;
    $query = $conn->prepare("SELECT * FROM webboard WHERE id = ?");
    $query->execute([$id]);
    return $query;
}