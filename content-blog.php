<?php
/**
 * The template for displaying content blog
 *
 * Used for both single and index/archive
 *
 * @package WordPress
 * @subpackage ahumadores
 * @since ahumadores 1.0
 */
?>
<?php if ( is_single() ) : ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<header class="entry-header">
		
			<?php
				the_title( '<h1 class="entry-title">', '</h1>' );
			?>
			
			<div class="entry-meta <?php if ( !is_single() ) { echo 'list-meta'; } ?>">
			<?php
				ahumadores_posted_on();

				if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) :
			?>
			
				<?php if ( is_single() ) : ?>
						<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'ahumadores' ), __( '1 Comment', 'ahumadores' ), __( '% Comments', 'ahumadores' ) ); ?></span>
						<?php edit_post_link( __( 'Edit', 'ahumadores' ), '<span class="edit-link">', '</span>' ); ?>
				<?php endif; ?>
<?php endif; ?>
			</div>
			
			<div class="entry-excerpt">
			<?php  if ( has_excerpt() ) :  
				$excerpt = $post->post_excerpt; ?>
				<h2><?php echo wp_trim_words( $excerpt ); ?></h2>
			<?php else : 	    
				$content = $post->post_content; ?>
				<h2><?php echo wp_trim_words( $content, 25 ); ?></h2> 
			<?php endif; ?>
			</div>
		
	</header>


			<div class="entry-content">
				<?php
					the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'ahumadores' ) );
				?>
		
			</div><!-- .entry-content -->

			<?php the_tags( '<footer class="entry-meta"><span class="tag-links">', '', '</span></footer>' ); ?>
	
	
</article>

<?php else : ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
				
		<?php if (has_post_thumbnail()) :
			
	 		ahumadores_post_thumbnail();  
	 	
	 	endif; ?>
		
		<?php 
			the_title( '<div class="entry-title"><h3><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3></div>' );
		?>

	</header>
	
	<div class="entry-content">
		
		<div class="entry-excerpt">
		<?php  if ( has_excerpt() ) :  
			$excerpt = $post->post_excerpt; ?>
			<p><?php echo wp_trim_words( $excerpt ); ?></p>
		<?php else : 	    
			$content = $post->post_content; ?>
			<p><?php echo wp_trim_words( $content, 30 ); ?></p> 
		<?php endif; ?>
		</div>
		

	</div><!-- .entry-content -->

	
	<a class="post-link" href="<?php the_permalink(); ?>"><?php _e('Leer más...', 'ahumadores')?></a>

</article>

<?php endif; ?>
