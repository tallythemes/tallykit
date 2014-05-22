<?php
//create an instance
$post_columns = new acoc_post_column_editor('post'); // if you want to replace and reorder columns then pass a second parameter as true
//add native column
$post_columns->add_column('title',
  array(
		'label'    => __('Title'),
		'type'     => 'native',
		'sortable' => true
	)
);
//add thumbnail column
$post_columns->add_column('post_thumb',
  array(
		'label' => __('Thumb'),
		'type'  => 'thumb',
		'size'  => 'thumbnail'
	)
);
//add taxonomy
$post_columns->add_column('custom_tax_id',
  array(
		'label'    => __('Custom Taxonomy'),
		'type'     => 'custom_tax',
		'taxonomy' => 'category' //taxonomy name
	)
);
//custom field column
$post_columns->add_column('price',
  array(
		'label'    => __('Custom Field'),
		'type'     => 'post_meta',
		'meta_key' => 'price', //meta_key
		'orderby' => 'meta_value', //meta_value,meta_value_num
		'sortable' => true,
		'prefix' => "$",
		'suffix' => "",
		'def' => "", // default value in case post meta not found
	)
);
//remove date column
$post_columns->remove_column('date');
