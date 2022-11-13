<?php

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5b97ff9dba7b1',
	'title' => 'Page Settings',
	'fields' => array(
		array(
			'key' => 'field_5b97ffef2e412',
			'label' => 'Transparent Header',
			'name' => 'transparent_header',
			'type' => 'true_false',
			'instructions' => 'Remove the header background to display header as part of first/hero block.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'default_value' => 0,
			'ui' => 0,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),
		array(
			'key' => 'field_5b9800852e413',
			'label' => 'Transparent Header Link Color',
			'name' => 'transparent_header_link_color',
			'type' => 'color_picker',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5b97ffef2e412',
						'operator' => '==',
						'value' => '1',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '#ffffff',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'page',
			),
			array(
				'param' => 'page_type',
				'operator' => '!=',
				'value' => 'posts_page',
			),
			array(
				'param' => 'page_template',
				'operator' => '!=',
				'value' => 'styleguide.php',
			),
		),
	),
	'menu_order' => -1,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

endif;

?>