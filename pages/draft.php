<sidebar>
    <!-- <h4>Jewelery Type</h4>
      <ul>
        <li><a href=<?php echo $url_rings?>>Rings</a></li>
        <li><a href=<?php echo $url_necklaces?>>Necklaces</a></li>
        <li><a href=<?php echo $url_bracelets?>>Bracelets</a></li>
        <li><a href=<?php echo $url_belts?>>Belts</a></li>
        <li><a href=<?php echo $url_earings?>>Earings</a></li>
        <li><a href=<?php echo $url_brooch?>>Brooch</a></li>
      </ul>
    <h4><a href=<?php echo $url_sale ?>>Hot Sale</a></h4> -->

  <!-- <ul>
    <li> <a href="/?<?php echo http_build_query(array('tag_id' => $record['id'])); ?>"> Rings </a></li>
    <li><a href="/?<?php echo http_build_query(array('tag_id' => $record['id'])); ?>"> Necklaces </a></li>
    <li><a href="/?<?php echo http_build_query(array('tag_id' => $record['id'])); ?>"> Bracelets </a></li>
    <li><a href="/?<?php echo http_build_query(array('tag_id' => $record['id'])); ?>"> Belts </a></li>
    <li><a href="/?<?php echo http_build_query(array('tag_id' => $record['id'])); ?>"> Earings </a></li>
    <li><a href="/?<?php echo http_build_query(array('tag_id' => $record['id'])); ?>"> Brooch </a></li>
  </ul> -->

  <?php
    // query DB


    $tags = exec_sql_query($db, "SELECT * FROM products INNER JOIN product_tags ON products.id = product_tags.product_id INNER JOIN tags ON product_tags.tag_id = tags.id INNER JOIN jewelers ON jewelers.id=products.jeweler_id");
    $tags = $tags->fetchAll();
    ?>

<?php foreach ($tags as $tag) { ?>

  <ul>
    <li><a href="/?<?php $tag ?>"><?php echo htmlspecialchars(TYPE[$tag['tag_id']]); ?></a></li>

  </ul>

  <?php } ?>

  </sidebar>
