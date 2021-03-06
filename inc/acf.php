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

function internship_get_company_email(){
    $email = get_field('contact_email');
    return $email;
}

function internship_get_compensation(){
    $compensation = get_field('compensation');
    return $compensation;
}

function internship_get_location(){
    //print("<pre>".print_r(get_field('location'),true)."</pre>");
    $location = get_field('address');
    if($location){
        $street_one = $location['street_1'];
        if($location['street_2']){
            $street_one = $street_one . ' ' . $location['street_2'];
        }
        $city = $location['city'];
        $state = $location['state'];
        $zip = $location['zip_code'];
        return '<a target="_blank" href="https://www.google.com/maps/place/'. $street_one . '+,' . $city . '+,' . $state . '+' . $zip .'">'. $street_one . ', ' . $city . ' ' . $state . ' ' . $zip . '</a>';
    }
    //1200+Pennsylvania+Ave+SE,+Washington,+DC+20003
}

// function internship_get_dates(){
//     $dates = get_field('offering_dates');
//     if( $dates ) {
//         $start = $dates['start_date'];
//         $end = $dates['end_date'];        
//         return $start . ' until ' . $end;
//     }
// }


function internship_get_start_date(){
    // $start_date = get_field('start_date');
    $fixYmdStart = get_field( 'start_date' );
    // var_dump($fixYmdFormat);
    $newDashStart = switch_ymd_startdate_format($fixYmdStart);
    return $newDashStart . ' thru ';
}

function internship_get_end_date(){
    // $end_date = get_field('end_date');
    $fixYmdEnd = get_field( 'end_date' );
    // var_dump($fixYmdEnd);
    $newDashEnd = switch_ymd_enddate_format($fixYmdEnd);
    return $newDashEnd;
    // return $end_date;
}

function internship_get_job_description(){
    $job = get_field('job_description');
    return $job;
}

function internship_get_requirements(){
    $requirements = get_field('submission_requirements');
    return $requirements;
}

function internship_get_credit(){
    $credit = get_field('for_credit_or_not');
    return ' * ' . $credit;
}

function switch_ymd_startdate_format($fixYmdStart) {
	// $oldDateString = $ymdFormat;
	// var_dump($oldDateString);
	$newYmdStartString = DateTime::createFromFormat('Ymd', $fixYmdStart);
	$newDashStart = $newYmdStartString->format('m-d-Y');
	// var_dump($newFormat);
	return $newDashStart;
 }

 function switch_ymd_enddate_format($fixYmdEnd) {
	// $oldDateString = $ymdFormat;
	// var_dump($oldDateString);
	$newYmdEndString = DateTime::createFromFormat('Ymd', $fixYmdEnd);
	$newDashEnd = $newYmdEndString->format('m-d-Y');
	// var_dump($newFormat);
	return $newDashEnd;
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