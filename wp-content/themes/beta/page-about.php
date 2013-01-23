<?php

/* 
* TEMPLATE NAME: About Page Template
*/

get_header(); ?>
		 
		

	<div class="widecontainer">		
				
		<div class="pagecontainer">
		<div class="imagecontainer">	
        <div id="about_page_image1" style="float:left">
		<?php if( get_field('about_page_image1') ):
	?><img src="<?php the_field('about_page_image1'); ?>" alt="" /><?php endif; ?></div>
    	
        <div id="about_page_image2" style="margin-left:10px;float:left">
		<?php if( get_field('about_page_image2') ):
	?><img src="<?php the_field('about_page_image2'); ?>" alt="" /><?php endif; ?></div>
    	
        </div>
        <div class="clear"></div>
    
		<?php include(TEMPLATEPATH . '/library/lownav_projects.php'); ?>
		
			<div class="content">
			
				<article>
					
					<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
					
					<h3>About <span style="font-weight:bold;color:#ff3300">Anna Beaudry</span></h3>
				
					<?php the_content(); ?>
					
					
					<?php endwhile; endif; wp_reset_query(); ?>
					

				
				</article>
				
				
				
				<?php get_sidebar(about); ?>					
				
			</div><!-- end content section -->
			
			<div class="clear"></div>
		
		
		</div><!-- end page section -->
	
	
	</div><!-- end widecontainter -->
	
		
<?php get_footer(); ?>