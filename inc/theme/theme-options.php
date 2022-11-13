<?php
// put all Launchpad Settings ACF into $theme_options
global $theme_options;
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if( class_exists('acf') && is_plugin_active('acf-google-font-selector-field-master/acf-google_font_selector.php') ) {
    
    $arr = array('logo', 'logo_inv', 'logo_w', 'tagline', 'footer', 'type', 'colors');
    $brr = array();
    foreach($arr as $a){
        $brr[$a] = get_field('lp_s_'.$a, 'option');
    }
    
    if($brr){
        $theme_options = $brr;
    }
}
else {
    ?>
    <script>
        alert('Please activate the plugins "Advanced Custom Fields PRO" and "Advanced Custom Fields: Google Font Selector".');
    </script>
    <?php
}

?>