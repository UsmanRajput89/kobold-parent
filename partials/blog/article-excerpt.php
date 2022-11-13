<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php

	if(is_single()){
		the_content();
	}
	else {
		?>
		<div class="row">
			<div class="col-sm-12">
				<div class="article-content">

					<div class="text">
						<?php
						printf('<h1 class="h4"><a href="%s">%s</a></h1>', get_the_permalink(), get_the_title());
						if($excerpt = get_the_excerpt()){?>
							<div class="blog-post-flex">
							<?php
							printf('<p>%s</p>', $excerpt);
						}
						printf('<p><a href="%s">Read More</a></p>', get_the_permalink());
						echo '</div>';
						?>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
	?>
	

</article><!-- #post-## -->
