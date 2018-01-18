<?php
	//$_SESSION['cart']= array(400=>1);
	$cart = $_SESSION['cart'];
	
	$id = $_GET['id'];
	
	//Thêm sản phẩm
	$cart[$id]++;
	
	//Xoa phan tu khoi mang: Xoa san pham khoi gio hang
	unset($cart[$id]);
	
	$_SESSION['cart']=$cart;
	
	//Chuyen den trang cart
	header('location:?mod=cart');
?>