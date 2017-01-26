<?php
 
/*
Plugin Name: Paper simple blog archive widget.php
Plugin URI: http://www.egoitzgonzalez.com
Description: Archive widget to Bootstrap style
Version: 1.0
Author: Egoitz Gonzalez @aldakur
Author URI: http://www.egoitzgonzalez.com
*/
 
/**
 * Widget instance
 */
function mpw_create_widget(){    
    include_once(plugin_dir_path( __FILE__ ).'/includes/archive-widget.php');
    register_widget('mpw_widget');
}
add_action('widgets_init','mpw_create_widget'); // widgets_init is a hook defined by wordpress https://codex.wordpress.org/Plugin_API/Action_Reference
 
?>
