<?php
//print_r($_POST)

$msg = '';

if (isset($_POST['user'])) {

	$user = $_POST['user'];
	$pass = $_POST['pass'];
	$repass = $_POST['repass'];
	$name = $_POST['name'];
	$mobile = $_POST['mobile'];


	// Kiem tra email

	if (filter_var($user, FILTER_VALIDATE_EMAIL) === false ) {

		$msg = 'Email không hợp lệ';

	} elseif (strlen($pass) < 6) {

		$msg = 'Mật khẩu tối thiểu 6 kí tự';

	} elseif ($pass != $repass) {

		$msg = 'Mật khẩu nhập lại không đúng';

	} else {

		//Mã hóa password

		$pass = hash('sha512',$pass);

		$sql = "INSERT INTO `nn_user` (`password`, `email`, `name`, `mobile`) VALUES ('$pass', '$user', '$name', '$mobile')";

		$rs = mysqli_query($link, $sql);

		if ($rs) {

			$_SESSION['user'] = $user;

			$msg =  'Đăng kí thành công'; ?>


             <script> setTimeout("location='?mod=login';",3000); </script>
        <?php

		} else {

			 $msg = 'Tài khoản đã được sử dụng';

		}


		 ?>

    <?php

	}

}
?>

                <h2 class="heading colr">Registration</h2>
                <div class="login">
                	<div class="registrd">
                    	<form action="" method="post" id="register">
                            <h3>Please Sign Up</h3>
                            <p>If you have an account with us, please log in.</p>
                            <p class="error"><?= $msg . '<br>'; ?></p>
                            <ul class="forms">
                                <li class="txt">Email Address <span class="req">*</span></li>
                                <li class="inputfield"><input type="email" name="user" class="bar" value="<?= isset($_POST['user']) ? $user : '' ?>" autofocus required></li>
                            </ul>
                            <ul class="forms">
                                <li class="txt">Password <span class="req">*</span></li>
                                <li class="inputfield"><input type="password" name="pass" class="bar" required placeholder="Mật khẩu tối thiểu 6 kí tự" value="" ></li>
                            </ul>
                            <ul class="forms">
                                <li class="txt">Retype Password <span class="req">*</span></li>
                                <li class="inputfield"><input type="password" name="repass" class="bar" required value="" ></li>
                            </ul>
                             <ul class="forms">
                                <li class="txt">Name <span class="req"></span></li>
                                <li class="inputfield"><input type="text" name="name" class="bar" value="<?= isset($_POST['name']) ? $name : '' ?>"></li>
                            </ul>
                             <ul class="forms">
                                <li class="txt">Mobile <span class="req"></span></li>
                                <li class="inputfield"><input type="text" name="mobile" class="bar" value="<?= isset($_POST['mobile']) ? $mobile : '' ?>" ></li>
                            </ul>
                            <ul class="forms">
                                <li class="txt">&nbsp;</li>
                                <li>
                                	<!--<a href="Javascript:document.getElementById('login').submit()" class="simplebtn"><span>Login</span></a>-->


                                    <button type="submit" style="border:none; cursor:pointer;"><a href="#" class="simplebtn"><span>Register</span></a></button>


                                </li>
                            </ul>
                        </form>
                    </div>

                </div>
                <div class="clear"></div>
