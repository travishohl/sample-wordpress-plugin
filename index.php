<?php declare(strict_types=1);
/**
 * Plugin Name: Travis' Sample Plugin
 * Plugin URI: http://www.travishohl.com/
 * Description: This plugin interacts with the WordPress Plugin API by registering and rendering an admin page. It also fetches and displays the contents of the wp_options table from the database.
 * Version: 0.1
 * Author: Travis Hohl
 * Author URI: http://www.travishohl.com/
 * Requires PHP: 7.2.5
 * Requires at least: 5.0
 */

require 'vendor/autoload.php';

use SamplePlugin\Administration;

Administration::init();
