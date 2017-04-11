<?php
/*
Plugin Name: Aweber Newsletter Subcribtion Widget  
Plugin URI: sahariardev
Description: This is aweber newsletter subscribtion widget plugin. This will generate a widget which will allow to get subcriber for your Aweber newsletter
Version: 1.0
Author: Sahariar Alam Khandoker
Author URI: sahariardev

*/


// if anyone want to directly access just exits

if(!defined('ABSPATH'))
{
    exit;
}




require_once(plugin_dir_path(__FILE__).'/includes/rf_aweber_widget_plugin_scripts.php');
require_once(plugin_dir_path(__FILE__).'/includes/rf_aweber_newsletter_widget_class.php');




function register_Aweber_Newsletter_Subscribtion_Widget()
{
    register_widget('Aweber_Newsletter_Subscribtion_Widget');
}

add_action('widgets_init','register_Aweber_Newsletter_Subscribtion_Widget');



