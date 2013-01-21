<div class="filter-bars">
				
	<!-- project filtering links -->
	
	<div id="filters" class="filter option-set clearfix" data-option-key="filter">
		
		<a href="#filter" data-option-value="*" class="selected"><?php _e('All', 'cebolang'); ?></a>
		
		<!--=========================This will echo the terms for the filter ======================== -->
		
		<?php  $terms = get_terms("type"); $count = count($terms); if ( $count > 0 ){
		     echo "";
		     foreach ( $terms as $term ) {
		       echo "<a href='#filter' data-option-value='." . $term->slug . "'>" . $term->name ."</a>" ;
		        
		     }
		     echo "";
		 }
		 ?>
	
	
		<!--========================= end filter ======================== -->
		
		
	</div>
	
	
	<div class="socials">
	
		
		<?php if (get_option('cebo_tweets')) { ?>
		
		<a href="http://twitter.com/<?php echo get_option('cebo_tweets'); ?>" target="_blank"><img src="<?php bloginfo ('template_url'); ?>/images/twitter.png" alt="" /></a>
		
		<? } ?>
		
		<?php if (get_option('cebo_fb')) { ?>
		
		<a href="<?php echo get_option('cebo_fb'); ?>" target="_blank"><img src="<?php bloginfo ('template_url'); ?>/images/facebook.png" alt="" /></a>
		
		<? } ?>
        
        <a href="#" target="_blank"><img src="<?php bloginfo ('template_url'); ?>/images/google.png" alt="" /></a>
       
        <span style="color:#ccc;position: absolute;right: 50px;font-size: 26px;">|</span><a class="trigger" href="#"><img style="float: right; padding: 5px 0 0 10px; margin: 0 4px; opacity: 0.5; position: relative; width: 23px;" src="http://localhost/anna/wp-content/themes/beta/images/contact_bubble_light.png" alt="" /></a>
	</div>
	
	
	
</div><!-- end filter-bars -->