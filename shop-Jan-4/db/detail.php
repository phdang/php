<?php
	require_once('lib/config.php');
	$pid = isset($_GET['pid']) ? $_GET['pid'] : 1;
	//Increase views
	$sql = "UPDATE `phd4shop_product` SET `view` = `view` + 1 WHERE `id` = {$pid}";
	$rs = mysqli_query($link,$sql);
	//Check views
	//$sql = "SELECT `view` FROM `phd4shop_product` WHERE `id` = {$pid}";
	//$rs = mysqli_query($link,$sql);
	//$r = mysqli_fetch_assoc($rs);
	//echo $view = $r['view'] ; 
	
	$sql = "SELECT * FROM `phd4shop_product` WHERE `active` = 1 AND `id` = {$pid}";
	$rs = mysqli_query($link,$sql);
	$r = mysqli_fetch_assoc($rs)
?>
<!DOCTYPE html><head>
<meta charset="utf-8">
<title>Estore 16</title>
<!-- // Stylesheets // -->
<link rel="stylesheet" href="css/style.css" type="text/css" >
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

<style>
		
div.listing ul li:nth-of-type(4n+0) {
	margin-right:0;
}
	
</style>

<body>
<a name="top"></a>
<div id="wrapper_sec">
	<!-- Header -->
	<div id="masthead">
    	<div class="secnd_navi">
        	<ul class="links">
            	<li>Default welcome msg!</li>
                <li><a href="account.html">My Account</a></li>
                <li><a href="#">My Wishlist</a></li>
                <li><a href="cart.html">My Cart</a></li>
                <li><a href="#">Checkout</a></li>
                <li class="last"><a href="login.html">Log In</a></li>
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
        	<a href="index.php"><img src="images/logo.png" alt="" ></a>
            <h5 class="slogn">The best watches for all</h5>
        </div>
        <ul class="search">
        	<li><input type="text" value="Search" id="searchBox" name="s" onblur="if(this.value == '') { this.value = 'Search'; }" onfocus="if(this.value == 'Search') { this.value = ''; }" class="bar" ></li>
            <li><a href="#" class="searchbtn">Search for Products</a></li>
        </ul>
        <div class="clear"></div>
        <div class="navigation">
            <ul id="nav" class="dropdown dropdown-linear dropdown-columnar">
                <li><a href="index.php">Home</a></li>
                <li><a href="static.html">About Us</a></li>
                <li class="dir"><a href="#">Comforters</a>
                    <ul class="bordergr big">
                        <li class="dir"><span class="colr navihead bold">Citizen</span>
                            <ul>
                                <li><a href="categories.html">AK Anne Klein</a></li>
                                <li><a href="categories.html">Alexander Christie</a></li>
                                <li><a href="categories.html">Arbutus</a></li>
                                <li><a href="categories.html">Armitron</a></li>
                                <li><a href="categories.html">Body Glove</a></li>
                                <li><a href="categories.html">Calvin Klein</a></li>
                            </ul>
                        </li>
                        <li class="dir"><span class="colr navihead bold">Calvin Klein</span>
                            <ul>
                                <li><a href="categories.html">AK Anne Klein</a></li>
                                <li><a href="categories.html">Alexander Christie</a></li>
                                <li><a href="categories.html">Arbutus</a></li>
                                <li><a href="categories.html">Armitron</a></li>
                                <li><a href="categories.html">Body Glove</a></li>
                                <li><a href="categories.html">Calvin Klein</a></li>
                            </ul>
                        </li>
                        <li class="dir"><span class="colr navihead bold">Citizen</span>
                            <ul>
                                <li><a href="categories.html">AK Anne Klein</a></li>
                                <li><a href="categories.html">Alexander Christie</a></li>
                                <li><a href="categories.html">Arbutus</a></li>
                                <li><a href="categories.html">Armitron</a></li>
                                <li><a href="categories.html">Body Glove</a></li>
                                <li><a href="categories.html">Calvin Klein</a></li>
                            </ul>
                        </li>
                        <li class="dir"><span class="colr navihead bold">Calvin Klein</span>
                            <ul>
                                <li><a href="categories.html">AK Anne Klein</a></li>
                                <li><a href="categories.html">Alexander Christie</a></li>
                                <li><a href="categories.html">Arbutus</a></li>
                                <li><a href="categories.html">Armitron</a></li>
                                <li><a href="categories.html">Body Glove</a></li>
                                <li><a href="categories.html">Calvin Klein</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="login.html">BedSheets</a></li>
                <li class="dir"><a href="#">Pages</a>
                    <ul class="bordergr small">
                        <li class="dir"><span class="colr navihead bold">Pages</span>
                            <ul>
                                <li class="clear"><a href="index.php">Home Page</a></li>
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
                                <li class="clear"><a href="../blue/index.php">Blue</a></li>
                                <li class="clear"><a href="../green/index.php">Green</a></li>
                                <li class="clear"><a href="../orange/index.php">Orange</a></li>
                                <li class="clear"><a href="index.php">Purple</a></li>
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
    <!-- Bread Crumb Section -->
    <div class="crumb">
    	<ul>
        	<li class="first"><a href="index.php">Home</a></li>
            <?php
						$sql = "SELECT dep.`name` FROM `phd4shop_department` AS dep, `phd4shop_category` AS cat, `phd4shop_product` AS pro WHERE pro.`category_id` = cat.id AND cat.`department_id` = dep.id AND {$r['id']} = pro.id";
						mysqli_set_charset($link,'utf8');
						$rs = mysqli_query($link,$sql);
						$r = mysqli_fetch_assoc($rs);
			?>
            <li><a href="#"><?= $r['name'] ?></a></li>
        </ul>
    </div>
    <div class="clear"></div>
    <!-- Scroolling Products -->
    <div class="content_sec">
    	<!-- Column2 Section -->
        <div class="col2">
        <?php
        $sql = "SELECT * FROM `phd4shop_product` WHERE `active` = 1 AND `id` = {$pid}";
		$rs = mysqli_query($link,$sql);
		$r = mysqli_fetch_assoc($rs)
		?>
        	<div class="col2_top">&nbsp;</div>
            <div class="col2_center">
        	<h4 class="heading colr"><?= $r['name'] ?></h4>
            <div class="prod_detail">
            	<div class="big_thumb">
                	<div id="slider2">
                        <div class="contentdiv">
                         
                        	<img src="images/sanpham/<?= $r['img_url'] ?>" alt="" >
                           
                            <a rel="example_group" href="images/sanpham/<?= $r['img_url'] ?>" title="Lorem ipsum dolor sit amet, consectetuer adipiscing elit." class="zoom">&nbsp;</a>
                      </div>
                        <div class="contentdiv">
                            <img src="images/sanpham/<?= $r['img_url'] ?>" alt="" >
                            <a rel="example_group" href="images/watch.jpg" title="Lorem ipsum dolor sit amet, consectetuer adipiscing elit." class="zoom">&nbsp;</a>
                        </div>
                        <div class="contentdiv">
                            <img src="images/detail_img3.gif" alt="" >
                            <a rel="example_group" href="images/watch.jpg" title="Lorem ipsum dolor sit amet, consectetuer adipiscing elit." class="zoom">&nbsp;</a>
                        </div>
                        <div class="contentdiv">
                        	<img src="images/detail_img4.gif" alt="" >
                            <a rel="example_group" href="images/watch.jpg" title="Lorem ipsum dolor sit amet, consectetuer adipiscing elit." class="zoom">&nbsp;</a>
                        </div>
                        <div class="contentdiv">
                        	<img src="images/detail_img5.gif" alt="" >
                            <a rel="example_group" href="images/watch.jpg" title="Lorem ipsum dolor sit amet, consectetuer adipiscing elit." class="zoom">&nbsp;</a>
                        </div>
                      <div class="contentdiv">
                        	<img src="images/detail_img6.gif" alt="" >
                            <a rel="example_group" href="images/watch.jpg" title="Lorem ipsum dolor sit amet, consectetuer adipiscing elit." class="zoom">&nbsp;</a>
                      </div>
                    </div>
                    <a href="javascript:void(null)" class="prevsmall"><img src="images/prev.gif" alt="" ></a>
                    <div style="float:left; width:189px !important; overflow:hidden;">
                    <div class="anyClass" id="paginate-slider2">
                        <ul>
                            <li><a href="#" class="toc"><img src="images/sanpham/<?= $r['img_url'] ?>" alt="" ></a></li>
                            <li><a href="#" class="toc"><img src="images/sanpham/<?= $r['img_url'] ?>" alt="" ></a></li>
                            <li><a href="#" class="toc"><img src="images/sanpham/<?= $r['img_url'] ?>" alt="" ></a></li>
                            <li><a href="#" class="toc"><img src="images/sanpham/<?= $r['img_url'] ?>" alt="" ></a></li>
                            <li><a href="#" class="toc"><img src="images/sanpham/<?= $r['img_url'] ?>" alt="" ></a></li>
                            <li><a href="#" class="toc"><img src="images/sanpham/<?= $r['img_url'] ?>" alt="" ></a></li>
                        </ul>
                    </div>
                    </div>
                    <a href="javascript:void(null)" class="nextsmall"><img src="images/next.gif" alt="" ></a>
                    <script type="text/javascript" src="js/cont_slidr.js"></script>
                </div>
                <div class="desc">
                	<div class="quickreview">
                            <a href="#" class="bold black left"><u>Be the first to review this product</u></a>
                            <div class="clear"></div>
                            <p class="avail"><span class="bold">Availability:</span> In stock</p>
                          <h6 class="black">Quick Overview</h6>
                        <p>
                        	<?= $r['desc'] ?>
                        </p>
                    </div>
                    <div class="addtocart">
                    	<h4 class="left price colr bold"><?=number_format($r['price']/1000000,3,',', '.') ?> Tr</h4>
                            <div class="clear"></div>
                            <ul class="margn addicons">
                                <li>
                                    <a href="#">Add to Wishlist</a>
                                </li>
                                <li>
                                    <a href="#">Add to Compare</a>
                                </li>
                        	</ul>
                            <div class="clear"></div>
                        <ul class="left qt">
                   	    <li class="bold qty">QTY</li>
                            <li><input name="qty" type="text" class="bar" ></li>
                            <li><a href="cart.html" class="simplebtn"><span>Add To Cart</span></a></li>
                        </ul>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="prod_desc">
                	<h4 class="heading colr">Giới Thiệu Sản Phẩm</h4>
                    <p>
                    	<?= $r['detail'] ?>
                    </p>
                </div>
            </div>
            <div class="listing">
            	<h4 class="heading colr">SẢN PHẨM MỚI CÙNG LOẠI</h4>
                <ul>
                <?php
				$sql = "SELECT * FROM `phd4shop_product` WHERE `active` = 1 AND `id` = {$pid}";
				$rs = mysqli_query($link,$sql);
				$r = mysqli_fetch_assoc($rs);
				$sql = "SELECT * FROM `phd4shop_product` WHERE `active` = 1 AND `category_id` = {$r['category_id']} AND `id` != {$pid} ORDER BY `id` DESC LIMIT 0,20";
					$rs = mysqli_query($link,$sql);
					while ($r = mysqli_fetch_assoc($rs)) {?>
                    <li>
                    	<a href="detail.php?pid=<?= $r['id'] ?>" class="thumb"><img src="images/sanpham/<?= $r['img_url'] ?>" alt="<?= $r['name'] ?>" ></a>
                        <h6 class="colr"><?= $r['name'] ?></h6>
                        <div class="stars">
                        	<a href="#"><img src="images/star_green.gif" alt="" ></a>
                            <a href="#"><img src="images/star_green.gif" alt="" ></a>
                            <a href="#"><img src="images/star_green.gif" alt="" ></a>
                            <a href="#"><img src="images/star_green.gif" alt="" ></a>
                            <a href="#"><img src="images/star_grey.gif" alt="" ></a>
                            <a href="#">(3) Reviews</a>
                        </div>
                        <div class="addwish">
                        	<a href="#">Add to Wishlist</a>
                            <a href="#">Add to Compare</a>
                        </div>
                        <div class="cart_price">
                        	<a href="cart.html" class="adcart">Add to Cart</a>
                            <p class="price"><?= number_format($r['price']/1000000,3,',', '.') ?> Tr</p>
                        </div>
                    </li>
				<?php
					}
				?>
                
                    
                </ul>
            </div>
            <div class="tags_big">
            	<h4 class="heading">Product Tags</h4>
                <p>Add Your Tags:</p>
                <span><input name="tags" type="text" class="bar" ></span>
                <div class="clear"></div>
                <span><a href="#" class="simplebtn"><span>Add Tags</span></a></span>
                <p>Use spaces to separate tags. Use single quotes (') for phrases.</p>
            </div>
            <div class="clear"></div>
            </div>
            <div class="clear"></div>
            <div class="col2_botm">&nbsp;</div>
        </div>
        <!-- Column1 Section -->
    	<div class="col1">
        	<!-- Categories -->
                <div class="category">
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
                </div>
                <!-- My Cart Products -->
                <div class="mycart">
                	<div class="col1center">
                    <div class="small_heading">
                        <h5>My Cart</h5>
                        <div class="clear"></div>
                        <span class="veiwitems">(3) Items - <a href="cart.html" class="colr">View Cart</a></span>
                    </div>
                    <ul>
                        <li>
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
                        </li>
                        <li>
                            <p class="bold title">
                                <a href="detail.html">Armani Tweed Blazer</a>
                            </p>
                            <div class="grey">
                                <p class="left">QTY: <span class="bold">3</span></p>
                                <p class="right">Price: <span class="bold">$200</span></p>
                            </div>
                        </li>
                    </ul>
                    <p class="right bold sub">Sub total: $600</p>
                    <div class="clear"></div>
                    <a href="#" class="simplebtn right"><span>Checkout</span></a>
                    </div>
                    <div class="clear"></div>
                    <div class="left_botm">&nbsp;</div>
                </div>
                <div class="poll">
                <div class="col1center">
            	<div class="small_heading">
            		<h5>Poll</h5>
                </div>
                <p>What is your favorite Magento feature?</p>
                <ul>
                	<li><input name="layerd" type="radio" value="" > Layered Navigation</li>
                    <li><input name="price" type="radio" value="" > Price Rules</li>
                    <li><input name="category" type="radio" value="" > Category Management</li>
                    <li><input name="compare" type="radio" value="" > Compare Products</li>
                </ul>
                <a href="#" class="simplebtn"><span>Vote</span></a>
                </div>
                <div class="clear"></div>
                    <div class="left_botm">&nbsp;</div>
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
                	<li><a href="index.php">Home page</a></li>
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
                	<li class="first"><a href="index.php">Home</a></li>
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