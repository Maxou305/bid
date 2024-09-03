<?php
include 'functions.php';

if (isset ($_POST['username']) && isset($_POST['bid'])) {
    $data = [
        'username' => $_POST['username'],
        'bid' => $_POST['bid'],
        'created_at' => date('Y-m-d H:i:s')
    ];
    $id = create_bid($data);
    header('Location: bid.php?id=' . $id);
    exit;
}


include 'header.php';

?>

    <h1>New Bid</h1>
    <form method="post">
        <div>
            <label for="username">Username</label>
            <input type="text" name="username" id="username">
        </div>
        <div>
            <label for="bid">Description</label>
            <textarea name="bid" id="bid"></textarea>
        </div>
        <button type="submit">Create</button>
    </form>


<?php
include 'footer.php';


