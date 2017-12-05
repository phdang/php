<!doctype html>
<html lang="vi">
<head>
<meta charset="utf-8">
<title>Table php</title>
<style>
	/*.le{
		background-color: lavender;
	}

	.chan{

		background-color: #ffdddd;
	}*/
	tr:nth-child(2n+3){

		background-color: hotpink;

	}

	tr:nth-child(2n+2){

		background-color: #ffdddd;

	}

	table,td,th{

		border: 1px solid grey;
		border-collapse: collapse;
	}

	span{

		background-color: lightcyan;
	}

</style>
</head>

<body>
<?php
	function rank($result){

		if ($result >8){

			echo 'Xuất sắc';

		}elseif ($result > 7) {

			echo 'Giỏi';

		}elseif ($result >6){

			echo 'Khá';

		}elseif ($result > 4) {

			echo 'Trung Bình';

		}else {

			echo 'Rớt';
		}
	};

	function rank_with_return($result){

		if ($result >8){

			return 'Xuất sắc';

		}elseif ($result > 7) {

			return 'Giỏi';

		}elseif ($result >6){

			return 'Khá';

		}elseif ($result > 4) {

			return 'Trung Bình';

		}else { $GLOBALS['counter']++;}

		return 'Rớt';

	};

	function background($i){

		//if ($i%2==0){
//				echo 'chan';
//		  }else{
//				echo 'le';
//		  }

	//	echo ($i%2) ? 'le': 'chan';

		echo !($i%2) ? 'chan': 'le';


	  }
?>

<table width="400px">
	<caption>Danh sách</caption>
	<tr>

        	<th>STT</th>
            <th>Họ và tên</th>
            <th>Điểm</th>
            <th>Kết quả</th>
	</tr>
<?php
	$counter = 0;
	for($i=0;$i<100;$i++){
	?>
    <tr class="<?php background($i)?>">

        <td align="center"><?php echo ($i+1) ?></td>
        <td><?php echo 'Nguyen Van A' ?></td>
        <td align="center"><?php  echo $result = mt_rand(0,10); ?></td>
        <td align="center"><?php
					//if($result <5){
//						 	echo 'Rớt';
//						}else{
//							echo 'Đậu';
//						}
					//Toán tử 3 ngôi

					//echo $result < 5 ? 'Rớt' : 'Đậu';

					//Goi ham

					//Ham co echo không cần echo ngoài

					// rank($result);

					//Hàm có return thì phải dùng echo

					echo rank_with_return($result);

					//$fail = rank_with_return($result);

					//if ($fail==='Rớt'){$counter++;}


				?></td>

    </tr>

<?php

	};

?>

</table>
<article>
	<span>Tổng kết: Đậu: <?php echo 100 - $counter,'.', ' Rớt: ', $counter; $counter = null; ?></span>
</article>


</body>
</html>
