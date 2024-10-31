<?php

namespace Plugin\PixobeDesigner;

function create_designer_table()
{
    global $wpdb;
    $table_name =  $wpdb->prefix . PIXOBE_DESIGNER_TEMPLATES_TABLE;
    // Create SQL query to define table structure
    $sql = "CREATE TABLE IF NOT EXISTS `$table_name` (
        `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
        `name` varchar(255) NOT NULL,
        `user_id` mediumint(9) NOT NULL,
        `data` json NOT NULL,
        `is_template` tinyint(1) NOT NULL DEFAULT 0,
        `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`)
    ) DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;";
    // Execute SQL query using WordPress's dbDelta function
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}


function delete_designer_table()
{
    global $wpdb;
    $table_name =  $wpdb->prefix . PIXOBE_DESIGNER_TEMPLATES_TABLE;
    $sql = "DROP TABLE IF EXISTS $table_name;";
    $wpdb->query($sql);
}

/**
 * 
 */
function save_designer_data($data, $name, $id = null, $is_template = false)
{
    global $wpdb;

    $table_name =  $wpdb->prefix . PIXOBE_DESIGNER_TEMPLATES_TABLE;
    // user id
    $user_id = get_current_user_id() ?: 0;

    // Insert or update data in the database
    if ($id) {
        // Update existing record
        $result = $wpdb->update(
            $table_name,
            array(
                'name' => $name,
                'data' => $data,
                'user_id' => $user_id,
                'is_template' => $is_template
            ),
            array('id' => $id),
            array(
                '%s',
                '%s',
                '%d',
                '%d'
            ),
            array('%d')
        );
        return $id;
    } else {
        // Insert new record
        $result = $wpdb->insert(
            $table_name,
            array(
                'name' => $name,
                'data' => $data,
                'user_id' => $user_id,
                'is_template' => $is_template
            ),
            array(
                '%s',
                '%s',
                '%d',
                '%d'
            )
        );
        return $wpdb->insert_id;
    }
}



function get_template($template_id)
{
    global $wpdb;
    $table_name =  $wpdb->prefix . PIXOBE_DESIGNER_TEMPLATES_TABLE;
    $query = $wpdb->prepare(
        "SELECT id,name,data FROM $table_name WHERE id = %d",
        $template_id
    );
    return $wpdb->get_row($query);
}


function get_template_data($template_id)
{
    global $wpdb;
    $table_name =  $wpdb->prefix . PIXOBE_DESIGNER_TEMPLATES_TABLE;
    $query = $wpdb->prepare(
        "SELECT data FROM $table_name WHERE id = %d",
        $template_id
    );
    return $wpdb->get_var($query);
}

function get_template_by_name($template_name)
{
    global $wpdb;
    $table_name =  $wpdb->prefix . PIXOBE_DESIGNER_TEMPLATES_TABLE;
    $query = $wpdb->prepare(
        "SELECT data FROM $table_name WHERE name = %s",
        $template_name
    );
    return $wpdb->get_var($query);
}


function delete_template($template_id)
{
    global $wpdb;
    $table_name =  $wpdb->prefix . PIXOBE_DESIGNER_TEMPLATES_TABLE;
    $query = $wpdb->prepare(
        "DELETE FROM $table_name WHERE id = %d",
        $template_id
    );
    return $wpdb->get_var($query);
}

function get_templates()
{
    global $wpdb;
    $table_name =  $wpdb->prefix . PIXOBE_DESIGNER_TEMPLATES_TABLE;
    $query = $wpdb->prepare(
        "SELECT  data,name,id FROM $table_name WHERE is_template = true"
    );
    return $wpdb->get_results($query);
}

function get_my_templates()
{
    global $wpdb;
    $table_name =  $wpdb->prefix . PIXOBE_DESIGNER_TEMPLATES_TABLE;

    $user_id = get_current_user_id();

    $query = $wpdb->prepare(
        "SELECT  data FROM $table_name WHERE user_id = %d",
        $user_id
    );
    return $wpdb->get_var($query);
}
