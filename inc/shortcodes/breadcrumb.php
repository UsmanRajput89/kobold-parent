<?php
add_shortcode('breadcrumb', 'breadcrumb');
function breadcrumb($args) {
    ob_start();
    
    if(function_exists('yoast_breadcrumb')){
        
        echo '<span class="breadcrumb">';
            yoast_breadcrumb('','');
        echo '</span>';
    }

    $content = ob_get_contents();
    ob_end_clean();
    return $content;
}


?>