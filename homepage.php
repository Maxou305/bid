<?php
//include 'functions.php';
include 'header.php';
//$items = get_all_bids()
$items = [
    [
        'id' => 1,
        'username' => 'toto',
        'bid' => 'Cherche la perle rare pour un projet de startup',
        'createdAt' => '2024-01-01'
    ],
    [
        'id' => 2,
        'username' => 'tatagnagna',
        'bid' => 'Cherche un libanais bien technique',
        'createdAt' => '2024-01-20'
    ],
    [
        'id' => 3,
        'username' => 'tata',
        'bid' => 'Cherche une personne pour faire du ménage',
        'createdAt' => '2024-01-24'
    ],
    [
        'id' => 4,
        'username' => 'titi',
        'bid' => 'Cherche des gens pour faire la fête',
        'createdAt' => '2024-01-25'
    ],
];
?>
<h1>Les annonces dans ta région</h1>
<?php foreach ($items as $item) : ?>
    <div>
        <h2>Annonce n°<?= $item['id'] ?> postée par <?= $item['username'] ?></h2>
        <p><?= $item['bid'] ?></p>
        <a href="bid.php?id=<?= $item['id'] ?>">
            <button>Voir plus</button>
        </a>
        <p>Postée le <?= $item['createdAt'] ?></p>
    </div>
<?php endforeach;
?>
<a href="new_bid_form.php">
    <button>Poster une annonce</button>
</a>
?>