<?php
/**
 * @package WordPress
 * @subpackage ahumadores
 * @since ahumadores 1.0
 */

get_header(); ?>

<section id="content" class="site-content" role="main">	
		
	<?php include('inc/breadcrumbs-pages.php'); ?>
	
	<div class="columns medium-9">
	
	<?php
		// Start the Loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			get_template_part( 'content', 'page' );

		endwhile;
	?>
	
	</div>
	
	<?php get_sidebar(); ?>

</section>

<?php get_footer(); ?>