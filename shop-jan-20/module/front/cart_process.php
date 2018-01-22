<?php
	//$_SESSION['cart']= array(400=>1);
	$cart = $_SESSION['cart'];
	$act = $_GET['act'];//1:Them,2:Sua,3:Xoa
	
	$id = @$_GET['id'];
	
	//Thêm sản phẩm
	if($act==1)
	{
		$qty = max(1,intval($_GET['qty']));
		$cart[$id] = $cart[$id] + $qty;
	}
	
	//Cập nhật
	if($act==2)
	{
		//echo '<pre>';
		//print_r($cart);
		//print_r($_POST);
		//$cart = $_POST;
		foreach($cart as $k => $v)
		{
			$cart[$k]=max(1,intval($_POST[$k]));
		}
	}
	
	//Xoa phan tu khoi mang: Xoa san pham khoi gio hang
	if($act==3)	
	unset($cart[$id]);
	
	$_SESSION['cart']=$cart;
	
	//Chuyen den trang cart
	header('location:?mod=cart');
?>