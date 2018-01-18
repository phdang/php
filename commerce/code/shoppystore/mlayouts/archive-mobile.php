<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>
	<div class="body-wrapper theme-clearfix">
		<div class="body-wrapper-inner">
			<header id="header-page" class="header-page">
				<div class="header-shop clearfix">
					<div class="container">
						<div class="back-history"></div>		
							<h1 class="page-title"><?php ya_title(); ?></h1>				
						<?php if ( has_nav_menu('leftmenu') ) {?>
								<div class="vertical_megamenu vertical_megamenu_shop pull-right">
									<?php wp_nav_menu(array('theme_location' => 'leftmenu', 'menu_class' => 'nav vertical-megamenu')); ?>
								</div>
						<?php } ?>
					</div>
				</div>
			</header>
			<div class="container">
				<div class="category-contents <?php ya_content_blog(); ?>">
					<div class="row blog-content blog-content-grid">
						<?php 			
							while( have_posts() ) : the_post();
								get_template_part( 'mlayouts/content', 'grid' );
							endwhile;
						?>				
					</div>
						<?php get_template_part('mlayouts/pagination','mobile'); ?>
				</div>
			</div>
<?php get_template_part('footer'); ?>
