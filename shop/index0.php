<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<style>
	table,td,th {
		border:1px solid grey;
		border-collapse:collapse;
	}
	table {
		width: 90%;
	}
	.le {
		background-color:lavender;
	}
	.chan {
		background-color: hotpink;
	}
</style>
</head>

<body>
<?php

	//first check
	
	//phpinfo();
	
	//dev mode
	
	error_reporting(E_ALL); //show errors
	
	//config
	
	$host = 'localhost';
	$user = 'shop';
	$pass = 'OXzWf8GBiAu2cOIo';
	$db = 'shop';
	
	//connect
	
	$link = mysqli_connect($host,$user,$pass,$db) or die("Ket noi that bai");
	
	//UTF8
	
	mysqli_set_charset($link,'utf8');
	
	//cau truy van sql
	
	//$test = 'CREATE TABLE `test111`';
	
	$sql = 'SELECT * FROM `phd4shop_department`';
	
	// Query
	
	$rs = mysqli_query($link,$sql);
	
	// fetch 1 row
	
	//$r = mysqli_fetch_assoc($rs);
	
	// Display 1 row in column_name - Hien thi
	
	//echo $r['name'];
	
	//Show all rows
	
	//while($r = mysqli_fetch_assoc($rs)) {	
	//	echo $r['name'];
	//}
	
	?>
    <?php
		$sql = 'SELECT * FROM `phd4shop_category` LIMIT 0,10';
		$rs = mysqli_query($link,$sql);
	?>
	<table>
    	<caption><h2> Danh sach chung loai </h2> </caption>
    	<tr>
        	<th>STT</th>
            <th>Dep ID</th>
            <th>Ten</th>
            <th>Thu Tu</th>
            <th> An/Hien </th>
        </tr>
    	
		<?php
		$i = 1;
        while($r = mysqli_fetch_assoc($rs)) {	
		 ?><tr class="<?php echo ($i%2) ? 'le' : 'chan'?>">
         	<?php
            echo '<td align="center">',$r['id'], '<br>','</td>';
			 echo '<td align="center">',$r['department_id'], '<br>','</td>';
			echo '<td>',$r['name'], '<br>','</td>';
			echo '<td >',$r['order'], '<br>','</td>';
			echo '<td>',$r['active'] != 0 ? 'Hien' : 'An', '<br>','</td>';
			$i++;
        }?>
        
       </tr>
        	
            
        
	</table>
    
    <select>
    	<?php
			$sql = 'SELECT * FROM `phd4shop_department`';
			$rs = mysqli_query($link,$sql);
			while($r=mysqli_fetch_assoc($rs)){
			
		?>
    
    	<option value="<?= $r['id']?>"><?= $r['name']?></option>
        
        <?php
			}
        ?>
        
    </select>
    
</body>
</html>