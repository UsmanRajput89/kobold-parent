<?php
global $post;



global $rowIndex;
$rowIndex = 0;

if( class_exists('acf') ) {
    if( have_rows('content', $post->ID) ):
    while ( have_rows('content', $post->ID) ) : the_row();
    
        get_template_part('partials/flexible-content/content-flexible-content');

        $rowIndex++;
            
    endwhile;
    else: endif;
}
else {
    ?>
    <section class="content-block padding-top-Normal padding-bottom-Normal text-center">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <p>Please activate the plugin "Advanced Custom Fields PRO".</p>
                </div>
            </div>
        </div>
    </section>
    <?php
}

?>


