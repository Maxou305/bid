<?php
include 'database.php';

//$pdo = new PDO('mysql:host=localhost;dbname=greendata', 'root', 'test');
$dsn = 'mysql:host=localhost;dbname=greendata';
$username = 'root';
$password = 'test';

try {
    $pdo = new PDO($dsn, $username, $password);
    // Réglages supplémentaires (par exemple, pour afficher les erreurs)
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Connexion échouée : ' . $e->getMessage());
}

$limit = 100;

function get_page_count(){
    global $pdo, $limit;
    $stmt = $pdo->prepare('SELECT COUNT(*) FROM bid');
    $stmt->execute();
    return $stmt->fetchColumn()/$limit;
}

function get_all_bids($offset)
{
    global $pdo, $limit;
    $stmt = $pdo->prepare('SELECT * FROM bid LIMIT :limit OFFSET :offset');
    $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
    $stmt->bindValue(':offset', (int)($offset -1)*$limit, PDO::PARAM_INT);
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

