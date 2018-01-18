<?php while (have_posts()) : the_post(); ?>
<div <?php post_class(); ?>>
	<?php $pfm = get_post_format();?>
	<div class="entry-wrap">
		<?php if( $pfm == '' || $pfm == 'image' ){?>
			<?php if( has_post_thumbnail() ){ ?>
				<div class="entry-thumb single-thumb">
						<?php the_post_thumbnail('ya_blog_mobile');?>						
				</div>
			<?php }?>
		<?php } ?>
		<h1 class="entry-title clearfix"><?php the_title(); ?></h1>
		<div class="entry-content clearfix">
			<div class="entry-meta clearfix">
				<span class="entry-author">
					<i class="fa fa-user"></i><?php esc_html_e('Post By:', 'shoppystore'); ?> <?php the_author_posts_link(); ?>
				</span>
				<div class="entry-comment">
					<a href="<?php comments_link(); ?>">
						<i class="fa fa-comments-o"></i>
						<?php echo $post->comment_count . ( ( $post->comment_count > 1 ) ? esc_html__(' Comments ', 'shoppystore') : esc_html__(' Comment ', 'shoppystore') ); ?>
					</a>
				</div>
			</div>
			<div class="entry-summary single-content ">
				<?php 												
				if ( preg_match('/<!--more(.*?)?-->/', $post->post_content, $matches) ) {
					$content = explode($matches[0], $post->post_content, 2);
					$content = $content[0];
					$content = wp_trim_words($post->post_content, 38, '...');
					echo $content;	
				} else {
					the_content('...');
				}		
			?>	
				
				<div class="clear"></div>
				<!-- link page -->
				<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'shoppystore' ).'</span>', 'after' => '</div>' , 'link_before' => '<span>', 'link_after'  => '</span>' ) ); ?>	
			</div>
			
			<div class="clear"></div>			
			<div class="single-content-bottom clearfix">
				<!-- Social -->
				<div class="social-share">
					<div class="title-share"><?php esc_html_e( 'Share','shoppystore' ) ?></div>
					<div class="wrap-content">
						<a href="http://www.facebook.com/share.php?u=<?php echo get_permalink( $post->ID ); ?>&title=<?php echo get_the_title( $post->ID ); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fa fa-facebook"></i></a>
							<a href="http://twitter.com/home?status=<?php echo get_the_title( $post->ID ); ?>+<?php echo get_permalink( $post->ID ); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fa fa-twitter"></i></a>
							<a href="https://plus.google.com/share?url=<?php echo get_permalink( $post->ID ); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fa fa-google-plus"></i></a>
							<a href="#"><i class="fa fa-dribbble"></i></a>
							<a href="#"><i class="fa fa-instagram"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="clearfix"></div> 
	<?php if( get_the_author_meta( 'description',  $post->post_author ) != '' ): ?>
	<div id="authorDetails" class="clearfix">
		<div class="authorDetail">
			<div class="avatar">
				<?php echo get_avatar( $post->post_author , 100 ); ?>
			</div>
			<div class="infomation">
				<h4 class="name-author"><span><?php echo get_the_author_meta( 'user_nicename', $post->post_author )?></span></h4>
				<span class="email"><?php echo get_the_author_meta( 'user_email', $post->post_author )?></span>
			</div>	
		</div>
	</div> 
	<?php endif; ?>
	<div class="clearfix"></div>
	<!-- Relate Post -->
  <?php 
		global $post;
		global $related_term;
		$class_col= "";
		$categories = get_the_category($post->ID);								
		$category_ids = array();
		foreach($categories as $individual_category) {$category_ids[] = $individual_category->term_id;}
		if ($categories) {
				$related = array(
					'category__in' => $category_ids,
					'post__not_in' => array($post->ID),
					'showposts'=>3,
					'orderby'	=> 'name',	
					'ignore_sticky_posts'=>1
				   );
	?>
			<div class="single-post-relate-mobile">
				<h4><?php esc_html_e('Related News', 'shoppystore'); ?></h4>
				<?php
					$related_term = new WP_Query($related);
					while($related_term -> have_posts()):$related_term -> the_post();
						$format = get_post_format();
				?>
					<div <?php post_class( $class_col ); ?> >
						<?php if ( get_the_post_thumbnail() ) { ?>
						<div class="item-relate-img">
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('ya_related_mobile'); ?></a>
						</div>
						<?php } ?>

						<div class="item-relate-content">
							<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
							<div class="entry-meta">
								<span class="entry-author">
									<i class="fa fa-user"></i><?php esc_html_e('Post By:', 'shoppystore'); ?> <?php the_author_posts_link(); ?>
								</span>
								<div class="entry-comment">
									<a href="<?php comments_link(); ?>">
										<i class="fa fa-comments-o"></i>
										<?php echo $post->comment_count . ( ( $post->comment_count > 1 ) ? esc_html__(' Comments ', 'shoppystore') : esc_html__(' Comment ', 'shoppystore') ); ?>
									</a>
								</div>
							</div>
						</div>
					</div>
					<?php
						endwhile;
						wp_reset_postdata();
					?>
			</div>
	  	<?php } ?>
		
		<div class="clearfix"></div>
		<!-- Comment Form -->
    <?php comments_template('/templates/comments.php'); ?>
</div>
<?php endwhile; ?>
