<?php
/**
 * Custom Post Types
 *
 * @package WordPress
 * @subpackage cebo
 * @since Dream Home 1.0
 */
 
///////////////////////////////////////////////////////////////////////////// Custom Post Type

add_action('init', 'project_items');

function project_items()
{
  $labels = array(
    'name' => _x('Projects', 'post type general name'),
    'singular_name' => _x('Project', 'post type singular name'),
    'add_new' => _x('Add New', 'Project'),
    'add_new_item' => __('Add New Project'),
    'edit_item' => __('Edit Project'),
    'new_item' => __('New Project'),
    'view_item' => __('View Project'),
    'search_items' => __('Search Projects'),
    'not_found' =>  __('No Project found'),
    'not_found_in_trash' => __('No Project found in Trash'),
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'project' ),
    'capability_type' => 'post',
    'menu_icon' => get_bloginfo('template_url').'/options/images/icon_project.png',
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array('title','custom-fields','editor','author','excerpt','comments')
  );
  register_post_type('project',$args);
}
add_action("manage_posts_custom_column", "my_custom_columns");
add_filter("manage_edit-project_columns", "my_project_columns");

function my_project_columns($columns)
{
$columns = array(
 "cb" => "<input type=\"checkbox\" />",
 "title" => "Project Name",
 "projectthumb" => "Project Quick Look",
 "dater" => "Project Launch Date",
 "link" => "Project Link",
 );
 return $columns;
}

function my_custom_columns($column)
{
 global $post;
 $dater = get_post_meta($post->ID, 'cebo_dater');
 $link = get_post_meta($post->ID, 'cebo_link');
 if ("ID" == $column) echo $post->ID;
 elseif ("projectthumb" == $column) echo '<img src="' . sp_get_image() . '" width="150px"';
 elseif ("dater" == $column) echo $dater[0];
 elseif ("link" == $column) echo $link[0];
}


//create taxonomy for project type

create_type_taxonomies();

include(TEMPLATEPATH . '/options/secondary-panel.php'); 

function create_type_taxonomies()
{
  // Taxonomy for Location
  $labels = array(
    'name' => _x( 'Project Type', 'taxonomy general name' ),
    'singular_name' => _x( 'Project Type', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Project Types' ),
    'all_items' => __( 'All Project Types' ),
    'parent_item' => __( 'Parent Project Type' ),
    'parent_item_colon' => __( 'Parent Project Type:' ),
    'edit_item' => __( 'Edit Project Type' ),
    'update_item' => __( 'Update Project Type' ),
    'add_new_item' => __( 'Add New Project Type' ),
    'new_item_name' => __( 'New Project Type Name' ),
  ); 	

  register_taxonomy('type', array('project'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'project-type' ),
  ));

}

add_action( 'init', 'create_post_types' );
function create_post_types() {
  register_post_type( 'team',
    array(
      'labels' => array(
        'name' => __( 'Team' ),
        'singular_name' => __( 'Team' )
      ),
      'public' => true,
      'rewrite' => array('slug' => 'team'),
      'menu_icon' => get_bloginfo('template_url').'/options/images/icon_team.png',
      'supports' => array('title','custom-fields','editor','category')
    )
  );
}
add_action("manage_posts_custom_column", "my_team_columns");
add_filter("manage_edit-team_columns", "my_fullteam_columns");

function my_fullteam_columns($columns)
{
 $columns = array(
 "cb" => "<input type=\"checkbox\" />",
 "title" => "Team Member Name",
 "agentthumb" => "Quick Look",
 "facebook" => "Facebook Link",
 "twitter" => "Twitter Link"
 );
 return $columns;
}

function my_team_columns($column)
{
 global $post;
 $facebookid = get_post_meta($post->ID, 'facebook');
 $twitterid = get_post_meta($post->ID, 'twitter');
 if ("ID" == $column) echo $post->ID;
 elseif ("agentthumb" == $column) echo '<img src="' . sp_get_image() . '" width="150px"';
 elseif ("facebook" == $column) echo $facebookid[0];
 elseif ("twitter" == $column) echo $twitterid[0];
}

