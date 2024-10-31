<?php

namespace Plugin\PixobeDesigner;

/**
 * 
 */
function save_designer_template()
{
    check_ajax_referer('pixobe_designer_ajax_nonce', 'nonce');
    if (!current_user_can('manage_options')) {
        wp_send_json_error('Unauthorized');
    }

    $data = isset($_POST['data']) ? wp_unslash($_POST['data']) : null;

    $templateName = isset($_POST['templateName']) ? stripslashes($_POST['templateName']) : "";

    if (empty($templateName)) {
        wp_send_json_error(array(
            "msg" => 'Required data Template name is missing.'
        ));
    }

    if (empty($data)) {
        wp_send_json_error(array(
            "msg" => 'Required data is missing.'
        ));
    }

    $id = isset($_POST['id']) ? stripslashes($_POST['id']) : 0;

    try {
        $result = save_designer_data($data,  $templateName, $id, true);
        wp_send_json_success(array(
            "id" =>  $result
        ));
    } catch (\Exception $e) {
        return wp_send_json_error('Unable to save data.');
    }
}

/**
 * 
 */
function get_designer_template()
{
    check_ajax_referer('pixobe_designer_ajax_nonce', 'nonce');
    if (!current_user_can('manage_options')) {
        wp_send_json_error('Unauthorized');
    }
    $id = isset($_GET['template_id']) ? stripslashes($_GET['template_id']) : '';
    if (empty($id)) {
        wp_send_json_error(array(
            "msg" => 'Required data missing.'
        ));
    }

    try {
        $data = get_template_data($id);
        wp_send_json_success(array(
            "data" =>  json_decode($data)
        ));
    } catch (\Exception $e) {
        wp_send_json_error(array(
            "msg" => 'Unable to get data.'
        ));
    }
}

/**
 * 
 */
function delete_font_item()
{
    check_ajax_referer('pixobe_designer_ajax_nonce', 'nonce');
    if (!current_user_can('manage_options')) {
        wp_send_json_error('Unauthorized');
    }
    $id = isset($_GET['id']) ? stripslashes($_GET['id']) : '';

    if (empty($id)) {
        wp_send_json_error(array(
            "msg" => 'Required data missing.'
        ));
    }
    try {
        delete_font($id);
        wp_send_json_success(array(
            "msg" =>  "Font deleted successfully"
        ));
    } catch (\Exception $e) {
        wp_send_json_error(array(
            "msg" => 'Unable to get data.'
        ));
    }
}

/**
 * 
 */
function delete_media_item()
{
    check_ajax_referer('pixobe_designer_ajax_nonce', 'nonce');
    if (!current_user_can('manage_options')) {
        wp_send_json_error('Unauthorized');
    }
    $id = isset($_GET['id']) ? stripslashes($_GET['id']) : '';

    if (empty($id)) {
        wp_send_json_error(array(
            "msg" => 'Required data missing.'
        ));
    }
    try {
        delete_media($id);
        wp_send_json_success(array(
            "msg" =>  "Media deleted successfully"
        ));
    } catch (\Exception $e) {
        wp_send_json_error(array(
            "msg" => 'Unable to get data.'
        ));
    }
}

add_action('wp_ajax_pixobe_designer_save_template', __NAMESPACE__ . "\\save_designer_template");
add_action('wp_ajax_pixobe_designer_get_template', __NAMESPACE__ . "\\get_designer_template");
add_action('wp_ajax_pixobe_designer_delete_font', __NAMESPACE__ . "\\delete_font_item");
add_action('wp_ajax_pixobe_designer_delete_media', __NAMESPACE__ . "\\delete_media_item");
