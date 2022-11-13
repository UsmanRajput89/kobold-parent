<?php
/*
@package bstro-launchpad

    =======================
        AJAX FUNCTIONS
    =======================
*/

// // These actions allow users who are both signed in and not - to exicute this "load_more" function
// add_action( 'wp_ajax_nopriv_load_more', 'load_more' );
// add_action( 'wp_ajax_load_more', 'load_more' );

// function load_more() {

// // remove following line
// $paged = $_POST["page"];
// echo $paged;
// echo "Not a caching error";
//     // load more posts

//     // $paged = $_POST["page"] + 1;
//     // $query = new WP_Query ( array(
//     //     'post_type' => 'post',
//     //     'paged' => $paged
//     // ));

//     // if( $query->have_posts() ):
//     //     while ( $query->have_posts() ) :
//     //         the_post();
//     //         echo '<hr class="blog-post-line"/>';
            // get_template_part( 'partials/blog/article-excerpt');
//     //     endwhile;
//     // endif;

//     // wp_reset_postdata();

//     die();
// }