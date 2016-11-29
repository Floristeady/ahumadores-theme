<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage ahumadores
 * @since ahumadores 1.0
 */

get_header(); ?>

<section id="content" class="site-content" role="main">
	
	<?php include('inc/breadcrumbs.php'); ?>

	<div class="columns medium-9 no-padding-left">
		<?php if ( have_posts() ) : ?>
	
		<header class="page-header">
			<h1 class="the-title"><?php printf( __( 'Search Results for: %s', 'ahumadores' ), get_search_query() ); ?></h1>
		</header><!-- .page-header -->
		
			<ul class="articles small-block-grid-2 medium-block-grid-3">
			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();
				echo '<li>';
					/*
					 * Include the post format-specific template for the content. If you want to
					 * use this in a child theme, then include a file called called content-___.php
					 * (where ___ is the post format) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				echo '</li>';
				endwhile;
				echo '</ul>';
				
				// Previous/next post navigation.
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
