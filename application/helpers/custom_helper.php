<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('secret_url')) {

/*
* Used for passing sensitive $_GET parameter in the URL
* Encrypt and decrypt $_GET parameter
*/
    function secret_url($action, $string) {
        $output = false;
        $encrypt_method = "AES-256-CBC";
        //hashing key
        $secret_key = '&%@53kretk3y_%&';
        $secret_iv = '&%@53kretIV_%&';

        $key = hash('sha256', $secret_key);
        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $secret_iv), 0, 16);

        if( $action == 'encrypt' ) {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
        }
        else if( $action == 'decrypt' ){
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }

        return $output;
    }
}

if ( ! function_exists('clean_data')) {

    function clean_data($string) {
        return trim(strip_tags(stripslashes($string)));
    }

}

if ( ! function_exists('hash_password')) {

    function hash_password($password) {
        $options = array(
            'cost' => 11,
        );
        $password = trim(strip_tags(stripslashes($password)));
        return password_hash($password, PASSWORD_BCRYPT, $options);
    }

}