<?php
	require_once('db/config.php');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Shop</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link href="css/main.css" rel="stylesheet">
<link href="css/sdmenu.css" rel="stylesheet">
<script src="js/sdmenu.js"></script>
<script>
	var myMenu;
	window.onload = function() {
		myMenu = new SDMenu("my_menu");
		myMenu.init();
	};
</script>
<style>
	#main{
		background-color: #fff;
	}

</style>
</head>

<body>
<div id="wrapper">
    <div id="header"> </div>
    <div id="menu">
			<button>
        	<hr>
            <hr>
            <hr>
        </button>
				<ul>
	        	<li><a href="#">Trang chủ</a></li>
	            <li><a href="#">Giới thiệu</a></li>
	            <li><a href="#">Sản phẩm</a>
								<ul>
									<?php
											require_once('lib/sanpham.php');
									?>
	              </ul>
	            </li>
	            <li><a href="#">Hướng dẫn</a></li>
	            <li><a href="#">Liên hệ</a>
	            	<ul>
	                	<li><a href="#">Điện thoại</a></li>
	            		<li><a href="#">Máy tính</a>
	                        <ul>
	                            <li><a href="#">DELL</a></li>
	                            <li><a href="#">ASUS</a>
	                                 <ul>
	                                    <li><a href="#">DELL 222 </a></li>
	                                    <li><a href="#">ASUS 222</a></li>
	                                </ul>
	                            </li>
	                        </ul>
	                    </li>
	                </ul>
	            </li>
	        </ul>
    </div>
    <div id="left">
        <div id="my_menu" class="sdmenu">
          <div>
            <span>Online Tools</span>
            <a href="http://tools.dynamicdrive.com/imageoptimizer/">Image Optimizer</a>
            <a href="http://tools.dynamicdrive.com/favicon/">FavIcon Generator</a>
            <a href="http://www.dynamicdrive.com/emailriddler/">Email Riddler</a>
            <a href="http://tools.dynamicdrive.com/password/">htaccess Password</a>
            <a href="http://tools.dynamicdrive.com/gradient/">Gradient Image</a>
            <a href="http://tools.dynamicdrive.com/button/">Button Maker</a>
          </div>
          <div>
            <span>Support Us</span>
            <a href="http://www.dynamicdrive.com/recommendit/">Recommend Us</a>
            <a href="http://www.dynamicdrive.com/link.htm">Link to Us</a>
            <a href="http://www.dynamicdrive.com/resources/">Web Resources</a>
          </div>
          <div class="collapsed">
            <span>Partners</span>
            <a href="http://www.javascriptkit.com">JavaScript Kit</a>
            <a href="http://www.cssdrive.com">CSS Drive</a>
            <a href="http://www.codingforums.com">CodingForums</a>
            <a href="http://www.dynamicdrive.com/style/">CSS Examples</a>
          </div>
          <div>
            <span>Test Current</span>
            <a href="?foo=bar">Current or not</a>
            <a href="./">Current or not</a>
            <a href="index.html">Current or not</a>
            <a href="index.html?query">Current or not</a>
          </div>
        </div>
    </div>
    <div id="main">
	  <?php
			require_once('lib/product.php');
		?>
            <div class="pagination">
							<form action= "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get">
                  <button id="page" class="active" value="1" type="submit">1</button>
                  <button value="2" type="submit">2</button>
                  <button value="3" type="submit">3</button>
                  <button value="4" type="submit">4<button>
                  <buttoni value="5" type="submit">5<button>
							<form>
            </div>
       </div>
       <div id="right">5</div>
    <div id="footer">6</div>
</div>
</body>
</html>
