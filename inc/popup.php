<a href="#" data-reveal-id="box-popup" class="modal btn_popup open_modal hide">click</a>

<?php $args = array(
		'post_type'	=> array('page'),
		'posts_per_page' => 1,
		'meta_query' => array(
			array( 'key' => 'show_popup', 'value' => '1')
		) );
	$featured_page = new WP_Query( $args ); ?>
	
<?php if($featured_page->have_posts()) : while($featured_page->have_posts()) : $featured_page->the_post(); ?>
<?php if( get_field('without_popup')) { ?><span id="cookiesdays" class="hide"><?php the_field('without_popup'); ?></span><?php } ?>
		
<div id="box-popup" class="reveal-modal small" data-reveal>
		<a href="#" class="close-reveal-modal">x</a>
		<div id="top-page">

			<div class="row text">
				<?php  if (has_excerpt()) : ?>
				<div class="entry-excerpt">
					<?php the_excerpt(); ?>
				</div>
				<?php endif; ?>
			</div>
			
		</div>
		
		<div class="entry-content row">
		<?php the_content(); ?>
	</div><!-- .entry-content -->
</div>

<?php endwhile; endif; ?>
<?php wp_reset_query(); ?>