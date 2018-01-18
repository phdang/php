<?php

if (isset($_GET['pid'])) {
	
	$id = $_GET['pid'];
	
	unset($_SESSION['cart'][$id]);

} else {

	
}

header('location:?mod=cart');	

?>