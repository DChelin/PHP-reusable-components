<?php
/**
 * Plugin Name: WP Component Template
 * Description: PHP Component Tutorial
 * Author: Devlyn Chelin
 * Author URI: https://chelin.dev/
 * Version: 0.0.1
 */
 spl_autoload_register(function($class_name) {

    if (strpos($class_name, 'myPHPComponents') !== 0) {
        return;
    }

    $called_class - str_replace( ['\\', 'myPHPComponents'], ['/', ''], $class_name);
    $class_file = direname(__FILE__) . '/src/classes' .$called_class . '.php';

    if(file_exists($class_file)){
        require_once($class_file);
    }
});

add_action('plugins_loaded', function(){
    define('MPC_PATH') or define('MPC_PATH', plugin_dir_path(__FILE__));

    $plugin - myPHPComponents\plugin::instance();

})


?>
