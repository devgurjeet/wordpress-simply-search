<?php 
/*
	Plugin Name: Simply Search.
	Plugin URI: 
	Description: This is template for creating Plugins.
	Version: 1.0.0
	Author: Gurjeet singh.
	Author URI:
	License:
*/
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class SimplySearch {

    //** Constructor **//
    function __construct() {

        //** Register menu. **//
        add_action('admin_menu', array(&$this, 'register_plugin_menu') );
    }

    //** Register menu Item. **//
    function register_plugin_menu(){
            add_menu_page( 'Simply Search', 'Simply Search', 'manage_options', 'simplysearch', array(&$this, 'admin_page'), 'dashicons-search', 26 );
    }


    /*function to show the page. */
    function admin_page(){
        /*Admin page content goes here */
        echo "<h1>Simply Search Settings</h1>";
    }
}

/*  create plugin object. */
$SimplySearch = new SimplySearch;
?>