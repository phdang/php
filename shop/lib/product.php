<?php

  if ($_SERVER["REQUEST_METHOD"] == "GET") {
  	if (isset($_GET["page"])) {

  		$page = test_input($_GET["page"]);




  $sql='SELECT `id`, `name`, `price`, `img_url`, `create_at` FROM `nn_product` ORDER BY `name` LIMIT 0,15';
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

      }
    }
 ?>
