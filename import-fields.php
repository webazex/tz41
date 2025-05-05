<?php
add_action( 'acf/include_fields', function() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group( array(
	'key' => 'group_681723e20caff',
	'title' => 'Subscription',
	'fields' => array(
		array(
			'key' => 'field_681723e260e7c',
			'label' => 'Target subscription',
			'name' => 'target_subscription',
			'aria-label' => '',
			'type' => 'user',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'role' => array(
				0 => 'editor',
				1 => 'author',
				2 => 'contributor',
				3 => 'customer',
				4 => 'shop_manager',
			),
			'return_format' => 'id',
			'multiple' => 1,
			'allow_null' => 0,
			'allow_in_bindings' => 0,
			'bidirectional' => 0,
			'bidirectional_target' => array(
			),
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'product',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
	'show_in_rest' => 0,
) );

	acf_add_local_field_group( array(
	'key' => 'group_681784fdb4b34',
	'title' => 'Targets notifications',
	'fields' => array(
		array(
			'key' => 'field_681784ff003a5',
			'label' => 'Target notifications',
			'name' => 'target_notifications',
			'aria-label' => '',
			'type' => 'user',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'role' => '',
			'return_format' => 'id',
			'multiple' => 1,
			'allow_null' => 0,
			'allow_in_bindings' => 0,
			'bidirectional' => 0,
			'bidirectional_target' => array(
			),
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'notifications',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
	'show_in_rest' => 0,
) );

	acf_add_local_field_group( array(
	'key' => 'group_6816179f6ed49',
	'title' => 'UserData',
	'fields' => array(
		array(
			'key' => 'field_681617a04397a',
			'label' => 'Personal information',
			'name' => 'userdata',
			'aria-label' => '',
			'type' => 'group',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'layout' => 'block',
			'sub_fields' => array(
				array(
					'key' => 'field_681619034397b',
					'label' => 'Баланс',
					'name' => 'balance',
					'aria-label' => '',
					'type' => 'number',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => 0,
					'min' => '',
					'max' => '',
					'allow_in_bindings' => 1,
					'placeholder' => '',
					'step' => '',
					'prepend' => '',
					'append' => '',
				),
			),
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'user_role',
				'operator' => '==',
				'value' => 'all',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
	'show_in_rest' => 0,
) );
} );

