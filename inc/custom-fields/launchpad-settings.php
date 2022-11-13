<?php

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5b622b2798727',
	'title' => 'Launchpad Settings',
	'fields' => array(
		array(
			'key' => 'field_5b622b46d9655',
			'label' => 'Header',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 0,
		),
		array(
			'key' => 'field_5b622c51d9658',
			'label' => 'Logo',
			'name' => 'lp_s_logo',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
			'preview_size' => 'thumbnail',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array(
			'key' => 'field_5b980d6ebaee6',
			'label' => 'Logo Inverted',
			'name' => 'lp_s_logo_inv',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
			'preview_size' => 'thumbnail',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array(
			'key' => 'field_5b9063d4e37a7',
			'label' => 'Logo width (px)',
			'name' => 'lp_s_logo_w',
			'type' => 'number',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'min' => '',
			'max' => '',
			'step' => '',
		),
		array(
			'key' => 'field_5b632c881f60a',
			'label' => 'Show tagline in header',
			'name' => 'lp_s_tagline',
			'type' => 'true_false',
			'instructions' => 'Go to Settings > General to update tagline.',
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
			'key' => 'field_5b6c6eacd81a9',
			'label' => 'Footer',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 0,
		),
		array(
			'key' => 'field_5b7dd5f102cba',
			'label' => 'Footer',
			'name' => 'lp_s_footer',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => '',
			'min' => 1,
			'max' => 1,
			'layout' => 'table',
			'button_label' => '',
			'sub_fields' => array(
				array(
					'key' => 'field_5b7f012cdf672',
					'label' => 'Content',
					'name' => 'content',
					'type' => 'clone',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'clone' => array(
						0 => 'group_58a49542118e4',
					),
					'display' => 'seamless',
					'layout' => 'block',
					'prefix_label' => 0,
					'prefix_name' => 0,
				),
			),
		),
		array(
			'key' => 'field_5b622b60d9656',
			'label' => 'Typography',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 0,
		),
		array(
			'key' => 'field_5b634aca03b14',
			'label' => 'Typography',
			'name' => 'lp_s_type',
			'type' => 'repeater',
			'instructions' => 'Visit https://fonts.google.com for easier viewing of font selection.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => '',
			'min' => 1,
			'max' => 1,
			'layout' => 'block',
			'button_label' => '',
			'sub_fields' => array(
				array(
					'key' => 'field_5b7f33dbe1b98',
					'label' => 'Fonts',
					'name' => '',
					'type' => 'tab',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'placement' => 'top',
					'endpoint' => 0,
				),
				array(
					'key' => 'field_5b7f12a3c1856',
					'label' => 'Set fonts for',
					'name' => 'set_fonts',
					'type' => 'checkbox',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'choices' => array(
						'all-h' => 'All Headers',
						'h1' => 'H1',
						'h2' => 'H2',
						'h3' => 'H3',
						'h4' => 'H4',
						'h5' => 'H5',
						'h6' => 'H6',
						'p' => 'Paragraph',
						'menu' => 'Menu Links',
						'btn' => 'Button',
						'cta' => 'CTA',
					),
					'allow_custom' => 0,
					'default_value' => array(
					),
					'layout' => 'horizontal',
					'toggle' => 0,
					'return_format' => 'value',
					'save_custom' => 0,
				),
				array(
					'key' => 'field_5b7f10b2e463e',
					'label' => 'Header Font',
					'name' => 'h_font',
					'type' => 'google_font_selector',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5b7f12a3c1856',
								'operator' => '==',
								'value' => 'all-h',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'include_web_safe_fonts' => 1,
					'enqueue_font' => 0,
					'default_font' => 'Montserrat',
				),
				array(
					'key' => 'field_5b7f332fe1b8c',
					'label' => 'Individual Header Font',
					'name' => 'ind_h_font',
					'type' => 'repeater',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5b7f12a3c1856',
								'operator' => '==',
								'value' => 'h1',
							),
						),
						array(
							array(
								'field' => 'field_5b7f12a3c1856',
								'operator' => '==',
								'value' => 'h2',
							),
						),
						array(
							array(
								'field' => 'field_5b7f12a3c1856',
								'operator' => '==',
								'value' => 'h3',
							),
						),
						array(
							array(
								'field' => 'field_5b7f12a3c1856',
								'operator' => '==',
								'value' => 'h4',
							),
						),
						array(
							array(
								'field' => 'field_5b7f12a3c1856',
								'operator' => '==',
								'value' => 'h5',
							),
						),
						array(
							array(
								'field' => 'field_5b7f12a3c1856',
								'operator' => '==',
								'value' => 'h6',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'collapsed' => '',
					'min' => 1,
					'max' => 1,
					'layout' => 'row',
					'button_label' => '',
					'sub_fields' => array(
						array(
							'key' => 'field_5b7f3374e1b92',
							'label' => 'H1',
							'name' => 'h1',
							'type' => 'google_font_selector',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => array(
								array(
									array(
										'field' => 'field_5b7f12a3c1856',
										'operator' => '==',
										'value' => 'h1',
									),
								),
							),
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'include_web_safe_fonts' => 1,
							'enqueue_font' => 0,
							'default_font' => 'Roboto',
						),
						array(
							'key' => 'field_5b7f338fe1b93',
							'label' => 'H2',
							'name' => 'h2',
							'type' => 'google_font_selector',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => array(
								array(
									array(
										'field' => 'field_5b7f12a3c1856',
										'operator' => '==',
										'value' => 'h2',
									),
								),
							),
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'include_web_safe_fonts' => 1,
							'enqueue_font' => 0,
							'default_font' => 'Roboto',
						),
						array(
							'key' => 'field_5b7f3391e1b94',
							'label' => 'H3',
							'name' => 'h3',
							'type' => 'google_font_selector',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => array(
								array(
									array(
										'field' => 'field_5b7f12a3c1856',
										'operator' => '==',
										'value' => 'h3',
									),
								),
							),
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'include_web_safe_fonts' => 1,
							'enqueue_font' => 0,
							'default_font' => 'Roboto',
						),
						array(
							'key' => 'field_5b7f3392e1b95',
							'label' => 'H4',
							'name' => 'h4',
							'type' => 'google_font_selector',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => array(
								array(
									array(
										'field' => 'field_5b7f12a3c1856',
										'operator' => '==',
										'value' => 'h4',
									),
								),
							),
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'include_web_safe_fonts' => 1,
							'enqueue_font' => 0,
							'default_font' => 'Roboto',
						),
						array(
							'key' => 'field_5b7f3394e1b96',
							'label' => 'H5',
							'name' => 'h5',
							'type' => 'google_font_selector',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => array(
								array(
									array(
										'field' => 'field_5b7f12a3c1856',
										'operator' => '==',
										'value' => 'h5',
									),
								),
							),
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'include_web_safe_fonts' => 1,
							'enqueue_font' => 0,
							'default_font' => 'Roboto',
						),
						array(
							'key' => 'field_5b7f3397e1b97',
							'label' => 'H6',
							'name' => 'h6',
							'type' => 'google_font_selector',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => array(
								array(
									array(
										'field' => 'field_5b7f12a3c1856',
										'operator' => '==',
										'value' => 'h6',
									),
								),
							),
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'include_web_safe_fonts' => 1,
							'enqueue_font' => 0,
							'default_font' => 'Roboto',
						),
					),
				),
				array(
					'key' => 'field_5b7f2b32b6c93',
					'label' => 'Paragraph Font',
					'name' => 'p_font',
					'type' => 'google_font_selector',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5b7f12a3c1856',
								'operator' => '==',
								'value' => 'p',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'include_web_safe_fonts' => 1,
					'enqueue_font' => 0,
					'default_font' => 'Montserrat',
				),
				array(
					'key' => 'field_5b7f3b8736deb',
					'label' => 'Button Font',
					'name' => 'btn_font',
					'type' => 'google_font_selector',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5b7f12a3c1856',
								'operator' => '==',
								'value' => 'btn',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'include_web_safe_fonts' => 1,
					'enqueue_font' => 0,
					'default_font' => 'Montserrat',
				),
				array(
					'key' => 'field_5b7f3b9836dec',
					'label' => 'CTA Font',
					'name' => 'cta_font',
					'type' => 'google_font_selector',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5b7f12a3c1856',
								'operator' => '==',
								'value' => 'cta',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'include_web_safe_fonts' => 1,
					'enqueue_font' => 0,
					'default_font' => 'Montserrat',
				),
				array(
					'key' => 'field_5b89a33699cf6',
					'label' => 'Menu Links Font',
					'name' => 'menu_font',
					'type' => 'google_font_selector',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5b7f12a3c1856',
								'operator' => '==',
								'value' => 'menu',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'include_web_safe_fonts' => 1,
					'enqueue_font' => 0,
					'default_font' => 'Montserrat',
				),
				array(
					'key' => 'field_5b7f33e7e1b99',
					'label' => 'Font Sizes',
					'name' => '',
					'type' => 'tab',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'placement' => 'top',
					'endpoint' => 0,
				),
				array(
					'key' => 'field_5b634a3f9e828',
					'label' => 'Header Font Size (px)',
					'name' => 'h_font_size',
					'type' => 'repeater',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'collapsed' => '',
					'min' => 1,
					'max' => 1,
					'layout' => 'table',
					'button_label' => '',
					'sub_fields' => array(
						array(
							'key' => 'field_5b634a4d9e82a',
							'label' => 'H1',
							'name' => 'h1',
							'type' => 'number',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'min' => '',
							'max' => '',
							'step' => '',
						),
						array(
							'key' => 'field_5b634a619e82b',
							'label' => 'H2',
							'name' => 'h2',
							'type' => 'number',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'min' => '',
							'max' => '',
							'step' => '',
						),
						array(
							'key' => 'field_5b634a669e82c',
							'label' => 'H3',
							'name' => 'h3',
							'type' => 'number',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'min' => '',
							'max' => '',
							'step' => '',
						),
						array(
							'key' => 'field_5b634a6d9e82d',
							'label' => 'H4',
							'name' => 'h4',
							'type' => 'number',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'min' => '',
							'max' => '',
							'step' => '',
						),
						array(
							'key' => 'field_5b634a739e82e',
							'label' => 'H5',
							'name' => 'h5',
							'type' => 'number',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'min' => '',
							'max' => '',
							'step' => '',
						),
						array(
							'key' => 'field_5b634a7b9e82f',
							'label' => 'H6',
							'name' => 'h6',
							'type' => 'number',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'min' => '',
							'max' => '',
							'step' => '',
						),
					),
				),
				array(
					'key' => 'field_5b634a849e830',
					'label' => 'Paragraph Font Size (px)',
					'name' => 'p_font_size',
					'type' => 'number',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'min' => '',
					'max' => '',
					'step' => '',
				),
				array(
					'key' => 'field_5b7f3e25357b1',
					'label' => 'Primary Button Font Size (px)',
					'name' => 'prim_btn_font_size',
					'type' => 'number',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'min' => '',
					'max' => '',
					'step' => '',
				),
				array(
					'key' => 'field_5b7f3f628369a',
					'label' => 'Secondary Button Font Size (px)',
					'name' => 'sec_btn_font_size',
					'type' => 'number',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'min' => '',
					'max' => '',
					'step' => '',
				),
				array(
					'key' => 'field_5b7f3e30357b2',
					'label' => 'CTA Font Size (px)',
					'name' => 'cta_font_size',
					'type' => 'number',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'min' => '',
					'max' => '',
					'step' => '',
				),
				array(
					'key' => 'field_5b89a34f99cf7',
					'label' => 'Menu Font Size (px)',
					'name' => 'menu_font_size',
					'type' => 'number',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'min' => '',
					'max' => '',
					'step' => '',
				),
			),
		),
		array(
			'key' => 'field_5b6242486e0d3',
			'label' => 'Colors',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 0,
		),
		array(
			'key' => 'field_5b6242316e0d2',
			'label' => 'Colors',
			'name' => 'lp_s_colors',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => '',
			'min' => 1,
			'max' => 1,
			'layout' => 'block',
			'button_label' => '',
			'sub_fields' => array(
				array(
					'key' => 'field_5b62463939e60',
					'label' => 'Header Text',
					'name' => 'h_text',
					'type' => 'color_picker',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
				),
				array(
					'key' => 'field_5b634758238a3',
					'label' => 'Individual Header Text',
					'name' => 'ind_h_text',
					'type' => 'repeater',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'collapsed' => '',
					'min' => 1,
					'max' => 1,
					'layout' => 'table',
					'button_label' => '',
					'sub_fields' => array(
						array(
							'key' => 'field_5b634778238a4',
							'label' => 'H1',
							'name' => 'h1',
							'type' => 'color_picker',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
						),
						array(
							'key' => 'field_5b63477f238a5',
							'label' => 'H2',
							'name' => 'h2',
							'type' => 'color_picker',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
						),
						array(
							'key' => 'field_5b634781238a6',
							'label' => 'H3',
							'name' => 'h3',
							'type' => 'color_picker',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
						),
						array(
							'key' => 'field_5b634782238a7',
							'label' => 'H4',
							'name' => 'h4',
							'type' => 'color_picker',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
						),
						array(
							'key' => 'field_5b634784238a8',
							'label' => 'H5',
							'name' => 'h5',
							'type' => 'color_picker',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
						),
						array(
							'key' => 'field_5b634786238a9',
							'label' => 'H6',
							'name' => 'h6',
							'type' => 'color_picker',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
						),
					),
				),
				array(
					'key' => 'field_5b6349e78bbc3',
					'label' => 'Paragraph Text',
					'name' => 'p_text',
					'type' => 'color_picker',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
				),
				array(
					'key' => 'field_5b6243116e0d4',
					'label' => 'Paragraph Link',
					'name' => 'p_link',
					'type' => 'color_picker',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
				),
				array(
					'key' => 'field_5b6244d8ee96e',
					'label' => 'CTA Link',
					'name' => 'cta_link',
					'type' => 'repeater',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'collapsed' => '',
					'min' => 1,
					'max' => 1,
					'layout' => 'table',
					'button_label' => '',
					'sub_fields' => array(
						array(
							'key' => 'field_5b6244d8ee96f',
							'label' => 'Default State',
							'name' => 'def_state',
							'type' => 'color_picker',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
						),
						array(
							'key' => 'field_5b6244d8ee970',
							'label' => 'Hover State',
							'name' => 'hov_state',
							'type' => 'color_picker',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
						),
					),
				),
				array(
					'key' => 'field_5b623ca0bd003',
					'label' => 'Primary Button',
					'name' => 'prim_button',
					'type' => 'repeater',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'collapsed' => '',
					'min' => 1,
					'max' => 1,
					'layout' => 'table',
					'button_label' => '',
					'sub_fields' => array(
						array(
							'key' => 'field_5b623f7d7fc17',
							'label' => 'Default State',
							'name' => 'def_state',
							'type' => 'color_picker',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
						),
						array(
							'key' => 'field_5b623f897fc18',
							'label' => 'Hover State',
							'name' => 'hov_state',
							'type' => 'color_picker',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
						),
					),
				),
				array(
					'key' => 'field_5b623fc05c076',
					'label' => 'Secondary Button',
					'name' => 'sec_button',
					'type' => 'repeater',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'collapsed' => '',
					'min' => 1,
					'max' => 1,
					'layout' => 'table',
					'button_label' => '',
					'sub_fields' => array(
						array(
							'key' => 'field_5b623fc05c077',
							'label' => 'Default State',
							'name' => 'def_state',
							'type' => 'color_picker',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
						),
					),
				),
				array(
					'key' => 'field_5b62432f6e0d5',
					'label' => 'Image Caption',
					'name' => 'img_caption',
					'type' => 'color_picker',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
				),
				array(
					'key' => 'field_5b6243396e0d6',
					'label' => 'Blockquote',
					'name' => 'blockquote',
					'type' => 'color_picker',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
				),
				array(
					'key' => 'field_5b6245c140033',
					'label' => 'Superscript',
					'name' => 'superscript',
					'type' => 'color_picker',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
				),
				array(
					'key' => 'field_5b633b8cd78f6',
					'label' => 'Form',
					'name' => 'form',
					'type' => 'repeater',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'collapsed' => '',
					'min' => 1,
					'max' => 1,
					'layout' => 'table',
					'button_label' => '',
					'sub_fields' => array(
						array(
							'key' => 'field_5b633ba4d78f7',
							'label' => 'Error Message',
							'name' => 'err_msg',
							'type' => 'color_picker',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
						),
						array(
							'key' => 'field_5b633bb3d78f8',
							'label' => 'Success Message',
							'name' => 'success_msg',
							'type' => 'color_picker',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
						),
					),
				),
				array(
					'key' => 'field_5babda400f26c',
					'label' => 'Menu Links',
					'name' => 'menu',
					'type' => 'repeater',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'collapsed' => '',
					'min' => 1,
					'max' => 1,
					'layout' => 'table',
					'button_label' => '',
					'sub_fields' => array(
						array(
							'key' => 'field_5babda400f26d',
							'label' => 'Default State',
							'name' => 'def_state',
							'type' => 'color_picker',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
						),
						array(
							'key' => 'field_5babda400f26e',
							'label' => 'Hover State',
							'name' => 'hov_state',
							'type' => 'color_picker',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
						),
					),
				),
				array(
					'key' => 'field_5b887a6d6c3e0',
					'label' => 'Blog Header',
					'name' => 'blog_header',
					'type' => 'repeater',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'collapsed' => '',
					'min' => 1,
					'max' => 1,
					'layout' => 'table',
					'button_label' => '',
					'sub_fields' => array(
						array(
							'key' => 'field_5b887aee6c3e1',
							'label' => 'Background Color',
							'name' => 'bg',
							'type' => 'color_picker',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
						),
						array(
							'key' => 'field_5b887b176c3e2',
							'label' => 'Text Color',
							'name' => 'text',
							'type' => 'color_picker',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
						),
					),
				),
				array(
					'key' => 'field_5b89b21f6b768',
					'label' => 'Misc UI Elements',
					'name' => 'ui',
					'type' => 'color_picker',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
				),
			),
		),
		array(
			'key' => 'field_5b7f023efa4bc',
			'label' => 'Codes',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 0,
		),
		array(
			'key' => 'field_5b7f0248fa4bd',
			'label' => 'Additional CSS',
			'name' => 'lp_s_css',
			'type' => 'textarea',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '<style> .your-css { } </style>',
			'maxlength' => '',
			'rows' => '',
			'new_lines' => '',
		),
		array(
			'key' => 'field_5b7f0270fa4be',
			'label' => 'Additional Javascript',
			'name' => 'lp_s_js',
			'type' => 'textarea',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '<script> // your code </script>',
			'maxlength' => '',
			'rows' => '',
			'new_lines' => '',
		),
		array(
			'key' => 'field_5b7f0291fa4c0',
			'label' => 'Helpers',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 0,
		),
		array(
			'key' => 'field_5b7f029dfa4c1',
			'label' => '',
			'name' => '',
			'type' => 'message',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '<strong>Shortcodes</strong>		
[breadcrumb] - Display breadcrumb		
[searchform] - Display search form		
[year] - Display current year

[pull-singles] - Display blog posts
See <a href="https://codex.wordpress.org/Template_Tags/get_posts">documentation</a> on how to customize query.
Other customizations (default values show):
show-featured-image="true"
title-class="h4"
more-cta="Read more"
more-cta-class="cta"
show-excerpt="true"
truncate-excerpt=100
excerpt-more="&hellip;"
		
			
<strong>Gravityform Classes</strong>		
Display form on one row - use gf-one-line class
Form won\'t show in footer - remove quotes from shortcode',
			'new_lines' => 'wpautop',
			'esc_html' => 0,
		),
		array(
			'key' => 'field_5b6330662dea7',
			'label' => 'More',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 0,
		),
		array(
			'key' => 'field_5b63300a76989',
			'label' => '',
			'name' => '',
			'type' => 'message',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => 'For more Wordpress customization, go to Appearance > Customize',
			'new_lines' => 'wpautop',
			'esc_html' => 0,
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'launchpad-settings',
			),
		),
	),
	'menu_order' => 0,
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