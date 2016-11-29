<div id="breadcrumbs">
		<p><a href="/"> <?php _e('Home', 'ahumadores') ?></a> 
		<span class="separator"> / </span> 
		<?php if (is_page()) { ?>
			<?php if($post->post_parent) {
					$parent_title = get_the_title($post->post_parent);
					$parent_link = get_the_permalink($post->post_parent);
					echo '<a href="'. $parent_link .'">'.$parent_title.'</a><span class="separator"> / </a>';
			} ?> 
			<span class="current"><?php the_title(); ?></span>
		
		<?php } elseif (is_category() || is_single()) { ?>
			<a href="<?php echo get_permalink( get_page_by_path( 'recetas' ) ) ?>"> <?php _e('Recetas', 'ahumadores') ?></a><span class="separator"> / </span>
			<?php  echo '<span class="cat">';
			the_category('</span><span class="separator"> / </span><span class="current">');
            if (is_single()) {
                echo '</span><span class="separator"> / </span><span class="current">';
                the_title();
                echo '</span>';
            }  ?>
		<?php } elseif (is_home()) { 
			echo"<span class='current'>"; echo'Recetas </span>';
		 } elseif (is_tag()) { 
			echo"<span class='current'>"; printf( __( 'Tag Archives: %s', 'ahumadores' ), single_tag_title( '', false ) ); echo'</span>';
		 } elseif (is_month()) {?>
		 	<a href="<?php echo get_permalink( get_page_by_path( 'blog' ) ) ?>"> <?php _e('Recetas', 'ahumadores') ?></a><span class="separator"> / </span>
			<?php printf( __( 'Monthly Archives: %s', 'ahumadores' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'ahumadores' ) ) );
		}	elseif ( is_day() ) {?>
		 	<a href="<?php echo get_permalink( get_page_by_path( 'blog' ) ) ?>"> <?php _e('Recetas', 'ahumadores') ?></a><span class="separator"> / </span>
			<?php
			printf( __( 'Daily Archives: %s', 'ahumadores' ), get_the_date() );
		 } elseif (is_author()) { 
			echo"<span class='current'>"; printf( __( 'All posts by %s', 'ahumadores' ), get_the_author() );  				echo'</span>';
		 } elseif (is_search()) { 
			echo"<span class='current'>"; printf( __( 'Search Results for: %s', 'ahumadores' ), get_search_query() ); echo '</span>';
		 } else { ?>
		
		<?php  } ?>
		</p>
</div>