//create custom post type for slides 

add_action('init', 'slide_items');

function slide_items()
{
  $labels = array(
    'name' => _x('Slides', 'post type general name'),
    'singular_name' => _x('Slide', 'post type singular name'),
    'add_new' => _x('Add New', 'Slide'),
    'add_new_item' => __('Add New Slide'),
    'edit_item' => __('Edit Slide'),
    'new_item' => __('New Slide'),
    'view_item' => __('View Slide'),
    'search_items' => __('Search Slides'),
    'not_found' =>  __('No Slide found'),
    'not_found_in_trash' => __('No Slide found in Trash'),
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'slides' ),
    'capability_type' => 'post',
    'menu_icon' => get_bloginfo('template_url').'/options/images/icon_slides.png',
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array('title','custom-fields','editor','author','thumbnail','excerpt','comments')
  );
  register_post_type('slides',$args);
}
add_action("manage_posts_custom_column", "my_customslides_columns");
add_filter("manage_edit-slides_columns", "my_slides_columns");

function my_slides_columns($columns)
{
$columns = array(
 "cb" => "<input type=\"checkbox\" />",
 "title" => "Home Page Slide",
 "slidethumb" => "Quick Look",
 );
 return $columns;
}

function my_customslides_columns($column)
{
 global $post;
 if ("ID" == $column) echo $post->ID;
 elseif ("slidethumb" == $column) echo '<img src="' . sp_get_image() . '" width="150px"';

}

//Custom post type for client reviews
add_action( 'init', 'register_cpt_review' );

function register_cpt_review() {

    $labels = array( 
        'name' => _x( 'Client Reviews', 'review' ),
        'singular_name' => _x( 'Review', 'review' ),
        'add_new' => _x( 'Add New', 'review' ),
        'add_new_item' => _x( 'Add New Review', 'review' ),
        'edit_item' => _x( 'Edit Review', 'review' ),
        'new_item' => _x( 'New Review', 'review' ),
        'view_item' => _x( 'View Review', 'review' ),
        'search_items' => _x( 'Search Client Reviews', 'review' ),
        'not_found' => _x( 'No client reviews found', 'review' ),
        'not_found_in_trash' => _x( 'No client reviews found in Trash', 'review' ),
        'parent_item_colon' => _x( 'Parent Review:', 'review' ),
        'menu_name' => _x( 'Client Reviews', 'review' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        'description' => 'Add a client review',
        'supports' => array( 'title','editor' ),
        
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        
        
        'show_in_nav_menus' => false,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'review', $args );
}
//Custom post type for Distinctions

add_action( 'init', 'register_cpt_distinction' );

function register_cpt_distinction() {

    $labels = array( 
        'name' => _x( 'Distinctions', 'distinction' ),
        'singular_name' => _x( 'distinction', 'distinction' ),
        'add_new' => _x( 'Add New', 'distinction' ),
        'add_new_item' => _x( 'Add New distinction', 'distinction' ),
        'edit_item' => _x( 'Edit distinction', 'distinction' ),
        'new_item' => _x( 'New distinction', 'distinction' ),
        'view_item' => _x( 'View distinction', 'distinction' ),
        'search_items' => _x( 'Search Distinctions', 'distinction' ),
        'not_found' => _x( 'No distinctions found', 'distinction' ),
        'not_found_in_trash' => _x( 'No distinctions found in Trash', 'distinction' ),
        'parent_item_colon' => _x( 'Parent distinction:', 'distinction' ),
        'menu_name' => _x( 'Distinctions', 'distinction' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        'description' => 'Add a distinction',
        'supports' => array('title','editor'),      
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        
        
        'show_in_nav_menus' => false,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'distinction', $args );
}
?>