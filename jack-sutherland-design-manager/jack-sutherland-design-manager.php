<?php

/*
Plugin Name: Jack Sutherland Desi/gn Management Worker for WordPress
Plugin URI: https://jack.desi/gn/worker/management
Description: We Love Design.
Author: Jack Sutherland Desi/gn
Version: 1.1
Author URI: https://jack.desi/gn
 */

/*
 *Jack Sutherland Desi/gn Management Worker for WordPress 5.1
 *For more information, please visit go.jack.desi/worker.
 *If your website goes down - please visit rescue.jack.desi/gn.
 *This plugin collects no information. If you have any concerns about the privacy policy of Jack Sutherland Desi/gn please visit jack.desi/gn/privacy-policy.
 */

/*
 *Link CSS File
 */
function jsdm_admin_theme() {
    wp_enqueue_style('my-admin-theme', plugins_url('wp-admin.css', __FILE__));
}
add_action('admin_enqueue_scripts', 'jsdm_admin_theme');
add_action('login_enqueue_scripts', 'jsdm_admin_theme');


require_once plugin_dir_path(__FILE__) . 'includes/jsdm-functions.php';

?>