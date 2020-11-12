<?php

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5f51375269022',
	'title' => 'Section Block',
	'fields' => array(
		array(
			'key' => 'field_5f5137c3fea41',
			'label' => 'Background',
			'name' => '',
			'type' => 'accordion',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'open' => 1,
			'multi_expand' => 0,
			'endpoint' => 0,
		),
		array(
			'key' => 'field_5f513760fea40',
			'label' => 'Background type',
			'name' => 'background_type',
			'type' => 'button_group',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'image' => 'Image',
				'video' => 'Video',
				'slider' => 'Slider',
			),
			'allow_null' => 0,
			'default_value' => 'image',
			'layout' => 'horizontal',
			'return_format' => 'value',
		),
		array(
			'key' => 'field_5f51b9083b971',
			'label' => 'Video type',
			'name' => 'video_type',
			'type' => 'button_group',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5f513760fea40',
						'operator' => '==',
						'value' => 'video',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'local' => 'Local video files',
			),
			'allow_null' => 0,
			'default_value' => '',
			'layout' => 'horizontal',
			'return_format' => 'value',
		),
		array(
			'key' => 'field_5f51b9713b973',
			'label' => '.mp4 file',
			'name' => 'mp4_file',
			'type' => 'file',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5f51b9083b971',
						'operator' => '==',
						'value' => 'local',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'library' => 'all',
			'min_size' => '',
			'max_size' => '',
			'mime_types' => 'mp4',
		),
		array(
			'key' => 'field_5f51b9483b972',
			'label' => '.webm file',
			'name' => 'webm_file',
			'type' => 'file',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5f51b9083b971',
						'operator' => '==',
						'value' => 'local',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'library' => 'all',
			'min_size' => '',
			'max_size' => '',
			'mime_types' => 'webm',
		),
		array(
			'key' => 'field_5f51b9883b974',
			'label' => 'Fallback image',
			'name' => 'fallback_video_image',
			'type' => 'image',
			'instructions' => 'An image fallback to load on slow connections, low power mode on iOS, and before the video has finished loading',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5f51b9083b971',
						'operator' => '==',
						'value' => 'local',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'preview_size' => 'medium',
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
			'key' => 'field_5f5161cd54fbb',
			'label' => 'Image',
			'name' => 'background_image',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5f513760fea40',
						'operator' => '==',
						'value' => 'image',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'preview_size' => 'medium',
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
			'key' => 'field_5f51631f27922',
			'label' => 'Opacity',
			'name' => 'background_opacity',
			'type' => 'range',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5f5161cd54fbb',
						'operator' => '!=empty',
					),
				),
				array(
					array(
						'field' => 'field_5f513760fea40',
						'operator' => '==',
						'value' => 'video',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 100,
			'min' => '',
			'max' => '',
			'step' => '',
			'prepend' => '',
			'append' => '%',
		),
		array(
			'key' => 'field_5f516eb8c55fa',
			'label' => 'Background attachment',
			'name' => 'background_attachment',
			'type' => 'button_group',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5f5161cd54fbb',
						'operator' => '!=empty',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'normal' => 'Normal',
				'fixed' => 'Fixed',
			),
			'allow_null' => 0,
			'default_value' => '',
			'layout' => 'horizontal',
			'return_format' => 'value',
		),
		array(
			'key' => 'field_5f5161ed54fbc',
			'label' => 'Background color',
			'name' => 'background_color',
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
			'key' => 'field_5f5137d4fea42',
			'label' => 'Layout',
			'name' => '',
			'type' => 'accordion',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'open' => 0,
			'multi_expand' => 0,
			'endpoint' => 0,
		),
		array(
			'key' => 'field_5f5160ee09cb4',
			'label' => 'Padding (top)',
			'name' => 'padding_top',
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
			'append' => '%',
			'min' => 0,
			'max' => '',
			'step' => 10,
		),
		array(
			'key' => 'field_5f5160ff09cb5',
			'label' => 'Padding (bottom)',
			'name' => 'padding_bottom',
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
			'append' => '%',
			'min' => 0,
			'max' => '',
			'step' => 10,
		),
		array(
			'key' => 'field_5f51614409cb7',
			'label' => 'Padding (left)',
			'name' => 'padding_left',
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
			'append' => '%',
			'min' => 0,
			'max' => '',
			'step' => 10,
		),
		array(
			'key' => 'field_5f51614109cb6',
			'label' => 'Padding (right)',
			'name' => 'padding_right',
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
			'append' => '%',
			'min' => 0,
			'max' => '',
			'step' => 10,
		),
		array(
			'key' => 'field_5f516fb5c55fb',
			'label' => 'Minimum height',
			'name' => 'minimum_height',
			'type' => 'number',
			'instructions' => 'This unit is <strong>v</strong>viewport <strong>h</strong>eight. 100vh = the exact height of the screen.',
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
			'append' => 'vh',
			'min' => '',
			'max' => '',
			'step' => '',
		),
		array(
			'key' => 'field_5f51b4e0784cf',
			'label' => 'Inner content',
			'name' => '',
			'type' => 'accordion',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'open' => 0,
			'multi_expand' => 0,
			'endpoint' => 0,
		),
		array(
			'key' => 'field_5f5160d209cb3',
			'label' => 'Outer content width',
			'name' => 'max_width',
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
			'placeholder' => 1200,
			'prepend' => '',
			'append' => 'px',
			'min' => 0,
			'max' => '',
			'step' => 10,
		),
		array(
			'key' => 'field_5f51b548784d0',
			'label' => 'Inner content maximum width',
			'name' => 'inner_content_max_width',
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
			'append' => 'px',
			'min' => 0,
			'max' => '',
			'step' => 10,
		),
		array(
			'key' => 'field_5f51615f54fb9',
			'label' => 'Horizontal alignment',
			'name' => 'alignment_horizontal',
			'type' => 'button_group',
			'instructions' => 'Alignment of the inner content area within the outer content area.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'left' => 'Left',
				'center' => 'Center',
				'right' => 'Right',
			),
			'allow_null' => 0,
			'default_value' => 'center',
			'layout' => 'horizontal',
			'return_format' => 'value',
		),
		array(
			'key' => 'field_5f51619e54fba',
			'label' => 'Vertical alignment',
			'name' => 'alignment_vertical',
			'type' => 'button_group',
			'instructions' => 'This is only a relevant setting if your minimum height is set higher than the typical height the content area would take up.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'top' => 'Top',
				'middle' => 'Middle',
				'bottom' => 'Bottom',
			),
			'allow_null' => 0,
			'default_value' => 'middle',
			'layout' => 'horizontal',
			'return_format' => 'value',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'acf/section',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'seamless',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

endif;