<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage ahumadores
 * @since ahumadores 1.0
 */

get_header(); ?>

<section id="content" class="site-content post-blog" role="main">

	<?php include('inc/breadcrumbs-blog.php'); ?>
	
	<div class="columns medium-9 no-pad">

	<?php
	while ( have_posts() ) : the_post();
		get_template_part( 'content-blog');

		ahumadores_post_nav();

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}
	endwhile; ?>
	
	</div>
	
	<?php get_sidebar('blog'); ?>

</section>

<?php get_footer(); ?>
