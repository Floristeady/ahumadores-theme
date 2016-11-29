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

		<div id="menu-main" class="landing">
			
			<nav id="access" role="navigation" class="row">
				<a class="screen-reader-text skip-link" href="#content"><?php _e( 'Skip to content', 'ahumadores' ); ?></a>
				<?php wp_nav_menu( array( 'menu_class'=> 'columns large-12 no-padding','container_class' => 'menu-main', 'theme_location' => 'landing' ) ); ?>
			</nav><!-- #access -->
		</div>

	</header>

	<div id="main" class="landing"role="main">
			