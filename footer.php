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
	
	<footer id="footer" class="site-footer" role="contentinfo">
		<div class="row">
			
		<?php get_sidebar( 'footer' ); ?>
		
		</div>
	</footer><!-- footer -->
	
	
	
	<?php wp_footer(); ?>
	<script src="https://du8eo9nh88b2j.cloudfront.net/libs/0.0.2/search_widget.min.js" type="text/javascript"></script>
	
	</body>
</html>