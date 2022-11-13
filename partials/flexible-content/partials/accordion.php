<?php

//section styles
$section_style = section_styles_bundled(section_styles('style'));

global $rowIndex;
?>
<section class="content-block content-block-accordion <?php echo join(' ', $section_style['bundle']['classes']); ?>" <?php echo 'style="'.join(' ', $section_style['bundle']['styles']).'"'; ?>>
	
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
							<div class="panel-group accordion" id="#accordion-<?php echo $rowIndex; ?>" role="tablist" aria-multiselectable="true">
								<?php
								$items = get_sub_field('accordion_item');
								//output($items);
								//$items = false;
								
								//no category view
								if($items && count($items) == 1 && $items[0]['category'] == ""){
									$flag = 0;
									$items = $items[0]['items'];
									foreach($items as $item){
										?>
										
										<div class="panel panel-default">
											<div class="panel-heading <?php if(!$item['content']){ echo 'no-content';} ?>" role="tab" id="heading-<?php echo $rowIndex.'-'.$flag; ?>">
												<a class="collapsed collapse-btn" role="button" data-toggle="collapse" href="#collapse-<?php echo $rowIndex.'-'.$flag; ?>" aria-expanded="false" aria-controls="collapse-<?php echo $rowIndex.'-'.$flag; ?>">
													<h3 class="h5 panel-title">
														<?php echo $item['title']; ?>
													</h3>
													<span class="toggle"></span>
												</a>
											</div>
											<?php
											if($item['content']){
												?>
												<div id="collapse-<?php echo $rowIndex.'-'.$flag; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-<?php echo $rowIndex.'-'.$flag; ?>">
													<div class="panel-body">
													  <div class="editor-content">
														  
														<?php
														$editorContent = "";
														if ( function_exists('slb_activate') ){
															$editorContent = slb_activate($item['content']);
														}
														else {
															$editorContent = $item['content'];
														}
														echo do_shortcode($editorContent); //we have to put in a shortcode to get the flexi editor content to show in options page
														?>
													  </div>
													</div>
												</div>
												<?php
											}
											?>
											
										</div>
										<?php
										$flag++;
									}
								}
								else {
									//nav
									echo '<ul class="nav nav-tabs" role="tablist">';
									
									$flagA = 0;
									foreach($items as $k => $section){
										//only put into the nav the ones with categories
										if($section['category']){
											$class = "";
											if($flagA == 0){
												$class = "active";
											}
											printf('<li role="presentation" class="%s"><a href="#%s" aria-controls="%s" role="tab" data-toggle="tab">%s</a></li>', $class, $rowIndex.'-'.$k, $rowIndex.'-'.$k, $section['category']);
											
											$flagA++;
										}
										
										
									}
									echo '</ul>';
									
									//content
									echo '<div class="tab-content">';
									$flagB = 0;
									foreach($items as $k => $section){
										//only put into the tabs the ones with categories
										if($section['category']){
											
											$class = "";
											if($flagB == 0){
												$class = "active";
											}
											
											//start tab panel
											echo '<div role="tabpanel" class="tab-pane '.$class.'" id="'.$rowIndex.'-'.$k.'">';
											
												$flag = 0;
												$sectionitems = $section['items'];
												foreach($sectionitems as $item){
													?>
													
													<div class="panel panel-default">
														<div class="panel-heading <?php if(!$item['content']){ echo 'no-content';} ?>" role="tab" id="heading-<?php echo $rowIndex.'-'.$k.'-'.$flag; ?>">
															<a class="collapsed collapse-btn" role="button" data-toggle="collapse" href="#collapse-<?php echo $rowIndex.'-'.$k.'-'.$flag; ?>" aria-expanded="false" aria-controls="collapse-<?php echo $rowIndex.'-'.$flag; ?>">
																<h3 class="h5 panel-title">
																	<?php echo $item['title']; ?>
																</h3>
																<span class="toggle"></span>
															</a>
														</div>
														<?php
														if($item['content']){
															?>
															<div id="collapse-<?php echo $rowIndex.'-'.$k.'-'.$flag; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-<?php echo $rowIndex.'-'.$k.'-'.$flag; ?>">
																<div class="panel-body">
																  <div class="editor-content">
																	  <?php echo apply_filters( 'the_content', $item['content'] ); ?>
																  </div>
																</div>
															</div>
															<?php
														}
														?>
														
													</div>
													<?php
													$flag++;
												}
											
											echo '</div>';
											//end tab panel
											
											$flagB++;
										}
									}
									echo '</div>';
								}
								?>
						</div>
					</div>
					<?php echo section_footer(); ?>
				</div>
				
			</div>
		</div>
	</div>	

</section>