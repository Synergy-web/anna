<?php
/**
 * The template for displaying the footer.
 *
**/
?>


	<div class="footer">
		
		<ul class="foot">	
			<li id="leftfooterfirst">
				<?php

				if ( !function_exists('dynamic_sidebar')
					|| !dynamic_sidebar('Footer Column 1') ) : ?>
					
					<h2><?php _e( 'Menu', 'cebolang' ); ?></h2>

					<ul class="master" style="footlinks">
						<?php wp_nav_menu( array( 'theme_location' => 'primary' , 'menu_class' => 'nav-primary contact' ) ); ?>
					</ul>	
				
				<?php endif; ?>	
			
			</li>
            
            <li id="leftfootersecond">
				<?php

				if ( !function_exists('dynamic_sidebar')
					|| !dynamic_sidebar('Footer Column 2') ) : ?>
					
					<h2><?php _e( 'Work', 'cebolang' ); ?></h2>

					<ul class="master" style="footlinks">
<?php wp_nav_menu( array( 'theme_location' => 'project' ) ); ?>
					</ul>	
				
				<?php endif; ?>	
			
			</li>
            
			<div class="rightfooter">
			<li id="rightfootermid">
			
				<?php
	
				if ( !function_exists('dynamic_sidebar')
					|| !dynamic_sidebar('Footer Column 3') ) : ?>
					
					<h2><?php _e( 'Find Anna on', 'cebolang' ); ?></h2>
				
					<ul class="foot socialmedialinks" style="display:inline-block">
						<li><?php if (get_option('cebo_tweets')) { ?>
						<a href="http://twitter.com/<?php echo get_option('cebo_tweets'); ?>" target="_blank"><img src="<?php bloginfo ('template_url'); ?>/images/twitter.png" alt="" /></a>
						<? } ?>
                        
                        <?php if (get_option('cebo_fb')) { ?>
						<a href="<?php echo get_option('cebo_fb'); ?>" target="_blank"><img src="<?php bloginfo ('template_url'); ?>/images/facebook.png" alt="" /></a>
						<? } ?>
                        <a href="#" target="_blank"><img src="<?php bloginfo ('template_url'); ?>/images/google.png" alt="" /></a>
                        
                        </li>
				
					</ul>
					
					<?php endif; ?>	

			</li>
			
			<li id="rightfooterlast">
				<?php

				if ( !function_exists('dynamic_sidebar')
					|| !dynamic_sidebar('Footer Column 4') ) : ?>
					
					<h2><?php _e( 'Contact Anna', 'cebolang' ); ?></h2>
						<ul>
                            <li style="margin: 6px 0 0 0;"><span style="white-space:nowrap; font-family: 'MyriadProSemiBold'; font-size: 14px;color:#ff3300;margin-left:-10px">e </span><a href="mailto:<?php echo get_option('cebo_email'); ?>"><?php echo get_option('cebo_email'); ?></a></li>
							<li style="margin: 6px 0 0 0;"><span style="white-space:nowrap; font-family: 'MyriadProSemiBold'; font-size: 14px; color:#ff3300;margin-left:-10px">t </span><?php echo get_option('cebo_phone'); ?></li>
                            <li style="margin: 6px 0 0 0;"><span style="white-space:nowrap;font-family: 'MyriadProSemiBold'; font-size: 14px; color:#ff3300;margin-left:-10px">a </span><?php echo get_option('cebo_address'); ?></li>
						</ul>
					<?php endif; ?>		
			
			</li>
			</div><!--rightfooterwrap-->
		</ul><!--end foot-->
		<div class="clear"></div>
		<div class="copyright">
		<p class="foot" style="min-height:30px;color:#ff3300;"><? _e('&#169; 2013 Anna Beaudry Photographic Design | All Rights Reserved'); ?><a href="http://www.synergy-web.net" target="_blank" id="webdesign"><? _e('Website by Synergy Web Design Inc.'); ?></a></p> 
        </div>
        
		<div class="clear"></div>
	</div><!-- end footer -->
	
		
<script src="js/jquery.isotope.min.js"></script>
  <script type="text/javascript">
    $(function(){
      
      var $container = $('#thumbnails');

      $container.isotope({
        itemSelector : '.element'
      });
      
      
      var $optionSets = $('.container .option-set'),
          $optionLinks = $optionSets.find('a');

      $optionLinks.click(function(){
        var $this = $(this);
        // don't proceed if already selected
        if ( $this.hasClass('selected') ) {
          return false;
        }
        var $optionSet = $this.parents('.option-set');
        $optionSet.find('.selected').removeClass('selected');
        $this.addClass('selected');
  
        // make option object dynamically, i.e. { filter: '.my-filter-class' }
        var options = {},
            key = $optionSet.attr('data-option-key'),
            value = $this.attr('data-option-value');
        // parse 'false' as false boolean
        value = value === 'false' ? false : value;
        options[ key ] = value;
        if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
          // changes in layout modes need extra logic
          changeLayoutMode( $this, options )
        } else {
          // otherwise, apply new options
          $container.isotope( options );
        }
        
        return false;
      });

      
    });
  </script>
  
  <div id="fb-root"></div>
  <script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=155948847886177";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
  </script>

	<?php if ( get_option('cebo_tracking_code') <> "" ) { echo stripslashes(get_option('cebo_tracking_code')); } ?>
	<?php wp_footer(); ?>
    
</body>
</html>