<?php
if (isset($_GET['cat_id'])) {
	
	$cat_id = $_GET['cat_id'];
	
} else {
	
	header('location:?mod=cat');	
}
if (!isset($_SESSION['admin_name'])) {
	
	header('location:?mod=login');
}
	if (isset($_POST['name'])) {
		
		$dept_id = $_POST['dept_id'];
		
		$name = $_POST['name'];
		
		$order = $_POST['order'];
		
		$active = $_POST['active'];
		
		$sql = "UPDATE  `nn_category` SET
		
										 `department_id` = {$dept_id},
										 `name` = '{$name}',
										 `order` = {$order},
										 `active` = {$active}
		 WHERE `id` = $cat_id"; 
		
		$rs = mysqli_query($link, $sql);
		
		if ($rs) {
			
			header('location:?mod=cat');
			
		} else {
			
			echo ' Cập nhật thất bại ';	
		}
	}
	$sql = 'SELECT * FROM `nn_category` WHERE `id` = ' .$cat_id;
	$rs = mysqli_query($link, $sql) or die($sql);
	$r = mysqli_fetch_assoc($rs);
?>

<form action="" method="post" id="cat_add">
		<h3>Thêm loại</h3>
        <ul class="forms">
            <li class="txt"><label for="dept_id">Tên chủng loại</label></li>
            <li class="">
            <?php
			$sql = 'SELECT `name`, `id` FROM `nn_department`';
			$rs = mysqli_query($link,$sql);
			?>
           		<select name="dept_id" >
                <?php
				while ($r_dept = mysqli_fetch_assoc($rs)) { ?>
                
            		<option value="<?= $r_dept['id'] ?>" <?= $r_dept['id'] == $r['department_id'] ? 'selected' : ''?>><?= $r_dept['name'] ?> </option>
                    
                <?php
				}
				?>
                </select>
            </li>
        </ul>
        <ul class="forms">
            <li class="txt"><label for="name">Tên loại</label></li>
            <li class="inputfield"><input type="text" name="name" class="bar" autofocus value="<?= $r['name'] ?>" ></li>
        </ul>
        <ul class="forms">
            <li class="txt"><label for="order">Thứ tự</label></li>
            <li class=""><input type="number" name="order" class="bar" value="<?= $r['order'] ?>" min = "1" ></li>
        </ul>
         <ul class="forms">
            <li class="txt"><label for="active">Ẩn / Hiện</label></li>
            <input type="radio" name="active" class="bar" value="<?= $r['active'] ?>"<?= $r['active'] == 1 ? 'checked' : '' ?>> Hiện 
            <input type="radio" name="active" class="bar" value="<?= $r['active'] ?>"<?= $r['active'] == 0 ? 'checked' : '' ?>> Ẩn 
        </ul>
        
        <ul class="forms">
            <li class="txt">&nbsp;</li>
            <li>
            <button type="submit" style="border:none; cursor:pointer"><a href="#" class="simplebtn"><span>Cập nhật</span></a></button>
            <button type="reset" style="border:none; cursor:pointer"><a href="#" class="simplebtn"><span>Reset</span></a></button>
            </li>
             
        </ul>
        
</form>