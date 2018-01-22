<?php
	//print_r($_POST);
	$msg='';
	if(isset($_POST['user']))
	{
		$user = $_POST['user'];
		$pass = $_POST['pass'];
		$repass = $_POST['repass'];
		$name = $_POST['name'];
		$mobile = $_POST['mobile'];
		
		//Kiem tra email
		if(filter_var($user,FILTER_VALIDATE_EMAIL)===FALSE)
		{
			$msg = 'Email không hợp lệ';
		}
		//Kiem tra do dai password
		elseif(strlen($pass)<6)
		{
			$msg = 'Mật khẩu tối thiểu 6 ký tự';
		}
		//Kiem tra nhap lai password
		elseif($pass!=$repass)
		{
			$msg = 'Mật khẩu nhập lại không đúng';
		}
		else//Du lieu hop le => insert vao DB
		{
			//Ma hoa password
			//$pass = hash('sha512',$pass);
			
			$sql = "insert into `nn_user`(`email`,`password`,`name`,`mobile`) values('$user',sha2('$pass',512),'$name','$mobile')";
			
			$rs = mysqli_query($link,$sql);
			if($rs==FALSE)
			{
				$msg = 'Đăng ký không thành công. Email bị trùng';
			}
			else
			{
				$msg = 'Đăng ký thành công ! Hệ thống sẽ chuyển đến trang đăng nhập...';
				$_SESSION['user']=$user;
?>
				<script>	
					setTimeout("window.location='?mod=login';",2000);
				</script>
<?php
			}
		}
	}
	
?>
<h2 class="heading colr">Registration</h2>
<div class="login">
    <div class="registrd">
    <form action="" method="post" id="register">
        <h3>Please Sign Up</h3>
        <div align="center" class="error"><?=$msg?><br>&nbsp;</div>
        <ul class="forms">
            <li class="txt">Email Address <span class="req">*</span></li>
            <li class="inputfield"><input type="email" name="user" class="bar" value="<?php if(isset($user)) echo $user ?>" required ></li>
        </ul>
        <ul class="forms">
            <li class="txt">Password <span class="req">*</span></li>
            <li class="inputfield"><input type="password" name="pass" class="bar" required placeholder="Tối thiểu 6 ký tự" ></li>
        </ul>
        <ul class="forms">
            <li class="txt">Retype Password <span class="req">*</span></li>
            <li class="inputfield"><input type="password" name="repass" class="bar" id="repass" required ></li>
        </ul>
        <ul class="forms">
            <li class="txt">Name <span class="req">*</span></li>
            <li class="inputfield"><input name="name" type="text" required class="bar" id="name" value="<?php if(isset($name)) echo $name ?>" ></li>
        </ul>
        <ul class="forms">
            <li class="txt">Mobile <span class="req">*</span></li>
            <li class="inputfield"><input name="mobile" type="text" required class="bar" id="mobile" value="<?php if(isset($mobile)) echo $mobile ?>" ></li>
        </ul>
      <ul class="forms">
        <li class="txt">&nbsp;</li>
            <li>
            <button type="submit" style="border:none; cursor:pointer"><a href="#" class="simplebtn"><span>Register</span></a></button>
           </li>
        </ul>
    </form>
    </div>
</div>
<div class="clear"></div>