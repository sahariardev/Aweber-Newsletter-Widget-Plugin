<?php

function rf_aweber_widget_add_scripts()
{
    
    wp_enqueue_style('rf-awber-widget-style-script',plugins_url().'/Aweber Newsletter Widget Plugin/css/rf_awber_widget_style.css');
   
}

add_action('wp_enqueue_scripts','rf_aweber_widget_add_scripts');