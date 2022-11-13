<?php
/* -TINYMCE SETTINGS------------------------------------------------- */
function custom_wysiwyg_styles($settings)
{
	$settings['block_formats'] = 'Paragraph=p; Heading 1=h1; Heading 2=h2; Heading 3=h3; Heading 4=h4; Heading 5=h5; Heading 6=h6; Preformatted=pre; Code=code; Address=address;';
	
	$style_formats = array(
		array(
			'title'   => 'Buttons & CTAs',
			'items' => array(
				array('title' => 'Button', 'classes' => 'button', 'selector' => 'a, button'),
				array('title' => 'Button - Secondary', 'classes' => 'button secondary', 'selector' => 'a, button'),
				array('title' => 'Button - Smaller', 'classes' => 'smaller', 'selector' => 'a, button'),
				array('title' => 'CTA Link', 'classes' => 'cta', 'selector' => 'a, button'),
			),
		),
		array(
			'title'   => 'Typograpy Styles',
			'items' => array(
				array('title' => 'H1', 'classes' => 'h1', 'selector' => 'h1, h2, h3, h4, h5, h6, p'),
				array('title' => 'H2', 'classes' => 'h2', 'selector' => 'h1, h2, h3, h4, h5, h6, p'),
				array('title' => 'H3', 'classes' => 'h3', 'selector' => 'h1, h2, h3, h4, h5, h6, p'),
				array('title' => 'H4', 'classes' => 'h4', 'selector' => 'h1, h2, h3, h4, h5, h6, p'),
				array('title' => 'H5', 'classes' => 'h5', 'selector' => 'h1, h2, h3, h4, h5, h6, p'),
				array('title' => 'H6', 'classes' => 'h6', 'selector' => 'h1, h2, h3, h4, h5, h6, p'),
				array('title' => 'P', 'classes' => 'p', 'selector' => 'h1, h2, h3, h4, h5, h6, p'),
				array('title' => 'P - Lead', 'classes' => 'p lead', 'selector' => 'h1, h2, h3, h4, h5, h6, p'),
			),
			
		),
			
    );
    $settings['style_formats'] = json_encode( $style_formats );
	 
	//output($settings);
    return $settings;
}

add_filter('tiny_mce_before_init', 'custom_wysiwyg_styles');

// Add custom colors
//function tinymce_colors($init) {
//    $default_colours = '
//        "000000", "Black",
//        "993300", "Burnt orange",
//        "333300", "Dark olive",
//        "003300", "Dark green",
//        "003366", "Dark azure",
//        "000080", "Navy Blue",
//        "333399", "Indigo",
//        "333333", "Very dark gray",
//        "800000", "Maroon",
//        "FF6600", "Orange",
//        "808000", "Olive",
//        "008000", "Green",
//        "008080", "Teal",
//        "0000FF", "Blue",
//        "666699", "Grayish blue",
//        "808080", "Gray",
//        "FF0000", "Red",
//        "FF9900", "Amber",
//        "99CC00", "Yellow green",
//        "339966", "Sea green",
//        "33CCCC", "Turquoise",
//        "3366FF", "Royal blue",
//        "800080", "Purple",
//        "999999", "Medium gray",
//        "FF00FF", "Magenta",
//        "FFCC00", "Gold",
//        "FFFF00", "Yellow",
//        "00FF00", "Lime",
//        "00FFFF", "Aqua",
//        "00CCFF", "Sky blue",
//        "993366", "Brown",
//        "C0C0C0", "Silver",
//        "FF99CC", "Pink",
//        "FFCC99", "Peach",
//        "FFFF99", "Light yellow",
//        "CCFFCC", "Pale green",
//        "CCFFFF", "Pale cyan",
//        "99CCFF", "Light sky blue",
//        "CC99FF", "Plum",
//        "FFFFFF", "White"
//    ';
//	
//	$custom_colours = "";
//    $custom_colours = '
//		"AA905C", "GG Gold",
//		"4A4A4A", "GG Charcoal",
//		"5F5F5F", "GG Grey",
//		"7f7f7f", "GG Grey - 80"
//	';
//
//    $init['textcolor_map'] = '['.$default_colours.','.$custom_colours.']'; // build colour grid default+custom colors
//    $init['textcolor_rows'] = 7; // enable 6th row for custom colours in grid
//    return $init;
//}
//add_filter('tiny_mce_before_init', 'tinymce_colors');



//function change_mce_options($init){
//    $init["forced_root_block"] = false;
//    $init["force_br_newlines"] = false;
//    $init["force_p_newlines"] = false;
//    $init["convert_newlines_to_brs"] = false;
//    return $init;       
//}
//add_filter('tiny_mce_before_init','change_mce_options');
?>
