
<?php


//include_once('includes/db.php');

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



  <?php include_once("includes/header.php"); ?>

<h1>Details for your product!</h1>

<?php


    $id = $_GET['id'];

    // query DB



    $result = exec_sql_query($db, "SELECT * FROM products INNER JOIN product_tags ON products.id = product_tags.product_id INNER JOIN tags ON product_tags.tag_id = tags.id INNER JOIN users ON users.id=products.jeweler_id WHERE products.id=".$id);
    $records = $result->fetchAll();

     ?>

  <?php foreach ($records as $record) { ?>

  <div class="details-name-price">

    <h2><?php echo htmlspecialchars($record['product_name']);?> </h2>

    <h2 class="product-price"><?php echo htmlspecialchars('$' . $record['product_price']);?></h2>

  </div>

<div class="image-description">
<img src='../<?php echo htmlspecialchars($record['image_path']); ?>' alt="Product image">
  <div class="product-descriptions">
    <h3>Metal: <?php echo htmlspecialchars(MATERIAL[$record['material']]);?></h3>
    <h3>Jevelery Type: <?php echo htmlspecialchars(TYPE[$record['tag_type']]);?></h3>
    <h3>Description:</h3>

    <p><?php echo htmlspecialchars($record['product_description']);?></p>
    <p><?php echo htmlspecialchars($record['citation']);?></p>

    <h3>Jeweler: <?php echo htmlspecialchars(JEWELER[$record['jeweler_id']]); ?></h3>
    <p><?php echo htmlspecialchars($record['jeweler_description']); ?></p>

    </div>
</div>

<?php } ?>


</body>

</html>
