<?php

get_header();

?>

<?php
if(is_home()){
    

    $postspageID = get_option( 'page_for_posts' );
    
    if( have_rows('before_blog_content', $postspageID) ):
    while ( have_rows('before_blog_content', $postspageID) ) : the_row();
    
            if( have_rows('content', $postspageID) ):
            while ( have_rows('content', $postspageID) ) : the_row();
            
                    get_template_part('partials/flexible-content/content-flexible-content');
            
            endwhile;
            else: endif;
    
    endwhile;
    else: endif;

}

if( is_category() || is_tag() ){
    
    $bg = "";
    $classes = "";
    if (function_exists('z_taxonomy_image_url')) {
	$bgimg = z_taxonomy_image_url();
	
	if($bgimg){
	    $bg = 'style="background-image: url('.$bgimg.');"';
	    $classes = 'bg-image white-text padding-bottom-Normal';
	}
    }
    
    global $theme_options;
    if(isset($theme_options) && $theme_options){
	if(isset($theme_options['colors']) && $theme_options['colors']){
	    if(isset($theme_options['colors'][0]['blog_header']) && $theme_options['colors'][0]['blog_header']){
		if($theme_options['colors'][0]['blog_header'][0]['bg']){
		    $classes .= " padding-bottom-Normal";
		}
	    }
	}
    }
    ?>
    <section class="content-block content-block-1col padding-top-Normal hero <?php echo $classes; ?>" <?php echo $bg; ?>>
	
	<div class="container-fluid">
	    <div class="row">
            <div class="col-sm-12 col-md-10 col-md-offset-1">
                <div class="content">
                <div class="row content-row">
                    <div class="col-sm-12">
                    <div class="editor-content">
                        <?php
                        
                        if($catdesc = category_description()){
                        echo $catdesc;
                        }
                        else {
                        the_archive_title( '<h1 class="text-center">', '</h1>' );
                        }
                        ?>
                    </div>
                    </div>
                </div>
                </div>
            </div>
	    </div>
	</div>	

    </section>
    <?php
}

?>
<section class="content-block padding-top-Normal padding-bottom-Normal">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="post-roll">

                    <?php
			if ( have_posts() ) :
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();
					get_template_part( 'partials/blog/article');
				endwhile;
				get_template_part( 'partials/blog/pagination');
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

if(is_home() || is_category() || is_tag()){
    
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

}
?>

<?php

get_footer();

?>