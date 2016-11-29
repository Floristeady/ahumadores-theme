<?php
/**
 * Template Name: P&aacute;gina landing
 * @package WordPress
 * @subpackage ahumadores
 * @since ahumadores 1.0
 */

get_header('landing'); ?>

<?php include('inc/popup-subcribe.php'); ?>

<section id="content" class="site-content" role="main">
	
	<div id="intro">
		
		<div class="row">
			
			<div class="text column small-9 no-pad">
				<?php if( get_field('intro_title')) { ?>
				<h1><?php the_field('intro_title'); ?></h1>
				<?php } ?>
				
				<?php if( get_field('intro_text')) { ?>
				<h2><?php the_field('intro_text'); ?></h2>
				<?php } ?>
				
			</div>
			
			<div class="text column small-3 no-pad">
				<img src="<?php echo get_template_directory_uri(); ?>/images/elements/logotipo.jpg" alt="Ahumadores">			
			</div>
			
			

		</div>
		
	</div>
	
	<div id="info">
		
		<div class="row">
			
			<div class="list column medium-6 no-pad">
				
				<?php if( get_field('list_details')) { ?>
				 <?php the_field('list_details'); ?>
				<?php } ?>
				<button href="#" data-reveal-id="box-modal" class="button-orange suscribe"> Suscríbete a Nuestro<span>Curso Online</span></button>
			</div>
				
			<div class="video column medium-6 no-pad">
				<?php if( get_field('details_video')) { ?>
				 <?php the_field('details_video'); ?>
				<?php } ?>
					<div class="text">
						<p>Es temporada de ahumados <span>#SmokeOn</span></p>
					</div>
			</div>
		
		</div>
	</div>
	
	
	<div id="list-benefits">
		
		<div class="row">
		   <?php $rows = get_field('list-benefits');  ?>
			<?php if($rows) { ?>
			<ul>
				<?php foreach($rows as $row) { ?>
				<li>
					<div class="column medium-5">
						<?php $attachment_id = $row['image_benefits'];
						echo wp_get_attachment_image( $attachment_id, 'thumb-landing'); ?>
					</div>
					<div class="column medium-7 no-pad">
						<?php echo $row['text_benefits'] ?>
					</div>
				</li>
				<?php } ?>
				
			</ul>
			<?php } ?>
		
		</div>
		
	</div>
	
	<div id="statement">
		<img src="<?php echo get_template_directory_uri(); ?>/images/elements/collage.jpg" alt="Ahumadores">
		
		<div class="row">
			<div class="text column medium-11 small-centered">
				<?php if( get_field('sentence')) { ?>
				<h3> <?php the_field('sentence'); ?></h3>
				<?php } ?>
			</div>
		</div>
		
	</div>
	
	<div id="argument">
		
		<div class="row">
			<div class="text">
				<?php if( get_field('argument')) { ?>
				<h4> <?php the_field('argument'); ?></h4>
				<?php } ?>
			</div>
		</div>
		
		<button href="#" data-reveal-id="box-modal" class="button-orange suscribe"> Suscríbete a Nuestro<span>Curso Online</span></button>
	</div>


</section><!-- #content -->

<?php get_footer('landing'); ?>