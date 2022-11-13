<?php

get_header();

function output_404(){
     ?>
        <section class="content-block content-block-1col bg-white width-normal height-normal  padding-top-Normal padding-bottom-Normal text-center">

            <div class="container-fluid ">
                <div class="row">
                    <div class="col-sm-12 col-md-10 col-md-offset-1">
                        
                    <div class="content">
                        <div class="row content-row">
                            <div class="col-sm-12">
                                <div class="editor-content">
                                    <h1>Page not found</h1>
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
if( have_rows('page_404', 'option') ):
while ( have_rows('page_404', 'option') ) : the_row();

        if( have_rows('content', 'option') ):
        while ( have_rows('content', 'option') ) : the_row();
        
            get_template_part('partials/flexible-content/content-flexible-content');
        
        endwhile;
        else:
            output_404();
        endif;

endwhile;
else:
    output_404();
endif;

get_footer();

?>