	</main> <!--#content-->
	
	<?php
	if( have_rows('lp_s_footer', 'option') ):
        while ( have_rows('lp_s_footer', 'option') ) : the_row();

                if( have_rows('content') ):
                while ( have_rows('content') ) : the_row();
                        
                        echo '<footer class="main-footer">';
                                get_template_part('partials/flexible-content/content-flexible-content');
                        echo '</footer>';
                        
                endwhile;
                else: endif;
        
        endwhile;
        else: endif;
	?>
        
</div> <!--#page-->

<?php wp_footer(); ?>

<?php
echo get_field('lp_s_css','option');
echo get_field('lp_s_js','option');
?>
</body>
</html>
