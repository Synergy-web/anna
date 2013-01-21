<?php
/**
 * The Sidebar for about page
 */
?>

		<!-- this is the sidebar -->
				
				<aside>
				
<!--+++++++++======================================= IF IS ON THE ABOUT PAGE TEMPLATE ===================================++++++ -->					
					  
                     <h5>Disctinctions</h5>
					 <?php
if ( get_query_var('paged') ) $paged = get_query_var('paged');  
if ( get_query_var('page') ) $paged = get_query_var('page');
 
$query = new WP_Query( array( 'post_type' => 'distinction', 'paged' => $paged ) );
 
if ( $query->have_posts() ) : ?>
	<?php while ( $query->have_posts() ) : $query->the_post(); ?>	
		<div class="entry">
			<?php the_title(); ?><?php the_content(); ?>
		</div>
	<?php endwhile; wp_reset_postdata(); ?>
	<!-- show pagination here -->
<?php else : ?>
	<!-- show 404 error here -->
<?php endif; ?>
					<h5>Client Reviews</h5>
					 <?php
if ( get_query_var('paged') ) $paged = get_query_var('paged');  
if ( get_query_var('page') ) $paged = get_query_var('page');
 
$query = new WP_Query( array( 'post_type' => 'review', 'paged' => $paged, 'posts_per_page' => 3, 'orderby' => 'rand' ) );
 
if ( $query->have_posts() ) : ?>
	<?php while ( $query->have_posts() ) : $query->the_post(); ?>	
		<div class="entry review_outer_para" style="margin-top:10px">
		  <div class="review_inner_para">	
			<?php the_content(); ?><div style="text-align:right;font-size:14px;margin-top:-15px">--<?php the_field( "author" ); ?></div>
           </div> 
		</div>
	<?php endwhile; wp_reset_postdata(); ?>
	<!-- show pagination here -->
<?php else : ?>
	<!-- show 404 error here -->
<?php endif; ?>
					
					 
							
							<div class="clear" style="padding-bottom:30px"></div>
					
				<!-- widgetized  -->

		     		<?php if ( !function_exists('dynamic_sidebar')
							|| !dynamic_sidebar('Sidebar') ) : ?>
					<?php endif; ?>  
		
		     	<!-- widgetized  -->
				
				</aside>
				
				<div class="clear"></div>
				
				
				<!-- end this sidebar -->		