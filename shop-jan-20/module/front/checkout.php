<?php
	if( ! isset($_SESSION['id']))
	{
		header('location:?mod=login');
	}
	
	//Lay thong tin nguoi dung
	$userID = $_SESSION['id'];
	
	//Lấy giỏ hàng
	$cart = @$_SESSION['cart'];
	if(count($cart)==0)
		echo 'Bạn phải chọn mua sản phẩm trước khi đặt hàng';
	else
	{
		$msg='';
		if(isset($_POST['name']))
		{
			//print_r($_POST);
			
			$name=$_POST['name'];
			$email=$_POST['email'];
			$mobile=$_POST['mobile'];
			$address=$_POST['address'];
			$remark=$_POST['remark'];
			
			//Insert don hang (order)
			$sql = "insert into `nn_order` values(NULL,'$userID',now(),'$name','$address',now(),'$email','$mobile','$remark','0')";
			
			mysqli_query($link,$sql);
			
			//Insert don hang chi tiet (order_detail)
			//Lay id (Auto Increment) cua lenh insert truoc
			$orderID = mysqli_insert_id($link);
			
			$cart = $_SESSION['cart'];
			foreach($cart as $k => $v)
			{
				//Lay gia san pham
				$sql = 'select `price` from `nn_product` where`id`='.$k;
				$rs = mysqli_query($link,$sql);
				$r = mysqli_fetch_assoc($rs);
				$price = $r['price'];
				
				//Insert
				$sql = "insert into `nn_order_detail` values('$orderID','$k','$v','$price')";
				mysqli_query($link,$sql);
			}
			//Xóa giỏ hàng
			unset($_SESSION['cart']);
			//Đặt nội dung thông báo
			$msg='Đặt hàng thành công...';
			
		}
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
		//$cart = array(1=>2, 400=>1, 120=>5, 10 => 3, 390 => 2);
		$cart = @$_SESSION['cart'];
		print_r($cart);
		$s = 0;
		$i = 0;
		if(count($cart)>0)
		foreach($cart as $k => $v)
		{
			//Truy van DB lay cac thong tin
			$sql = 'select `name`,`img_url`,`price` from `nn_product` where `id`='.$k;
			$rs = mysqli_query($link,$sql);
			$r = mysqli_fetch_assoc($rs);
			$s = $s + $r['price']*$v;
	?>
	<ul class="cartlist <?php if(++$i%2==1) echo 'gray' ?>">
		<li class="remove txt"><?=$i?></li>
		<li class="thumb"><a href="detail.html"><img src="images/sanpham/<?=$r['img_url']?>" alt="" ></a></li>
		<li class="title txt"><a href="detail.html"><?=$r['name']?></a></li>
		<li class="price txt"><?=number_format($r['price'])?></li>
		<li class="qty txt"><?=$v?></li>
		<li class="total txt"><?=number_format($r['price']*$v)?></li>
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
	<?php
		$sql = 'select * from `nn_user` where `id`='.$userID;
		$rs = mysqli_query($link,$sql);
		$r = mysqli_fetch_assoc($rs);
	?>
		<form action="" method="post" id="checkout">
			<?php 
				if($msg!=''){
			?>
					<div align="center" class="error"><?=$msg?><br>&nbsp;</div>
					<script>	
						setTimeout("window.location='?mod=account'",3000);
					</script>
			<?php
				}
			?>
			<ul class="forms">
				<li class="txt">Name <span class="req">*</span></li>
				<li class="inputfield"><input name="name" type="text" required class="bar" id="name" value="<?=$r['name']?>" ></li>
			</ul>
			<ul class="forms">
				<li class="txt">Email Address <span class="req">*</span></li>
				<li class="inputfield"><input name="email" type="email" required class="bar" id="email" value="<?=$r['email']?>" ></li>
			</ul>
		  <ul class="forms">
				<li class="txt">Mobile <span class="req">*</span></li>
				<li class="inputfield"><input name="mobile" type="text" required class="bar" id="mobile" value="<?=$r['mobile']?>" ></li>
			</ul>
		  <ul class="forms">
			  <li class="txt">Address <span class="req">*</span></li>
			  <li class="textfield">
				<textarea name="address" type="text" required class="bar" id="address" ><?=$r['address']?>
				</textarea>
			  </li>
			</ul>
			<ul class="forms">
			  <li class="txt">remark<span class="req">*</span></li>
			  <li class="textfield">
				<textarea name="remark" type="text" required class="bar" id="remark" ></textarea>
			  </li>
			</ul>
			<div class="clear"></div>
			<ul class="forms">
			<li class="txt">&nbsp;</li>
				<li>
				 <a href="?mod=cart" class="simplebtn"><span>Update</span></a>
				<button type="submit" style="border:none; cursor:pointer"><a href="#" class="simplebtn"><span>Checkout</span></a></button>
			   </li>
		  </ul>
		</form>
	<div class="clear"></div>
    <?php
	}
	?>