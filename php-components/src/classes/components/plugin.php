<?php
/**
 * Boots the plugin
 */

 namespace myPHPComponents;

 defined( 'ABSPATH' ) or die('Nope...');

 class Plugin{

    private static $instance = null;
    private function __construct(){

    }

    public static function instance() {
        if(! isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

 }