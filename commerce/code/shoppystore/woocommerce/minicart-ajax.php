<?php 
if ( !class_exists( 'WooCommerce' ) ) { 
	return false;
}
global $woocommerce; ?>
<div class="top-form top-form-minicart  minicart-product-style pull-right">
	<div class="top-minicart pull-right">

	<?php 
          $amount = strlen($woocommerce->cart->get_cart_total());
          if($amount < 120) {
	?>
		<a class="cart-contents" href="<?php echo wc_get_cart_url(); ?>" title="<?php esc_attr_e('View your shopping cart', 'shoppystore'); ?>"><?php if($woocommerce->cart->cart_contents_count > 1) {?><?php echo '<span class="minicart-number">'.$woocommerce->cart->cart_contents_count.'</span> ' . esc_html__('items', 'shoppystore').' - '. $woocommerce->cart->get_cart_total(); ?><?php } else { ?>
			<?php echo '<span class="minicart-number">'.$woocommerce->cart->cart_contents_count.'</span> '. esc_html__('item', 'shoppystore') .' - ' . $woocommerce->cart->get_cart_total(); ?>
			<?php } ?>
		</a>
	<?php } else { ?>
		<a class="cart-contents" href="<?php echo wc_get_cart_url(); ?>" title="<?php esc_attr_e('View your shopping cart', 'shoppystore'); ?>"><?php if($woocommerce->cart->cart_contents_count > 1) {?><?php echo '<span class="minicart-number">'.$woocommerce->cart->cart_contents_count.'</span> '; esc_html_e('items', 'shoppystore');?><?php } else { ?>
			<?php echo '<span class="minicart-number">'.$woocommerce->cart->cart_contents_count.'</span> ' . esc_html__('item', 'shoppystore');?>
			<?php } ?>
		</a>
	<?php } ?>
	</div>
	<?php if( count($woocommerce->cart->cart_contents) > 0 ){?>
	<div class="wrapp-minicart">
		<div class="minicart-padding">
		<div class="additems">
			<span><?php esc_html_e('Your Product', 'shoppystore'); ?></span>
			<p><?php esc_html_e('Price', 'shoppystore'); ?></p>
		</div>
			<ul class="minicart-content">
			<?php 
					foreach($woocommerce->cart->cart_contents as $cart_item_key => $cart_item): 
					$_product  = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
					$product_name = ( sw_woocommerce_version_check( '3.0' ) ) ? $_product->get_name() : $_product->get_title();
				?>
				<li>
					<a href="<?php echo get_permalink($cart_item['product_id']); ?>" class="product-image">
						<?php echo $_product->get_image( 'shop_thumbnail' ); ?>
					</a>				 
					<div class="detail-item">
					<div class="product-details"> 
						<?php echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf( '<a href="%s" class="btn-remove" title="%s"><span></span></a>', esc_url( $woocommerce->cart->get_remove_url( $cart_item_key ) ), __( 'Remove this item', 'shoppystore' ) ), $cart_item_key ); ?>           
						<a class="btn-edit" href="<?php echo wc_get_cart_url(); ?>" title="<?php esc_attr_e('View your shopping cart', 'shoppystore'); ?>"><span></span></a>    
						<p class="product-name">
										<a href="<?php echo get_permalink($cart_item['product_id']); ?>"><?php echo esc_html( $product_name ); ?></a>
						</p>
						<div class="qty-number"><span><?php esc_html_e('Quantity: ', 'shoppystore'); ?> </span><?php echo esc_html( $cart_item['quantity'] ); ?></div>
				  
					</div>
						
					<div class="product-details-bottom">
						 <span class="price"><?php echo $woocommerce->cart->get_product_subtotal($cart_item['data'], 1); ?></span>		        		        		    		
							
					</div>
					</div>
					
				</li>
			<?php
			endforeach;
			?>
			</ul>
			<div class="cart-checkout">
			    <div class="price-total">
				   <span class="label-price-total"><?php esc_html_e('Total:', 'shoppystore'); ?></span>
				   <span class="price-total-w"><span class="price"><?php echo $woocommerce->cart->get_cart_total(); ?></span></span>
				   
				</div>
				<div class="cart-link"><a href="<?php echo get_permalink(get_option('woocommerce_cart_page_id')); ?>" title="Cart"><?php esc_html_e('Go To Cart', 'shoppystore'); ?></a></div>
				<div class="checkout-link"><a href="<?php echo get_permalink(get_option('woocommerce_checkout_page_id')); ?>" title="Check Out"><?php esc_html_e('Check Out', 'shoppystore'); ?></a></div>
			</div>
		</div>
	</div>
	<?php } ?>
</div>