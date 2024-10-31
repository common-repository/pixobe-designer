<?php

/**
 * Plugin Name:     	Pixobe Designer - WordPress Image Editor and Product Designer
 * Plugin URI:      	https://wordpress.org/plugins/pixobe-designer/
 * Description:     	WordPress Image Editor and Product Designer.
 * Version:         	2.0.8
 * Author:          	Pixobe
 * Author URI:      	https://pixobe.com/
 * Text Domain:     	pixobe-designer
 * Domain Path: 		/languages/
 * Requires at least: 	5.6
 * Tested up to: 		6.6
 * License:         	GNU AGPL v3.0 (http://www.gnu.org/licenses/agpl.txt)
 *
 * @package         	PixobeDesigner
 * @author          	Pixobe <email@pixobe.com>
 * @copyright       	Copyright (c) Pixobe
 */

// if this file is called directly, abort.
if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly

define('PIXOBE_DESIGNER_VERSION', '2.0.8');
define('PIXOBE_DESIGNER_PLUGIN_DIR_URL', trailingslashit(plugin_dir_url(__FILE__)));
define('PIXOBE_DESIGNER_TEMPLATES_TABLE', "pixobe_designer_templates");
define('PIXOBE_DESIGNER_FONT_TABLE', "pixobe_designer_fonts");
define('PIXOBE_DESIGNER_MEDIA_TABLE', "pixobe_designer_media");

/**
 * Pixobe designer endpoint
 */
$PIXOBE_DESIGNER_ASSET_PATH = "https://designer.pixobe.com";

$config = trailingslashit(dirname(__FILE__)) . 'config.php';
// if exists include
if (file_exists($config)) {
    include_once $config;
}

// Hook the activation function into the plugin activation hook

require_once trailingslashit(dirname(__FILE__)) . 'plugin/backend-utils.php';
require_once trailingslashit(dirname(__FILE__))  . 'plugin/constants.php';
require_once trailingslashit(dirname(__FILE__))  . 'plugin/shortcode.php';
require_once trailingslashit(dirname(__FILE__))  . 'plugin/admin/gallery.php';
require_once trailingslashit(dirname(__FILE__))  . 'plugin/admin/fonts.php';
require_once trailingslashit(dirname(__FILE__))  . 'plugin/admin/home.php';
require_once trailingslashit(dirname(__FILE__))  . 'plugin/admin/templates.php';
require_once trailingslashit(dirname(__FILE__))  . 'plugin/admin/menu.php';
require_once trailingslashit(dirname(__FILE__))  . 'plugin/common-utils.php';
require_once trailingslashit(dirname(__FILE__))  . 'plugin/db/fonts.php';
require_once trailingslashit(dirname(__FILE__))  . 'plugin/db/media.php';
require_once trailingslashit(dirname(__FILE__))  . 'plugin/db/templates.php';


function pixobe_designer_activated()
{
    try {
        $backend_handler = Plugin\PixobeDesigner\PixobeBackendHandler::get_instance();
        $backend_handler->activate();
        // create table
        Plugin\PixobeDesigner\create_designer_table();
        // create default fonts
        Plugin\PixobeDesigner\create_fonts_table();
        // create default fonts
        Plugin\PixobeDesigner\create_media_table();
    } catch (Exception $e) {
        error_log($e->getMessage());
        echo "Unable to activate, please contact email@pixobe.com.";
    }
}

/**
 * Deactivate
 */
function pixobe_designer_deactivate()
{
    try {
        $backend_handler = Plugin\PixobeDesigner\PixobeBackendHandler::get_instance();
        $backend_handler->deactivate();
    } catch (Exception $e) {
        error_log($e->getMessage());
        echo "Unable to deactivate, please contact email@pixobe.com.";
    }
}

// Register activation hook
register_activation_hook(__FILE__, 'pixobe_designer_activated');

// Register deactivation hook
register_deactivation_hook(__FILE__, 'pixobe_designer_deactivate');
