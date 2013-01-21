<?PHP
/*
Plugin Name: No Right Click Images Plugin
Plugin URI: http://www.BlogsEye.com/
Description: Uses Javascript to prevent right clicking of images to help keep leaches from copying images
Version: 2.3
Author: Keith P. Graham
Author URI: http://www.BlogsEye.com/

This software is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/

/************************************************************
* 	kpg_no_rc_img_fixup()
*	Shows the javascript in the footer so that the image events can be adjusted
*
*************************************************************/
function kpg_no_rc_img_fixup() {
	// this is the No Right Click Images functionality.
	// now we have to get the options
	
	$options=get_option('kpg_no_right_click_image');
	if (empty($options)||!is_array($options)) $options=array();
	$replace='N';
	$drag='Y';
	$allowforlogged='N';
	extract($options);
	if ($replace!='Y') $replace='N';
	if ($drag!='Y') $drag='N';
	if ($allowforlogged!='Y') $allowforlogged='N';
	// if the user is logged in and the option is set, let them copy images
	if ($allowforlogged=='Y' && is_user_logged_in() ) { return; }	
	$dir = WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__));
	$img = addslashes($dir.'not.gif');
	$js = addslashes($dir.'no-right-click-images.js');
	
?>
<script language="javascript" type="text/javascript">var kpg_nrci_image="<?php echo $img; ?>";var kpg_nrci_extra="<?php echo $replace; ?>";var kpg_nrci_drag="<?php echo $drag; ?>";</script>
<script language="javascript" type="text/javascript" src="<?php echo $js; ?>"></script>
<?php
}
function kpg_no_rc_img_control()  {
	$options=get_option('kpg_no_right_click_image');
	if (empty($options)||!is_array($options)) $options=array();
	$replace='N';
	$drag='Y';
	$allowforlogged='N';
	extract($options);
	if ($replace!='Y') $replace='N';
	if (empty($drag)) $drag='Y';
	if ($drag!='Y') $drag='N';
	if ($allowforlogged!='Y') $allowforlogged='N';
	if (array_key_exists('kpg_no_rc_nonce',$_POST)&&wp_verify_nonce($_POST['kpg_no_rc_nonce'],'kpg_no_rc')) { 
		// need to update replace
		if (array_key_exists('kpg_replace_image',$_POST)) {
			$replace=stripslashes($_POST['kpg_replace_image']);
		} else {
			$replace='N';
		}
		if (array_key_exists('kpg_prevent_drag',$_POST)) {
			$drag=stripslashes($_POST['kpg_prevent_drag']);
		} else {
			$drag='N';
		}
		if (array_key_exists('kpg_allowforlogged',$_POST)) {
			$allowforlogged=stripslashes($_POST['kpg_allowforlogged']);
		} else {
			$allowforlogged='N';
		}
		if ($replace!='Y') $replace='N';
		if ($drag!='Y') $drag='N';
		if ($allowforlogged!='Y') $allowforlogged='N';
		$options['replace']=$replace;
		$options['drag']=$drag;
		$options['allowforlogged']=$allowforlogged;
		update_option('kpg_no_right_click_image', $options);

	}
   $nonce=wp_create_nonce('kpg_no_rc');
   	$dir = WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__));
	$img = addslashes($dir.'not.gif');

?>

