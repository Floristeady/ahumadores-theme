<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage ahumadores
 * @since ahumadores 1.0
 */

get_header(); ?>
<section id="content" class="site-content section-blog" role="main">
	
	<?php include('inc/breadcrumbs.php'); ?>
	
	<div class="columns medium-9 no-padding-left">

	<?php if ( have_posts() ) : ?>

		<header class="archive-header">
			<h1 class="archive-title"><?php printf( __( '%s', 'ahumadores' ), single_cat_title( '', false ) ); ?></h1>
			<?php
				// Show an optional term description.
				$term_description = term_description();
				if ( ! empty( $term_description ) ) :
					printf( '<div class="taxonomy-description">%s</div>', $term_description );
				endif;
			?>
		</header><!-- .archive-header -->
	
		<ul class="articles small-block-grid-1 medium-block-grid-2">
		<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();
				echo '<li>';
				get_template_part( 'content-blog' );
				echo '</li>';
				endwhile;
			echo '</ul>';
				// Previous/next page navigation.
				ahumadores_paging_nav();
				
			else :
				// If no content, include the "No posts found" template.
				get_template_part( 'content', 'none' );
				
			endif;
		?>
	
	</div>
	
	<?php get_sidebar(); ?>
	
</section>


<?php get_footer(); ?>