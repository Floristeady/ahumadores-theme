<?php
/**
 * Template Name: P&aacute;gina listado tres niveles
 * @package WordPress
 * @subpackage ahumadores
 * @since ahumadores 1.0
 */

get_header(); ?>

<section id="content" class="site-content page-list" role="main">	
		
	<?php include('inc/breadcrumbs-pages.php'); ?>
	
	<div class="columns medium-9">
	
	<?php
			// Start the Loop.
			while ( have_posts() ) : the_post();?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
					<div class="top-text">
						<?php the_title( '<header class="entry-header"><h1 class="entry-title">', '</h1></header><!-- .entry-header -->' ); ?>
						
						<?php if (has_excerpt()) : ?>
						<div class="entry-excerpt">
							<?php the_excerpt(); ?>
						</div>
						<?php endif; ?>	
					
						<div class="entry-content">
							<?php the_content(); ?>
						</div><!-- .entry-content -->
						
					</div> 
						
					<?php $args = array(
			        'child_of' => $post->ID, 
			        'parent' => $post->ID,
			        'hierarchical' => 0,
			        'sort_column' => 'menu_order',
			        'sort_order' => 'ASC'
			        );
					          
					$mypages = get_pages( $args );?>
					<ul id="list-content">
					
					<?php foreach( $mypages as $postpage ) {
					$content = apply_filters('the_content', $postpage->post_content);
					$childtitle = $postpage->post_title;
					$childexcerpt= $postpage->post_excerpt;
					$childid = $postpage->ID;
					$permalink = get_permalink( $childid );
					$childslug = $postpage->post_name;  
					
					?>
					
					 <li> 
						<div class="center-text">
					 		<h2 class="archive-title"><a href="<?php echo $permalink; ?>"><?php echo $childtitle; ?></a></h2>	
					 		<?php if($childexcerpt != '') { ?>
								<p><?php echo wp_trim_words( $childexcerpt, 100 ); ?></p>
							<?php } else { ?>
								<p><?php echo wp_trim_words( $content, 100 ); ?></p> 
							<?php } ?>

						</div>
						
						<ul class="articles small-block-grid-2 medium-block-grid-3">
						<!--child-->
						<?php $args = array(
				        'child_of' => $childid, 
				        'parent' => $childid,
				        'hierarchical' => 0,
				        'sort_column' => 'menu_order',
				        'sort_order' => 'ASC'
				        );
						$mypageschild = get_pages( $args );?>

						<?php foreach( $mypageschild as $postpage ) {
						$subcontent = apply_filters('the_content', $postpage->post_content);
						$childtitle = $postpage->post_title;
						$subchildexcerpt= $postpage->post_excerpt;
						$childid = $postpage->ID;
						$permalink = get_permalink( $childid );
						$childslug = $postpage->post_name;  
						
						?>
							<li class="scale">
								<?php include('inc/get-thumbnail.php'); ?>
					 			
					 			<div class="bottom-text">
					 			<h1 class="entry-title list-title"><a href="<?php echo $permalink; ?>"><?php echo $childtitle; ?></a></h1>	
					 			<?php if($subchildexcerpt != '') : ?>
					 				<div class="entry-content list-content">
										<p><?php echo wp_trim_words( $subchildexcerpt, 25 ); ?></p>
					 				</div>
								<?php else : ?>
									<div class="entry-content list-content">
										<p><?php echo wp_trim_words( $subcontent, 25 ); ?></p> 
									</div>
								<?php endif; //has excerpt?>
								
								<a title="<?php _e('Ir a la Receta', 'ahumadores');?>" href="<?php echo $permalink ?>" class="more-small"><?php _e('Leer más', 'ahumadores');?>  ></a>
								
					 			</div>
				 			
							</li>
				 		<!--/child-->
						
				 		<?php  }  ?>
				 		</ul>
				 	</li>
					<?php  }  ?>
				</ul>
				
			</article><!-- #post-## -->
			<?php edit_post_link( __( 'Edit', 'ahumadores' ), '<span class="edit-link">', '</span>' );?>

		<?php endwhile; ?>
	
	</div>
	
	<?php get_sidebar(); ?>

</section>

<?php get_footer(); ?>