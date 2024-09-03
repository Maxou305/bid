<?php

if (isset ($_POST['username']) && isset($_POST['description'])) {
    $data = [
        'username' => $_POST['name'],
        'description' => $_POST['description'],
        'created_at' => date('Y-m-d H:i:s')
    ];
    $id = create_bid($data);
    header('Location: bid.php?id=' . $id);
    exit;
}

include 'functions.php';
include 'header.php';

?>

    <h1>New Bid</h1>
    <form method="post">
        <div>
            <label for="username">Username</label>
            <input type="text" name="username" id="username">
        </div>
        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description"></textarea>
        </div>
        <button type="submit">Create</button>
    </form>


<?php
include 'footer.php';


