<?php
//print_r($_POST)


//Chuyển trang login nếu chưa đăng nhập

	if (!isset($_SESSION['id'])) {

		header('location:?mod=login');

		//Lấy thông tin user

	} else {

		$id = $_SESSION['id'];

	}

$msg = '';

if (isset($_POST['name'])) {
	$name = $_POST['name'];
	$confirm_pass = $_POST['confirm_pass'];
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	$repass = $_POST['repass'];
	$dob = $_POST['dob'];
	$mobile = $_POST['mobile'];
	$gender = $_POST['gender'];
	$address = $_POST['address'];

	//Chuyen doi time

	$d = substr($dob,0,2);
	$m = substr($dob,3,2);
	$y = substr($dob,6);
	$dob = "{$y}-{$m}-{$d}";

//Kiem tra pass

	$sql = 'SELECT `password` FROM `nn_user` WHERE `id` = ' . $id;

	$rs = mysqli_query($link,$sql);

	$r = mysqli_fetch_assoc($rs);

	$confirm_pass = hash('sha512',$confirm_pass);

	if ($confirm_pass !== $r['password']) {

		$msg = 'Mật khẩu hiện tại không đúng';

	}

	// Kiem tra ten
	if (strlen($name) == 0) {

		$msg = 'Tên không được để trống';

	} elseif (strlen($pass) > 0) {

		if (strlen($pass) < 6) {

		$msg = 'Mật khẩu tối thiểu 6 kí tự';

		} elseif ($pass != $repass) {

		$msg = 'Mật khẩu nhập lại không đúng';

		} else {

			//Mã hóa password

			$pass = hash('sha512',$pass);

			$sql = "UPDATE `nn_user`
			 SET `name` = '$name',
			`password` = '$pass',
			`mobile` = '$mobile',
			`address` = '$address',
			`dob` = '$dob',
			`gender` = $gender
			WHERE `id` = $id";

		}

			 ?>

		<?php

	} else {

			$sql = "UPDATE `nn_user`
			SET `name` = '$name',
			`mobile` = '$mobile',
			`address` = '$address',
			`dob` = '$dob',
			`gender` = $gender
			WHERE `id` = $id";

	}
	if (strlen($msg) == 0) {

			$rs = mysqli_query($link, $sql);

			if ($rs) {

					$msg =  'Cập nhập thành công'; ?>


					 <script> setTimeout("location='?mod=account';",3000); </script>
	        <?php

			} else {

				$msg = 'Không cập nhật được'.'<br>' . $msg ;
			}
	}

}


	//Sql

	$sql = 'SELECT * FROM `nn_user` WHERE `id` = ' . $id;

	//Query

	$rs = mysqli_query($link,$sql);

	$r = mysqli_fetch_assoc($rs);

?>

                <h2 class="heading colr">Update Info</h2>
                <div class="login">
                	<div class="registrd">
                    	<form action="" method="post" id="register">
                            <h3>&nbsp;</h3>
                            <p class="error"><?= $msg . '<br>'; ?></p>
                            <ul class="forms">
                                <li class="txt">Name<span class="req"></span></li>
                                <li class="inputfield"><input type="text" name="name" class="bar" value="<?= $r['name'] ?>" autofocus required></li>
                            </ul>
                             <ul class="forms">
                                <li class="txt">Email<span class="req"></span></li>
                                <li class="inputfield"><input readonly type="email" name="email" class="bar" value="<?= $r['email'] ?>"  required></li>
                            </ul>
														<ul class="forms">
                                <li class="txt">Confirm Password</li>
                                <li class="inputfield"><input type="password" name="confirm_pass" class="bar" placeholder="Nhập mật khẩu hiện tại để thay đổi" value="" ></li>
                            </ul>
                            <ul class="forms">
                                <li class="txt">Password</li>
                                <li class="inputfield"><input type="password" name="pass" class="bar" placeholder="Để trống nếu không muốn thay đổi" value="" ></li>
                            </ul>
                            <ul class="forms">
                                <li class="txt">Retype Password</li>
                                <li class="inputfield"><input type="password" name="repass" class="bar" value="" ></li>
                            </ul>
                             <ul class="forms">
                                <li class="txt">DOB<span class="req"></span></li>
                                <li class="inputfield"><input type="text" name="dob" class="bar" value="<?= date('d/m/Y',strtotime($r['dob'])) ?>"></li>
                            </ul>
                             <ul class="forms">
                                <li class="txt">Mobile <span class="req"></span></li>
                                <li class="inputfield"><input type="text" name="mobile" class="bar" value="<?= $r['mobile'] ?>" ></li>
                            </ul>
                            <ul class="forms">
                                <li class="txt">Gender <span class="req"></span></li>
                                <li>
                                <label><input type="radio" name="gender" class="bar" value="1" <?= $r['gender'] == 1 ? 'checked' : '' ?>> Nam </label>
                                <label><input type="radio" name="gender" class="bar" value="0" <?= $r['gender'] == 0 ? 'checked' : '' ?>> Nữ </label>
                                </li>
                            </ul>
                            <ul class="forms">
                                <li class="txt">Address <span class="req"></span></li>
                              <li class="textfield"><textarea  name="address" class="bar"><?= $r['address'] ?></textarea></li>
                            </ul>
                            <ul class="forms">
                                <li class="txt">&nbsp;</li>
                                <li>
                                	<!--<a href="Javascript:document.getElementById('login').submit()" class="simplebtn"><span>Login</span></a>-->


                                    <button type="submit" style="border:none; cursor:pointer;"><a href="#" class="simplebtn"><span>Update</span></a></button>


                                </li>
                            </ul>
                      </form>
                    </div>

                </div>
                <div class="clear"></div>
