<?php
	//print_r($_POST);
	if( ! isset($_SESSION['id']))
	{
		header('location:?mod=login');
	}
	
	//Lay thong tin nguoi dung
	$userID = $_SESSION['id'];
	$msg='';
	if(isset($_POST['name']))
	{
		$name = $_POST['name'];		
		$pass = $_POST['pass'];
		$repass = $_POST['repass'];		
		$mobile = $_POST['mobile'];
		$dob = $_POST['dob'];
		//Chuyen format $dob tu dd/mm/yyyy -> yyyy-mm-dd
		$d = substr($dob, 0, 2);
		$m = substr($dob, 3, 2);
		$y = substr($dob, 6, 4);
		
		$dob = "{$y}-{$m}-{$d}";
		
		$gender = $_POST['gender'];
		$address = $_POST['address'];
		
		//Kiem tra name
		if($name === '')
		{
			$msg = 'Họ tên không được để trống';
		}
		//Kiem tra do dai password (neu co nhap)
		elseif(strlen($pass)>0 && strlen($pass)<6)
		{
			$msg = 'Mật khẩu tối thiểu 6 ký tự';
		}
		//Kiem tra nhap lai password
		elseif($pass!=$repass)
		{
			$msg = 'Mật khẩu nhập lại không đúng';
		}
		else//Du lieu hop le =>update vao DB
		{
			//Ma hoa password
			//$pass = hash('sha512',$pass);
			if($pass !== '')//co update password
				$sql = "update `nn_user` set
						`name`='{$name}',
						`password`=sha2('{$pass}',512),
						`mobile`='{$mobile}',
						`dob`='{$dob}',
						`gender`='{$gender}',
						`address`='{$address}'
						where `id`={$userID}";
			else
				$sql = "update `nn_user` set
						`name`='{$name}',
						`mobile`='{$mobile}',
						`dob`='{$dob}',
						`gender`='{$gender}',
						`address`='{$address}'
						where `id`={$userID}";
			
			$rs = mysqli_query($link,$sql);
			if($rs==FALSE)
			{
				$msg = 'Cập nhật không thành công';
			}
			else
			{
				$msg = 'Cập nhật thành công ! Hệ thống sẽ chuyển đến trang chủ...';
?>
				<script>	
					setTimeout("window.location='?mod=home';",3000);
				</script>
<?php
			}
			
		}
	}
	
	
	
	$sql = 'select * from `nn_user` where `id`='.$userID;
	$rs = mysqli_query($link,$sql);
	$r = mysqli_fetch_assoc($rs);
	
?>
<h2 class="heading colr">Update info</h2>
<div class="login">
    <div class="registrd">
    <form action="" method="post" id="register">
        <div align="center" class="error"><?=$msg?><br>&nbsp;</div>
        <ul class="forms">
            <li class="txt">Name <span class="req">*</span></li>
            <li class="inputfield"><input name="name" type="text" required class="bar" id="name" value="<?=$r['name']?>" ></li>
        </ul>
        <ul class="forms">
            <li class="txt">Password <span class="req">*</span></li>
            <li class="inputfield"><input type="password" name="pass" class="bar" placeholder="Để trống nếu không muốn thay đổi" ></li>
        </ul>
        <ul class="forms">
            <li class="txt">Retype Password <span class="req">*</span></li>
            <li class="inputfield"><input type="password" name="repass" class="bar" id="repass"  ></li>
        </ul>
        <ul class="forms">
            <li class="txt">Mobile <span class="req">*</span></li>
            <li class="inputfield"><input name="mobile" type="text" required class="bar" id="mobile" value="<?=$r['mobile']?>" ></li>
        </ul>
        <ul class="forms">
            <li class="txt">DOB <span class="req">*</span></li>
            <li class="inputfield"><input name="dob" type="text" required class="bar" id="dob" value="<?=date('d/m/Y',strtotime($r['dob']))?>" ></li>
        </ul>
        <ul class="forms">
            <li class="txt">Gender <span class="req">*</span></li>
            <li>
            	  <label>
            	    <input type="radio" name="gender" <?php if($r['gender']==1) echo 'checked' ?> value="1" id="gender_0" >
            	    Nam</label>
            	  <label>
            	    <input type="radio" name="gender" value="0" id="gender_1" <?php if($r['gender']==0) echo 'checked' ?>>
            	    Nữ</label>
            </li>
        </ul>
        <ul class="forms">
          <li class="txt">Address <span class="req">*</span></li>
            <li class="textfield"><textarea name="address" type="text" required class="bar" id="address" ><?=$r['address']?></textarea></li>
      </ul>
      <ul class="forms">
        <li class="txt">&nbsp;</li>
            <li>
            <button type="submit" style="border:none; cursor:pointer"><a href="#" class="simplebtn"><span>Update</span></a></button>
           </li>
        </ul>
    </form>
    </div>
</div>
<div class="clear"></div>