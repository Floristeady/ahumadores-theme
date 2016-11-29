 <?php if ( has_post_thumbnail($postpage->ID)) {
	//Obtenemos la url de la imagen destacada
$domsxe = simplexml_load_string(get_the_post_thumbnail($postpage->ID, 'big'));
$thumbnailsrc = "";
if (!empty($domsxe))
	$thumbnailsrc = $domsxe->attributes()->src;
 
$url = $thumbnailsrc;
$image_title = get_post(get_post_thumbnail_id())->post_title;
$width = 244; $height = 185; $crop = true; $retina = false;																$image = matthewruddy_image_resize( $url, $width, $height, $crop, $retina );
if ( !is_wp_error( $image ) ) { ?>
<div class="img">
	<a href="<?php echo $permalink; ?>">
		<img title="<?php echo $image_title ?>" src="<?php echo $image['url'] ?>"/>
	</a>
</div>
<?php } } ?>