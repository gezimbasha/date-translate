<?php

/*
  Plugin Name: Date Translate
  Plugin URI:
  Description: Allows the user to translate the English dates to a translated version.
  Author: Gezim Basha
  Version: 1.0
*/

define('QDP_PATH', WP_PLUGIN_URL . '/' . plugin_basename(
dirname(__FILE__) ) . '/' );
define('QDP_NAME', "Date Translate");
define ("QDP_VERSION", "1.0");
define ("QDP_SLUG", 'date-translate');

// Globals
$QDP_ENG_ARR;
$QDP_LOC_ARR;

function qnt_date_translate($days = '', $months = '', $months_s = ''){

  // Checks for user input
  if($days != '') $loc_days = $days;
  if($months != '') $loc_mon = $months;
  if($months_s != '') $loc_mons = $months_s;

  // Creates an array, depending on what the user has inputted above
  $loc_arr = array_merge((array)$loc_days, (array)$loc_mon, (array)$loc_mons);

  // Checks if the user has provided the localized version of the dates, if not it will not initialize the English counterpart
  if($days != '') $eng_days = array(Sunday,Monday,Tuesday,Wednesday,Thursday,Friday,Saturday);
  if($months != '') $eng_mon = array(January,February,March,April,May,June,July,August,September,October,November,December);
  if($months_s != '') $eng_mons = array(Jan,Feb,Mar,Apr,May,Jun,Jul,Aug,Sep,Oct,Nov,Dec);

  $eng_arr = array_merge((array)$eng_days, (array)$eng_mon, (array)$eng_mons);

  global $QDP_ENG_ARR, $QDP_LOC_ARR;
  $QDP_ENG_ARR = $eng_arr;
  $QDP_LOC_ARR = $loc_arr;

  function _QNT_DATE_TRANSLATE( $str ) {
    global $QDP_ENG_ARR, $QDP_LOC_ARR;
    $translated_arrays = str_replace($QDP_ENG_ARR, $QDP_LOC_ARR, $str );
    return $translated_arrays;
  }
  add_filter( 'date', _QNT_DATE_TRANSLATE );
  add_filter( 'get_the_time', _QNT_DATE_TRANSLATE );
  add_filter( 'the_date', _QNT_DATE_TRANSLATE );
  add_filter( 'get_comment_date', _QNT_DATE_TRANSLATE );
  add_filter( 'get_comment_time', _QNT_DATE_TRANSLATE );
}

 ?>