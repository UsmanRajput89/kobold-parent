<?php
//**********************************
//Section Settings
//**********************************
function section_styles($fieldname){
	
	global $rowIndex;
	
	$section_style = array();
	$section_style["bg"] = "";
	$section_style["bg-color"] = "";
	$section_style["bg-image"] = "";
	$section_style["bg-image-url"] = "";
	$section_style["bg-video"] = "";
	$section_style["white-text"] = "";
	$section_style["width"] = "";
	$section_style["widthClass"] = "";
	$section_style["height"] = "";
	$section_style["height_custom"] = "";
	$section_style["border"] = "";
	$section_style["padding-top"] = "";
	$section_style["padding-bottom"] = "";
	$section_style["id"] = "";
	$section_style["gutter"] = "";
	$section_style["content_alignment"] = "";
	$section_style["overlay"] = "";
	
	
	//section settings (but we're reusing some of this for column settings)
	if( have_rows($fieldname) ): while ( have_rows($fieldname) ) : the_row();

		//bg
		$section_style["bg"] = get_sub_field('background');
		switch ($section_style["bg"]) {
			case "bg-color":
				$section_style["bg-color"] = 'background-color: '.get_sub_field('background_color').';';
				break;
			case "bg-image":
				$section_style["bg-image"] = 'background-image: url('.get_sub_field('background_image').');';
				$section_style["bg-image-url"] = get_sub_field('background_image');
				if($bg = get_sub_field('background_color')){
					$section_style["bg-color"] = 'background-color: '.$bg.';';
				}
				break;
			case "bg-video":
				$vid = get_sub_field('background_video');
				$bgimage = get_sub_field('background_image');
				$section_style["bg-image"] = 'background-image: url('.$bgimage.');';
				$section_style["bg-video"] = '<div class="vbwrapper"><div id="video-background-'.$rowIndex.'" video="'.$vid.'" class="video-background bg-cover" style="background-image: url('.$bgimage.');"><div class="video-overlay"></div></div></div>';
				if($bg = get_sub_field('background_color')){
					$section_style["bg-color"] = 'background-color: '.$bg.';';
				}
				break;
		}
		
		
		if($section_style["bg"] == "bg-color" || $section_style["bg"] == "bg-image" || $section_style["bg"] == "bg-video"){
			//white text
			$section_style["white-text"] = (get_sub_field('white_text')) ? 'white-text' : '';
		}
		
		//overlay
		if($section_style["bg"] == "bg-image" || $section_style["bg"] == "bg-video"){
			if($overlay = get_sub_field('overlay')){
				$overlay = array_shift($overlay);
				if($overlay['color'] && $overlay['opacity']){
					$section_style["overlay"] = '<div class="bg-overlay" style="background-color: '.$overlay['color'].'; opacity: '.$overlay['opacity'].';"></div>';
				}
			}
		}
		
		
		
		//width
		$section_style["width"] = "width-" . get_sub_field('width');
		$section_style["widthClass"] = "col-sm-12 col-md-10 col-md-offset-1";
		
		switch ($section_style["width"]) {
			case "width-narrow":
				$section_style["widthClass"] = "col-xs-12 col-sm-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2";
				break;
			case "width-normal":
				$section_style["widthClass"] = "col-xs-12 col-sm-12 col-md-10 col-md-offset-1";
				break;
			case "width-wide":
				$section_style["widthClass"] = "col-xs-12 col-sm-12";
				break;
			case "width-full-width":
				$section_style["widthClass"] = "col-xs-12 col-sm-12";
				break;
		}
		
		
		//height
		$section_style["height"] = "height-" . get_sub_field('height');
		if($section_style["height"] == 'height-custom'){
			$section_style["height_custom"] = 'min-height: '.get_sub_field('height_custom').';';
		}
		
		//alignment
		$section_style["content_alignment"] = get_sub_field('content_alignment');
		
		
		//add border
		$add_border = get_sub_field('border');
		if($add_border):
			foreach($add_border as $border){
				$section_style["border"] .= $border.' ';
			}
		else: endif;
		
		
		//padding
		$padding = get_sub_field('padding');
		if($padding):
			$padding = $padding[0];
			foreach($padding as $k => $p){
				$section_style["padding-".$k] = "padding-" . $k . "-". $p;
			}
		else: endif;
		
		
		//id
		$section_style["id"] = get_sub_field('section_id');
		
		
	endwhile; else: endif;
	
	
	if($fieldname == 'style'){
		//get column options to put into section classes
		
		if( have_rows('column_settings') ): while ( have_rows('column_settings') ) : the_row();
		
			//gutter
			$section_style["gutter"] = 'gutter-'.get_sub_field('gutter');
			
		endwhile; else: endif;
	}
	
	return $section_style;
}


//**********************************
//Section Settings Bundled
// let's bundle these into classes and style attributes for each section
//**********************************
function section_styles_bundled($section_style){
	//section class attr	
	$classes = array(
		$section_style["bg"],
		$section_style["width"],
		$section_style["height"],
		$section_style["border"],
		$section_style["padding-top"],
		$section_style["padding-bottom"],
		$section_style["white-text"],
		$section_style["gutter"],
		'valign-'.$section_style["content_alignment"]
	);
	
	//section style attr
	$styles = array(
		$section_style["bg-color"],
		$section_style["bg-image"],
		$section_style["height_custom"]
	);
	
	$bundle = $section_style;
	$bundle['bundle']['classes'] = $classes;
	$bundle['bundle']['styles'] = $styles;
	
	return $bundle;
}



