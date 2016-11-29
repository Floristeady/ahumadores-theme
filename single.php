<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage ahumadores
 * @since ahumadores 1.0
 */

get_header(); ?>

<section id="content" class="site-content" role="main">

	<?php include('inc/breadcrumbs.php'); ?>
	
	<div class="columns medium-9">

	<?php
	// Start the Loop.
	while ( have_posts() ) : the_post();

		/*
		 * Include the post format-specific template for the content. If you want to
		 * use this in a child theme, then include a file called called content-___.php
		 * (where ___ is the post format) and that will be used instead.
		 */
		get_template_part( 'content', get_post_format() );

		// Previous/next post navigation.
		ahumadores_post_nav();

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}
	endwhile; ?>
	
	</div>
	
	<?php get_sidebar(); ?>

</section>

<?php get_footer(); ?>
