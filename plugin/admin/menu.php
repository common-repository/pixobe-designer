<?php

namespace Plugin\PixobeDesigner;


use Plugin\PixobeDesigner\Constants;

function pixobe_add_admin_menu()
{
    $icon = Constants::PIXOBE_ICON;

    add_menu_page(
        'Home',             // Page title
        'Pixobe Designer',             // Menu title
        'manage_options',              // Capability
        'pixobe-designer',             // Menu slug
        __NAMESPACE__ . '\\home_page', // Callback function for main menu item
        $icon,    // Icon
        20                             // Position
    );

    //Gallery
    add_submenu_page(
        'pixobe-designer',             // Parent menu slug
        'Media',                   // Page title
        'Media',                   // Submenu title
        'manage_options',              // Capability
        'pixobe-designer-media',            // Submenu slug
        __NAMESPACE__ . '\\pixobe_gallery_page', // Callback function for submenu item
    );

    // Add submenu item for Font List under Pixobe Designer
    add_submenu_page(
        'pixobe-designer',             // Parent menu slug
        'Fonts',                   // Page title
        'Fonts',                   // Submenu title
        'manage_options',              // Capability
        'pixobe-designer-fonts',            // Submenu slug
        __NAMESPACE__ . '\\fonts_page' // Callback function for submenu item
    );

    // Add submenu item for Themes under Pixobe Designer
    add_submenu_page(
        'pixobe-designer',             // Parent menu slug
        'Templates',                   // Page title
        'Templates',                   // Submenu title
        'manage_options',              // Capability
        'pixobe-designer-templates',            // Submenu slug
        __NAMESPACE__ . '\\template_page' // Callback function for submenu item
    );
}

/**
 *  scripts and css
 */
function pixobe_desinger_enqueue_page_scripts($hook)
{

    global $PIXOBE_DESIGNER_ASSET_PATH;

    $allowed_hooks = array(
        'toplevel_page_pixobe-designer',
        'pixobe-designer_page_pixobe-designer-templates',
        'pixobe-designer_page_pixobe-designer-fonts',
        'pixobe-designer_page_pixobe-designer-media'
    );

    // Check if the current hook is in the allowed hooks array
    if (in_array($hook, $allowed_hooks)) {

        wp_enqueue_script(
            'pixobe-designer-admin',
            PIXOBE_DESIGNER_PLUGIN_DIR_URL . "assets/js/templates.js",
            array('jquery'),
            PIXOBE_DESIGNER_VERSION,
            true
        );
        wp_enqueue_script(
            'pixobe-designer-font',
            PIXOBE_DESIGNER_PLUGIN_DIR_URL . "assets/js/fonts.js",
            array('jquery'),
            PIXOBE_DESIGNER_VERSION,
            true
        );
        wp_enqueue_script(
            'pixobe-designer-media',
            PIXOBE_DESIGNER_PLUGIN_DIR_URL . "assets/js/media.js",
            array('jquery'),
            PIXOBE_DESIGNER_VERSION,
            true
        );

        wp_enqueue_script(
            'pixobe-designer',
            "$PIXOBE_DESIGNER_ASSET_PATH/build/designer.esm.js",
            array(),
            PIXOBE_DESIGNER_VERSION,
            true
        );

        wp_localize_script('pixobe-designer-admin', 'pixobeDesignerSettings', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('pixobe_designer_ajax_nonce')
        ));

        // enque styles

        wp_enqueue_style(
            'pixobe-designer-styles',
            PIXOBE_DESIGNER_PLUGIN_DIR_URL . "assets/css/admin.css",
            array(),
            PIXOBE_DESIGNER_VERSION,
            'all'
        );
    }
}

add_action('admin_menu', 'Plugin\PixobeDesigner\pixobe_add_admin_menu');
add_filter('script_loader_tag', __NAMESPACE__ . '\\pixobe_designer_script_loader', 10, 3);
add_action('admin_enqueue_scripts', __NAMESPACE__ . '\\pixobe_desinger_enqueue_page_scripts');
