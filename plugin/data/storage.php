<?php

namespace Plugin\PixobeDesigner;

function create_designer_table()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'pixobe_designer';

    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        design_id varchar(255) NOT NULL,
        data json NOT NULL,
        PRIMARY KEY (id)
    ) DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

function delete_designer_table()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'pixobe_designer';

    $sql = "DROP TABLE IF EXISTS $table_name;";
    $wpdb->query($sql);
}

function save_designer_data($design_id, $data)
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'pixobe_designer';

    if (json_last_error() !== JSON_ERROR_NONE) {
        return new \WP_Error('json_decode_error', 'Invalid JSON data: ' . json_last_error_msg());
    }

    $query = $wpdb->prepare(
        "SELECT  id FROM $table_name WHERE design_id = %s",
        $design_id,
    );

    $id = $wpdb->get_var($query);

    // Prepare data for replacement
    $result = $wpdb->replace(
        $table_name,
        array(
            'id' => $id,
            'design_id' => $design_id,
            'data' => $data,
        ),
        array(
            '%d',
            '%s',
            '%s',
        )
    );

    if ($result === false) {
        return new \WP_Error('db_replace_error', 'Could not insert or update data', $wpdb->last_error);
    }
    return $wpdb->insert_id;
}

function get_saved_data($design_id)
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'pixobe_designer';
    $query = $wpdb->prepare(
        "SELECT  data FROM $table_name WHERE design_id = %s",
        $design_id
    );
    return $wpdb->get_var($query);
}
