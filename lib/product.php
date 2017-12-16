<?php






  $sql='SELECT DISTINCT pro.* FROM `nn_product` as pro, `nn_category` as cat WHERE (cat.`department_id` = '. $cat_id .' AND pro.`category_id` = cat.`id`) OR `category_id` = ' . $cat_id .' LIMIT 0,15'; 
  $rs=mysqli_query($link,$sql);
  $i=1;
  while($r=mysqli_fetch_assoc($rs))
  {
  ?>
  <div class="product">
      <h2><?=$r['name']?></h2>
        <img src="images/sanpham/<?=$r['img_url']?>" alt="<?=$r['name']?>">
        <h3> <?=number_format($r['price'])?> VND </h3>
        <input type="button" value="Mua">

    </div>
   <?php
  }



 ?>
