<?php
/**
 * CUSTOM POST TYPES
 *
 * @package understrap
 */

//internship custom post type

// Register Custom Post Type internship
// Post Type Key: internship

function create_internship_cpt() {

  $labels = array(
    'name' => __( 'Internships', 'Post Type General Name', 'textdomain' ),
    'singular_name' => __( 'Internship', 'Post Type Singular Name', 'textdomain' ),
    'menu_name' => __( 'Internship', 'textdomain' ),
    'name_admin_bar' => __( 'Internship', 'textdomain' ),
    'archives' => __( 'Internship Archives', 'textdomain' ),
    'attributes' => __( 'Internship Attributes', 'textdomain' ),
    'parent_item_colon' => __( 'Internship:', 'textdomain' ),
    'all_items' => __( 'All Internships', 'textdomain' ),
    'add_new_item' => __( 'Add New Internship', 'textdomain' ),
    'add_new' => __( 'Add New', 'textdomain' ),
    'new_item' => __( 'New Internship', 'textdomain' ),
    'edit_item' => __( 'Edit Internship', 'textdomain' ),
    'update_item' => __( 'Update Internship', 'textdomain' ),
    'view_item' => __( 'View Internship', 'textdomain' ),
    'view_items' => __( 'View Internships', 'textdomain' ),
    'search_items' => __( 'Search Internships', 'textdomain' ),
    'not_found' => __( 'Not found', 'textdomain' ),
    'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
    'featured_image' => __( 'Featured Image', 'textdomain' ),
    'set_featured_image' => __( 'Set featured image', 'textdomain' ),
    'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
    'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
    'insert_into_item' => __( 'Insert into internship', 'textdomain' ),
    'uploaded_to_this_item' => __( 'Uploaded to this internship', 'textdomain' ),
    'items_list' => __( 'Internship list', 'textdomain' ),
    'items_list_navigation' => __( 'Internship list navigation', 'textdomain' ),
    'filter_items_list' => __( 'Filter Internship list', 'textdomain' ),
  );
  $args = array(
    'label' => __( 'internship', 'textdomain' ),
    'description' => __( '', 'textdomain' ),
    'labels' => $labels,
    'menu_icon' => '',
    'supports' => array('title', 'editor', 'revisions', 'author', 'trackbacks', 'custom-fields', 'thumbnail',),
    'taxonomies' => array('category','post_tag'),
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 5,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'can_export' => true,
    'has_archive' => true,
    'hierarchical' => false,
    'exclude_from_search' => false,
    'show_in_rest' => true,
    'publicly_queryable' => true,
    'capability_type' => 'post',
    'menu_icon' => 'dashicons-universal-access-alt',
  );
  register_post_type( 'internship', $args );
  
  // flush rewrite rules because we changed the permalink structure
  global $wp_rewrite;
  $wp_rewrite->flush_rules();
}
add_action( 'init', 'create_internship_cpt', 0 );