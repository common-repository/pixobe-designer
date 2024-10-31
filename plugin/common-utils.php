<?php

namespace Plugin\PixobeDesigner;

// Function to add type="module" attribute to script tag
function pixobe_designer_script_loader($tag, $handle, $src)
{
    // Check if the script handle matches your script
    if ('pixobe-designer' !== $handle) {
        return $tag;
    }
    // change the script tag by adding type="module" and return it.
    $tag = '<script type="module" src="' . esc_url($src) . '"></script>';
    return $tag;
}

function designer_localize_script()
{
    // Prepare the PHP data for localization
    $gallery = get_option('pixobe_image_gallery', array());
    // media gallery
    $media_gallery = array();
    foreach ($gallery as $image) {
        $media_gallery[] = array('src' => $image['src']);
    }
    // Get the font list
    $font_list = get_option('pixobe_font_list', array());
    // Stored fonts
    $font_names = array();
    foreach ($font_list as $font) {
        $font_family = isset($font['name']) ? esc_html($font['name']) : '';
        $font_url = isset($font['url']) ? esc_url($font['url']) : '';
        if (!empty($font_family)) {
            $font_names[] = array(
                "name" => $font_family,
                "url" => $font_url
            );
        }
    }

    $data = array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'media_gallery' => $media_gallery,
        'fonts' => $font_names,
        'nonce' => wp_create_nonce('pixobe_designer_ajax_nonce'),
    );
    // Localize the script with new data
    wp_localize_script('pixobe-designer-plugin', 'wpdesigner', $data);
}
