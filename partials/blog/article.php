<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	if(is_single()){
		the_content();
		
		?>
		<footer>
			<p><?php echo get_the_date('F j, Y'); ?></p>
			<p>Categories: <?php echo get_the_category_list(', '); ?></p>
			<?php if($tags = get_the_tag_list('',', ')){ printf('<p>Tags: %s</p>',$tags); } ?>
		</footer>
		<?php
	}
	else {
		?>
		<div class="row">
			<div class="col-sm-12">
				<div class="article-content">
					<?php
					if(has_post_thumbnail()){
						printf('<a href="%s" class="thumb" style="background-image: url(%s);">%s</a>', get_the_permalink(), get_the_post_thumbnail_url(), get_the_post_thumbnail($post->ID, 'thumbnail', array( 'class' => 'hidden' )));
					}
					?>
					
					<div class="text">
						<?php
						printf('<h1 class="h4"><a href="%s">%s</a></h1>', get_the_permalink(), get_the_title());
						if($excerpt = get_the_excerpt()){
							printf('<p>%s</p>', $excerpt);
						}
						printf('<p><a href="%s">Read more</a></p>', get_the_permalink());
						
						if($post->post_type == "post"){	
						?>
							<footer>
								<p><?php echo get_the_date('F j, Y'); ?></p>
								<p>Categories: <?php echo get_the_category_list(', '); ?></p>
								<?php if($tags = get_the_tag_list('',', ')){ printf('<p>Tags: %s</p>',$tags); } ?>
							</footer>
						<?php
						}
						?>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
	?>
	

</article><!-- #post-## -->
