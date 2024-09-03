<?php
include 'database.php';

$pdo = new PDO('mysql:host=localhost;dbname=greendata', 'root', 'root');


function get_all_bids()
{
    global $pdo;
    $stmt = $pdo->prepare('SELECT * FROM bid');
    $stmt->execute();
    return $stmt->fetchAll();
}

function get_bid($id)
{
    global $pdo;
    $stmt = $pdo->prepare('SELECT * FROM bid WHERE id = :id');
    $stmt->execute(['id' => $id]);
    return $stmt->fetch();
}

function create_bid($data)
{
    global $pdo;
    $stmt = $pdo->prepare('INSERT INTO bid (username, bid, created_at) VALUES (:username, :bid, :created_at)');
    $stmt->execute($data);
    return $pdo->lastInsertId();
}

function get_messages_by_bid($bid_id)
{
    global $pdo;
    $stmt = $pdo->prepare('SELECT * FROM message WHERE bid_id = :bid_id');
    $stmt->execute(['bid_id' => $bid_id]);
    return $stmt->fetchAll();
}

function create_message($data)
{
    global $pdo;
    $stmt = $pdo->prepare('INSERT INTO message (bid_id, username, message) VALUES (:bid_id, :username, :message)');
    $stmt->execute($data);
    return $pdo->lastInsertId();
}

