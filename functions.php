<?php
global $siteurl;
$siteurl = get_site_url();

global $themeurl;
$themeurl = get_template_directory_uri();

global $theme_options;
$theme_options = array();



/* -SCRIPTS & STYLES- */
function script_styles_setup() {
    
    wp_deregister_script( 'jquery' );
    wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js');
    wp_enqueue_script('jquery');
    
    //wp_deregister_script( 'jquery-migrate' );
    //wp_register_script('jquery-migrate', '//cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.0.1/jquery-migrate.js');
    //wp_enqueue_script('jquery-migrate');
    
    wp_enqueue_style( 'styles', get_template_directory_uri() . '/css/styles.css', array(), '0.6' );
    
    wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/scripts-all.js', array('jquery'), '0.4', true );

}
add_action( 'wp_enqueue_scripts', 'script_styles_setup' );



/* -BASIC SETUP */
function setup() {
    
    // This theme styles the visual editor to resemble the theme style.
    add_editor_style( array( 'css/editor-style.css'));
    
    // SUPPORT
    add_theme_support( 'automatic-feed-links' );
    add_theme_support('post-thumbnails');
    add_theme_support('menu');
    add_theme_support( 'title-tag' );
    add_theme_support( 'widget' );

}
add_action( 'after_setup_theme', 'setup' );



function register_menus() {
    
    register_nav_menus(
        array(
            'main-menu' => __('Main Menu'),
        )
    );
    
}
add_action( 'init', 'register_menus' );



function theme_slug_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Blog Sidebar', 'bstro-launchpad' ),
        'id' => 'sidebar-1',
        'description' => __( 'Widgets in this area will be shown on all of the blog pages.', 'bstro-launchpad' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget'  => '</li>',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'theme_slug_widgets_init' );




//add admin styles
function admin_styles() {
    
    echo '<link rel="stylesheet" href="'.get_template_directory_uri() . '/css/wp-admin.css?v1.0'.'" type="text/css" media="all" />';
    
}
add_action('admin_head', 'admin_styles');



//add Site Options
if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
    'page_title' 	=> 'Launchpad Settings',
    'menu_title'	=> 'Launchpad Settings',
    'menu_slug' 	=> 'launchpad-settings',
    'capability'	=> 'edit_posts',
    'redirect'		=> false
    ));
    
    // add sub page
    acf_add_options_sub_page(array(
        'page_title' 	=> '404',
        'menu_title' 	=> '404',
        'parent_slug' 	=> 'options-general.php',
    ));
    
}



/* -THUMB SIZES- */
//add custom thumb sizes.
//function custom_image_sizes() {
//	if ( function_exists( 'add_image_size' ) ) {
//		add_image_size( 'side-img', 490, 490 );
//	}
//}
//
//add_action( 'after_setup_theme', 'custom_image_sizes' );



/* -THUMBNAL SCALE- */

function alx_thumbnail_upscale( $default, $orig_w, $orig_h, $new_w, $new_h, $crop ){
    
    if ( !$crop ) return null; // let the wordpress default function handle this
    
    $aspect_ratio = $orig_w / $orig_h;
    $size_ratio = max($new_w / $orig_w, $new_h / $orig_h);
    
    $crop_w = round($new_w / $size_ratio);
    $crop_h = round($new_h / $size_ratio);
    
    $s_x = floor( ($orig_w - $crop_w) / 2 );
    $s_y = floor( ($orig_h - $crop_h) / 2 );
    
    return array( 0, 0, (int) $s_x, (int) $s_y, (int) $new_w, (int) $new_h, (int) $crop_w, (int) $crop_h );

}

add_filter( 'image_resize_dimensions', 'alx_thumbnail_upscale', 10, 6 );



/* -Modify WP Captions to remove width and height from .wp-caption- */

function my_img_caption_shortcode_filter($val, $attr, $content = null) {
    extract(shortcode_atts(array(
        'id'        => '',
        'align'     => '',
        'width'     => '',
        'caption'   => '' 
    ), $attr));
    
    if ( 1 > (int) $width || empty($caption) )
        return $val;
    
    $capid = '';
    if ( $id ) {
        $id = esc_attr($id);
        $capid = 'id="attachment_'. $id . '" ';
        $id = 'id="' . $id . '"';
    }
    
    return '<div ' . $id . ' class="wp-caption ' . esc_attr($align) . '">' . do_shortcode( $content ) . '<p ' . $capid . 'class="wp-caption-text">' . $caption . '</p></div>';

}

