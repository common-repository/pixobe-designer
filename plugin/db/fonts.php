<?php

namespace Plugin\PixobeDesigner;



function create_fonts_table()
{
    global $wpdb;

    $table_name =  $wpdb->prefix . PIXOBE_DESIGNER_FONT_TABLE;
    // Create SQL query to define table structure
    $sql = "CREATE TABLE IF NOT EXISTS `$table_name` (
        `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
        `name` varchar(100) NOT NULL,
        `url` varchar(255) NOT NULL,
        `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`)
    ) DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;";
    // Execute SQL query using WordPress's dbDelta function
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}


function get_fonts()
{
    global $wpdb;
    $table_name =  $wpdb->prefix . PIXOBE_DESIGNER_FONT_TABLE;
    // SQL query to retrieve all font data
    $result = $wpdb->get_results(
        "SELECT * FROM `$table_name` ORDER BY `id` DESC",
    );
    return $result;
}

function delete_font($font_id)
{
    global $wpdb;
    $table_name =  $wpdb->prefix . PIXOBE_DESIGNER_FONT_TABLE;
    // SQL query to delete the specified font
    $result = $wpdb->delete(
        $table_name,
        array('id' => $font_id),
        array('%d')
    );
    return $result;
}

function add_font($name, $url)
{
    global $wpdb;
    $table_name =  $wpdb->prefix . PIXOBE_DESIGNER_FONT_TABLE;
    // Validate input data
    if (empty($name)) {
        return false;
    }
    // SQL query to insert a new font
    $result = $wpdb->insert(
        $table_name,
        array(
            'name' => $name,
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
}
