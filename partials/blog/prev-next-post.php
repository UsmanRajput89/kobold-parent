<section class="prev-next-post post-nav">
    <div class="row">
            <div class="col-sm-6 col-left text-left prev">
                    <?php
                    if( get_adjacent_post(false, '', true) ) { 
                            previous_post_link('%link', '<i class="fa fa-angle-left"></i>Previous Post');
                    }/* else { 
                            $first = new WP_Query('posts_per_page=1&order=DESC&post_type=post'); $first->the_post();
                                    echo '<a href="' . get_permalink() . '"><i class="fa fa-angle-left"></i>Previous Post</a>';
                            wp_reset_query();
                    };*/
                    ?>
            </div>
            <div class="col-sm-6 col-right text-right next">
                    <?php
                    if( get_adjacent_post(false, '', false) ) { 
                            next_post_link('%link', 'Next Post<i class="fa fa-angle-right"></i>');
                    }/* else { 
                            $last = new WP_Query('posts_per_page=1&order=ASC&post_type=post'); $last->the_post();
                                    echo '<a href="' . get_permalink() . '">Next Post<i class="fa fa-angle-right"></i></a>';
                            wp_reset_query();
                    };*/
                    ?>
            </div>
    </div>
</section>