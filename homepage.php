<?php
include 'functions.php';
global $actualPage;
include 'header.php';
$actualPage = $_GET['page'] ?? 1;
$items = get_all_bids($actualPage);
$pages = get_page_count();

if (isset($_POST['search'])) {
    $items = search_bid($_POST['search'], $actualPage);
}

//$items = [
//    [
//        'id' => 1,
//        'username' => 'toto',
//        'bid' => 'Cherche la perle rare pour un projet de startup',
//        'createdAt' => '2024-01-01'
//    ],
//    [
//        'id' => 2,
//        'username' => 'tatagnagna',
//        'bid' => 'Cherche un libanais bien technique',
//        'createdAt' => '2024-01-20'
//    ],
//    [
//        'id' => 3,
//        'username' => 'tata',
//        'bid' => 'Cherche une personne pour faire du ménage',
//        'createdAt' => '2024-01-24'
//    ],
//    [
//        'id' => 4,
//        'username' => 'titi',
//        'bid' => 'Cherche des gens pour faire la fête',
//        'createdAt' => '2024-01-25'
//    ],
//];
?>
    <h1>Les annonces dans ta région</h1>
    <div>
        <a href="new_bid_form.php">
            <button>Poster une annonce</button>
        </a>
        <form method="post">
        <div>
            <label for="search">Search</label>
            <input type="search" name="search" id="search">
        </div>
        <button type="submit">Rechercher</button>
        </form>
    </div>
<?php
for ($i = 1; $i <= $pages + 1; $i++) {
    ?>
    <a href="homepage.php?page=<?= $i ?>">
        <button><?= $i ?></button>
    </a>
    <?php
}
foreach ($items as $item) : ?>
    <div class="bid">
        <h2>Annonce n°<?= $item['id'] ?> postée par <?= $item['username'] ?></h2>
        <p><?= $item['bid'] ?></p>
        <a href="bid.php?id=<?= $item['id'] ?>">
            <button>Voir plus</button>
        </a>
        <p class="date">Postée le <?= $item['created_at'] ?></p>
    </div>
<?php endforeach;
for ($i = 1; $i <= $pages + 1; $i++) {
    ?>
    <a href="homepage.php?page=<?= $i ?>">
        <button><?= $i ?></button>
    </a>
    <?php
}
?>