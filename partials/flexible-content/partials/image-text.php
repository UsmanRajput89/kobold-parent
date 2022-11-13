<?php

//section styles
$section_style = section_styles_bundled(section_styles('style'));

//columns styles    
$column_styles = column_styles();


?>
<section class="content-block content-block-cols content-block-image-text <?php echo join(' ', $section_style['bundle']['classes']); ?>" <?php echo 'style="'.join(' ', $section_style['bundle']['styles']).'"'; ?>>
	
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
                                                
                                                ?>
                                                <div class="col col-xs-12 col-sm-12 col-md-6 <?php echo join(' ', $column_settings['bundle']['column_classes']); ?>" data-mh="col" <?php echo 'style="'.join(' ', $column_settings['bundle']['column_styles']).'"'; ?>>
                                                    <div class="styles <?php echo join(' ', $column_settings['bundle']['editor_classes']); ?>" <?php echo 'style="'.join(' ', $column_settings['bundle']['editor_styles']).'"'; ?>>
                                                        
							<?php if($column_settings['bg-video']){ echo $column_settings['bg-video']; } ?>
							
							<?php if($column_settings['overlay']){ echo $column_settings['overlay']; } ?>
							
							<div class="row">
                                                            <div class="col col-sm-4 col-md-12 col-lg-4 col-text">
                                                                <?php
                                                                $img = get_sub_field('image');
                                                                printf('<img src="%s" alt="%s" title="%s">', $img['url'], $img['alt'], $img['title']);
                                                                ?>
                                                            </div>
                                                            <div class="col col-sm-8 col-md-12  col-lg-8">
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
