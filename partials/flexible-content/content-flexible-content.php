<?php

$theme_dir = get_bloginfo('stylesheet_directory');
$homeurl = get_bloginfo('url');
global $post;

$originalPost = $post;



	//--------------------------------------------------------------------
	//One Column
	//----------------------------------
	if( get_row_layout() == 'one-column' ):
        
		get_template_part( 'partials/flexible-content/partials/one-column');
		
	//--------------------------------------------------------------------
	//Two Column
	//----------------------------------
	elseif( get_row_layout() == 'two-columns' ):
	
		get_template_part( 'partials/flexible-content/partials/two-column');
		
	//--------------------------------------------------------------------
	//Multi Column
	//----------------------------------
	elseif( get_row_layout() == 'multi-columns' ):
	
		get_template_part( 'partials/flexible-content/partials/multi-column');
                
        //--------------------------------------------------------------------
	// Image + Text
	//----------------------------------
	elseif( get_row_layout() == 'image_text' ):
	
		get_template_part( 'partials/flexible-content/partials/image-text');
                
        //--------------------------------------------------------------------
	//Carousel
	//----------------------------------
	elseif( get_row_layout() == 'carousel' ):
	
		get_template_part( 'partials/flexible-content/partials/carousel');
                
        //--------------------------------------------------------------------
	//Accordion
	//----------------------------------
	elseif( get_row_layout() == 'accordion' ):
	
		get_template_part( 'partials/flexible-content/partials/accordion');
                
        //--------------------------------------------------------------------
	//HTML
	//----------------------------------
	elseif( get_row_layout() == 'html' ):
	
		echo get_sub_field('content');
                
        //--------------------------------------------------------------------
	//POPUP
	//----------------------------------
	elseif( get_row_layout() == 'popup' ):
	
		get_template_part( 'partials/flexible-content/partials/popup');
		
		
	//--------------------------------------------------------------------
	//Reusable Block
	//----------------------------------
	elseif( get_row_layout() == 'reusable_block' ):
	    
	    $reusableObj = get_sub_field('choose_reusable_block');
		
	    //change the default post to the reusable block post so the include below uses it instead of the original
	    $post = $reusableObj;

	    //we grab the content of the reusable block
	    if( have_rows('content', $post->ID) ):	   
	    while ( have_rows('content', $post->ID) ) : the_row();
	        //we include this file into itself so the reusable block can use the same code for its flexi content
	        get_template_part('partials/flexible-content/content-flexible-content', false, false);
	    
	    endwhile;
	    endif;

		//change back the default post to the original one
		$post = $originalPost;
	
        
	//--------------------------------------------------------------------
	//Anchor Menu
	//----------------------------------
	elseif( get_row_layout() == 'anchor_menu' ):
	
		get_template_part( 'partials/flexible-content/partials/anchor-menu');
                
                
	else: endif;
?>
