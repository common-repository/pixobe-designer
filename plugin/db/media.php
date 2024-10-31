<?php

namespace Plugin\PixobeDesigner;

/**
 * 
 */
function create_media_table()
{
    global $wpdb;
    $table_name =  $wpdb->prefix . PIXOBE_DESIGNER_MEDIA_TABLE;
    // Create SQL query to define table structure
    $sql = "CREATE TABLE IF NOT EXISTS `$table_name` (
        `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
        `url` varchar(255) NOT NULL,
        `thumbnail` varchar(255)  NULL,
        `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`)
    ) DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;";
    // Execute SQL query using WordPress's dbDelta function
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}


function get_media_items()
{
    global $wpdb;
    $table_name =  $wpdb->prefix . PIXOBE_DESIGNER_MEDIA_TABLE;
    // SQL query to retrieve all font data
    try {
        // Code that might throw an error
        $result = $wpdb->get_results(
            "SELECT * FROM `$table_name` ORDER BY `id` DESC",
        );
        return $result;
    } catch (\Exception $e) {
        // Create a WP_Error object and return it
        throw new \Exception($e->getMessage());
    }
}

function delete_media($media_id)
{
    global $wpdb;
    $table_name =  $wpdb->prefix . PIXOBE_DESIGNER_MEDIA_TABLE;
    // SQL query to delete the specified font
    try {
        // Code that might throw an error
        $result = $wpdb->delete(
            $table_name,
            array('id' => $media_id),
            array('%d')
        );
        return $result;
    } catch (\Exception $e) {
        // Create a WP_Error object and return it
        throw new \Exception($e->getMessage());
    }
}


function add_media($url, $thumbnail)
{
    global $wpdb;
    $table_name =  $wpdb->prefix . PIXOBE_DESIGNER_MEDIA_TABLE;
    // Validate input data
    if (empty($url)) {
        throw new \Exception("Bad data.");
    }

    try {
        // Code that might throw an error

        // SQL query to insert a new font
        $result = $wpdb->insert(
            $table_name,
            array(
                'thumbnail' => $thumbnail,
                'url'  => $url,
                'created_at' => current_time('mysql'),
                'modified_at' => current_time('mysql')
            ),
            array(
                '%s',
                '%s',
                '%s',
                '%s'
            )
        );
        return $result;
    } catch (\Exception $e) {
        // Create a WP_Error object and return it
        throw new \Exception($e->getMessage());
    }
}
