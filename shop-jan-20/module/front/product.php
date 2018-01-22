<?php
	if(isset($_GET['cid']))
		$cid=$_GET['cid'];
	else
		$cid=1;
	
	include("lib/db.php");
	$sp=8;
	
	$kqtsp=mysqli_query($link,"select * from nn_product where active=1 and category_id=$cid order by id DESC");
	//Tinh tong san pham:
	$tsp=mysqli_num_rows($kqtsp);
	//Tinh tong so trang:
	$tst= ceil($tsp/$sp);
	
	//lay page:
	if(isset($_GET['page'])) $page=$_GET['page'];
	else $page=1;
	
	//Lay cach sap xep
	if(isset($_GET['sort'])) $sort=$_GET['sort'];
	else $sort=1;
	
	if($sort==1)
		$order='`price` ASC';
	elseif($sort==2)
		$order='`price` DESC';
	elseif($sort==3)
		$order='`name` ASC';
	else
		$order='`name` DESC';
	
	//Tinh vi tri can lay san pham:
	$vitri=($page-1)*$sp;
	//Lay san pham theo vi tri:	
	echo $sql="select * from nn_product where active=1 and category_id=$cid order by {$order} limit $vitri,$sp";
	$kqsp=mysqli_query($link,$sql);
?>

<h4 class="heading colr">Featured Products</h4>
<div class="small_banner">
    <a href="#"><img src="images/small_banner.gif" alt="" ></a>
</div>
<div class="sorting">
    <p class="left colr">4 Item(s)</p>
    <ul class="right">                	
        <li class="text">Page
        <?php
        for($i=$page-5;$i<=$page+5;$i++)
        if($i >= 1 && $i <= $tst){
        ?>
            <a href="?mod=product&page=<?php echo $i;?>&cid=<?php echo $cid;?>&sort=<?=$sort?>" class="colr <?php if($i==$page) echo 'current' ?>"><?php echo $i;?></a> 
        <?php }?>                           
        </li>
    </ul>
    <div class="clear"></div>
    <p class="left">View as: <a href="#" class="bold">Grid</a>&nbsp;<a href="#" class="colr">List</a></p>
    <ul class="right">
        <li class="text">
            Sort by Position
            <a href="?mod=product&page=1&cid=<?php echo $cid;?>&sort=<?=($sort==3)?4:3;?>" class="colr <?php if($sort > 2) echo 'current' ?>">Name <?php if($sort==4) echo '<img src="images/desc.png" alt="asc sort">'; if($sort==3) echo '<img src="images/asc.png" alt="asc sort">' ?></a> | 
            <a href="?mod=product&page=1&cid=<?php echo $cid;?>&sort=<?=($sort==1)?2:1;?>" class="colr <?php if($sort <= 2) echo 'current' ?>">Price <?php if($sort==2) echo '<img src="images/desc.png" alt="asc sort">'; if($sort==1) echo '<img src="images/asc.png" alt="asc sort">' ?></a> 
        </li>
    </ul>
</div>
<div class="listing">
    <h4 class="heading colr">New Products for March 2010</h4>
    <ul>
   <?php
   $i=1;
   while($dsp=mysqli_fetch_assoc($kqsp)){
   ?> 	
        <li <?php if($i%4==0) echo 'class="last"'; $i++;?>>
            <a href="?mod=detail&id=<?php echo $dsp['id'];?>" class="thumb"><img src="images/sanpham/<?php if(is_file('images/sanpham/'.$dsp['img_url'])) echo $dsp['img_url']; else echo 'noImage.jpg'?>" alt="" ></a>
            <h6 class="colr"><?php echo $dsp['name'];?></h6>
            <div class="stars">
                <a href="#"><img src="images/star_green.gif" alt="" ></a>
                <a href="#"><img src="images/star_green.gif" alt="" ></a>
                <a href="#"><img src="images/star_green.gif" alt="" ></a>
                <a href="#"><img src="images/star_green.gif" alt="" ></a>
                <a href="#"><img src="images/star_grey.gif" alt="" ></a>
                <a href="#">(3) Reviews</a>
            </div>
            <div class="addwish">
                <a href="#">Add to Wishlist</a>
                <a href="#">Add to Compare</a>
            </div>
            <div class="cart_price">
                <a href="cart.html" class="adcart">Add to Cart</a>
                <p class="price"><?php echo number_format($dsp['price']/1000000,2);?>Tr</p>
            </div>
        </li>
  <?php }?>      
    </ul>
</div>