<?php
	if( ! isset($_SESSION['id']))
	{
		header('location:?mod=login');
	}
	
	//Lay thong tin nguoi dung
	$userID = $_SESSION['id'];
	
	//Lay id cua don hang
	$orderID = $_GET['id'];
	//kiem tra id co trung voi user
	$sql = 'select * from `nn_order` where `id`='.$orderID;
	$rs = mysqli_query($link,$sql);
	$r_order = mysqli_fetch_assoc($rs);
	// Neu khong trung
	if ($userID != $r_order['user_id']) {
		
		echo 'Access denied';
		
	} else {
?>
?>
<h2 class="heading colr">Order Info</h2>
<div class="shoppingcart">
<ul class="tablehead">
	<li class="remove colr">No</li>
	<li class="thumb colr">&nbsp;</li>
	<li class="title colr">Product Name</li>
	<li class="price colr">Unit Price</li>
	<li class="qty colr">QTY</li>
	<li class="total colr">Sub Total</li>
</ul>
<?php
	$sql = 'SELECT b.`img_url`,a.`price`,b.`name`,a.`qty` 
			FROM `nn_order_detail` a,`nn_product` b 
			WHERE a.`product_id`=b.`id` AND `order_id` = '.$orderID;
	$rs = mysqli_query($link,$sql);
	$s = 0;
	$i = 0;
	while($r=mysqli_fetch_assoc($rs))
	{
		$s = $s + $r['price']*$r['qty'];
?>
<ul class="cartlist <?php if(++$i%2==1) echo 'gray' ?>">
	<li class="remove txt"><?=$i?></li>
	<li class="thumb"><a href="detail.html"><img src="images/sanpham/<?=$r['img_url']?>" alt="" ></a></li>
	<li class="title txt"><a href="detail.html"><?=$r['name']?></a></li>
	<li class="price txt"><?=number_format($r['price'])?></li>
	<li class="qty txt"><?=$r['qty']?></li>
	<li class="total txt"><?=number_format($r['price']*$r['qty'])?></li>
</ul>
<?php
	}
?>

<div class="clear"></div>
<div class="subtotal">
	<h3 class="colr"><?=number_format($s)?></h3>
</div>
<div class="clear"></div>

</div>
<div class="clear"></div>
<h2 class="heading colr">Shipping Info</h2>

		<ul class="forms">
			<li class="txt">Name <span class="req">*</span></li>
			<li class="inputfield"><input name="name" type="text" disabled required class="bar" id="name" value="<?=$r_order['name']?>" ></li>
		</ul>
		<ul class="forms">
			<li class="txt">Email Address <span class="req">*</span></li>
			<li class="inputfield"><input name="email" type="email" disabled required class="bar" id="email" value="<?=$r_order['email']?>" ></li>
		</ul>
	  <ul class="forms">
			<li class="txt">Mobile <span class="req">*</span></li>
			<li class="inputfield"><input name="mobile" type="text" disabled required class="bar" id="mobile" value="<?=$r_order['mobile']?>" ></li>
</ul>
	  <ul class="forms">
		  <li class="txt">Address <span class="req">*</span></li>
		  <li class="textfield">
			<textarea name="address" disabled required class="bar" id="address" type="text" ><?=$r_order['address']?>
			</textarea>
	    </li>
</ul>
		<ul class="forms">
		  <li class="txt">Remark<span class="req">*</span></li>
		  <li class="textfield">
			<textarea name="remark" disabled required class="bar" id="remark" type="text" ><?=$r_order['remark']?></textarea>
		  </li>
		</ul>
		<div class="clear"></div>
		<ul class="forms">
		<li class="txt">&nbsp;</li>
			<li>
			 <a href="?mod=account" class="simplebtn"><span>Back</span></a>
		   </li>
	  </ul>
<div class="clear"></div>
<?php

	}
?>