<?php
/**
 * The Footer widget areas.
 *
 * @package WordPress
 * @subpackage ahumadores
 * @since ahumadores 1.0
 */
?>

<?php
	/* The footer widget area is triggered if any of the areas
	 * have widgets. So let's check that first.
	 *
	 * If none of the sidebars have widgets, then let's bail early.
	 */
	if (   ! is_active_sidebar( 'first-footer-widget-area'  )
		&& ! is_active_sidebar( 'second-footer-widget-area' )
		&& ! is_active_sidebar( 'third-footer-widget-area' )
	)
		return;
	// If we get this far, we have widgets. Let's do this.
?>

<div class="columns medium-6">
<?php if ( is_active_sidebar( 'first-footer-widget-area' ) ) : ?>
	<ul class="widget-list widget-footer">
		<?php dynamic_sidebar( 'first-footer-widget-area' ); ?>
	</ul>
<?php endif; ?>
</div>

<div class="columns medium-3">
<?php if ( is_active_sidebar( 'second-footer-widget-area' ) ) : ?>
	<ul class="widget-list widget-footer">
		<?php dynamic_sidebar( 'second-footer-widget-area' ); ?>
	</ul>
<?php endif; ?>
</div>

<div class="columns medium-3">
<?php if ( is_active_sidebar( 'third-footer-widget-area' ) ) : ?>
	<ul class="widget-list widget-footer">
		<?php dynamic_sidebar( 'third-footer-widget-area' ); ?>
	</ul>
<?php endif; ?>
</div>



