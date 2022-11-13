<?php
add_shortcode('pull-singles', 'pullsingles');
function pullsingles($args) {
    
    ob_start();
    
    //default
    $post_args = array(
        'posts_per_page'        => 3,
        'show-featured-image'   => 'true',
        'title-class'           => 'h4',
        'more-cta'              => 'Read more',
        'more-cta-class'        => 'cta',
        'show-excerpt'          => 'true',
        'truncate-excerpt'      => 100,
        'excerpt-more'          => '&hellip;'
        
    );
    //output($post_args);
    
    //replace default with author-defined args
    if($args){
        
        foreach($args as $k => $a){
            $post_args[$k] = $a;
        }
    }
    //output($post_args);
    
    //declare wp args for getting posts
    $wpargs = array(
        'posts_per_page',
        'offset',
        'category',
        'category_name',
        'orderby',
        'order',
        'include',
        'exclude',
        'meta_key',
        'meta_value',
        'post_type',
        'post_mime_type',
        'post_parent',
        'author',
        'author_name',
        'post_status',
        'suppress_filters',
        'fields'
    );
    
    //get posts
    $get_post_args = array();   
    foreach($post_args as $k => $a){
        if(in_array($k, $wpargs)){
            $get_post_args[$k] = $a; // only push wp args
        }
    }
    $posts_array = get_posts($get_post_args);
    //output($posts_array);
    
    if($posts_array){
        
        // column width classes
        $colW = "col-xlg-fifth col-lg-4 col-sm-12"; //default 5 as per wp
        
        if($post_args){
            if(array_key_exists('posts_per_page',$post_args)){
                switch($post_args['posts_per_page']){
                    case 1:
                        $colW = "col-sm-12";
                        break;
                    case 2:
                        $colW = "col-sm-12 col-md-6";
                        break;
                    case 3:
                        $colW = "col-lg-4 col-sm-12";
                        break;
                    case 4:
                        $colW = "col-lg-3 col-md-6 col-sm-12";
                        break;
                    case 5:
                        $colW = "col-xlg-fifth col-lg-4 col-sm-12";
                        break;
                    case 6:
                        $colW = "col-lg-2 col-md-4 col-sm-12";
                        break;
                        
                }
            }
        }
        ?>
        <section class="pull-singles">
            <div class="row">
                <?php
                foreach($posts_array as $p){
                    echo '<div class="col '.$colW.'" data-mh="col"><article class="item">';
                    
                        if($post_args && isset($post_args['show-featured-image']) && $post_args['show-featured-image']){
                            if(has_post_thumbnail($p->ID)){
                                printf('<a href="%s" class="thumb bg-image" style="background-image: url(%s);">%s</a>', get_permalink($p->ID), get_the_post_thumbnail_url($p->ID), get_the_post_thumbnail($p->ID, 'thumbnail', array( 'class' => 'hidden-md hidden-lg hidden-xlg' )));
                            }
                        }
                        
                        echo '<div data-mh="mh">';
                        
                            printf('<h1 %s><a href="%s">%s</a></h1>', (isset($post_args['title-class']) && $post_args['title-class']) ? 'class="'.$post_args['title-class'].'"' : '', get_permalink($p->ID), $p->post_title);
                            
                            if($post_args && isset($post_args['show-excerpt']) && $post_args['show-excerpt'] == "true"){
                                if($p->post_excerpt){
                                    
                                    if(isset($post_args['truncate-excerpt']) && $post_args['truncate-excerpt']){
                                        printf('<p>%s %s</p>', substr($p->post_excerpt,0,$post_args['truncate-excerpt']), (isset($post_args['excerpt-more']) && $post_args['excerpt-more']) ? $post_args['excerpt-more'] : '');
                                    }
                                    else {
                                        printf('<p>%s</p>', $p->post_excerpt);
                                    }
                                    
                                }
                            }
                            
                        echo '</div>';
                        
                        if($post_args && isset($post_args['more-cta']) && $post_args['more-cta']){
                            printf('<p><a href="%s" %s>%s</a></p>', get_permalink($p->ID), (isset($post_args['more-cta-class']) && $post_args['more-cta-class']) ? 'class="'.$post_args['more-cta-class'].'"' : '', $post_args['more-cta']);
                        }
                    echo '</article></div>';
                }
                ?>
            </div>
        </section>
        <?php
    }

    $content = ob_get_contents();
    ob_end_clean();
    return $content;
}


?>