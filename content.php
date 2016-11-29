<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage ahumadores
 * @since ahumadores 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php  if ( !is_single() ) :  
		 
		$link = get_permalink();
		$title = get_the_title();
		if( get_field('video_recetas')) { ?>
			<span class="video"> <?php the_field('video_recetas'); ?> </span>
	    <?php } else  { 
			if ( has_post_thumbnail()) {
			 	//Obtenemos la url de la imagen destacada
				$domsxe = simplexml_load_string(get_the_post_thumbnail($post->ID, 'big'));
				$thumbnailsrc = "";
				if (!empty($domsxe))
					$thumbnailsrc = $domsxe->attributes()->src;
			 
			$url = $thumbnailsrc;
			$image_title = get_post(get_post_thumbnail_id())->post_title;
			$width = 242; $height = 184; $crop = true; $retina = false;														$image = matthewruddy_image_resize( $url, $width, $height, $crop, $retina );
			echo '<a class="img" title="'. $title .'" href="'.  $link .'"><img alt="'. $image_title .'" src="'. $image['url'] .'"/></a>';
			} 
		}		
	endif; ?>

	<header class="entry-header">
		<?php  if ( !is_category() && !is_single() ) :  
		 	 the_category(); 
		 endif; ?>
		
		<?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) && ahumadores_categorized_blog() ) : ?>
		<div class="entry-meta <?php if ( !is_single() ) { echo 'list-meta'; } ?>">
			<span class="cat-links"><?php echo get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'ahumadores' ) ); ?></span>
		</div>
		<?php
			endif;

			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h1 class="entry-title list-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
			endif;
		?>

		<?php if ( is_single() ) : ?>
		<div class="entry-meta <?php if ( !is_single() ) { echo 'list-meta'; } ?>">
			<?php
				if ( 'post' == get_post_type() )
					ahumadores_posted_on();

				if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) :
			?>
			
				<?php if ( is_single() ) : ?>
						<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'ahumadores' ), __( '1 Comment', 'ahumadores' ), __( '% Comments', 'ahumadores' ) ); ?></span>
				<?php endif; ?>
			
			<?php
		    endif;

				edit_post_link( __( 'Edit', 'ahumadores' ), '<span class="edit-link">', '</span>' );
			?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	
	<?php else : ?>
	<?php  if ( is_single() ) :  
	    if (has_excerpt()) : ?>
		<div class="entry-excerpt">
			<h2><?php the_excerpt(); ?></h2>
		</div>
		<?php endif; ?>
		<?php ahumadores_post_thumbnail(); ?>
	<?php endif; ?>
	
	<?php //nclude('inc/social-sharing.php'); ?>	
	
	<div class="entry-content <?php if ( !is_single() ) { echo 'list-content'; } ?>">
		
		<?php 
			
		if ( is_single() ) : 
			
			include('inc/custom-field.php');
			
		    the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'ahumadores' ) );
		    
		   if( get_field('video_recetas')) { 
				the_field('video_recetas'); 
			}  
			 
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'ahumadores' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );
			
		else : 
			if (has_excerpt()) : 
				$excerpt = $post->post_excerpt; ?>
				<p><?php echo wp_trim_words( $excerpt, 20 ); ?></p>
			<?php else : 		    
				$content = $post->post_content; ?>
				<p><?php echo wp_trim_words( $content, 20 ); ?></p> 
				
				

		<?php endif; //has excerpt?>
			
			<a title="<?php _e('Ir a la Receta', 'ahumadores');?>" href="<?php the_permalink();?>" class="more-small"><?php _e('Leer más', 'ahumadores');?>  ></a>
		
	   <?php endif; //is single ?>
		
	</div><!-- .entry-content -->
	<?php endif; ?>
	
	<?php if ( is_single() ) : ?>
		<?php the_tags( '<footer class="entry-meta"><span class="tag-links">', '', '</span></footer>' ); ?>
	<?php endif; //is single ?>
	
</article><!-- #post-## -->