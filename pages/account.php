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

  <form method="post" action="/">

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

</body>

</html>
