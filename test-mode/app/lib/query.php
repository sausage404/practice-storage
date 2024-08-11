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

function getOrderStatusById($status, $id)
{
    global $conn;
    $query = $conn->prepare("SELECT * FROM orders WHERE id = ? AND status = ?");
    $query->execute([$id, $status]);
    return $query;
}

function getOrderByStatus($status)
{
    global $conn;
    $query = $conn->prepare("SELECT * FROM orders WHERE status = ?");
    $query->execute([$status]);
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

function getWebboards()
{
    global $conn;
    $query = $conn->prepare("SELECT * FROM webboards ORDER BY create_at DESC");
    $query->execute();
    return $query;
}

function getWebboardById($id)
{
    global $conn;
    $query = $conn->prepare("SELECT * FROM webboards WHERE id = ?");
    $query->execute([$id]);
    return $query;
}

function getRepliesByWebboardId($id)
{
    global $conn;
    $query = $conn->prepare("SELECT * FROM replies WHERE webboard_id = ?");
    $query->execute([$id]);
    return $query;
}

function getPointByUserIdAndProductId($user_id, $product_id)
{
    global $conn;
    $query = $conn->prepare("SELECT * FROM points WHERE user_id = ? AND product_id = ?");
    $query->execute([$user_id, $product_id]);
    return $query;
}

function addNotification($user_id, $content, $status = 0)
{
    global $conn;
    $query = $conn->prepare("INSERT INTO notifications (user_id, content, status) VALUES (?, ?, ?)");
    $query->execute([$user_id, $content, $status]);
}
