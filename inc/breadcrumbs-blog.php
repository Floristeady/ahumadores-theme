<nav id="breadcrumbs">
		
		<p><a href="/"> <?php _e('Inicio', 'ahumadores') ?></a> 
		<span class="separator">/</span> 
		<a href="<?php echo get_post_type_archive_link( 'blog' ); ?>"> <?php _e('Blog', 'ahumadores') ?></a>

		 <?php
		 if (is_single()) {
            echo '</span><span class="separator"> / </span><span class="current">';
            the_title();
            echo '</span>';
        }  ?>
        </p>
</nav>