add_filter('img_caption_shortcode', 'my_img_caption_shortcode_filter',10,3);


// /* -INFINITE SCROLL FUNCTIONALITY - */
// require get_template_directory() . '/inc/ajax.php';

/* -OUTPUT VARIABLE- */
function output($content){
    
    echo '<pre>';
        var_dump($content);
    echo '</pre>';
    
}



/* -REMOVE WP VERSION FROM CSS AND JS FILES- */
// because we will use our own
function remove_version_from_style_js( $src ) {
    
    if ( strpos( $src, 'ver=' . get_bloginfo( 'version' ) ) )
        $src = remove_query_arg( 'ver', $src );
        
    return $src;

}

add_filter( 'style_loader_src', 'remove_version_from_style_js');
add_filter( 'script_loader_src', 'remove_version_from_style_js');



/* -REMOVE MENU LINKS FROM ADMIN SIDEBAR- */
function remove_menus(){
    
    remove_menu_page( 'edit-comments.php' ); // COMMENTS 
    
}

add_action( 'admin_menu', 'remove_menus' );



/* -REMOVE MENU LINKS FROM ADMIN TOPBAR-*/
add_action( 'admin_bar_menu', 'remove_wp_nodes', 999 );

function remove_wp_nodes() {
    
    global $wp_admin_bar;   
    $wp_admin_bar->remove_node( 'comments' );
    
}



// This alters the get get_terms() arguments
function widget_category_excluder($args){
    $args['walker'] = new Walker_Category_Find_Parents();
    return $args;
};
// This allows hooking into WP_Widget_Categories and excluding Terms
//add_filter('widget_categories_dropdown_args', 'widget_category_excluder');
add_filter('widget_categories_args', 'widget_category_excluder');



//search query alter
function alter_search_query($query) {
	//gets the global query var object
	global $wp_query;
	
	if(is_search() && $query->is_main_query()){
            
                // set to search posts and pages
		$query->set( 'post_type', array( 'post', 'page') );
	 
		//we remove the actions hooked on the '__after_loop' (post navigation)
		remove_all_actions ( '__after_loop');
	}
	
	return;
}
add_action('pre_get_posts','alter_search_query');




//remove wp gallery inline css
add_filter( 'use_default_gallery_style', '__return_false' );




/* -OTHER INCLUDES- */
require_once 'inc/autoload.php';
include_once('partials/flexible-content/content-flexible-functions.php');



//inject custom theme editor styles
function bstro_launchpad_custom_editor($settings){
    
    if(isset($settings['content_style'])){
	$settings['content_style'] .= theme_options_css();
    }
    else {
	$settings['content_style'] = theme_options_css();
    }
    
    return $settings;
}
add_filter( 'tiny_mce_before_init', 'bstro_launchpad_custom_editor');



// change excerpt more
function new_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');



// Add layout titles to flex content
function my_acf_flexible_content_layout_title( $title, $field, $layout, $i ) {
	// load text sub field if exists
	$text = get_sub_field('layout_title');
	if ($text) {
		$title = $text;
		return '<span class="flex-icon"></span>'.$title;
	}
	else {
		return '<span class="flex-icon"></span>'.$title;
	}
}

// name
add_filter('acf/fields/flexible_content/layout_title/name=content', 'my_acf_flexible_content_layout_title', 10, 4);



/**
 * Prevent update notification for plugin
 * http://www.thecreativedev.com/disable-updates-for-specific-plugin-in-wordpress/
 * Place in theme functions.php or at bottom of wp-config.php
 */
 function disable_plugin_updates( $value ) {

    $pluginsToDisable = [
        'acf-google-font-selector-field-master/acf-google_font_selector.php'
        //'plugin-folder2/plugin2.php'
    ];

    if ( isset($value) && is_object($value) ) {
        foreach ($pluginsToDisable as $plugin) {
            if ( isset( $value->response[$plugin] ) ) {
                unset( $value->response[$plugin] );
            }
        }
    }
    return $value;
}
add_filter( 'site_transient_update_plugins', 'disable_plugin_updates' );



//enables the confirmation anchor on all gf forms
add_filter( 'gform_confirmation_anchor', '__return_false' );
//Change the spinner image to a custom image file.
add_filter( 'gform_ajax_spinner_url', 'spinner_url', 10, 2 );
function spinner_url( $image_src, $form ) {
    return get_template_directory_uri().'/images/loader.svg';
}
?>
