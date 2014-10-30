<?php

function custom_post_init() {

  $labels = array(
    'name' => 'Calculator',
    'singular_name' => 'Program',
    'add_new' => 'Add New',
    'add_new_item' => 'Add New Program',
    'edit_item' => 'Edit Program',
    'new_item' => 'New Program',
    'all_items' => 'All Programs',
    'view_item' => 'View Program',
    'search_items' => 'Search programs',
    'not_found' =>  'No programs found',
    'not_found_in_trash' => 'No programs found in Trash',
    'parent_item_colon' => '',
    'menu_name' => 'Calculator'
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'exclude_from_search' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'calculator' ),
    'capability_type' => 'post',
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position' => null,
    'menu_icon' => 'dashicons-welcome-learn-more',
    'supports' => array( 'title' )
  );

  register_post_type( 'calculator', $args );

}	
add_action( 'init', 'custom_post_init' );