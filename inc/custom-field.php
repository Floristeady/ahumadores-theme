<div id="extra_info">
	<div class="inner">
		<?php if( get_field('autor')) { ?>
			<p><em><?php _e('Autor: ', 'ahumadores'); echo '</em>'; the_field('autor'); ?></p>
		<?php } ?>
		
		<?php if( get_field('origen')) { ?>
			<p><em><?php _e('Origen: ', 'ahumadores'); echo '</em>'; the_field('origen'); ?></p>
		<?php } ?>
		
		<?php if( get_field('tiempo_de_ahumado')) { ?>
			<p><em><?php _e('Tiempo de Ahumado: ', 'ahumadores'); echo '</em>'; the_field('tiempo_de_ahumado'); ?></p>
		<?php } ?>
		
		<?php if( get_field('autor')) { ?>
			<p><em><?php _e('Maderas Recomendadas: ', 'ahumadores'); echo '</em>'; the_field('maderas_recomendadas'); ?></p>
		<?php } ?>
	</div>

</div>