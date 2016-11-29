	<?php $args = array(
	'post_type'	=> array( 'post'),
	'posts_per_page' => 2,
	'meta_query' => array(
		array( 'key' => 'destacar_pagina', 'value' => '1')
	) );

	$featured_page = new WP_Query( $args ); ?>
		
	<?php if ( $featured_page->have_posts() ) { ?>
	<div id="featured-recipes">
		<h3 class="title-cursive">Conoce Nuestras Recetas</h3>
		
		<ul class="small-block-grid-1 medium-block-grid-2">
		<?php while ( $featured_page->have_posts() ) : $featured_page->the_post(); ?>
	
			<li>
				<a class="img" title="<?php the_title(); ?>" href="<?php the_permalink();?>">
				
				<?php if( get_field('video_recetas')) { 
					the_field('video_recetas'); ?>
				<?php } else  { ?>
					<?php if ( has_post_thumbnail()) {
					 	//Obtenemos la url de la imagen destacada
						$domsxe = simplexml_load_string(get_the_post_thumbnail($post->ID, 'big'));
						$thumbnailsrc = "";
						if (!empty($domsxe))
							$thumbnailsrc = $domsxe->attributes()->src;
					 
					$url = $thumbnailsrc;
					$image_title = get_post(get_post_thumbnail_id())->post_title;
					$width = 360; $height = 220; $crop = true; $retina = false;															$image = matthewruddy_image_resize( $url, $width, $height, $crop, $retina );
					echo '<img alt="'. $image_title .'" src="'. $image['url'] .'"/>';
					} ?>
				
				<?php } ?>	
				</a>
				<div class="text">
					<h2><a title="<?php the_title(); ?>" href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
					<?php if (has_excerpt()) : 
							$excerpt = $post->post_excerpt; ?>
							<p><?php echo wp_trim_words( $excerpt, 40 ); ?></p>
					<?php else : 		    
							$content = $post->post_content; ?>
							<p><?php echo wp_trim_words( $content, 40 ); ?></p> 
			
					<?php endif; //has excerpt?>
					<a title="<?php _e('Ir a la Receta', 'ahumadores');?>" href="<?php the_permalink();?>" class="more-small"><?php _e('Ir a la Receta', 'ahumadores');?>  ></a>
				</div>
				
			</li>
		<?php endwhile; } ?>
		<?php wp_reset_query(); ?>
		</ul>
	</div>
