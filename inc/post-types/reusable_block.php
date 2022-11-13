<?php

function cptui_register_my_cpts_reusable_block() {

	/**
	 * Post Type: Reusable Bock.
	 */

	$labels = array(
		"name" => __( "Resuable Blocks", "bstro-launchpad" ),
		"singular_name" => __( "Resuable Block", "bstro-launchpad" ),
	);

	$args = array(
		"label" => __( "Resuable Blocks", "bstro-launchpad" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "reusable_block", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "revisions" ),
	);

	register_post_type( "reusable_block", $args );
}

add_action( 'init', 'cptui_register_my_cpts_reusable_block' );


?>