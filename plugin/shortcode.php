<?php

namespace Plugin\PixobeDesigner;

use Plugin\PixobeDesigner\Constants;

function pixobe_designer_shortcode($atts)
{
    // Output content based on shortcode attributes
    $atts = shortcode_atts(array(
        'background' => '',
        'size' => 'normal',
        'template' => ''
    ), $atts, 'pixobe_designer');

    // Get other options
    $prefix = Constants::OPTION_PREFIX;
    $site_id = get_option($prefix . "_site_id");
    $digest = get_option($prefix . "_nonce");
    $expiry = get_option($prefix . "_expiry_date");
    // Sanitize and prepare background URL
    $background = esc_url($atts['background']);
    $template = $atts['template'];

    // Construct shortcode output
    $output = "<div class='" . esc_attr($atts['size']) . "'>
                     <designer-shortcode
                        background='" . esc_attr($background) . "'
                        expiry='" . esc_attr($expiry) . "'
                        site_id='" . esc_attr($site_id) . "',
                        template= '" . esc_attr($template) . "',
                        digest='" . esc_attr($digest) . "'></designer-shortcode>
               </div>";

    return $output;
}

function pixobe_enqueue_scripts()
{
    global $PIXOBE_DESIGNER_ASSET_PATH;
    $handle = "pixobe-designer";

    wp_enqueue_script(
        $handle,
        "$PIXOBE_DESIGNER_ASSET_PATH/build/designer.esm.js",
        array(),
        PIXOBE_DESIGNER_VERSION,
        true
    );

    wp_enqueue_script(
        "pixobe-designer-plugin",
        trailingslashit(plugin_dir_url(__DIR__)) . "assets/js/plugin.js",
        array('jquery'),
        PIXOBE_DESIGNER_VERSION,
        true
    );

    wp_enqueue_style(
        $handle,
        trailingslashit(plugin_dir_url(__DIR__)) . "assets/css/plugin.css",
        array(),
        '1.0.0',
        'all'
    );

    $fonts = get_fonts();
    $media = get_media_items();

    wp_localize_script('pixobe-designer-plugin', 'pixobeDesignerSettings', array(
        'nonce' => wp_create_nonce('pixobe_designer_nonce'),
        'fonts' => $fonts,
        'media' => $media,
        'ajaxurl' => admin_url('admin-ajax.php')
    ));
}

/**
 * 
 */
function get_shortcode_data()
{
    check_ajax_referer('pixobe_designer_nonce', 'nonce');
    if (!current_user_can('manage_options')) {
        wp_send_json_error('Unauthorized');
    }
    try {
        if (isset($_GET['template'])) {
            $template = get_template_by_name($_GET['template']);
        }
        wp_send_json(array(
            'status' => 'success',
            'template' => json_decode($template),
        ));
    } catch (\Exception $e) {
        wp_send_json_error(array(
            "msg" => 'Unable to get data.'
        ));
    }
}

add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\pixobe_enqueue_scripts');
add_shortcode('pixobe_designer', __NAMESPACE__ . '\\pixobe_designer_shortcode');
add_filter('script_loader_tag', __NAMESPACE__ . '\\pixobe_designer_script_loader', 10, 3);
add_action('wp_ajax_pixobe_designer_shortcode', __NAMESPACE__ . "\\get_shortcode_data");
add_action("wp_ajax_nopriv_pixobe_designer_shortcode",  __NAMESPACE__ . "\\get_shortcode_data");
