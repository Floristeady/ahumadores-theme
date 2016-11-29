<?php
/**
 * The Sidebar containing the primary and secondary widget areas.
 *
 * @package WordPress
 * @subpackage ahumadores
 * @since ahumadores 1.0
 */
?>
<aside id="aside" class="columns large-3 no-padding">
				
	<?php
	if ( is_active_sidebar( 'third-widget-area' ) ) : ?>
	<ul class="widget-home widget">
		<?php dynamic_sidebar( 'third-widget-area' ); ?>
	</ul>
	<?php endif; ?>

</aside>