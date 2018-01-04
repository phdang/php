<?php 

//print_r($_POST);

//Lay du lieu

$user = $_POST['user'];

//Ma hoa bang sha2 512

$pass = hash('sha512',$_POST['pass']);

//$pass = $_POST['pass'];

//Kiem tra


$sql = "SELECT `id` FROM `nn_user` WHERE `email` = '{$user}' AND `password` = '{$pass}'";

$rs =  mysqli_query($link,$sql);

if (mysqli_num_rows($rs) > 0) {

	$r = mysqli_fetch_assoc($rs);

	$_SESSION['id'] = $r['id'];

	if (isset($_SESSION['user'])) {

		unset($_SESSION['user']);
	}

	header('location: ?mod=home');

} else {

	$_SESSION['user'] = $user;

?>

	<div align="center" class="error">Sai user hoặc password</div>

<script>

	setTimeout("location='?mod=login';",3000);

</script>

<?php

}

?>