//**********************************
//Column Styles
//**********************************
function column_styles(){
	$column_options = array();
	$column_options['column_width'] = "";
	$column_options['column_height'] = "";
	$column_options['column_custom_height'] = "";
	$column_options['column_text_alignment'] = "";
	$column_options['gutter'] = "";
	$column_options['col-per-row']  = "";
	$column_options['styles']  = array();
	$column_options['reverse_stacking'] = false;
	$column_options['carousel'] = array();
	$column_options['show_background_image_of_empty_columns'] = false;
	$column_options['border'] = "";
	
	//section options
	if( have_rows('column_settings') ): while ( have_rows('column_settings') ) : the_row();
		
		//column width (2col flexi)
		if($w = get_sub_field('column_width')){
			$column_options['column_width'] = $w;
		}
		
		//number of columns (multi flexi)
		$column_options['col-per-row'] = get_sub_field('columns_per_row');

		//gutter
		$column_options['gutter'] = get_sub_field('gutter');
		
		//height
		$column_options["column_height"] = get_sub_field('column_height');
		if($column_options["column_height"] == "custom"){
			$column_options['column_custom_height'] = 'min-height: '.get_sub_field('column_custom_height').';';
		}
		
		//alignment
		$column_options["column_text_alignment"] = get_sub_field('column_text_alignment');
		
		//styles
		$styles = get_sub_field('styles');
		if($styles){
			foreach($styles as $style){
				array_push($column_options['styles'], $style);
			}
		}
		
		//reverse stacking
		$column_options['reverse_stacking'] = get_sub_field('reverse_stacking');
		
		//navigation (carousel)
		$nav = get_sub_field('navigation');
		if($nav){
			$navarr = array();
			foreach($nav as $n){
				array_push($navarr, $n);
			}
			$column_options['carousel']['navigation'] = $navarr;
		}
		
		//effect (carousel)
		$column_options['carousel']['effect'] = get_sub_field('effect');
		
		//autoplay (carousel)
		$column_options['carousel']['autoplay'] = get_sub_field('autoplay');
		if($column_options['carousel']['autoplay']){
			$column_options['carousel']['speed'] = get_sub_field('speed');
		}
		
		//show bg image on mobile
		$column_options['show_background_image_of_empty_columns'] = get_sub_field('show_background_image_of_empty_columns');
		
		//border
		$borders = get_sub_field('column_border');
		if($borders){
			$column_options['border'] = join(' ', $borders);
		}
		
	endwhile; else: endif;
	
	return $column_options;
	
}


//**********************************
//Column Style Bundled
// let's bundle these into classes and style attributes for both the column container (.col) and the .styles inside
// so it's cleaner and reusable in two-column.php and multi-column.php
//**********************************

function column_styles_bundled($individual_column_styles, $column_styles){
	
	$bundle = array();
	
	
	//column classes
	$coldiv_classes = array(
		"gutter-".$column_styles['gutter'],
		$column_styles['border'] 
	);
	
	//column styles
	$coldiv_styles = array(
		
	);
	
	//editor classes
	$stylesdiv_classes = array(
		$individual_column_styles["bg"],
		$individual_column_styles["white-text"],
		"valign-".$column_styles['column_text_alignment'],
		"height-".$column_styles['column_height']
	);
	if($column_styles['styles']){
		foreach($column_styles['styles'] as $style){
		    array_push($stylesdiv_classes, "style-".$style );
		}
	}
	if($column_styles['show_background_image_of_empty_columns']){
		array_push($stylesdiv_classes, 'mobile-show-bg-img');
	}
	
	//editor styles
	$stylesdiv_styles = array(
		$individual_column_styles["bg-color"],
                $individual_column_styles["bg-image"],
		$column_styles['column_custom_height']
	);
	
	$bundle = $individual_column_styles;
	$bundle['bundle']['column_classes'] = $coldiv_classes;
	$bundle['bundle']['column_styles'] = $coldiv_styles;
	$bundle['bundle']['editor_classes'] = $stylesdiv_classes;
	$bundle['bundle']['editor_styles'] = $stylesdiv_styles;
	
	return $bundle;
}

//**********************************
//Header Content
//**********************************
function section_header(){
	
	ob_start();
		
	if($header = get_sub_field('header')){
		?>
		<div class="header-content">
			<div class="row">
				<div class="col-sm-12">
					<div class="editor-content">
						<?php
						if ( function_exists('slb_activate') ){
							echo slb_activate($header);
						}
						else {
							echo $header;
						}
						?>
					</div>
				</div>
			</div>
		</div>
		<?php
	}

	$content = ob_get_contents();
	ob_end_clean();
	return $content;
}

//**********************************
//Footer Content
//**********************************
function section_footer(){
	
	ob_start();
		
	if($footer = get_sub_field('footer')){
		?>
		<div class="footer-content">
			<div class="row">
				<div class="col-sm-12">
					<div class="editor-content">
						<?php
						if ( function_exists('slb_activate') ){
							echo slb_activate($footer);
						}
						else {
							echo $footer;
						}
						?>
					</div>
				</div>
			</div>
		</div>
		<?php
	}

	$content = ob_get_contents();
	ob_end_clean();
	return $content;
}

?>
