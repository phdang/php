<?php
	if (!isset($_SESSION['admin_name'])) {
		
		header('location:?mod=login');
	}
	if (isset($_POST['name'])) {
		
		$dept_id = $_POST['dept_id'];
		
		$name = $_POST['name'];
		
		$order = $_POST['order'];
		
		$active = $_POST['active'];
		
		$sql = "INSERT INTO `nn_category` VALUES (NULL, '{$dept_id}', '{$name}','{$order}','{$active}')"; 
		
		$rs = mysqli_query($link, $sql);
		
		if ($rs) {
			
			header('location:?mod=cat');
			
		} else {
			
			echo 'Cập nhật thất bại';	
		}
	}
	$sql = 'SELECT `name`, `id` FROM `nn_department`';
	$rs = mysqli_query($link, $sql) or die($sql);
?>

<form action="" method="post" id="cat_add">
		<h3>Thêm loại</h3>
        <ul class="forms">
            <li class="txt"><label for="dept_id">Tên chủng loại</label></li>
            <li class="">
           		<select name="dept_id" >
                <?php
				while ($r = mysqli_fetch_assoc($rs)) { ?>
                
            		<option value="<?= $r['id'] ?>" ><?= $r['name'] ?> </option>
                    
                <?php
				}
				?>
                </select>
            </li>
        </ul>
        <ul class="forms">
            <li class="txt"><label for="name">Tên loại</label></li>
            <li class="inputfield"><input type="text" name="name" class="bar" autofocus value="<?php if (isset($_POST['user'])) { echo $user; }?>" ></li>
        </ul>
        <ul class="forms">
            <li class="txt"><label for="order">Thứ tự</label></li>
            <li class=""><input type="number" name="order" class="bar" value="1" min = "1" ></li>
        </ul>
         <ul class="forms">
            <li class="txt"><label for="active">Ẩn / Hiện</label></li>
            <input type="radio" name="active" class="bar" value="1" checked> Hiện 
            <input type="radio" name="active" class="bar" value="0"> Ẩn 
        </ul>
        
        <ul class="forms">
            <li class="txt">&nbsp;</li>
            <li>
            <button type="submit" style="border:none; cursor:pointer"><a href="#" class="simplebtn"><span>Thêm</span></a></button>
            <button type="reset" style="border:none; cursor:pointer"><a href="#" class="simplebtn"><span>Reset</span></a></button>
            </li>
             
        </ul>
        
</form>