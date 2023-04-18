<?php

$db = init_sqlite_db('db/site.sqlite', 'db/init.sql');

  //Check if the form is submitted
  $product_name = $_POST["name"]; //untrusted
  $product_description = $_POST["description"]; // untrusted
  $type = $_POST["type"]; //untrusted
  $product_price = $_POST["price"]; //untrusted

  $show_confirmation = false;

    if (isset($_POST['submit-course'])){

      //Assume form is valid
      $form_valid = True;

        //Store as variables
        $form_values['name'] = trim($_POST['name']); //untrusted
        $form_values['type'] = trim($_POST['type']); //untrusted
        $form_values['description'] = trim($_POST['description']); //untrusted
        $form_values['price'] = trim($_POST['price']); //untrusted

        $show_confirmation = True;

        $result = exec_sql_query($db,
      "INSERT INTO products (product_name, product_description, product_price) VALUES (:productname, :productdescription, :productprice);", array(':productname' => $product_name,
      ':productdescription' => $product_description,
      ':productprice' => $product_price
      )
      );
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

  <form method="post" action="/account">

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
          </div>

        <div >
          <input type="submit" value="Add New Product" name="submit-course" />
        </div>
      </form>

    <?php if($show_confirmation){
      echo htmlspecialchars($product_name);
      echo htmlspecialchars($product_price);
      echo htmlspecialchars($product_description);?>
        <p>You have added the following product to the website!</p>
    <?PHP } ?>

</body>

</html>
