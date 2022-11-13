<section class="anchor-section" id="anchor-point">
	<div class="anchor-bg-container anchor-fixed-container">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12 anchor-container">
					
					<ul class="anchor-list nav">
						<?php
						
						$obj = $post;
						if(is_tax()){
							$obj = get_queried_object();
						}
						else if(is_post_type_archive('faq') || is_post_type_archive('testimonial') || is_post_type_archive('design_studio')){
							$pt = get_queried_object();
							if($pt){
								$tax = get_taxonomy_name($pt->name);
								if($tax){
									$terms = get_terms( array($tax) );
									if($terms){
										$obj = get_term( $terms[0], $tax );
									}
									
								}
							}
							
						}
						
						// loop through the rows of data
						
						while ( have_rows('anchor_link_description', $obj) ) : the_row();

						    // display a sub field value
						    $menuLabel = get_sub_field('menu_item_label', $obj);
						    $anchorlink = get_sub_field('anchor_link', $obj);
						?>
						<li>
							<a href="#<?php echo $anchorlink ?>"><?php echo $menuLabel ?></a>
						</li>

						<?php endwhile; ?>
					</ul>

				</div>

			</div>
		</div>
	</div>
</section>