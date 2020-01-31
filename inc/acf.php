<?php
/**
 * ACF STUFF
 *
 * @package understrap
 */
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


if (class_exists('ACF')) {

/*INTERNSHIP DATA*/

function internship_get_company(){
    $company = get_field('company_name');
    return $company;
}

function internship_get_compensation(){
    $compensation = get_field('compensation');
    return $compensation;
}

function internship_get_location(){
    //print("<pre>".print_r(get_field('location'),true)."</pre>");
    $location = get_field('location')['markers'][0]['default_label'];
    $clean = str_replace("United States of America","",$location);
    return $clean;
}

function internship_get_dates(){
    $dates = get_field('offering_dates');
    if( $dates ) {
        $start = $dates['start_date'];
        $end = $dates['end_date'];        
        return $start . ' - ' . $end;
    }
}


 add_filter('acf/settings/save_json', 'internship_acf_json_save_point');
   
  function internship_acf_json_save_point( $path ) {
      // update path
      $path = get_stylesheet_directory() . '/acf-json';
      // return
      return $path;
  }

  add_filter('acf/settings/load_json', 'internship_acf_json_load_point');

  function internship_acf_json_load_point( $paths ) {
      // remove original path (optional)
      unset($paths[0]);
      // append path
      $paths[] = get_stylesheet_directory() . '/acf-json';    
      // return
      return $paths;
  }

}