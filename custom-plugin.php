<?php
/**
 * Plugin Name: Dev Core Functioanlity
 * Description: This plugin contains all your site core functionality so that it is theme independant.
 * Version: 1:0:0
 * Author: Devlyn Chelin
 */

//Plugin Directory

define ( 'DEV_DIR' , plugin_dir_path(__FILE__));
define ( 'DEV_DIR' , plugin_dir_url(__FILE__));

//Plugin Files
require_once ( DEV_DIR . '/inc/insert-head.php' ); //Insert code (Head)
require_once ( DEV_DIR . '/inc/insert-body.php' ); //Insert code (Body)

?>