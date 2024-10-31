<?php

namespace Plugin\PixobeDesigner;


/**
 * 
 */
function fonts_page()
{
    if (isset($_POST['save'])) {
        $font_name = isset($_POST['font_name']) ? sanitize_text_field($_POST['font_name']) : '';
        $font_url = isset($_POST['font_url']) ? sanitize_text_field($_POST['font_url']) : '';

        // Call the add_fonts method with the received data
        if (!empty($font_name)) {
            add_font($font_name, $font_url);
        } else {
            echo "Both font name and URL are required.";
        }
    }

    $font_list = get_fonts();
?>

    <div class="wp-wrap">
        <div class="wp-grid">
            <div class="flex flex-col gap-1">
                <div class="wp-panel grid grid-2">
                    <div>
                        <h1><?php _e("Fonts", 'pixobe-designer'); ?></h1>
                        <p>Add fonts for using in Designer application.</p>
                    </div>
                </div>
                <div class="wp-panel">
                    <form method="post" action="<?php echo admin_url('admin.php?page=pixobe-designer-fonts'); ?>" name="designer-form" id="designer-form">
                        <div>
                            <?php wp_nonce_field('pixobe_template_nonce', 'pixobe_font_list_nonce'); ?>
                            <div class="flex">
                                <div class="flex flex-col items-end ">
                                    <div class="form-element">
                                        <label for="font_name"><?php _e("Font Name", 'pixobe-designer'); ?></label>
                                        <input type="text" id="font_name" name="font_name" required placeholder="Font Name" value="">
                                    </div>
                                    <div class="form-element">
                                        <label for="font_url"><?php _e("Font Url", 'pixobe-designer'); ?> </label>
                                        <input type="text" id="font_url" name="font_url" placeholder="Url of the font (optional)" value="">
                                    </div>
                                    <div class="p-12">
                                        <input type="submit" name="save" id="save" class="button button-primary" value="Save">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="wp-panel">
                    <?php if (!empty($font_list)): ?>
                        <form method="post" action="<?php echo admin_url('admin.php?page=pixobe-designer-fonts'); ?>" name="designer-form" id="designer-form">
                            <div class="font-list">
                                <?php foreach ($font_list as $font): ?>
                                    <div class="font-item" style="font-family:<?php echo htmlspecialchars($font->name); ?>">
                                        <?php echo htmlspecialchars($font->name); ?>
                                        <button class="btn-delete" type="button" onclick="deleteFont(event)" data-font="<?php echo htmlspecialchars($font->id); ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                                <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </form>
                    <?php else: ?>
                        <p>Add your first font.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

<?php
}

/**
 *  scripts and css
 */
function pixobe_desinger_enqueue_fonts_scripts($hook)
{
    $allowed_hooks = array(
        'pixobe-designer_page_pixobe-designer-fonts'
    );
    // Check if the current hook is in the allowed hooks array
    if (in_array($hook, $allowed_hooks)) {
        wp_enqueue_script(
            'pixobe-designer-font',
            PIXOBE_DESIGNER_PLUGIN_DIR_URL . "assets/js/fonts.js",
            array('jquery'),
            PIXOBE_DESIGNER_VERSION,
            true
        );
    }
}
add_action('admin_enqueue_scripts', 'Plugin\PixobeDesigner\pixobe_desinger_enqueue_fonts_scripts');
