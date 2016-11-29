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

<section id="content" class="site-content" role="main">
	
	<?php include('inc/breadcrumbs.php'); ?>
	
	<div class="columns medium-9 no-padding-left">
	
		<?php
			
		$allcats = get_categories(); 
		foreach ($allcats as $cat) :
		$cat_id= $cat->term_id;
		$archive_month = get_the_time('m');
		
		
		query_posts("cat=$cat_id&posts_per_page=12&monthnum=$archive_month");
		if ( have_posts() ) : ?>
		
		<header class="page-header">
				<h1 class="the-title">
					<?php
						if ( is_day() ) :
							printf( __( 'Daily Archives: %s', 'ahumadores' ), get_the_date() );

						elseif ( is_month() ) :
							printf( __( 'Monthly Archives: %s', 'ahumadores' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'simplesteady' ) ) );

						elseif ( is_year() ) :
							printf( __( 'Yearly Archives: %s', 'ahumadores' ), get_the_date( _x( 'Y', 'yearly archives date format', 'simplesteady' ) ) );

						else :
							_e( 'Archives', 'simplesteady' );

						endif;
					?>
				</h1>
			</header><!-- .page-header -->
		
		<?php echo '<div class="'.$cat->slug.'">';  ?>
		<h2 class="archive-title">
			<?php $link = get_category_link( get_cat_ID( single_cat_title('',false) ) ); ?>
			<a href="<?php echo $link; ?>" title="<?php single_cat_title('') ?>"><?php single_cat_title() ?></a>
		</h2>
		
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
			echo '</ul></div>';
				// Previous/next page navigation.
				ahumadores_paging_nav();

			else :
				// If no content, include the "No posts found" template.
				get_template_part( 'content', 'none' );
			
		endif;
		
		wp_reset_query();
		endforeach; 
		?>
		
	</div>
	
	<?php get_sidebar(); ?>
	
</section>

<?php get_footer(); ?>