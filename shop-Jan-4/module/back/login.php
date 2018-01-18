<?php

	if (isset($_SESSION['admin_name'])) {

		header('location:?mod=home');
	}

	$msg = '';

	//print_r($_POST);Array ( [user] => 123 [pass] => abc )
	if (isset($_POST['user'])) {
		$user = $_POST['user'];
		//Ma hoa bang sha2 512
		$pass = hash('sha512',$_POST['pass']);


		//Kiem tra bang cach truy van vao DB
		$sql = "SELECT `id`,`name` FROM `nn_admin` WHERE `email`='{$user}' AND `password`='{$pass}'";
		$rs = mysqli_query($link,$sql);

		if(mysqli_num_rows($rs)>0){
			//Luu id user vao SESSION (session dung de luu tru chung cho cac trang, rieng cho tung user)
			$r = mysqli_fetch_assoc($rs);
			$_SESSION['admin_id']=$r['id'];
			$_SESSION['admin_name']=$r['name'];
			header('location:?mod=home');?>
            <?php
		} else {
			$msg = 'Sai email hoặc password';
	?>


	<?php
		}
	}
	?>
<h2 class="heading colr">Login</h2>
<div class="login">
    <div class="registrd">
    <div class="error" align="center"><?= $msg ?></div>
    <form action="" method="post" id="login">
        <h3>Please Sign In</h3>
        <p>If you have an account with us, please log in.</p>
        <ul class="forms">
            <li class="txt">Email Address <span class="req">*</span></li>
            <li class="inputfield"><input type="text" name="user" class="bar" value="<?php if (isset($_POST['user'])) { echo $user; }?>" ></li>
        </ul>
        <ul class="forms">
            <li class="txt">Password <span class="req">*</span></li>
            <li class="inputfield"><input type="password" name="pass" class="bar" value="" ></li>
        </ul>
        <ul class="forms">
            <li class="txt">&nbsp;</li>
            <li>
            <button type="submit" style="border:none; cursor:pointer"><a href="#" class="simplebtn"><span>Login</span></a></button>
             <a href="#" class="forgot">Forgot Your Password?</a></li>
        </ul>
    </form>
    </div>

    <!--<div class="newcus">
        <h3>Please Sign In</h3>
        <p>
            By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.
        </p>
        <a href="?mod=register" class="simplebtn"><span>Register</span></a>
    </div>-->
</div>
<div class="clear"></div>
