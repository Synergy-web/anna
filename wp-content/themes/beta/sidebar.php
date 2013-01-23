<?php
/**
 * The Sidebar 
 */
?>

		<!-- this is the sidebar -->
				
				<aside>
				
					<!--+++++++++======================================= IF IS ON THE PROJECT PAGE TEMPLATE ===================================++++++ -->
						
						
					<?php if(get_post_type() == 'project')  { ?>
					
					<?php if(get_post_meta ($post->ID, 'cebo_dater', $single = true ) || get_post_meta ($post->ID, 'cebo_link', $single = true )) { ?>
					
					
						<div class="projectinfo">
						
						<?php if(get_post_meta ($post->ID, 'cebo_dater', $single = true )) { ?>
					
						<p class="date"><?php echo get_post_meta ($post->ID, 'cebo_dater', $single = true ); ?></p>
						
						<? } ?>
						
						<?php if(get_post_meta ($post->ID, 'cebo_link', $single = true )) { ?>
						
						<p class="captain"><a href="<?php echo get_post_meta ($post->ID, 'cebo_link', $single = true ); ?>"><?php _e('View Project', 'cebolang'); ?></a></p>
						
						<? } ?>
						
						<div class="clear"></div>
						
					
					</div>
					
					<? } ?>
					
					<? } ?>
						
					<!--+++++++++======================================= IF IS ON THE CONTACT US PAGE TEMPLATE ===================================++++++ -->
					
					 <?php if(is_page_template('page-contact.php')) {  ?> 
					
					
						<div class="projectinfo" style="top: -19px;">
						
							<?php if(get_option('cebo_company') ) { ?>
							
							<h3 style="text-align: center; margin: 0 0 5px 0;"><?php echo get_option('cebo_company'); ?></h3>
							
							<? } ?>
							<?php if(get_option('cebo_address') ) { ?>
							<p style="text-align: center; padding: 0;"><?php echo get_option('cebo_address'); ?></p>
							
							<? } ?>
							<?php if(get_option('cebo_phone') ) { ?>
							
							<h4 style="text-align: center; margin: 0;"><?php echo get_option('cebo_phone'); ?></h4>
							
							<? } ?>
							<?php if(get_option('cebo_email') ) { ?>
							
							
							<p style="text-align: center;"><a href="mailto:<?php echo get_option('cebo_email'); ?>"><?php echo get_option('cebo_email'); ?></a></p>
							
							<? } ?>
							
							<div class="clear"></div>
						
						</div>
						
					<? } ?>
					
					
					
					
					
				<!-- begin general sidebar -->
				
                <h5>Client Reviews</h5>
					 <?php
						if ( get_query_var('paged') ) $paged = get_query_var('paged');  
						if ( get_query_var('page') ) $paged = get_query_var('page');
						 
						$query = new WP_Query( array( 'post_type' => 'review', 'paged' => $paged, 'posts_per_page' => 3, 'orderby' => 'rand' ) );
						 
						if ( $query->have_posts() ) : ?>
							<?php while ( $query->have_posts() ) : $query->the_post(); ?>	
								<div class="review_outer_para" style="margin-top:10px">
								  <div class="review_inner_para">	
									<?php the_content(); ?><div class="reviewauthor">&#150; <span style="font-style:italic"><?php the_field( "author" ); ?></span></div>
								   </div> 
								</div>
							<?php endwhile; wp_reset_postdata(); ?>
							<!-- show pagination here -->
						<?php else : ?>
							<!-- show 404 error here -->
						<?php endif; ?>
                
				<div class="facebookbox">
                <h5>Facebook Feed</h5>
                 <div class="facebookInner">
                  <div class="fb-like-box" 
                      data-width="295" data-height="300" 
                      data-href="http://www.facebook.com/AnnaBeaudryPhoto" 
                      data-border-color="#fff" data-show-faces="false" 
                      data-stream="true" data-header="false">
                  </div>          
                 </div>
           
				</div><!-- end side tabs -->
				
				
				<?php if (get_option('cebo_tweets')) { ?>
				
				<div class="tweetbox">
					<h5>Twitter Feed</h5>
					<div class="tweet"></div>
					<a class="followbird" href="http://twitter.com/<?php echo get_option('cebo_tweets'); ?>"><?php _e('Follow Anna on <span>Twitter</span>', 'cebolang'); ?></a>
				
				</div>
				
				<? } ?>
				
				<!-- widgetized  -->

		     		<?php if ( !function_exists('dynamic_sidebar')
							|| !dynamic_sidebar('Sidebar') ) : ?>
					<?php endif; ?>  
		
		     	<!-- widgetized  -->
				
				</aside>
				
				<div class="clear"></div>
				
				
				<!-- end this sidebar -->		