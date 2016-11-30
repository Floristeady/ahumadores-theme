<?php
/**
 * The Sidebar containing the blog widget areas.
 *
 * @package WordPress
 * @subpackage ahumadores
 * @since ahumadores 1.0
 */
?>
<aside id="aside" class="columns large-3 no-padding blog">
				
	<?php
	if ( is_active_sidebar( 'blog-widget-area' ) ) : ?>
	<ul class="widget-home widget">
		<?php dynamic_sidebar( 'blog-widget-area' ); ?>
	</ul>
	<?php endif; ?>

</aside>