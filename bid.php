<?php
include 'functions.php';
//include 'database.php';
include 'header.php';
$id = $_GET['id'];
$item = get_bid($id);
//$item = getBid($id);

if (isset($_POST['username']) && isset($_POST['message'])) {
    $data = [
        'bid_id' => $id,
        'username' => $_POST['username'],
        'message' => $_POST['message']
    ];
    create_message($data);
}

if ($item === null) {
    echo "Annonce introuvable.";
    exit;
}
?>
    <h1>Annonce n°<?= $item['id'] ?> postée par <?= $item['username'] ?></h1>
    <p><?= $item['bid'] ?></p>
    <p>Postée le <?= $item['created_at'] ?></p>
    <h2>Messages</h2>
    <ul>
        <?php
        foreach (get_messages_by_bid($id) as $message) {
//        foreach (getMessagesByBid($id) as $message) {
            ?>
            <li>
                <strong><?= $message['username'] ?></strong>
                <p><?= $message['message'] ?></p>
            </li>
            <?php
        }
        ?>
    </ul>
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
    </form>
    <a href="homepage.php">Retour à l'accueil</a>
<?php
include 'footer.php';
?>