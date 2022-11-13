<?php

//section styles
$section_style = section_styles_bundled(section_styles('style'));

//columns styles    
$column_styles = column_styles();


// column width classes
$colW = "";
switch($column_styles['col-per-row']){
    case 3:
        $colW = "col-lg-4 col-sm-12";
        break;
    case 4:
        $colW = "col-lg-3 col-md-6 col-sm-12";
        break;
    case 5:
        $colW = "col-xlg-fifth col-lg-4 col-sm-12";
        break;
    case 6:
        $colW = "col-lg-2 col-md-4 col-sm-12";
        break;
        
}

array_push($section_style['bundle']['classes'], 'cols-per-row-'.$column_styles['col-per-row']);


?>
<section <?php if($section_style["id"] !=""){echo "id='" . $section_style["id"] . "-section'";} ?> class="content-block content-block-cols content-block-multi-col <?php echo join(' ', $section_style['bundle']['classes']); ?>" <?php echo 'style="'.join(' ', $section_style['bundle']['styles']).'"'; ?>>
	
	<div id="<?php echo $section_style["id"]; ?>" class="anchor"></div>
	
	<?php if($section_style['bg-video']){ echo $section_style['bg-video']; } ?>
	
	<?php if($section_style['overlay']){ echo $section_style['overlay']; } ?>
	
	<div class="container-fluid <?php if($section_style["width"] == "width-full-width") { echo 'no-max'; }?>">
	
		<div class="row">
			<div class="<?php echo $section_style["widthClass"]; ?>">
				
				<div class="content">
                            
                                    <?php echo section_header(); ?>
                                    
                                    <div class="row content-row">
                                        <?php
                                        
                                            $colClass = "col-left";
                                            $flag = 1;
                                        
                                            if( have_rows('column_content') ): while ( have_rows('column_content') ) : the_row();
                                                $column_settings = column_styles_bundled(section_styles('column_settings'), $column_styles);
                                                $content = get_sub_field('column');
						if($content == ""){
						    if(!$column_styles['show_background_image_of_empty_columns']){
							$noContent = "hidden-xs hidden-sm no-content";
							array_push($column_settings['bundle']['column_classes'], $noContent);
						    }
						    else {
							$noContent = "no-content";
							array_push($column_settings['bundle']['column_classes'], $noContent);
						    }
						}
                                                ?>
                                                <div class="col col-xs-12 <?php echo $colW.' '.join(' ', $column_settings['bundle']['column_classes']); ?>" data-mh="col" <?php echo 'style="'.join(' ', $column_settings['bundle']['column_styles']).'"'; ?>>
                                                    <div class="styles <?php echo join(' ', $column_settings['bundle']['editor_classes']); ?>" <?php echo 'style="'.join(' ', $column_settings['bundle']['editor_styles']).'"'; ?>>
                                                        
							<?php if($column_settings['bg-video']){ echo $column_settings['bg-video']; } ?>
							
							<?php if($column_settings['overlay']){ echo $column_settings['overlay']; } ?>
							
							<div class="editor-content">
                                                            <?php
								if($content){
								    $editorContent = "";
								    if ( function_exists('slb_activate') ){
									    $editorContent = slb_activate($content);
								    }
								    else {
									    $editorContent = $content;
								    }
								    echo do_shortcode($editorContent); //we have to put in a shortcode to get the flexi editor content to show in options page
								}
								else {
								    if($column_settings['bg-image-url']){
									printf('<img src="%s" class="hidden-md hidden-lg hidden-xlg">', $column_settings['bg-image-url']);
								    }
								}
							    ?>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <?php
                                                $flag++;
                                                
                                            endwhile; else: endif;
                                        ?>
                                    </div>
                                    
                                    <?php echo section_footer(); ?>
                                </div>
			</div>
		</div>
		
	</div>
	

</section>
