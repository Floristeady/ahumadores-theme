<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage ahumadores
 * @since ahumadores 1.0
 */
?><!DOCTYPE html>
<!--[if lt IE 7 ]><html <?php language_attributes(); ?> class="no-js ie ie6"><![endif]-->
<!--[if IE 7 ]><html <?php language_attributes(); ?> class="no-js ie ie7"><![endif]-->
<!--[if IE 8 ]><html <?php language_attributes(); ?> class="no-js ie ie8"><![endif]-->
<!--[if IE 9 ]><html <?php language_attributes(); ?> class="no-js ie ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html <?php language_attributes(); ?> ><!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
		
	<meta name="description" content="<?php echo '' . get_bloginfo ( 'description' );  ?>">
	<meta name="robots" content="index,follow">
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/normalize.css" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/foundation.min.css" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
	
	/* Always have wp_head() just before the closing </head>
	 */
	wp_head();
	?>
</head>
<body <?php body_class(); ?>>

<div id="wrapper" class="clearfix">
		
	<header id="header" role="banner">

		<div class="row inner-header">
			
			<?php global $ahumadores_options;
			$ahumadores_settings = get_option( 'ahumadores_options', $ahumadores_options); 
			?>
			
			<div class="inner-extras">
	        
		        <div class="header-text">
					<?php
						if ( is_active_sidebar( 'extra-widget-area' ) ) : ?>
						<ul class="widget-header widget">
							<?php dynamic_sidebar( 'extra-widget-area' ); ?>
						</ul>
					<?php endif; ?>
       			</div>
			
				<nav id="nav-2">
					<?php  wp_nav_menu( array( 'container' => false, 'theme_location' => 'secondary', 'sort_column' => 'menu_order' ) ); ?>
				</nav>
	         </div>

			
			<?php if( $ahumadores_settings['custom_logo'] ) : ?>
			<div id="logo"><a href="<?php echo bloginfo('url'); ?>" class="logo"><img src="<?php echo $ahumadores_settings['custom_logo']; ?>" alt="<?php bloginfo('name'); ?>" /> </a></div>
			<?php  else : ?>
			<h1><a href="<?php echo bloginfo('url'); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
			<?php endif; ?>
		  
			<h2><?php bloginfo( 'description' ); ?></h2>
			
			<a class="open_movil toggleMenu" href="javascript:void(0);"><span class="icon-menu">☰</span> <span>MENU</span></a>

			
			<div id="cart-preview" class="">
	           <a href="http://ahumadores.bootic.net/cart" class="data" title="Ir al carro de compras">
	           <span class="icon"></span>
	           <span class="text show-for-medium-up">Carro de Compras</span>
	           <span class="cart"><span class="count hide">0</span></span></a>
	        </div>
	        
	         	         
		</div>

		<div id="menu-main">
			
			<nav id="access" role="navigation" class="row">
				<a class="screen-reader-text skip-link" href="#content"><?php _e( 'Skip to content', 'ahumadores' ); ?></a>
				<?php wp_nav_menu( array( 'menu_class'=> 'columns large-offset-3 large-9 no-padding','container_class' => 'menu-main', 'theme_location' => 'primary' ) ); ?>
			</nav><!-- #access -->
		</div>

	</header>

	<div id="main" class="row" role="main">
	<?php include('inc/popup.php'); ?>
			