<?php

/**
 *  Designer Templates
 */

namespace Plugin\PixobeDesigner;

use Plugin\PixobeDesigner\Constants;

require_once trailingslashit(dirname(__FILE__))  . 'admin-ajax-api.php';


/**
 * 
 */
function template_page()
{
    // Get other options
    $prefix = Constants::OPTION_PREFIX;
    $site_id = get_option($prefix . "_site_id");
    $digest = get_option($prefix . "_nonce");
    $expiry = get_option($prefix . "_expiry_date");
    $template_id = isset($_GET['template_id']) ? $_GET['template_id'] : null;
    $template_name = "";

    if (isset($_POST['delete'])) {
        try {
            $template_id = isset($_POST['template_id']) ? $_POST['template_id'] : null;
            delete_template($template_id);
        } catch (\Exception $e) {
            // Handle the exception
            echo "Unable to delete the template" . $e;
        }
    }

    if (!empty($template_id)) {
        $template = get_template($template_id);
        if ($template) {
            $template_name = $template->name;
        }
    }
?>
    <div class="wp-wrap">
        <div class="wp-grid">
            <div class="flex flex-col gap-1">
                <div class="wp-panel grid grid-2">
                    <div>
                        <h1><?php _e("Designer Templates", 'pixobe-designer'); ?></h1>
                        <p>Create templates and add it to the front end.</p>
                    </div>
                    <div>
                        <a class="button button-primary" href="/wp-admin/admin.php?page=pixobe-designer-templates">Create New</a>
                    </div>
                </div>
                <div class="wp-panel">
                    <form method="post" action="<?php echo admin_url('admin.php?page=pixobe-designer-templates'); ?>" name="designer-form" id="designer-form">
                        <div>
                            <?php wp_nonce_field('pixobe_template_nonce', 'pixobe_font_list_nonce'); ?>
                            <div class="grid grid-2">
                                <div>
                                    <div class="form-element">
                                        <label for="template_name"><?php _e("Template Name", 'pixobe-designer'); ?></label>
                                        <input type="text" id="template_name" name="template_name" required placeholder="Eg: Mothers Day Card" value="<?php echo esc_attr($template_name) ?>">
                                    </div>
                                </div>
                                <div>
                                    <input type="submit" name="delete" id="delete" class="button button-secondary" value="Delete">
                                    <input type="submit" name="save" id="save" class="button button-primary" value="Save" onclick="saveTemplateData(event);">
                                </div>
                            </div>
                            <div>
                                <div class="form-element">
                                    <label>Shortcode</label>
                                    <code>[pixobe_designer template="<?php esc_attr_e($template_name) ?>"]</code>
                                </div>
                            </div>
                        </div>
                        <div class="w-full">
                            <div id="template-builder"></div>
                        </div>
                        <input type="hidden" id="digest" value="<?php echo esc_html($digest) ?>" name="digest" />
                        <input type="hidden" id="site_id" value="<?php echo esc_html($site_id) ?>" name="site_id" />
                        <input type="hidden" id="expiry" value="<?php echo esc_html($expiry) ?>" name="expiry" />
                        <input type="hidden" id="template_id" value="<?php echo esc_html($template_id) ?>" name="template_id" />
                    </form>
                </div>
            </div>
            <div>
                <?php
                $templates = get_templates();
                if (!empty($templates)) {
                ?>
                    <div class="wp-card">
                        <div class="wp-card-header">
                            <h2>Templates</h2>
                        </div>
                        <div class="wp-card-content">
                            <ul>
                                <?php foreach ($templates as $template): ?>
                                    <li class="template-item">
                                        <a class="btn-link" href="/wp-admin/admin.php?page=pixobe-designer-templates&template_id=<?php echo $template->id ?>"><?php echo htmlspecialchars($template->name); ?></a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php
}
