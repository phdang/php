<?php
	
	//print_r($_POST);Array ( [user] => 123 [pass] => abc )
	$user = $_POST['user'];
	
	//Ma hoa bang sha2 512
	$pass = hash('sha512',$_POST['pass']);
	
	
	//Kiem tra bang cach truy van vao DB
	$sql = "SELECT `id`,`name` FROM `nn_user` WHERE `email`='{$user}' AND `password`='{$pass}'";
	$rs = mysqli_query($link,$sql);
	
	if(mysqli_num_rows($rs)>0){
		//Luu id user vao SESSION (session dung de luu tru chung cho cac trang, rieng cho tung user)
		$r = mysqli_fetch_assoc($rs);
		$_SESSION['id']=$r['id'];
		$_SESSION['name']=$r['name'];
		header('location:?mod=home');
	} else {
		$_SESSION['user']=$user;
?>
		<div class="error" align="center">Sai email hoặc password</div>
		<script>	
            setTimeout("window.location='?mod=login&user=<?php echo $user ?>';",3000);
        </script>
<?php
	}
?>