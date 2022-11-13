<?php

//section styles
$section_style = section_styles_bundled(section_styles('style'));


//columns styles    
$column_styles = column_styles();


// column width classes
$colLW = "";
$colRW = "";
if($column_styles['column_width']){
    switch ($column_styles['column_width']) {
        case "1_1":
            $colLW = "col-sm-12 col-md-6";
            $colRW = "col-sm-12 col-md-6";
            break;
        case "1_3":
            $colLW = "col-sm-12 col-md-4";
            $colRW = "col-sm-12 col-md-8";
            break;
        case "3_1":
            $colLW = "col-sm-12 col-md-8";
            $colRW = "col-sm-12 col-md-4";
            break;
        case "5_7":
            $colLW = "col-sm-12 col-md-5";
            $colRW = "col-sm-12 col-md-7";
            break;
        case "7_5":
            $colLW = "col-sm-12 col-md-7";
            $colRW = "col-sm-12 col-md-5";
            break;
    }
}


?>
<section <?php if($section_style["id"] !=""){echo "id='" . $section_style["id"] . "-section'";} ?> class="content-block content-block-cols content-block-2col <?php echo join(' ', $section_style['bundle']['classes']); ?>" <?php echo 'style="'.join(' ', $section_style['bundle']['styles']).'"'; ?>>
	
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
                                        
                                        //get column content and styles
                                        $columns = array();
                                        if( have_rows('column_content') ): while ( have_rows('column_content') ) : the_row();
                                            $arr = array();
                                            $arr['content'] = get_sub_field('column');
                                            $arr['styles'] = column_styles_bundled(section_styles('column_settings'), $column_styles);
                                            array_push($columns, $arr);
                                        endwhile; else: endif;

                                        
                                        //logic for column order
                                        ////if stacking each right col first on mobile
                                        
                                        $evenCols = array(); //array to collect all even cols
                                        $columnsNew = array(); //array to loop through for outputting if next line is true
                                        if($column_styles["reverse_stacking"]){ //if stacking each right col first on mobile
                                            
                                            //grab each even col
                                            foreach($columns as $k => $col){
                                                if(($k + 1) % 2 == 0){ //offset $k by 1 cuz we want to start at 1, not 0 so we get evens with this if statement
                                                    array_push($evenCols, $col);
                                                }
                                            }
                                            
                                            //output each even col in front of its corresponding odd col
                                            foreach($columns as $k => $col){
                                                if($k %2 == 0){ // detect each odd col, not offsetting by 1 here so we get odd
                                                    $i = $k / 2;
                                                    //output($i);
                                                    array_push($columnsNew, $evenCols[$i]); //get this col's even col and put into new array
                                                    array_push($columnsNew, $col); //then put this col into the new array too
                                                }
                                                else {
                                                    //if even, add into new array
                                                    array_push($columnsNew, $col);
                                                }
                                            }
                                            
                                            //replace original $columns to loop through with $columnsNew because we want to use it instead
                                            $columns = $columnsNew;
                                            
                                        }
                                        
                                        $flag = 1; // we're using this flag to out put "col-right" for even columns and "col-left" for odd
                                        $detect = 2; // lets set this to 2 for every 2 or even
                                        
                                        if($column_styles["reverse_stacking"]){ //but if stacking each right col first on mobile
                                            $detect = 3; // we have to change the detection to every 3rd col
                                        }
                                        
                                    
                                        foreach($columns as $k => $column){
                                            
                                            $colClasses = array();
                                            
                                            $noContent = "";
                                            if($column['content'] == ""){
						if(!$column_styles['show_background_image_of_empty_columns']){
						    $noContent = "hidden-xs hidden-sm no-content";
						    array_push($colClasses, $noContent);
						}
						else {
						    $noContent = "no-content";
						    array_push($colClasses, $noContent);
						}
                                                
                                            }
                                            
                                            
                                            $stack_right_column_first_on_mobile_VISIBILITY = "";
                                            if($column_styles["reverse_stacking"] ){ // if stacking each right col first on mobile, set visibility/invisibility for each col
                                                
                                                // every (3n+0), hide it for desktop only and show on mobile
                                                if($k % 3 == 0){
                                                    $stack_right_column_first_on_mobile_VISIBILITY = "visible-xs-block visible-sm-block";
                                                }
                                                
                                                //every (3n+2), show for desktop only and hide on mobile
                                                if(($k % 3 ) - 2 == 0){
                                                    $stack_right_column_first_on_mobile_VISIBILITY = "hidden-xs hidden-sm";
                                                }
                                                
                                                //add to classes
                                                array_push($colClasses, $stack_right_column_first_on_mobile_VISIBILITY);
                                                
                                                //setting col-right, col-left
                                                if($flag % $detect == 0 || ($flag - 1) % $detect == 0):
                                                    array_push($colClasses, 'col-right '.$colRW);
                                                else:
                                                    array_push($colClasses, 'col-left '.$colLW);
                                                endif;
                                            }
                                            else {
                                                if($flag % $detect == 0 ):
                                                    array_push($colClasses, 'col-right '.$colRW);
                                                else:
                                                    array_push($colClasses, 'col-left '.$colLW);
                                                endif;
                                            }
                                            
                                            //merge classes
                                            $colClasses = array_merge($colClasses, $column['styles']['bundle']['column_classes']);
                                            
                                            ?>
                                            <div class="col col-xs-12 <?php echo join(' ', $colClasses); ?>" data-mh="col" <?php echo 'style="'.join(' ', $column['styles']['bundle']['column_styles']).'"'; ?>>
                                                <div class="styles <?php echo join(' ', $column['styles']['bundle']['editor_classes']); ?>" <?php echo 'style="'.join(' ', $column['styles']['bundle']['editor_styles']).'"'; ?>>
                                                    
						    <?php if($column['styles']['bg-video']){ echo $column['styles']['bg-video']; } ?>
						    
						    <?php if($column['styles']['overlay']){ echo $column['styles']['overlay']; } ?>
						    
						    <div class="editor-content">
                                                        <?php
							    if($column['content']){
								$editorContent = "";
								    if ( function_exists('slb_activate') ){
									    $editorContent = slb_activate($column['content']);
								    }
								    else {
									    $editorContent = $column['content'];
								    }
								    echo do_shortcode($editorContent); //we have to put in a shortcode to get the flexi editor content to show in options page
							    }
							    else {
								if($column['styles']['bg-image-url']){
								    printf('<img src="%s" class="hidden-md hidden-lg hidden-xlg">', $column['styles']['bg-image-url']);
								}
							    }
                                                        ?>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <?php
                                            
                                            if($flag %2 == 0):
                                            endif;
                                            $flag++;
                                        }
                                        ?>
                                    </div>
                                    
                                    <?php echo section_footer(); ?>
                                </div>
			</div>
		</div>
		
	</div>
	

</section>
