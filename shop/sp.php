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
</style>
</head>

<body>
	<table>
    	<tr>
        	<th>STT</th>
            <th>Ten San Pham</th>
            <th>Hinh</th>
            <th>Gia</th>
            <th>Ngay Dang</th>
        </tr>
    
	<?php
		
		require_once('lib/config.php');
	?>
    <?php
		
		//sqlquery
		
		$sql =  "SELECT `id`, `name`, `img_url`, `price`, `create_at` FROM `phd4shop_product` LIMIT 0,8";
		
		//fetch rowsheet
		$i = 1 ;
		$rs = mysqli_query($link,$sql);
		while($r = mysqli_fetch_assoc($rs)) { ?>
			
			<tr>
                <td align="center"><?= $i ?></td>
                <td align="center"><?= $r['name'] ?></td>
                <td align="center"><img src="images/sanpham/<?= $r['img_url']; ?>" alt="<?= $r['name']?>"></td>
                <td align="center"><?= number_format($r['price']); ?></td>
                <td><?= date('d/m/Y',strtotime($r['create_at'])); ?></td>
                
            </tr>
            
            <?php

			$i++;
	
		}
	
		
	?>
	</table>
</body>
</html>