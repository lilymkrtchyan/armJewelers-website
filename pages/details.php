
<?php

include_once('../includes/db.php');
$db = init_sqlite_db('db/site.sqlite', 'db/init.sql');

$id = $_GET['id'];

const MATERIAL = array(
  1 => 'Silver',
  2 => 'Gold',
  3 => 'Other'
);

const JEWELER = array(
  1 => 'Im Zardy',
  2 => 'Protest Handmade'
);

const TYPE = array(
  1 => 'Ring',
  2 => 'Necklace',
  3 => 'Bracelet',
  4 => 'Belt',
  5 => 'Earing',
  6 => 'Brooch'
);

const RATING = array(
  0 => '☆☆☆☆☆',
  1 => '★☆☆☆☆',
  2 => '★★☆☆☆',
  3 => '★★★☆☆',
  4 => '★★★★☆',
  5 => '★★★★★'
);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" type="text/css" href="/public/styles/site.css" />

  <title>details</title>
</head>

<body>

<header>
    <h1> ARMJEWELERS </h1>

    <nav>
      <ul>
        <li><a href="/">Home</a></li>
        <li><a href="/account">Account</a></li>
      </ul>
    </nav>
  </header>

<h1>Details for your product!</h1>

<?php


    $id = $_GET['id'];

    // query DB
    $result = exec_sql_query($db, "SELECT * FROM products INNER JOIN product_tags ON products.id = product_tags.product_id INNER JOIN tags ON product_tags.tag_id = tags.id INNER JOIN jewelers ON jewelers.id=products.jeweler_id WHERE products.id=" . $id);
    $records = $result->fetchAll();

     ?>


  <?php foreach ($records as $record) { ?>

  <div class="details-name-price">

    <h2><?php echo htmlspecialchars($record['product_name']);?> </h2>

    <h2 class="product-price"><?php echo htmlspecialchars('$' . $record['product_price']);?></h2>
    <h2 class="details-rating"><?php echo htmlspecialchars(RATING[$record['product_rating']]);?></h2>
  </div>

<div class="image-description">
  <img src="../public/uploads/placeholder-image.jpg" alt="Placeholder image">
  <div class="product-descriptions">
    <h3>Metal: <?php echo htmlspecialchars(MATERIAL[$record['material']]);?></h3>
    <h3>Jevelery Type: <?php echo htmlspecialchars(TYPE[$record['tag_type']]);?></h3>
    <h3>Description:</h3>

    <p><?php echo htmlspecialchars($record['product_description']);?></p>
    <h3>Jeweler: <?php echo htmlspecialchars(JEWELER[$record['jeweler_id']]); ?></h3>
    <p><?php echo htmlspecialchars($record['jeweler_description']); ?></p>

    </div>
</div>

<?php } ?>


</body>

</html>
