<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('clean_data')) {

    function clean_data($string) {
        return trim(strip_tags(stripslashes($string)));
    }

}
