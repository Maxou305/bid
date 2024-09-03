<?php
//include 'functions.php';
include 'database.php';
include 'header.php';
$id = $_GET['id'];
//$item = get_bid($id);
$item = getBid($id);

function getBid($id)
{
    global $list;
    foreach ($list as $item) {
        if ($item['id'] == $id) {
            return $item;
        }
    }
    return null;
}

if ($item === null) {
    echo "Annonce introuvable.";
    exit;
}
?>
    <h1>Annonce n°<?= $item['id'] ?> postée par <?= $item['username'] ?></h1>
    <p><?= $item['bid'] ?></p>
    <p>Postée le <?= $item['createdAt'] ?></p>
    <h2>Répondre à l'annonce</h2>
    <form method="post">
        <div>
            <label for="username">Username</label>
            <input type="text" name="username" id="username">
        </div>
        <div>
            <label for="message">Message</label>
            <textarea name="message" id="message"></textarea>
        </div>
        <button type="submit">Envoyer</button>

<?php
include 'footer.php';
?>