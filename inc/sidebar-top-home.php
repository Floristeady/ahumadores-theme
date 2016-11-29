<aside id="aside" class="top columns large-3 no-padding">
	<?php while ( have_posts() ) : the_post();?>
		<?php 
		 $rows = get_field('ads_home');
		 if($rows) { 
		 echo '<ul id="featured-ads" class="">';
		 foreach($rows as $row) { ?>
		 
		 	<li class="item">
		 		<?php if($row['link_ad']) { ?>		 	
				<a class="inner" href="<?php echo $row['link_ad'];?>" title="<?php  echo $row['text_ad'];?>">
				<?php } else { ?>
				<span class="inner">
				<?php } ?>
			 		<?php if($row['text_ad']) { ?>
					<h4><?php  echo $row['text_ad'];?> </h4>
					<?php } ?>
					
					<?php if($row['image_ad']) { ?>
					<img alt="<?php  echo $row['text_ad'];?>" src="<?php  echo $row['image_ad'];?>">
					<?php } ?>
				<?php if($row['link_ad']) { ?>	
				</a>
				<?php } else { ?>
				</span>
				<?php } ?>
			</li>
		 
		 <?php } 
		echo '</ul>';
		 } ?>
	<?php endwhile; ?>
	
	<?php include('newsletter.php'); ?>
</aside>