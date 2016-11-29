<?php
/**
 * Template Name: P&aacute;gina de inicio
 * @package WordPress
 * @subpackage ahumadores
 * @since ahumadores 1.0
 */

get_header(); ?>

<section id="content" class="site-content" role="main">
	
	
	<div class="columns large-9 no-padding-left">
		
		<?php  $rows = get_field('carousel_main');  ?>
						
		<?php if($rows) { ?>
		<div id="homeslider" class="flexslider">
		
			<?php echo '<ul class="slides">';
			 
				foreach($rows as $row) { ?>

		 		<li>

		 			<?php if($row['link_slider']) {?>
		 			<a href="<?php echo $row['link_slider'] ?>" title="<?php echo $row['title_slider'] ?>"> 
		 				<?php 
							$url = $row['image_slider'];
							$width = 780;$height = 480; $crop = true; $retina = false;
							$image = matthewruddy_image_resize( $url, $width, $height, $crop, $retina );
							if ( !is_wp_error( $image ) ) { 
							echo '<img alt="'.$row['title_slider'] .'" src="'. $image['url'] .'"/>';
							}
		 				?>
		 			</a> 
		 			<?php } else  { ?>
		 			  <?php 
							$url = $row['image_slider'];
							$width = 780;$height = 480; $crop = true; $retina = false;
							$image = matthewruddy_image_resize( $url, $width, $height, $crop, $retina );
							if ( !is_wp_error( $image ) ) { 
							echo '<img alt="'.$row['title_slider'] .'" src="'. $image['url'] .'"/>';
							}
		 				?>
		 			<?php } ?>
		 			
		 			<?php if($row['title_slider']) {?>
		 			<div class="text">
			 			<?php if($row['link_slider']) {?>
		 		    	<h1><a title="<?php echo $row['title_slider'] ?>" href="<?php echo $row['link_slider'] ?>"><?php echo $row['title_slider'] ?></a></h1>
		 		    	<?php } else  { ?>
		 		    	<h1><?php echo $row['title_slider'] ?></h1>
		 		    	<?php } ?>
		 		    	<p><?php echo $row['text_slider'] ?></p>
		 		    	<?php if($row['text_button_slider'] && $row['link_slider']) {?>
		 			<a class="more my-button" title="Saber más" href="<?php echo $row['link_slider'] ?>"><?php echo $row['text_button_slider'] ?></a>
		 			<?php } ?>
		 			</div>
		 			<?php } ?>
		 		</li>

			<?php } echo '</ul>';  ?>
				
		</div>	
		<?php } ?>
				
	</div><!--columns-9-->
	
	<?php include('inc/sidebar-top-home.php'); ?>
	
	<div class="columns large-9 no-padding-left">
		<?php include('inc/featured-products.php'); ?>
		<?php include('inc/featured-recipes.php'); ?>
	</div>
	
	<?php get_sidebar('home'); ?>

</section><!-- #content -->

<?php get_footer(); ?>