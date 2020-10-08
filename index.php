<?php declare(strict_types=1);
/**
 * Plugin Name: Travis' Sample Plugin
 * Plugin URI: http://www.travishohl.com/
 * Description: As part of this job application we would like you to share some of your work with us. Please write a WordPress plugin that demonstrates interacting with the WordPress plugin API, object oriented programming and has some basic interaction with the WordPress database. The plugin can do anything you would like. Then include a link to a downloadable ZIP distribution of your WordPress plugin in the text field below. Note that the code must be 100% authored by you. We will include this in the criteria we use to evaluate your job application.
 * Version: 0.1
 * Author: Travis Hohl
 * Author URI: http://www.travishohl.com/
 * Requires PHP: 7.2.5
 * Requires at least: 5.0
 */

require 'vendor/autoload.php';

use SamplePlugin\Administration;

Administration::init();
