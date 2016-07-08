<?php 
/*
	Plugin Name: Simply Search.
	Plugin URI: 
	Description: Simply Search improves WordPress default search functionality. It also offers the ability to select custom post types to search and exclude specific pages and post types.
	Version: 1.0.0
	Author: Gurjeet singh.
	Author URI:
	License:
*/
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class SimplySearch {

    //** Constructor **//
    function __construct() {

        add_action( 'admin_enqueue_scripts',  array(&$this, 'loadAssectCss') );
        // add_action( 'admin_enqueue_scripts',  array(&$this, 'loadAdminAssects') );

        //** Register menu. **//
        add_action('admin_menu', array(&$this, 'register_plugin_menu') );
    }

    //** Register menu Item. **//
    function register_plugin_menu(){
            add_menu_page( 'Simply Search', 'Simply Search', 'manage_options', 'simplysearch', array(&$this, 'admin_page'), 'dashicons-search', 26 );
    }

    function loadAssectCss( ){     
      
        //** Load  Styling. **//        
       wp_enqueue_style( 'simply-search-style-css', plugins_url( '/css/style.css', __FILE__ ) );

    }



    /*function to show the page. */
    function admin_page(){

        if(isset($_POST['ss_save_form'])){
            
            $option_value = trim($_POST['post_block_section']);
            $result       = update_option( 'ss_post_filter', $option_value, '', 'yes' );

            if($result){
                echo     '<h1 class="success_message">Setting saved successfully.</h1>';                
            }else{              
                echo     '<h1 class="error_message">Setting not saved.</h1>';                
            }
            

        }
        
        ?> 
        <div class="ss_cotainer">      
            <form action="" method="POST" class="ss_form">      
                
                <h1 class="ss_h1">Simply Search Settings</h1>
                
                <fieldset class="ss_fieldset">
                    <!-- <legend><span class="number">2</span>Your profile</legend> -->
                    <label class="ss_label" for="post_block_section"><strong>Post Types</strong></label>
                    <textarea class="ss_textarea" id="post_block_section" name="post_block_section"><?php echo get_option( 'ss_post_filter',true);?> </textarea>
                    <p class="ss_notice"><strong>Note:</strong> You can add multiple post types seperated by comma. example: post, page</p>
                </fieldset>
                <input type="hidden" name="ss_save_form" value="true" />
                <button class="ss_button" type="submit">Save Settings</button>
            </form>
        </div>
        <?php     
        
    }
}

/*  create plugin object. */
$SimplySearch = new SimplySearch;
?>