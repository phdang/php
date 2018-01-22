<?php
	if (isset($_GET['dept_id'])) {
		
		$dept_id = $_GET['dept_id'];
		
	} else {
		
		header('location:?mod=dept');	
	}
	if (!isset($_SESSION['admin_name'])) {
		
		header('location:?mod=login');
	}
	if (isset($_POST['name'])) {
		
		$name = $_POST['name'];
		
		$order = $_POST['order'];
		
		$active = $_POST['active'];
		
		$sql = "UPDATE `nn_department` SET
											 `name` = '{$name}',
											 `order` = {$order},
											 `active` = {$active}
		 WHERE `id`  = {$dept_id}"; 
		
		$rs = mysqli_query($link,$sql) or die($sql);
		
		if ($rs) {
			
			header('location:?mod=dept');
			
		} else {
			
			echo 'Cập nhật thất bại';	
		}
	}
	
	$sql = 'SELECT * FROM `nn_department` WHERE `id` =' . $dept_id;
	
	$rs = mysqli_query($link,$sql) or die($sql);
	
	$r= mysqli_fetch_assoc($rs);
?>

<form action="" method="post" id="dept_add">
		<h3>Cập nhật chủng loại</h3>
        <ul class="forms">
            <li class="txt"><label for="name">Tên chủng loại</label></li>
            <li class="inputfield"><input type="text" name="name" class="bar" autofocus value="<?= $r['name'] ?>" ></li>
        </ul>
        <ul class="forms">
            <li class="txt"><label for="order">Thứ tự</label></li>
            <li class=""><input type="number" name="order" class="bar" value="<?= $r['order'] ?>" min = "1" ></li>
        </ul>
         <ul class="forms">
            <li class="txt"><label for="active">Ẩn / Hiện</label></li>
            <input type="radio" name="active" class="bar" value="1" <?= $r['active'] == 1 ? 'checked' : '' ?>> Hiện 
            <input type="radio" name="active" class="bar" value="0" <?= $r['active'] == 0 ? 'checked' : '' ?>> Ẩn 
        </ul>
        
        <ul class="forms">
            <li class="txt">&nbsp;</li>
            <li>
            <button type="submit" style="border:none; cursor:pointer"><a href="#" class="simplebtn"><span>Cập nhật</span></a></button>
            <button type="reset" style="border:none; cursor:pointer"><a href="#" class="simplebtn"><span>Reset</span></a></button>
            </li>
             
        </ul>
        
</form>