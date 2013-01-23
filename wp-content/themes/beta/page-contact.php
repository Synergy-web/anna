<?php

/* 
* TEMPLATE NAME:Contact Page Template
*/

get_header(); ?>
		 
		</div><!-- end #header -->	
				
		<div class="pagecontainer">
		<div class="container" id="wider">
		
        <div class="imagecontainer">
            <div id="contact_page_image1" style="float:left">
            <?php if( get_field('contact_page_image1') ):
        ?><img src="<?php the_field('contact_page_image1'); ?>" alt="" /><?php endif; ?></div>
            
            <div id="contact_page_image2" style="margin-left:5px;float:left">
            <?php if( get_field('contact_page_image2') ):
        ?><img src="<?php the_field('contact_page_image2'); ?>" alt="" /><?php endif; ?></div>
        
            <div id="contact_page_image3" style="margin-left:5px;float:left">
            <?php if( get_field('contact_page_image3') ):
        ?><img src="<?php the_field('contact_page_image3'); ?>" alt="" /><?php endif; ?></div>
        
            <div class="clear"></div>
        </div><!--imagecontainer-->
     
		<?php include(TEMPLATEPATH . '/library/lownav_projects.php'); ?>
		
			<div class="contents">
			
				<article>
					
					<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
					
					<h3>Contact <span style="font-weight:bold;color:#ff3300">Anna Beaudry</span></h3>
				
					<?php the_content(); ?>
					
					
					<?php endwhile; endif; wp_reset_query(); ?>
					
					<section class="contactcolumns contactcolumn1">
                    <h4>Book Your<span class="specialtext"> Session</span></h4><br />
                    <h6>Anna Beaudry</h6>
                    <p>Photographic Design</p>
                    <p><?php echo get_option('cebo_address'); ?></p>
                    
                    <span style="font-size:22px;font-weight:bold;color:#ff3300">t<span style="color:#000">: </span></span><a style="color:#999;font-size:22px;" href="tel:<?php echo get_option('cebo_phone'); ?>"><?php echo get_option('cebo_phone'); ?></a><br />
                    <span style="font-size:22px;font-weight:bold;color:#ff3300">e<span style="color:#000">: </span></span><a style="color:#999;font-size:22px;" href="mailto:<?php echo get_option('cebo_email'); ?>"><?php echo get_option('cebo_email'); ?></a>
				    <div style="height:15px;display:block"></div>
                  	<p><em>By <span style="font-weight:bold">Appointment Only</span></em></p>
                    </section>
                    
                    <section class="contactcolumns contactcolumn2">
                    <h4>My<span class="specialtext"> Social Media</span></h4><br />
                    <ul class="foot socialmedialinks" style="display:inline-block;">
						<li><?php if (get_option('cebo_tweets')) { ?>
						<a href="http://twitter.com/<?php echo get_option('cebo_tweets'); ?>" target="_blank"><img src="<?php bloginfo ('template_url'); ?>/images/twitterlg.png" alt="" /></a>
						<? } ?>
                        
                        <?php if (get_option('cebo_fb')) { ?>
						<a href="<?php echo get_option('cebo_fb'); ?>" target="_blank"><img src="<?php bloginfo ('template_url'); ?>/images/facebooklg.png" alt="" /></a>
						<? } ?>
                        <a href="#" target="_blank"><img src="<?php bloginfo ('template_url'); ?>/images/googlelg.png" alt="" /></a>
                        
                        </li>
				
					</ul>
                    
                    </section>
                    
                    <section class="contactcolumns contactcolumn3">
                    <h4>Learn<span class="specialtext"> My Secrets</span></h4><br />
                    <p><span style="font-size:17px">Enter your email address</span><br />to receive:</p>
                    <p style="font-size:17px;color:#333;padding-bottom:5px">Anna's <span style="font-weight:bold;color:#ff3300">"</span><span style="font-weight:bold">Tips from a Pro</span><span style="font-weight:bold;color:#ff3300">"</span></p>
                    <p><em>I promise that your email address will be kept strictly confidential</em></p>
					<form class="inquiryform" action="<?php bloginfo ('template_url'); ?>/library/form.php" method="post">
						<span>
	                		<label><?php _e( 'Your Email ', 'cebolang' ); ?></label>
	                		<input type="text" style="line-height: normal;" onfocus="if(this.value == 'Your Email'){this.value = '';}" name="email" onblur="if(this.value == ''){this.value='Your Email';}"  value="Your Email"  />
	                	</span>
						
						<div class="submitcontain">              	
	                		<span>	                		
	                		<label>Enter Code </label>
							<input class="cap" type="text" name="code"> <br /> 
							</span>
							<img src="<?php bloginfo ('template_url'); ?>/library/captcha.php" />
							<input type="submit" id="submitbtn" name="submit" value="<?php _e( 'Submit', 'cebolang' ); ?>" />
						</div>
                    </section>
				<div class="clear"></div>
                </article>
				
		
				
			</div><!-- end content section -->
			
			
		
		
		</div><!-- end page section -->
	
	
	</div><!-- end widecontainter -->
	
		
<?php get_footer(); ?>