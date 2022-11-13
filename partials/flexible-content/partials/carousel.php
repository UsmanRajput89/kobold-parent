<?php

global $rowIndex;

//section styles
$section_style = section_styles_bundled(section_styles('style'));

//columns styles    
$column_styles = column_styles();


// column width classes
$colW = "";
switch($column_styles['col-per-row']){
    case 1:
        $colW = "col-sm-12 col-xs-12";
        break;
    case 2:
        $colW = "col-lg-6 col-xs-6";
        break;
    case 3:
        $colW = "col-lg-4 col-xs-4";
        break;
    case 4:
        $colW = "col-lg-3 col-md-3 col-xs-3";
        break;
    case 5:
        $colW = "col-xlg-fifth col-lg-fifth col-xs-fifth";
        break;
    case 6:
        $colW = "col-lg-2 col-md-2 col-xs-2";
        break;
        
}

$carousel_settings = $column_styles['carousel'];
$sliderClasses = array();
$slick_settings = array();

//defaults
$slick_settings['slidesToShow'] = (int)$column_styles['col-per-row'];
$slick_settings['slidesToScroll'] = (int)$column_styles['col-per-row'];
$slick_settings['appendDots'] = "#slick-dots-wrapper-".$rowIndex;
$slick_settings['responsive'] = '[ { "breakpoint": 768, "settings": { "slidesToShow": 1, "slidesToScroll": 1 } } ]';


if($carousel_settings['effect'] == "fade"){
    $slick_settings['cssEase'] = 'linear';
    $slick_settings['speed'] = 0;
    array_push($sliderClasses, 'slider-slides-fade'); //add class so we can add custom css to make the slides fade on multiple slides per screen
}

if($carousel_settings['autoplay']){
    $slick_settings['autoplay'] = true;
    $slick_settings['autoplaySpeed'] = ((int)$carousel_settings['speed']) * 1000;
}

$slick_settings['arrows'] = false; //reset arrows
if(isset($carousel_settings['navigation'])){
    foreach($carousel_settings['navigation'] as $n){
        $slick_settings[$n] = true;
    }
}

$slick = array();
foreach($slick_settings as $k => $v){
    
    if(is_bool($v) || substr( $v, 0, 1 ) === "["){ //if bool or object
        if(is_bool($v)){
            $v = $v ? 'true' : 'false';
        }
        array_push($slick, '"'.$k.'" : '.$v);
    }
    else if(is_int($v)){ //if interger
        array_push($slick, '"'.$k.'" : '.$v);
    }
    else {
        array_push($slick, '"'.$k.'" : "'.$v.'"');
    }
    
}

//add to section classes
array_push($section_style['bundle']['classes'], 'cols-per-row-'.$column_styles['col-per-row']);
?>
<section class="content-block content-block-carousel <?php echo join(' ', $section_style['bundle']['classes']); ?>" <?php echo 'style="'.join(' ', $section_style['bundle']['styles']).'"'; ?>>
	
	<div id="<?php echo $section_style["id"]; ?>" class="anchor"></div>
	
	<?php if($section_style['bg-video']){ echo $section_style['bg-video']; } ?>
	
	<?php if($section_style['overlay']){ echo $section_style['overlay']; } ?>
	
	<div class="container-fluid <?php if($section_style["width"] == "width-full-width") { echo 'no-max'; }?>">
	
		<div class="row">
			<div class="<?php echo $section_style["widthClass"]; ?>">
				
				<div class="content">
                            
                                    <?php echo section_header(); ?>
                                    
                                    <div class="row content-row">
                                        <div class="<?php if($slick_settings['arrows']) { echo 'col-xs-10 col-xs-offset-1'; }else { echo 'col-sm-12'; }?>">
					    <?php
					    if(array_key_exists('dots', $slick_settings)){
						?>
						<div id="slick-dots-wrapper-<?php echo $rowIndex; ?>" class="slick-dots-wrapper"></div>
						<?php
					    }
					    ?>
                                            <div id="slider-row-<?php echo $rowIndex; ?>" class="slider-row row <?php echo join(' ', $sliderClasses); ?>" data-slick='{ <?php echo join(',', $slick); ?> }' >
                                                
                                                <?php
                                        
                                                    $colClass = "col-left";
                                                    $flag = 1;
                                                
                                                    if( have_rows('column_content') ): while ( have_rows('column_content') ) : the_row();
                                                    
                                                        $column_settings = column_styles_bundled(section_styles('column_settings'), $column_styles);
                                                        
                                                        ?>
                                                        <div class="col <?php echo $colW.' '.join(' ', $column_settings['bundle']['column_classes']); ?>" <?php echo 'style="'.join(' ', $column_settings['bundle']['column_styles']).'"'; ?>>
                                                            <div class="styles <?php echo join(' ', $column_settings['bundle']['editor_classes']); ?>" <?php echo 'style="'.join(' ', $column_settings['bundle']['editor_styles']).'"'; ?>>
                                                                
								<?php if($column_settings['bg-video']){ echo $column_settings['bg-video']; } ?>
							
								<?php if($column_settings['overlay']){ echo $column_settings['overlay']; } ?>
							
								<div class="editor-content">
								    <?php
								    $editorContent = "";
								    if ( function_exists('slb_activate') ){
									    $editorContent = slb_activate(get_sub_field('column'));
								    }
								    else {
									    $editorContent = get_sub_field('column');
								    }
								    echo do_shortcode($editorContent); //we have to put in a shortcode to get the flexi editor content to show in options page
								    ?>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                        <?php
                                                        $flag++;
                                                        
                                                    endwhile; else: endif;
                                                ?>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                    <?php echo section_footer(); ?>
                                </div>
			</div>
		</div>
		
	</div>
	

</section>
