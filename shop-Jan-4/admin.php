<?php
session_start();
ob_start();//cached output cho browser, de su dung ham header
require_once("lib/db.php");
?>

<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Estore 16</title>
<!-- // Stylesheets // -->
<link rel="stylesheet" href="css/admin_style.css" type="text/css" >
<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" >
<link rel="stylesheet" href="css/default.advanced.css" type="text/css" >
<link rel="stylesheet" href="css/contentslider.css" type="text/css"  >
<link rel="stylesheet" href="css/jquery.fancybox-1.3.1.css" type="text/css" media="screen" >
<!-- // Javascript // -->
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.min14.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.2.js"></script>
<script type="text/javascript" src="js/jcarousellite_1.0.1.js"></script>
<script type="text/javascript" src="js/scroll.js"></script>
<script type="text/javascript" src="js/ddaccordion.js"></script>
<script type="text/javascript" src="js/acordn.js"></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/Trebuchet_MS_400-Trebuchet_MS_700-Trebuchet_MS_italic_700-Trebuchet_MS_italic_400.font.js"></script>
<script type="text/javascript" src="js/cufon.js"></script>
<script type="text/javascript" src="js/contentslider.js"></script>
<script type="text/javascript" src="js/jquery.fancybox-1.3.1.js"></script>
<script type="text/javascript" src="js/lightbox.js"></script>
</head>

