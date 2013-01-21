<div class="lownav">
	<div>

		<?php if(get_post_type() == 'project')  { ?>
		
		<?php $projects = get_page_with_template('page-portfolio');
				  $projecturl= get_permalink($projects);	
			?>
	        
	    <a href="<?php echo $projecturl; ?>"><?php _e('See All', 'cebolang'); ?></a>
		<span class="current"><?php the_title(); ?></span>
		
		<?php } else { ?> 
		
		<div class="projectnav">
    	
        <ul>
        <a href="#" class="selected"><?php _e('Portfolio', 'cebolang'); ?></a>
		<?php wp_nav_menu( array( 'theme_location' => 'project' ) ); ?>
        </ul>
  
    
    	</div><!--end projectnav-->
	
	
	<div class="socials">
	
		
		<?php if (get_option('cebo_tweets')) { ?>
		
		<a href="http://twitter.com/<?php echo get_option('cebo_tweets'); ?>" target="_blank"><img src="<?php bloginfo ('template_url'); ?>/images/twitter.png" alt="" /></a>
		
		<? } ?>
		
		<?php if (get_option('cebo_fb')) { ?>
		
		<a href="<?php echo get_option('cebo_fb'); ?>" target="_blank"><img src="<?php bloginfo ('template_url'); ?>/images/facebook.png" alt="" /></a>
		
		<? } ?>
        
        <a href="#" target="_blank"><img src="<?php bloginfo ('template_url'); ?>/images/google.png" alt="" /></a>
        
        <span style="color:#ccc;position: absolute;right: 50px;font-size: 26px;">|</span><a class="trigger" href="#"><img style="float: right; padding: 5px 0 0 10px; margin: 0 4px; opacity: 0.5; position: relative; width: 23px;" src="http://localhost/anna/wp-content/themes/beta/images/contact_bubble_light.png" alt="" /></a>
	
	</div><!--end socials-->
	
	
		
		<? } ?>
	
	</div>
	

	
</div>