<?php
/**
 * Template Name: P&aacute;gina detalle tipos ahumadores
 * @package WordPress
 * @subpackage ahumadores
 * @since ahumadores 1.0
 */

get_header(); ?>

<section id="content" class="site-content page-custom" role="main">	
		
	<?php include('inc/breadcrumbs-pages.php'); ?>
	
	<div class="columns medium-9">
	
	<?php
		// Start the Loop.
		while ( have_posts() ) : the_post();?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php the_title( '<header class="entry-header"><h1 class="entry-title">', '</h1></header><!-- .entry-header -->' ); ?>
				
				<div id="link-products">
					
					<div class="inner">
						<?php if( get_field('title_product')) { ?>
						<div class="columns medium-3">
							<h6><?php the_field('title_product'); ?></h6>
						</div>
						<?php } ?>
						
						<?php if( get_field('texto_product')) { ?>
						<div class="columns medium-5">
							<p><?php the_field('texto_product'); ?></p>
						</div>
						<?php } ?>
						
						<?php if( get_field('link_url_product')) { ?>
						<div class="columns medium-4">
							<a title="<?php _e('Conocer Productos','ahumadores') ?>" class="more my-button" href="<?php the_field('link_url_product'); ?>"><?php _e('Comprar','ahumadores') ?></a>
						</div>
						<?php } ?>
					</div>
					
				</div>

				
				<?php if (has_excerpt()) : ?>
				<div class="entry-excerpt">
					<h2 class="excerpt"><?php the_excerpt(); ?></h2>
				</div>
				<?php endif; ?>	
					
				<div class="entry-content">
					<?php include('inc/get-thumbnail-page.php'); ?>
					<?php the_content(); ?>
					
				</div><!-- .entry-content -->	

				<?php 
				 $rows = get_field('info_extra_page'); 
				 if($rows) { 
				 echo '<ul class="extra-info">';
				 foreach($rows as $row) { ?>
					<li>
						<?php if($row['title_extra_page']) { ?>
							<h2 class="subtitle"><?php  echo $row['title_extra_page'];?> </h2>
						<?php } ?>
						
						<?php if($row['textfeatured_extra_page']) { ?>
							<h3 class="excerpt"><?php  echo $row['textfeatured_extra_page'];?> </h3>
						<?php } ?>
						
						<?php if($row['text_extra_page']) { ?>
							<div class="entry-content">
								<?php if($row['image_extra_page']) {
								$url = $row['image_extra_page'];
								$width = 330;$height = 280; $crop = true; $retina = false;
								$image = matthewruddy_image_resize( $url, $width, $height, $crop, $retina );
								if ( !is_wp_error( $image ) ) { 
								echo '<img class="second-thumb" alt="'.$row['title_slider'] .'" src="'. $image['url'] .'"/>';
								}}
			 					?>
		 					
			 					<?php echo $row['text_extra_page'];?> 
							</div>
						<?php } 
						
						} ?>
						
					</li>
				</ul>
				<?php } ?>
				
				
								
			</article>

	<?php 	endwhile; ?>
	
	</div>
	
	<?php get_sidebar(); ?>

</section>

<?php get_footer(); ?>