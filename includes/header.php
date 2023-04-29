
<div class="rag-citation"><p>The background rag image is obtained from alamy.com</p></div>

<header>



    <h1> ARMJEWELERS </h1>

    <nav>
      <ul>
        <li><a href="/">Home</a></li>
        <li><a href="/account">Account</a></li>
      </ul>

     <?php if(is_user_logged_in()){ ?>
      <a href="<?php echo logout_url(); ?>">Log Out</a>
    <?php } ?>

    </nav>
  </header>
