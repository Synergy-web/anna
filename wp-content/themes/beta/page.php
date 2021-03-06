<?php

/* 
	Standard Page Template
*/

get_header(); ?>
		 
		</div><!-- end #header -->

	<div class="widecontainer">		
				
		<div class="pagecontainer lined">
		
		<?php include(TEMPLATEPATH . '/library/lownav_projects.php'); ?>
		
			<div class="content">
			
				<article>
				
					<h3><?php the_title(); ?></h3>
					
					<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
					
					
					<?php the_content(); ?>
					
					
					<?php endwhile; endif; wp_reset_query(); ?>	
				
				</article>
				
				
				
				<?php get_sidebar(); ?>					
				
			</div><!-- end content section -->
			
			<div class="clear"></div>
		
		
		</div><!-- end page section -->
	
	
	</div><!-- end widecontainter -->
	
		
<?php get_footer(); ?>