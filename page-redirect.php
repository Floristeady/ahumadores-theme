<?php
/**
 * Template Name: P&aacute;gina redirige a inicio
 * @package WordPress
 * @subpackage ahumadores
 * @since ahumadores 1.0
 */
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: ".get_bloginfo('url'));
	exit();
?>