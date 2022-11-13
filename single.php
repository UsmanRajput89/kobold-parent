<?php

get_header();

?>

<section class="content-block post-hero text-center padding-top-Small padding-bottom-Normal">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-10 col-md-offset-1">
                <div class="content">
                    <div class="header-content">
                        <div class="row">
                            <div class="col-sm-12">
                                <?php echo do_shortcode('[breadcrumb]'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row content-row">
                        <div class="col-sm-12">
                            <h1><?php the_title(); ?></h1>
                            <?php
                            if($desc = get_field('post_description')){
                                echo $desc;
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>	
</section>

<section class="content-block padding-top-Normal padding-bottom-Normal">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="post-single">
                    <?php
			if ( have_posts() ) :

				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					get_template_part( 'partials/blog/article');
                    get_template_part( 'partials/blog/prev-next-post');

				endwhile;

			else :

				get_template_part( 'partials/blog/no-content' );

			endif;
			?>
                </div>
            </div>
            <div class="col-lg-4">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</section>

<?php
$postspageID = get_option( 'page_for_posts' );

if( have_rows('after_blog_content', $postspageID) ):
while ( have_rows('after_blog_content', $postspageID) ) : the_row();

	if( have_rows('content', $postspageID) ):
        while ( have_rows('content', $postspageID) ) : the_row();
        
                get_template_part('partials/flexible-content/content-flexible-content');
        
        endwhile;
        else: endif;

endwhile;
else: endif;

?>
<?php


get_footer();

?>