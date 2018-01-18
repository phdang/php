<h2 class="heading colr">BedSheets</h2>
<div class="shoppingcart">
<ul class="tablehead">
    <li class="remove colr">Remove</li>
    <li class="thumb colr">&nbsp;</li>
    <li class="title colr">Product Name</li>
    <li class="price colr">Unit Price</li>
    <li class="qty colr">QTY</li>
    <li class="total colr">Sub Total</li>
</ul>
<form action="?mod=cart_process&act=2" method="post">
<?php
	//$cart = array(1=>2, 400=>1, 120=>5, 10 => 3, 390 => 2);
	$cart = @$_SESSION['cart'];
	print_r($cart);
	$s = 0;
	$i = 0;
	if(count($cart)>0)
	foreach($cart as $k => $v)
	{
		//Truy van DB lay cac thong tin
		$sql = 'select `name`,`img_url`,`price` from `nn_product` where `id`='.$k;
		$rs = mysqli_query($link,$sql);
		$r = mysqli_fetch_assoc($rs);
		$s = $s + $r['price']*$v;
?>
<ul class="cartlist <?php if(++$i%2==1) echo 'gray' ?>">
    <li class="remove txt"><a onClick="return confirm('Bạn có chắc chắn muốn xóa không ?')" href="?mod=cart_del&id=<?=$k?>"><img src="images/delete.gif" alt="" ></a></li>
    <li class="thumb"><a href="detail.html"><img src="images/sanpham/<?=$r['img_url']?>" alt="" ></a></li>
    <li class="title txt"><a href="detail.html"><?=$r['name']?></a></li>
    <li class="price txt"><?=number_format($r['price'])?></li>
    <li class="qty"><input min="1" name="<?=$k?>" type="number" value="<?=$v?>" ></li>
    <li class="total txt"><?=number_format($r['price']*$v)?></li>
</ul>
<?php
	}
?>

<div class="clear"></div>
<div class="subtotal">
    <a href="?mod=product" class="simplebtn"><span>Continue Shopping</span></a>
    <button type="submit"><a href="#" class="simplebtn" style="margin:0"><span>Update</span></a></button>
     <a href="?mod=checkout" class="simplebtn"><span>Checkout</span></a>
    <h3 class="colr"><?=number_format($s)?></h3>
</div>
</form>
<div class="clear"></div>
<div class="sections">
    <div class="cartitems">
        <h6 class="colr">Based on your selection, you may be interested in the following items:</h6>
        <ul>
            <li>
                <div class="thumb">
                    <a href="detail.html"><img src="images/prod_cart.gif" alt="" ></a>
                </div>
                <div class="desc">

                    <a href="#" class="title bold">Alexander Christie</a>
                    <p class="bold">$300</p>
                    <a href="#" class="simplebtn"><span>Add to Cart</span></a>
                    <div class="clear"></div><br >
                    <a href="#"><u>Add to Wishlist</u></a><br >
                    <a href="#"><u>Add to Compare</u></a>
                </div>
            </li>
            <li>
                <div class="thumb">
                    <a href="detail.html"><img src="images/prod_cart.gif" alt="" ></a>
                </div>
                <div class="desc">
                    <a href="detail.html" class="title bold">Alexander Christie</a>
                    <p class="bold">$300</p>
                    <a href="cart.html" class="simplebtn"><span>Add to Cart</span></a>
                    <div class="clear"></div><br >
                    <a href="#"><u>Add to Wishlist</u></a><br >
                    <a href="#"><u>Add to Compare</u></a>
                </div>
            </li>
        </ul>
        <div class="clear"></div>
        <div class="sec_botm">&nbsp;</div>
    </div>
    <div class="centersec">
    <div class="discount">
        <h6 class="colr">Discount Codes</h6>
        <p>Enter your coupon code if you have one.</p>
        <ul>
            <li><input name="discount" type="text" class="bar" ></li>
            <li><a href="#" class="simplebtn"><span>Apply Coupon</span></a></li>
        </ul>
        <div class="clear"></div>
        <div class="sec_botm">&nbsp;</div>
    </div>
  <div class="estimate">
        <h6 class="colr">Estimate Shipping and Tax</h6>
    <p>Enter your destination to get a shipping estimate.</p>
      <ul>
          <li class="bold">Country</li>
          <li>
            <select name="jumpMenu" id="jumpMenu" onchange="MM_jumpMenu('parent',this,0)" class="bar">
                <option>item1</option>
                <option>item2</option>
                <option>item3</option>
            </select>
          </li>
      </ul>
      <ul>
          <li class="bold">State/Province</li>
          <li>
            <select name="jumpMenu" id="jumpMenu1" onchange="MM_jumpMenu('parent',this,0)" class="bar">
                <option>item1</option>
                <option>item2</option>
                <option>item3</option>
            </select>
          </li>
      </ul>
      <ul>
          <li class="bold">Zip code</li>
          <li><input name="discount" type="text" class="bar" ></li>
          <li><a href="#" class="simplebtn"><span>Submit</span></a></li>
      </ul>
      <div class="clear"></div>
        <div class="sec_botm">&nbsp;</div>
    </div>
    </div>
    <div class="grand_total">
        <ul>
            <li class="title">Subtotal</li>
            <li class="price bold">$349.99</li>
        </ul>
        <ul>
            <li class="title"><h5>Grand total</h5></li>
            <li class="price"><h5>$349.99</h5></li>
        </ul>
        <div class="clear"></div>
        <a href="#" class="proceed right">Proceed to Checkout</a>
        <div class="clear"></div>
        <a href="#" class="right">Checkout with Multiple Addresses</a>
        <div class="clear"></div>
        <div class="sec_botm">&nbsp;</div>
    </div>
</div>
</div>
<div class="clear"></div>