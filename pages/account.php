<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

//$db = init_sqlite_db('db/site.sqlite', 'db/init.sql');

define("MAX_FILE_SIZE", 1000000);

$upload_feedback = array(
  'general_error' => False,
  'too_large' => False
);


  $product_name = $_POST["name"]; //untrusted
  $product_description = $_POST["description"]; // untrusted
  $type = $_POST["type"]; //untrusted
  $product_price = $_POST["price"]; //untrusted
  $stone = $_POST["stone"]; //untrusted

  $upload_source = NULL;
  $upload_file_name = NULL;
  $upload_file_ext = NULL;

  if (isset($_POST["add-product"])) {
    //information about the uploaded file
    $upload = $_FILES['product-image'];

    $upload_source = trim($_POST['image_path']); //untrusted
    if(empty($upload_source)){
      $upload_source = NULL;
    }

    // get the info about the uploaded files.
    $upload_file_name = basename($upload['name']);
    $upload_file_ext = strtolower(pathinfo($upload_file_name, PATHINFO_EXTENSION));


    $form_valid = True;


    if ($upload['error'] == UPLOAD_ERR_OK) {

        if (!in_array($upload_file_ext, array('jpg'))) {
            $form_valid = False;
            $upload_feedback['general_error'] = True;
        }
    } elseif (($upload['error'] == UPLOAD_ERR_INI_SIZE) || ($upload['error'] == UPLOAD_ERR_FORM_SIZE)) {

        $form_valid = False;
        $upload_feedback['too_large'] = True;
    } else {

        $form_valid = False;
        $upload_feedback['general_error'] = True;
    }
}

    if ($form_valid) {


      $result = exec_sql_query($db,
            "INSERT INTO products (product_name, product_description, product_price, image_name, image_extension, image_path, jeweler_id) VALUES (:productname, :productdescription, :productprice, :imagename, :imageext, :imagepath, 1);", array(':productname' => $product_name,
                ':productdescription' => $product_description,
                ':productprice' => $product_price,
                ':imagename' => $upload_file_name,
                ':imageext' => $upload_file_ext,
                ':imagepath' => $upload_source
            )
        );


      if($result){
        $record_id = $db->lastInsertId('id');

      $insert_tag = exec_sql_query(
        $db, "INSERT INTO tags (tag_type, stone) VALUES (:tagtype, :stone);", array(':tagtype' => $type, ':stone' => $stone)
      );

      if ($insert_tag) {
        $tag_id = $db->lastInsertId('id');

        // Insert product_id and tag_id into the "product_tags" table
        $insert_product_tag = exec_sql_query($db,
            "INSERT INTO product_tags (product_id, tag_id) VALUES (:productid, :tagid);", array(
                ':productid' => $record_id,
                ':tagid' => $tag_id
            )
        );


    }

      $upload_storage_path = 'public/uploads/products/' . $record_id . '.' . $upload_file_ext;

      $result_path = exec_sql_query($db,
    "UPDATE products SET image_path = :imagepath WHERE id = :recordid;", array(
        ':imagepath' => $upload_storage_path,
        ':recordid' => $record_id
    )
);


      if (move_uploaded_file($upload["tmp_name"], $upload_storage_path) == False) {
        error_log("Failed to permanently store the uploaded file on the file server. Please check that the server folder exists.");
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

  <title>account</title>
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

  <h1>Welcome To Your Account!</h1>

  <p>If you would like to add a new product, please use the form below to do. Please provide the name of the product, the price of it, short description, what type of jewelery it is, and what is the material that it is made of.</p>

  <form method="post" enctype="multipart/form-data" action="/account">

  <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />


        <div>
          <div ><label for="name">Jewelery name:</label></div>
          <div ><input id="name" type="text" name="name" ></div>
        </div>


        <div >
          <div ><label for="price">Price:</label></div>
          <div ><input id="price" type="text" name="price" ></div>
        </div>


        <div >
          <div ><label for="description">Description</label></div>
          <div ><input id="description" type="text" name="description" ></div>
        </div>


        <div  role="group" aria-labelledby="type">
          <div class="jewelery-type-label"  id="type">Jewelery Type</div>

            <div >
              <input type="radio" id="ring" name="type" value=1>
              <label for="ring">Ring</label>
            <div>
              <input type="radio" id="necklace" name="type" value=2 >
              <label for="necklace">Necklace</label>
            </div>
            <div>
              <input type="radio" id="bracelet" name="type" value=3>
              <label for="bracelet">Bracelet</label>
            </div>
            <div>
              <input type="radio" id="belt" name="type" value=4>
              <label for="belt">Belt</label>
            </div>
            <div>
              <input type="radio" id="earing" name="type" value=5 >
              <label for="earing">Earing</label>
            </div>
            <div>
              <input type="radio" id="broch" name="type" value=6>
              <label for="brooch">Brooch</label>
            </div>
          </div>

          <div  role="group" aria-labelledby="stone">
          <div class="jewelery-type-label"  id="stone">Does it have a gem?</div>

            <div >
              <input type="radio" id="yes" name="stone" value=1>
              <label for="yes">Yes</label>
            <div>
              <input type="radio" id="no" name="stone" value=0 >
              <label for="no">No</label>
            </div>
          </div>

          </div>

          <label for="product-image">Add an Image (max 10MB)</label>
          <input type="file" name="product-image" id="product-image" />

        <div >
          <input type="submit" value="Add New Product" name="add-product" />
        </div>



      </form>

    <?php if($result){
     ?>
        <p>Your entry has been successfully submitted!</p>
    <?PHP } ?>

</body>

</html>
