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


const SALE = array(
  1 => 'On sale!'
);

const STONE = array(
  0 => 'Without gems',
  1 => 'With gems'
);

$tag_type_param = $_GET['tag_type'] ?? NULL; // untrusted
$sale_param = $_GET['sale'] ?? NULL; // untrusted
$material = $_GET['material'] ?? NULL; //untrusted
$stone = $_GET['stone'] ?? NULL; //untrusted

$base_url = '/';





//SQL query parts

$sql_all_entries = "SELECT * FROM products";

$sql_select_clause = "SELECT * FROM products INNER JOIN product_tags ON products.id = product_tags.product_id INNER JOIN tags ON product_tags.tag_id = tags.id INNER JOIN users ON users.id=products.jeweler_id";


//Retrieving information from the database
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

if (is_user_logged_in()){
if (isset($_POST['delete_product'])) {
  $product_id = $_POST['product_id'];


  $delete_products = exec_sql_query($db, "DELETE FROM products WHERE id=".$product_id);

  if($delete_products){
    $delete_product_tags = exec_sql_query($db,"DELETE FROM product_tags WHERE product_id=".$product_id);
  }

  if($delete_product_tags){
    $delete_tags = exec_sql_query($db, "DELETE FROM tags WHERE id=".$product_id);
  }
 }
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




  <?php include_once("includes/header.php"); ?>

<!-- I have retrived the information using an SQL query. The key-value pairing is for displaying the value from the array, such as TYPE[1] - RING  -->
  <div class="content-wrapper">
  <sidebar class="sidebar">
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

    <h4>Material</h4>
    <ul>
      <?php foreach (MATERIAL as $key => $value) : ?>
        <li>
          <a href="<?php echo $base_url . '?' . http_build_query(array('material' => $key)); ?>">
            <?php echo htmlspecialchars($value); ?>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>

    <h4>Gems</h4>
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


           </div>


        <div class="image-description">

          <img src='/<?php echo htmlspecialchars($record['image_path']); ?>' alt="Product image">

        <div class="description-citation">
          <div class="product-descriptions">
            <p>
              <?php echo htmlspecialchars($record['product_description']); ?>
            </p>
          </div>

          <div>
            <p>
              <?php echo htmlspecialchars($record['citation']); ?>
            </p>
          </div>
        </div>
  <?php if (is_user_logged_in()){ ?>
        <form action="" method="POST" class="delete-form">
            <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($record['id']); ?>" />
            <button type="submit" name="delete_product" class="delete-button">Delete</button>
        </form>
  <?php } ?>
</div>

      </div>


<?php } ?>
</div>
</div>
</body>

</html>
