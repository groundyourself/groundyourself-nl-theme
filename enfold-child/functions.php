<?php

/*
* Add your own functions here. You can also copy some of the theme functions into this file. 
* Wordpress will use those functions instead of the original functions then.
*/

add_action( 'wp_enqueue_scripts', 'dgt_enqueue_styles' );
function dgt_enqueue_styles() {
 
    $parent_style = 'parent-style';
 
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/css/dgt_custom.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}

add_filter( 'avf_post_nav_entries', 'dgt_customization_postnav', 10, 2);
function dgt_customization_postnav($entries, $settings)
{
    if (preg_match("/^sfwd-/", $settings['type'])){
        $entries['prev'] = null;
        $entries['next'] = null;
    }
    return $entries;
}

/*
  defer sendeing of emails from woocommerce
*/
add_filter( 'woocommerce_defer_transactional_emails', '__return_true' );
