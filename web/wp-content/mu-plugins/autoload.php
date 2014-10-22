<?php
/*
Plugin Name: Autoload
Plugin URI: http://www.carboncreative.net/
Description: Autoloads files in carbon setup
Version: 0.0.2
Author: Tom Moitié
Author URI: http://www.carboncreative.net/
License: Propreitory
Copyright: Carbon Creative
*/

add_action('muplugins_loaded', function(){
    $autoloader = WP_CONTENT_DIR . '/../../vendor/autoload.php';
    if (!file_exists($autoloader)) {
        die("Vendor libraries have not been loaded. Please install composer dependancies.");
    }
    require $autoloader;
});