<body>
<a name="top"></a>
<div id="wrapper_sec">
	<!-- Header -->
	<div id="masthead">
    	<div class="secnd_navi">
        	<ul class="links">
            	<?php
                	if(isset($_SESSION['admin_name']))
					{
						echo '<li>Xin chào ',$_SESSION['admin_name'],'</li>';
						//echo '<li><a href="?mod=account">My Account</a></li>';
					}
				?>
                <!-- <li><a href="#">My Wishlist</a></li>
                <li><a href="">My Cart</a></li>
                <li><a href="">Checkout</a></li> -->
                <li class="last">
                	<?php
						if(isset($_SESSION['admin_id']))
							echo '<a href="?mod=logout">Log out</a>';
						else
							echo '<a href="?mod=login">Log In</a>';
					?>
                </li>
            </ul>
            <ul class="network">
            	<li>Share with us:</li>
                <li><a href="#"><img src="images/linkdin.gif" alt="" ></a></li>
                <li><a href="#"><img src="images/rss.gif" alt="" ></a></li>
                <li><a href="#"><img src="images/twitter.gif" alt="" ></a></li>
                <li><a href="#"><img src="images/facebook.gif" alt="" ></a></li>
            </ul>
        </div>
        <div class="clear"></div>
    	<div class="logo">
        	<a href="index.html"><img src="images/logo.png" alt="" ></a>
            <h5 class="slogn">The best watches for all</h5>
        </div>
        <ul class="search">
        	<li><input type="text" value="Search" id="searchBox" name="s" onblur="if(this.value == '') { this.value = 'Search'; }" onfocus="if(this.value == 'Search') { this.value = ''; }" class="bar" ></li>
            <li><a href="#" class="searchbtn">Search for Products</a></li>
        </ul>
        <div class="clear"></div>
        <div class="navigation">
            <ul id="nav" class="dropdown dropdown-linear dropdown-columnar">
                <li><a href="admin.php">Trang chủ</a></li>
                <li><a href="?mod=dept">Chủng loại</a></li>
                <li class="dir"><a href="?mod=cat">Loại Sản phẩm</a>
                    <!--<ul class="bordergr big">
                    <?php
					$sl1="select * from nn_department where active=1 order by `order`";
					$kq1=mysqli_query($link,$sl1);
					while($d1=mysqli_fetch_assoc($kq1)){
					?>

                        <li class="dir"><span class="colr navihead bold"><?php echo $d1['name'];?></span>
                            <ul>
                            <?php
							$sl2="select * from nn_category where active=1 and department_id={$d1['id']} order by `order`";
							$kq2=mysqli_query($link,$sl2);
							while($d2=mysqli_fetch_assoc($kq2))
							{
							?>

                                <li><a href=""><?php echo $d2['name'];?></a></li>
                             <?php }?>
                            </ul>
                        </li>
                     <?php }?>

                    </ul>-->
                </li>
                <li><a href="?mod=product">Sản phẩm</a></li>

                    <ul class="bordergr small">
                        <li class="dir"><span class="colr navihead bold">Pages</span>
                            <ul>
                                <li class="clear"><a href="index.html">Home Page</a></li>
                                <li class="clear"><a href="account.html">Account Page</a></li>
                                <li class="clear"><a href="cart.html">Shopping Cart Page</a></li>
                                <li class="clear"><a href="categories.html">Categories</a></li>
                                <li class="clear"><a href="detail.html">Product Detail Page</a></li>
                                <li class="clear"><a href="listing.html">Listing Page</a></li>
                                <li class="clear"><a href="login.html">Login Page</a></li>
                                <li class="clear"><a href="static.html">Static Page</a></li>
                                <li class="clear"><a href="contact.html">Contact Page</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="contact.html">Contact</a></li>
                <li class="dir"><a href="#">Themes</a>
                    <ul class="bordergr small">
                        <li class="dir"><span class="colr navihead bold">Themes</span>
                            <ul>
                                <li class="clear"><a href="../blue/index.html">Blue</a></li>
                                <li class="clear"><a href="../green/index.html">Green</a></li>
                                <li class="clear"><a href="../orange/index.html">Orange</a></li>
                                <li class="clear"><a href="index.html">Purple</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="lang">
            	<li>Your Language:</li>
                <li><a href="#"><img src="images/flag1.gif" alt="" ></a></li>
                <li><a href="#"><img src="images/flag2.gif" alt="" ></a></li>
                <li><a href="#"><img src="images/flag3.gif" alt="" ></a></li>
            </ul>
        </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
    <!-- Banner Section -->
	<!--<div id="banner">
    	<div id="slider4" class="nivoSlider">
			<a href="detail.html"><img src="images/banner1.jpg" alt="" ></a>
			<a href="detail.html"><img src="images/banner2.jpg" alt="" ></a>
            <a href="detail.html"><img src="images/banner3.jpg" alt="" ></a>
            <a href="detail.html"><img src="images/banner4.jpg" alt="" ></a>
		</div>
        <script type="text/javascript" src="js/jquery.nivo.slider.pack.js"></script>
		<script type="text/javascript" src="js/nivo.js"></script>
    </div>-->
    <div class="clear"></div>
    <!-- Scroolling Products -->
    <!--<div class="content_sec">
    	<!-- Column2 Section -->
        <div class="col3">
        	<div class="col3_top">&nbsp;</div>
            <div class="col3_center">
            <?php
				//include('module/home.php');
				//include('module/product.php');
				$mod=@$_GET['mod'];
				if($mod=='')$mod='login';//default
				include("module/back/{$mod}.php");
			?>
            </div>
            <div class="clear"></div>
            <div class="col3_botm">&nbsp;</div>
        </div>
        <!-- Column1 Section -->
    	<!--<div class="col1">
        	<!-- Categories -->
                <!--<div class="category">
                	<div class="col1center">
                    <div class="small_heading">
                        <h5>Categories</h5>
                    </div>
                    <div class="glossymenu">
                        <a class="menuitem submenuheader" href="#" >Sports Coverage</a>
                        <div class="submenu">
                            <ul>
                                <li><a href="listing.html">Le Vele Bedding</a></li>
                                <li><a href="listing.html">LHF Bedding</a></li>
                                <li><a href="listing.html">Pacific Coast</a></li>
                                <li><a href="listing.html">SnugFleece Woolens</a></li>
                                <li><a href="listing.html">Southern Textiles</a></li>
                            </ul>
                        </div>
                        <a class="menuitem submenuheader" href="#" >Le Vele Bedding</a>
                        <div class="submenu">
                            <ul>
                                <li><a href="listing.html">Le Vele Bedding</a></li>
                                <li><a href="listing.html">LHF Bedding</a></li>
                                <li><a href="listing.html">Pacific Coast</a></li>
                                <li><a href="listing.html">SnugFleece Woolens</a></li>
                                <li><a href="listing.html">Southern Textiles</a></li>
                            </ul>
                        </div>
                        <a class="menuitem submenuheader" href="#" >LHF Bedding</a>
                        <div class="submenu">
                            <ul>
                                <li><a href="listing.html">Le Vele Bedding</a></li>
                                <li><a href="listing.html">LHF Bedding</a></li>
                                <li><a href="listing.html">Pacific Coast</a></li>
                                <li><a href="listing.html">SnugFleece Woolens</a></li>
                                <li><a href="listing.html">Southern Textiles</a></li>
                            </ul>
                        </div>
                        <a class="menuitem submenuheader" href="#" >Pacific Coast</a>
                        <div class="submenu">
                            <ul>
                                <li><a href="listing.html">Le Vele Bedding</a></li>
                                <li><a href="listing.html">LHF Bedding</a></li>
                                <li><a href="listing.html">Pacific Coast</a></li>
                                <li><a href="listing.html">SnugFleece Woolens</a></li>
                                <li><a href="listing.html">Southern Textiles</a></li>
                            </ul>
                        </div>
                        <a class="menuitem submenuheader" href="#" >SnugFleece Woolens</a>
                        <div class="submenu">
                            <ul>
                                <li><a href="listing.html">Le Vele Bedding</a></li>
                                <li><a href="listing.html">LHF Bedding</a></li>
                                <li><a href="listing.html">Pacific Coast</a></li>
                                <li><a href="listing.html">SnugFleece Woolens</a></li>
                                <li><a href="listing.html">Southern Textiles</a></li>
                            </ul>
                        </div>
                        <a class="menuitem submenuheader" href="#" >Southern Textiles</a>
                        <div class="submenu">
                            <ul>
                                <li><a href="listing.html">Le Vele Bedding</a></li>
                                <li><a href="listing.html">LHF Bedding</a></li>
                                <li><a href="listing.html">Pacific Coast</a></li>
                                <li><a href="listing.html">SnugFleece Woolens</a></li>
                                <li><a href="listing.html">Southern Textiles</a></li>
                            </ul>
                        </div>
                    </div>
                    </div>
                    <div class="clear"></div>
                    <div class="left_botm">&nbsp;</div>
                </div>-->
                <!-- My Cart Products -->
                <!--<div class="mycart">
                	<div class="col1center">
                    <div class="small_heading">
                        <h5>My Cart</h5>
                        <div class="clear"></div>
                          <?php
							if (isset($_SESSION['admin_cart'])) {

								$cart = $_SESSION['admin_cart'];

								$subtotal = 0; ?>

                        <span class="veiwitems">(<?= count($cart) ?>) Items - <a href="cart.html" class="colr">View Cart</a></span>
                    </div>
                    <ul>

								<?php

									if (count($cart) > 0) {

										$keys = array_keys($cart);

										$ids = implode(',',$keys);

										$sql = "SELECT `name`, `price`, `id` FROM `nn_product` WHERE `id` in ({$ids})";

										$rs = mysqli_query($link,$sql) or die($sql);

										while ($r = mysqli_fetch_assoc($rs)) {

										$qty = $cart[$r['id']];

										$subtotal += $r['price'] * $qty;

								?>

								<!--/*foreach ($cart as $k => $v) {

									$sql = 'SELECT `name`, `price` FROM `nn_product` WHERE `id` = ' . $k;

									$rs = mysqli_query($link,$sql) or die($sql);

									$r = mysqli_fetch_assoc($rs);

									$subtotal += $r['price'] * $v;

									?>*/-->

                                   <li>
                                    <p class="bold title">
                                        <a href=""><?= $r['name'] ?></a>
                                    </p>
                                    <div class="grey">
                                        <p class="left">QTY: <span class="bold"><?= $qty ?></span></p>
                                        <p class="right">Price: <span class="bold"><?= number_format($r['price']) ?></span></p>
                                    </div>
                                  </li>
                    <?php
									}

								}


							} else {

							}
					?>

                        <!--<li>
                            <p class="bold title">
                                <a href="detail.html">Armani Tweed Blazer</a>
                            </p>
                            <div class="grey">
                                <p class="left">QTY: <span class="bold">3</span></p>
                                <p class="right">Price: <span class="bold">$200</span></p>
                            </div>
                        </li>
                        <li>
                            <p class="bold title">
                                <a href="detail.html">Armani Tweed Blazer</a>
                            </p>
                            <div class="grey">
                                <p class="left">QTY: <span class="bold">3</span></p>
                                <p class="right">Price: <span class="bold">$200</span></p>
                            </div>
                        </li>-->
                    </ul>
                    <!--<p class="right bold sub"><?= isset($subtotal) ? 'Sub total: ' . number_format($subtotal) . 'VND' : "Chưa có sản phẩm trong giỏ hàng" ?> </p>-->
                    <!--<div class="clear"></div>
                    <a href="#" class="simplebtn right"><span>Checkout</span></a>
                    </div>-->
                    <div class="clear"></div>
                    <!--<div class="left_botm">&nbsp;</div>-->
                </div>
                <!--<div class="poll">
                <div class="col1center">
            	<div class="small_heading">
            		<h5>Poll</h5>
                </div>
                <form action="" method="post">
                    <p>
                        <?php
                            //Lay cau hoi dang active
                            $sql = 'SELECT `id`, `content` FROM `nn_question` WHERE `active` = 1';
                            $rs = mysqli_query($link,$sql);
                            $r = mysqli_fetch_assoc($rs);

                            echo $r['content'];
                        ?>
                    </p>
                    <ul>
                    <?php
                        //Lay cac lua chon cua cau hoi
                        $sql = "SELECT `id`, `content` FROM `nn_answer` WHERE `question_id` ={$r['id']}  ORDER BY `order` ASC";
                        $rs = mysqli_query($link,$sql);
                        while($r = mysqli_fetch_assoc($rs))
                        {
                    ?>
                            <li><label><input name="answer" type="radio" value="<?=$r['id']?>" ><?=$r['content']?></label></li>
                    <?php
                        }
                    ?>
                    </ul>
                    <button type="submit">
                    <a href="#" class="simplebtn"><span>Vote</span></a>
                    </button>
                </form>
                </div>-->
                <div class="clear"></div>
                    <!--<div class="left_botm">&nbsp;</div>-->
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div class="clear"></div>
</div>
<!-- Footer Section -->
	<div id="footer">
    	<div class="foot_inr">
        <div class="foot_top">
        	<div class="foot_logo">
            	<a href="#"><img src="images/footer_logo.png" alt="" ></a>
            </div>
            <div class="botm_navi">
            	<ul>
                	<li><a href="#">Home page</a></li>
                    <li><a href="#">Who we are</a></li>
                    <li><a href="#">Formoda news &amp; blog</a></li>
                    <li><a href="#">Follow us on Twitter</a></li>
                    <li><a href="#">Befriend us on Facebook</a></li>
                </ul>
                <ul>
                	<li><a href="#">Shipping &amp; Returns</a></li>
                    <li><a href="#">Secure Shopping</a></li>
                    <li><a href="#">International Shipping</a></li>
                    <li><a href="#">Affiliates</a></li>
                    <li><a href="#">Group Sales</a></li>
                </ul>
                <ul>
                	<li><a href="#">Sign In</a></li>
                    <li><a href="#">View Cart</a></li>
                    <li><a href="#">Wish List</a></li>
                    <li><a href="#">Track My Order</a></li>
                    <li><a href="#">Help</a></li>
                </ul>
                <ul>
                	<li>Contact us</li>
                    <li>T: 01230 012312</li>
                    <li>E: <a href="mailto:info@abc.com">info@abc.com</a></li>
                    <li><a href="#">Site map</a></li>
                    <li><a href="#">Terms of use &amp; privacy</a></li>
                </ul>
            </div>
        </div>
        <div class="foot_bot">
        	<div class="emailsignup">
        	<h5>Join Our Mailing List</h5>
            <ul class="inp">
            	<li><input name="newsletter" type="text" class="bar" ></li>
                <li><a href="#" class="signup">Signup</a></li>
            </ul>
            <div class="clear"></div>
        </div>
            <div class="botm_links">
            	<ul>
                	<li class="first"><a href="#">Home</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Privacy</a></li>
                </ul>
                <div class="clear"></div>
                <p>© 2010 DUMY. All Rights Reserved</p>
            </div>
            <div class="copyrights">
        	<p>
            	Registered address: County House, 1 New Road, BTQ5 8LZ. Company No. 6172469<br >
Office address: NewTrends Ltd, The Byre, Berry Pomeroy, Devon, TQ9 6LH
            </p>
        </div>
        <div class="clear"></div>
        </div>
        <div class="clear"></div>
        <div class="topdiv">
        	<a href="#top" class="top">Top</a>
        </div>
        </div>
    </div>
</body>
</html>