<div class="wrap">
  <h2>No Right Click Images Plugin</h2>
  <h4 style="color:red;">Note: this new version of the plugin now has options that must be set to work correctly.</h4>
  <div style="position:relative;float:right;width:35%;background-color:ivory;border:#333333 medium groove;padding:4px;margin-left:4px;">
    <p>This plugin is free and I expect nothing in return. If you would like to support my programming, you can buy my book of short stories.</p>
    <p>Some plugin authors ask for a donation. I ask you to spend a very small amount for something that you will enjoy. eBook versions for the Kindle and other book readers start at 99&cent;. The book is much better than you might think, and it has some very good science fiction writers saying some very nice things. <br/>
      <a target="_blank" href="http://www.blogseye.com/buy-the-book/">Error Message Eyes: A Programmer's Guide to the Digital Soul</a></p>
    <p>A link on your blog to one of my personal sites would also be appreciated.</p>
    <p><a target="_blank" href="http://www.WestNyackHoney.com">West Nyack Honey</a> (I keep bees and sell the honey)<br />
      <a target="_blank" href="http://www.cthreepo.com/blog">Wandering Blog</a> (My personal Blog) <br />
      <a target="_blank" href="http://www.cthreepo.com">Resources for Science Fiction</a> (Writing Science Fiction) <br />
      <a target="_blank" href="http://www.jt30.com">The JT30 Page</a> (Amplified Blues Harmonica) <br />
      <a target="_blank" href="http://www.harpamps.com">Harp Amps</a> (Vacuum Tube Amplifiers for Blues) <br />
      <a target="_blank" href="http://www.blogseye.com">Blog&apos;s Eye</a> (PHP coding) <br />
      <a target="_blank" href="http://www.cthreepo.com/bees">Bee Progress Beekeeping Blog</a> (My adventures as a new beekeeper) </p>
  </div>
  <h4>The No Right Click Images Plugin is installed and working correctly.</h4>
  <p>This plugin installs some javascript in the footer of every page. When your page finishes loading, the javascript sets properties on the images to stop them from being dragged or right clicked. </p>
  <p><img width="80" src="<?php echo $img; ?>" align="left" style="margin:2px;"/>This is a major revision in the way the plugin works. <a href="mailto:bugs@blogseye.com">Please report all bugs</a> as soon as possible. </p>
  <p>There are many ways to bypass this plugin and it is impossible to prevent a determined and resourceful user from stealing images, but this plugin will prevent casual users from glomming your images. </p>
  <p>The context menu is disabled on simple elements with background images, but will not work in some cases depending on which element receives the mouse click. </p>
  <p>If you have uploaded your images to WordPress so that the images from the gallery can be opened in their own window, then this plugin will not work on the clicked image. Always upload images using FTP and insert the image via URL with no  link to the image other than the IMG tag. </p>  
  <form method="post" action="">
    <input type="hidden" name="action" value="update" />
    <input type="hidden" name="kpg_no_rc_nonce" value="<?php echo $nonce;?>" />
	<table cellpadding="2">
	<tr>
		<td>Replace image on right mouse click</td>
		<td><input type="checkbox" <?php if ($replace=='Y') {echo 'checked="true"';} ?>value="Y" name="kpg_replace_image"></td>
		<td><p>This temporarily replaces the target image with the image above. FireFox users can prevent the plugin from stopping the default context menu. Use this to prevent FireFox users from right clicking the image. <br />
		  This may interfere with other plugins, especially jquery sliders and galleries. Check your blog pages for functionality and turn this off if your images are not behaving correctly. The original image will reappear in about 10 seconds or when the mouse is clicked. </p>
	    </td>
	</tr>
	<tr>
		<td>Prevent Drag and Drop</td>
		<td><input type="checkbox" <?php if ($drag=='Y') {echo 'checked="true"';} ?>value="Y" name="kpg_prevent_drag"></td>
		<td>Users may be able to drag an image to the desktop. If you wish to prevent this, check the box. If this conflicts with a plugin that uses drag and drop, you may wish to uncheck this.
		</td>
	</tr>
	<tr>
		<td>Allow for Logged Users</td>
		<td><input type="checkbox" <?php if ($allowforlogged=='Y') {echo 'checked="true"';} ?>value="Y" name="kpg_allowforlogged"></td>
		<td>You may wish to allow logged in users to copy images. You can do this by checking this box.
		</td>
	</tr>
	</table>
    <p>
      <input type="submit" name="Submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
    </p>
  </form>
</div>
<?php
}
function kpg_no_rc_img_init() {
   add_options_page('No Right Click Images', 'No Right Click Images', 'manage_options',__FILE__,'kpg_no_rc_img_control');
}
  // Plugin added to Wordpress plugin architecture
	add_action('admin_menu', 'kpg_no_rc_img_init');	
	add_action( 'wp_footer', 'kpg_no_rc_img_fixup' );
// uninstall
function kpg_no_rc_img_uninstall() {
	if(!current_user_can('manage_options')) {
		die('Access Denied');
	}
	delete_option('kpg_no_right_click_image'); 
	return;
}
if ( function_exists('register_uninstall_hook') ) {
	register_uninstall_hook(__FILE__, 'kpg_no_rc_img_uninstall');
}

// bottom	
?>