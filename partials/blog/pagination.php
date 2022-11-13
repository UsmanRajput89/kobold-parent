<?php
$pagination = get_the_posts_pagination( array(
'mid_size' => 2,
'prev_text' => __( '<i class="fa fa-angle-left"></i>Previous', 'bstro-launchpad' ),
'next_text' => __( 'Next<i class="fa fa-angle-right"></i>', 'bstro-launchpad' ),
) );
                        
if($pagination) {
    printf('<section class="post-nav">%s</section>', $pagination);
}
?>