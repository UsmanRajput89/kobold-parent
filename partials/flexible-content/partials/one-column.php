<?php

//section styles
$section_style = section_styles_bundled(section_styles('style'));

?>
<section <?php if($section_style["id"] !=""){echo "id='" . $section_style["id"] . "-section'";} ?> class="content-block content-block-1col <?php echo join(' ', $section_style['bundle']['classes']); ?>" <?php echo 'style="'.join(' ', $section_style['bundle']['styles']).'"'; ?>>
	
	<div id="<?php echo $section_style["id"]; ?>" class="anchor"></div>
	
	<?php if($section_style['bg-video']){ echo $section_style['bg-video']; } ?>
	
	<?php if($section_style['overlay']){ echo $section_style['overlay']; } ?>
	
	<div class="container-fluid <?php if($section_style["width"] == "width-full-width") { echo 'no-max'; }?>">
		<div class="row">
			<div class="<?php echo $section_style["widthClass"]; ?>">
				
				<div class="content">
					<?php echo section_header(); ?>
					<div class="row content-row">
						<div class="col-sm-12">
							<div class="editor-content">
								<?php
								$editorContent = "";
								if ( function_exists('slb_activate') ){
									$editorContent = slb_activate(get_sub_field('content'));
								}
								else {
									$editorContent = get_sub_field('content');
								}
								echo do_shortcode($editorContent); //we have to put in a shortcode to get the flexi editor content to show in options page
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
