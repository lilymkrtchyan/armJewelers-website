<?php

$db = init_sqlite_db('db/site.sqlite', 'db/init.sql');

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

  <title>Home</title>
</head>

<body>


  <h1> ARMJEWELERS </h1>

  <nav>
    <ul>
      <li><a href="/">Home</a></li>
      <li><a href="/details">Details</a></li>
      <li><a href="/account">Account</a></li>
    </ul>
  </nav>

  <?php
    // query DB
    $result = exec_sql_query($db, 'SELECT * FROM products;');
    $records = $result->fetchAll();
    ?>

<?php foreach ($records as $record) { ?>


        <div class="all-products">

        <div class="one-product">
          <p>
            <?php echo htmlspecialchars($record
            ['product_name']); ?></th>
          </p>
        </div>

        <img src="public/uploads/placeholder-image.jpg" alt="Placeholder image">

        <div class="one-product">
          <p>
            <?php echo htmlspecialchars($record['product_description']); ?>
          </p>
        </div>

        <div class="one-product">
          <p>
            <?php echo htmlspecialchars($record['product_price']); ?>
          </p>
        </div>

        <div class="one-product">
          <div class="rating-stars">
             <?php echo htmlspecialchars(RATING[$record['product_rating']]); ?>
          </div>
        </div>

        <div class="one-product">
          <p>
              <?php echo htmlspecialchars(JEWELER[$record['jeweler_id']]); ?>
          </p>
        </div>

</div>

      <?php } ?>


</body>

</html>
