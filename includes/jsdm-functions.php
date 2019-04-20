<?php

/*
 *Jack Sutherland Desi/gn Management Worker for WordPress 5.1
 *For more information, please visit go.jack.desi/worker.
 *If your website goes down - please visit rescue.jack.desi/gn.
 *This plugin collects no information. If you have any concerns about the privacy policy of Jack Sutherland Desi/gn please visit jack.desi/gn/privacy-policy.
*/

/*
 * JS Desi/gn Manager Menu Item Addition to Admin Control Panel (ACP)
 */

    // Hook the 'admin_menu' action hook, run the function named 'jsdm_add_menu_link_primary_page'
    add_action( 'admin_menu', 'jsdm_add_menu_link_primary_page' );
 
    // Add a new top level menu link to the ACP
    function jsdm_add_menu_link_primary_page()
    {
        add_menu_page(
        'JS Desi/gn',
        'JS Desi/gn',
        'manage_options',
        'jack-sutherland-design-manager/includes/jsdm-primary-page.php'
        );
    }

/*
 * JS Desi/gn Contact Support Toolbar/Quicklinks Addition
 */

    // Hook the 'admin_bar_menu action hook, run the function named 'jsdm_Add_Toolbar_Items'
    add_action('admin_bar_menu', 'jsdm_add_toolbar_items', 999);

    // Add 'Contat Support' tool bar item
    function jsdm_add_toolbar_items($wp_admin_bar) {
        $wp_admin_bar->add_node( array(
        'id'		=> 'supportlink',
        'title' => 'Contact Support',
        'href' => 'mailto:help@jack.desi',
    ) );
    }

/*
 * JS Desi/gn Dashboard Widget
 */

     // Hook the 'wp_dashboard_setup' action hook, run the function named 'jsdm_Add_Toolbar_Items'
    add_action('wp_dashboard_setup', 'jsdm_Add_Dashboard_Widget');
    
    function jsdm_Add_Dashboard_Widget() {
    global $wp_meta_boxes;
    
    // Add 'Jack Sutherland Desi/gn Support' dashboard widget
    wp_add_dashboard_widget('custom_help_widget', 'Jack Sutherland Desi/gn Support', 'custom_dashboard_help');
    }
    
    function custom_dashboard_help() {
    echo '<p>Welcome to your website. Need help? Contact us for support <a href="mailto:help@jack.desi">here</a>. To access your client area <a href="https://client.jack.desi/gn" target="_blank">click here.</a></p>';
    }

/*
 * JS Desi/gn Custom Footer Text
 */

    function jsdm_change_footer_admin () {  
 
        echo 'Made with love in Victoria, Australia by <a href="https://jack.desi/gn">Jack Sutherland Desi/gn.</a>';  
       
      }  
       
      add_filter('admin_footer_text', 'jsdm_change_footer_admin');

/*
 * JS Desi/gn Change Greeting from Howdy, to Hey there,
 */

    add_filter('gettext', 'jsdm_change_howdy', 10, 3);
    
        function jsdm_change_howdy($translated, $text, $domain) {
        
            if (!is_admin() || 'default' != $domain)
                return $translated;
        
            if (false !== strpos($translated, 'Howdy'))
                return str_replace('Howdy', 'Hey there', $translated);
        
            return $translated;
        }

/*
 * JS Desi/gn Custom Dashboard Logo
 */

    function jsdm_custom_logo() {
        echo '
        <style type="text/css">
        #wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon:before {
        background-image: url(https://jack.desi/gn/wp-content/uploads/2019/04/JS-–-16x16.png) !important;
        background-position: 0 0;
        color:rgba(0, 0, 0, 0);
        background-repeat: no-repeat;
        background-size: contain;
        }
        #wpadminbar #wp-admin-bar-wp-logo.hover > .ab-item .ab-icon {
        background-position: 0 0;
        }
        </style>
        ';
        }
        
        //hook into the administrative header output
        add_action('wp_before_admin_bar_render', 'jsdm_custom_logo');

/*
 * Change login logo link to https://jack.desi/gn/
 */

    function jsdm_url_login(){
        return "https://jack.desi/gn";
    }
    add_filter('login_headerurl', 'jsdm_url_login');

?>