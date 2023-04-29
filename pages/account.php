<?php


if ($error = error_get_last()) {
  echo "Error: " . $error['message'];
}



define("MAX_FILE_SIZE", 1000000);

if (is_user_logged_in()){


$upload_feedback = array(
  'general_error' => False,
  'too_large' => False
);


  $product_name = $_POST["name"]; //untrusted
  $product_description = $_POST["description"]; // untrusted
  $type = $_POST["type"]; //untrusted
  $product_price = $_POST["price"]; //untrusted
  // $stone = $_POST["stone"]; //untrusted
  $jeweler = $_POST["jeweler"]; //untrusted
  $gem = $_POST["gem"];
  $sale = $_POST["sale"];
  $material = $_POST["material"];

  echo $gem;
  echo $sale;

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
            "INSERT INTO products (product_name, product_description, product_price, image_name, image_extension, image_path, jeweler_id) VALUES (:productname, :productdescription, :productprice, :imagename, :imageext, :imagepath, :jeweler);", array(':productname' => $product_name,
                ':productdescription' => $product_description,
                ':productprice' => $product_price,
                ':imagename' => $upload_file_name,
                ':imageext' => $upload_file_ext,
                ':imagepath' => $upload_source,
                ':jeweler' => $jeweler
            )
        );


      if($result){
        $record_id = $db->lastInsertId('id');

      $insert_tag = exec_sql_query(
        $db, "INSERT INTO tags (tag_type, stone, sale, material) VALUES (:tagtype, :stone, :sale, :material);", array(':tagtype' => $type, ':stone' => $gem, ':sale' => $sale, ':material' => $material)
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



  <?php include_once("includes/header.php"); ?>

  <div class="account">

  <?php if (is_user_logged_in()) { ?>

    <h1>Welcome To Your Account!</h1>





  <div class="insert-form">
  <form method="post" enctype="multipart/form-data" action="/account">

  <h2>Add a new product</h2>


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
              <label for="broch">Brooch</label>
            </div>
          </div>

          <div>
            <label for="material">Material</label>
            <select id="material" name="material">
                <option value=1>Silver</option>
                <option value=2>Gold</option>
                <option value=3>Other</option>
            </select>
        </div>

          <div  role="group" aria-labelledby="stone">
          <div class="jewelery-type-label"  id="stone">Jewelery features</div>

            <div >
              <input type="checkbox" id="gem" name="gem" value=1>
              <label for="gem">Has a gem</label>
            <div>
              <input type="checkbox" id="sale" name="sale" value=1 >
              <label for="sale">Is on sale</label>
            </div>
          </div>

          </div>

          <div  role="group" aria-labelledby="jeweler">
          <div class="jewelery-type-label"  id="jeweler">Who's the jeweler?</div>

            <div >
              <input type="radio" id="imzardy" name="jeweler" value=1>
              <label for="imzardy">Im Zardy</label>
            <div>
              <input type="radio" id="handmade" name="jeweler" value=2 >
              <label for="handmade">Protest Handmade</label>
            </div>
          </div>

          </div>

          <label for="product-image">Add an Image (max 10MB)</label>
          <input type="file" name="product-image" id="product-image" />

        <div >
          <input type="submit" value="Add New Product" name="add-product" />
        </div>



      </form>
  </div>

    <?php if($result){
     ?>
        <p>Your entry has been successfully submitted!</p>
    <?PHP } ?>

  <?php } else { ?>



<div class="login-form">
<h2>Sign In</h2>

<p>Please sign in to access your account!</p>

<?php echo login_form($_SERVER['REQUEST_URI'], $session_messages);
 }?>
</div>
</div>
</body>

</html>
