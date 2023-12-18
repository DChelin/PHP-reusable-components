<?php
/**
 * Plugin Name: Padlock
 * Description: Handles the security of your website.
 * Version: 1:0:0
 * Requires at least: 5.2
 * Requires PHP: 7.2
 * Author: Devlyn Chelin
 * Author URI: https://chelin.dev/
 */
//Remove Wordpress version footprint
remove_action('wp_head', 'wp_generator');

// Removes the rest of the WordPress version footprints throughout your site.

function ryu_remove_version() {
return '';
}
add_filter('the_generator', 'ryu_remove_version');

//Disable login error messages
add_filter('login_errors', function ($a) {
    return null;
});

//Remove admin username

function remove_comment_author_class( $classes ) {
    foreach( $classes as $key => $class ) {
        if(strstr($class, "comment-author-")) {
            unset( $classes[$key] );
        }
    }
    return $classes;
}
add_filter( 'comment_class' , 'remove_comment_author_class' );

//Protect your site from malicious requests.
global $user_ID; if($user_ID) {
    if(!current_user_can('administrator')) {
        if (strlen($_SERVER['REQUEST_URI']) > 255 ||
            stripos($_SERVER['REQUEST_URI'], "eval(") ||
            stripos($_SERVER['REQUEST_URI'], "CONCAT") ||
            stripos($_SERVER['REQUEST_URI'], "UNION+SELECT") ||
            stripos($_SERVER['REQUEST_URI'], "base64")) {
                @header("HTTP/1.1 414 Request-URI Too Long");
                @header("Status: 414 Request-URI Too Long");
                @header("Connection: Close");
                @exit;
        }
    }
}

?>