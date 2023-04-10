
<?php

$id = $_GET['id'];

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
        <li><a href="/details">Details</a></li>
        <li><a href="/account">Account</a></li>
      </ul>
    </nav>
  </header>

<h1>Details for your product!</h1>

<?php
    $id = $_GET['id'];

    // query DB
    $result = exec_sql_query($db, 'SELECT * FROM products WHERE id = ' . $id);
    $records = $result->fetchAll();
    ?>

  <div class="details-name-price">
    <!-- <h2> Berd </h2> -->
    <h2><?php echo htmlspecialchars($records['product_name']);?> </h2>
    <h2 class="product-price">$20</h2>
  </div>

<div class="image-description">
  <img src="public/uploads/placeholder-image.jpg" alt="Placeholder image">
  <div class="product-descriptions">
    <h3>Metal: Silver</h3>
    <h3>Description:</h3>
    <p>The Armenian Berd Dance is a beautiful and captivating folk dance that has been a part of Armenian culture for centuries. This traditional dance is named after the ancient Armenian city of Berd, and it is known for its high energy, dynamic movements, and powerful rhythms. The Berd Dance is typically performed by a group of dancers, who move in a circular formation, with the lead dancer leading the way. The dancers move their feet quickly and gracefully, with the music driving their movements. The dance is accompanied by traditional Armenian music, featuring instruments like the duduk, dhol, and zurna.</p>
    <h3>Jeweler:</h3>
    <p>'Im Zardy' is Armenian for My Jewelery. We are a group of talented and dedicated jewelers making unique jewelery that is rich with the juxdoposition of Armenian traditional and modern styles and references to Armenian culture and history.</p>
    </div>
</div>



 <!-- <p>
 <?php echo htmlspecialchars(JEWELER[$record['jeweler_id']]); ?>
  </p> -->

</body>

</html>
