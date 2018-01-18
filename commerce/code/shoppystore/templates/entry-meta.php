<div class="meta-inner">
	<?php $category = get_the_category();?>
	<ul>
		<li class="single-author"><?php esc_html_e('Author', 'shoppystore'); ?>: <?php the_author_posts_link(); ?></li>
		<li class="single-publish"><?php esc_html_e('Published', 'shoppystore'); ?>: <?php echo date( 'd F Y',strtotime($post->post_date)); ?></li> 
		<li class="single-category"><?php esc_html_e('Category', 'shoppystore'); ?>: <?php foreach($category as $cat){ echo '<a href="'.get_category_link( $cat->term_id ).'">'.esc_html($cat->name).'</a>'; }?></li>
	</ul>
</div>