<?php

const MATERIAL = array(
  1 => 'Silver',
  2 => 'Gold',
  3 => 'Other'
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

const SALE = array(
  1 => 'On sale!'
);

const STONE = array(
  0 => 'Without stones',
  1 => 'With stones'
);

$tag_type_param = $_GET['tag_type'] ?? NULL; // untrusted
$sale_param = $_GET['sale'] ?? NULL; // untrusted
$material = $_GET['material'] ?? NULL; //untrusted
$stone = $_GET['stone'] ?? NULL; //untrusted

$base_url = '/';
// $url_sale = $base_url . '?' . http_build_query(array('sale' => 1));




//SQL query parts

$sql_all_entries = "SELECT * FROM products";

$sql_select_clause = "SELECT * FROM products INNER JOIN product_tags ON products.id = product_tags.product_id INNER JOIN tags ON product_tags.tag_id = tags.id INNER JOIN jewelers ON jewelers.id=products.jeweler_id";


if($tag_type_param != NULL){
  $tag_type_param = intval($tag_type_param);
  $sql_select_query = $sql_select_clause . " WHERE tags.tag_type = {$tag_type_param}";
  $tag_sidebar = $sql_select_clause . "WHERE tags.tag_id = " . TYPE[$tag['tag_id']];
} else if ($sale_param == 1){
  $sale_param = intval($sale_param);
  $sql_select_query = $sql_select_clause . " WHERE tags.sale = {$sale_param}";
} else if($material != NULL){
  $sale_param = intval($sale_param);
  $sql_select_query = $sql_select_clause . " WHERE tags.material = {$material}";
} else if($stone != NULL){
  $stone = intval($stone);
  $sql_select_query = $sql_select_clause . " WHERE tags.stone = {$stone}";
} else{
  $sql_select_query = $sql_all_entries;
}



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


  <header>
    <h1> ARMJEWELERS </h1>

    <nav>
      <ul>
        <li><a href="/">Home</a></li>
        <li><a href="/account">Account</a></li>
      </ul>
    </nav>
  </header>

  <div class="content-wrapper">
  <sidebar>
    <h4>Jewelry Type</h4>
    <ul>
      <?php foreach (TYPE as $key => $value) : ?>
        <li>
          <a href="<?php echo $base_url . '?' . http_build_query(array('tag_type' => $key)); ?>">
            <?php echo htmlspecialchars($value); ?>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>

    <ul>
      <?php foreach (SALE as $key => $value) : ?>
        <li>
          <a href="<?php echo $base_url . '?' . http_build_query(array('sale' => $key)); ?>">
            <?php echo htmlspecialchars($value); ?>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>

    <ul>
      <?php foreach (MATERIAL as $key => $value) : ?>
        <li>
          <a href="<?php echo $base_url . '?' . http_build_query(array('material' => $key)); ?>">
            <?php echo htmlspecialchars($value); ?>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>

    <ul>
      <?php foreach (STONE as $key => $value) : ?>
        <li>
          <a href="<?php echo $base_url . '?' . http_build_query(array('stone' => $key)); ?>">
            <?php echo htmlspecialchars($value); ?>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>


  </sidebar>


  <div class="all-products">
  <?php
    // query DB


    $result = exec_sql_query($db, $sql_select_query);
    $records = $result->fetchAll();
    ?>

<?php foreach ($records as $record) { ?>


  <a href="/details/?<?php echo http_build_query(array('id' => $record['id'])); ?>">


        <div class="one-product">
            <div class="name-price-star">
              <p>
                <?php echo htmlspecialchars($record['product_name']); ?></th>
              </p>

              <p>
                <?php echo htmlspecialchars('$'.$record['product_price']); ?>
              </p>

              <div class="rating-stars">
                <?php echo htmlspecialchars(RATING[$record['product_rating']]); ?>
              </div>
           </div>


        <div class="image-description">

          <img src='/<?php echo htmlspecialchars($record['image_path']); ?>' alt="Product image">

          <div class="product-descriptions">
            <p>
              <?php echo htmlspecialchars($record['product_description']); ?>
            </p>
          </div>
        </div>

      </div>


<?php } ?>
</div>
</div>
</body>

</html>
