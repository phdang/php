<?php
 	require_once('lib/config.php');
 ?>
<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>WorldOfDang.vn</title>

	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">

	<script src="../HTML5/jquery-3.2.1.min.js"></script>

	<link href="../HTML5/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<script src="../HTML5/bootstrap/js/bootstrap.min.js"></script>

	<link rel="stylesheet" href="../HTML5/font-awesome-4.7.0/css/font-awesome.min.css">

	<link href="../HTML5/animate.css" rel="stylesheet">

	<script src="js/myToggledMenu.js"></script>

	<link rel="stylesheet" href="../HTML5/worldofdang-css.css">

	<style>



	</style>

	<link rel="stylesheet" href="../HTML5/css/multizoom.css" type="text/css" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
	<script type="text/javascript" src="../HTML5/js/multizoom.js"></script>
	<script src="../HTML5/worldofdang-js.js"></script>

</head>


<body>
	<div id="header">

		<h1>WorldOfDang.vn</h1>

	</div>

	<nav class="navbar">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" id="button-bars" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span style="color:white" class="fa fa-bars"></span>
      </button>
				<a class="navbar-brand" id="catagory" href="#1">Danh mục <span class="caret"></span></a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav">
					<li class="active"><a href="?home">Trang Chủ</a></li>
					<li class="dropdownsp">
						<a href="#">Sản Phẩm<span class="caret"></span></a>
						<ul>
							<?php
						$sql = 'SELECT `id`, `name` FROM `nn_department`';
						$rs = mysqli_query($link,$sql);
						while($r=mysqli_fetch_assoc($rs)){
						?>
								<li>
									<a href="#"><?= $r['name']?><span class="caret"></span></a>
									<ul>
									<?php
									$sql = 'SELECT `id`, `name` FROM `nn_category` WHERE `department_id` = '.$r['id'];
									$rsCat = mysqli_query($link,$sql);
									while($r=mysqli_fetch_assoc($rsCat)){?>
										<li><a href="#"><?= $r['name']?></a></li>
									<?php
									}
									?>
									</ul>
								</li>

								<?php
						}
								?>

		        </ul>

					</li>
					<li><a href="#">Khuyến Mãi</a></li>
					<li><a href="#">Liên Hệ</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li data-toggle="modal" data-target="#myModal"><a href="#"><span class="glyphicon glyphicon-user"></span> Đăng kí</a></li>
					<li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Đăng nhập</a></li>
				</ul>
			</div>
		</div>

	</nav>

	<div class="clear"></div>
	<div class="container-fluid">

		<div class="row">

			<div id="left"> </div>


			<div id="main">
				<?php
				$sql =  "SELECT `id`, `name`, `img_url`, `price` FROM `nn_product` LIMIT 0,12";

				//fetch rowsheet

				$rs = mysqli_query($link,$sql);
				$i=1;
				while($r = mysqli_fetch_assoc($rs)) { ?>
				<div class="product<?=$i?>">

					<h2><?= $r['name']?></h2>

					<img src="shop/images/sanpham/<?=$r['img_url']?>" alt="<?= $r['name']?>">

					<h4><?= number_format($r['price'])?> VNĐ</h4>

					<button type="button" class="btn btn-primary" name="mua"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Mua</button>

				</div>
				<?php
				$i++;
				}
				?>

			</div>

		</div>

		<!--<div id="right"> </div>-->

		<div id="footer">

			<div>© <span id="WorldOfDang">WorldOfDang</span> All rights reserved 2017</div>

			<div>Written and coded by phdang</div>

		</div>

	</div>

	<!-- Modal Register Form -->
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Đăng Kí</h4>
				</div>
				<div class="modal-body">
					<form class="form-horizontal">
						<div class="form-group">
							<label class="control-label col-sm-2" for="email">Email:</label>
							<div class="col-sm-10">
								<input type="email" class="form-control" id="email" placeholder="Nhập email">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="pwd">Password:</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" id="pwd" placeholder="Nhập password">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<div class="checkbox">
									<label><input type="checkbox"> Ghi nhớ</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-default">Đăng kí</button>
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
				</div>
			</div>

		</div>
	</div>

</body>

</html>
