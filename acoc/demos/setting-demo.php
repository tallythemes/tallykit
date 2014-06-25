<?php
/**
 * Calls the class on the post edit screen.
 */

    new acoc_setting_api_class(
		array(
			'id' => 'acoc_setting_page',
			'option_name' => 'acoc_setting',
			'page_title' => "ACOC",
			'menu_title' => "ACOC",
			'capability' => 'manage_options',
			'menu_slug' => 'acoc',
			'parent_slug' => 'themes.php',
			'icon_url' => NULL,
			'position' => NULL,
			'fields' => array(
				array(
					'id' => 'kala',
					'class' => '',
					'label' => 'Site Title',
					'type' => 'text',
					'std' => '',
					'des' => 'In a few words, explain what this site is about.',
					'filter' => '', //sanitize_text_field, esc_attr
				),
				array(
					'id' => 'bkala',
					'class' => '',
					'label' => 'E-mail Address',
					'type' => 'text',
					'std' => '',
					'des' => 'This address is used for admin purposes. If you change this we will send you an e-mail at your new address to confirm it. The new address will not become active until confirmed.',
					'filter' => '', //sanitize_text_field, esc_attr
				),
				array(
					'id' => 'text_field',
					'class' => '',
					'label' => 'Timezone',
					'type' => 'text',
					'std' => '',
					'des' => 'Choose a city in the same timezone as you.',
					'filter' => '', //sanitize_text_field, esc_attr
				),
			)
		)
	);
