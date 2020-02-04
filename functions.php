<?php
/**
 * UnderStrap functions and definitions
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/jetpack.php',                         // Load Jetpack compatibility file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker. Trying to get deeper navigation? Check out: https://github.com/understrap/understrap/issues/567
	'/woocommerce.php',                     // Load WooCommerce functions.
	'/editor.php',                          // Load Editor functions.
	'/deprecated.php',                      // Load deprecated functions.
	'/custom-post-types.php',               // Load custom post types
	'/acf.php',                				// Load ACF specific functions
);

foreach ( $understrap_includes as $file ) {
	require_once get_template_directory() . '/inc' . $file;
}


//LOGGER -- like frogger but more useful

if ( ! function_exists('write_log')) {
   function write_log ( $log )  {
      if ( is_array( $log ) || is_object( $log ) ) {
         error_log( print_r( $log, true ) );
      } else {
         error_log( $log );
      }
   }
}

  //print("<pre>".print_r($a,true)."</pre>");

//GRAVITY FORMS PIECES

add_action( 'gform_after_submission_1', 'internship_update_post_content', 10, 2 );

function internship_update_post_content( $entry, $form ) {
    //getting post
    $post_id = get_post( $entry['post_id'] );
    $company = rgar( $entry, '1' );
    $compensation = rgar( $entry, '7' );
    $contact_email = rgar($entry, '2');

    update_field('field_5e34451b767eb', $company, $post_id);//company name
    update_field('field_5e3447c544472', $compensation, $post_id);//compensation
    update_field('field_5e3989d11d4c6', $contact_email, $post_id);//compensation


    //ADDRESS
    $street = rgar( $entry, '4.1' );
    $street_two =rgar( $entry, '4.2' );
    $city = rgar( $entry, '4.3' );
    $state = rgar( $entry, '4.4' );
    $zip = rgar( $entry, '4.5' );    
    $country = rgar( $entry, '4.6' ); 
    $address_pieces = array(
        'street_1'    =>   $street,
        'street_2' =>   $street_two,
        'city'	=>	$city,
        'state'	=>	$state,
        'zip_code'	=>	$zip,   
    );
    update_field( 'field_5e3992e1480ec', $address_pieces, $post_id );//ADDRESS
    
    
    //DATES GROUP
    $start_date = rgar( $entry, '8' );
    $end_date = rgar( $entry, '9' );
    $dates = array(
        'start_date'    =>   $start_date,
        'end_date' =>   $end_date,
    );
    update_field( 'field_5e344533767ed', $dates, $post_id );//start and end date group
	

    $i = wp_update_post( $post_id );
 
}