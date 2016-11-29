<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage ahumadores
 * @since ahumadores 1.0
 */
?>
	
		</div><!-- #main -->
		
	</div><!-- #wrapper -->
	
	<footer id="footer" class="site-footer landing" role="contentinfo">
		<div class="row">
			
		<div class="columns medium-6 small-centered">
			<div class="logo">
				<img src="<?php echo get_template_directory_uri(); ?>/images/elements/logo_ahumadores.png" alt="Ahumadores">
			</div>
		<?php if ( is_active_sidebar( 'first-footer-widget-area' ) ) : ?>
			<ul class="widget-list widget-footer">
				<?php dynamic_sidebar( 'landing-footer-widget-area' ); ?>
			</ul>
		<?php endif; ?>
		</div>
		
		</div>
		<div class="credit">
			<div class="row">
				<div class="column medium-12 small-centered">
					<p>© 2016 Ahumadores© </p>
				</div>
			</div>
		</div>
	</footer><!-- footer -->
	
	
	
	<?php wp_footer(); ?>
	<script src="https://du8eo9nh88b2j.cloudfront.net/libs/0.0.2/search_widget.min.js" type="text/javascript"></script>
	
	</body>
</html>