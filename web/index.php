<?php
/*
 * Application bootstrapper. Edit this file to route requests through Wordpress
 * or another means as you see fit
 */

// Load wordpress
define('WP_USE_THEMES', true);
require(__DIR__ . '/wordpress/wp-blog-header.php');
