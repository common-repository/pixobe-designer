<?php

namespace Plugin\PixobeDesigner;

use Plugin\PixobeDesigner\{Constants, PixobeBackendHandler};

/**
 * 
 */
function home_page()
{
    $icon = Constants::PIXOBE_ICON;
    if (isset($_POST['request_free_trial'])) {
        PixobeBackendHandler::get_instance()->activate_trial();
    }
    // init nonce
    PixobeBackendHandler::get_instance()->get_nonce(true);
    $prefix = Constants::OPTION_PREFIX;

    if (isset($_POST['request-trial'])) {
        try {
            PixobeBackendHandler::get_instance()->activate_trial();
        } catch (\Exception $e) {
            echo "Unable to activate, please contact email@pixobe.com";
        }
    }

    $plan = get_option($prefix . "_plan");
    $message = get_option($prefix . "_message");

?>

    <div class="wp-wrap">

        <div class="wp-grid">
            <div class="flex flex-col gap-1">
                <div>
                    <p class="pixobe-notices"> <?php echo $message; ?></p>
                </div>
                <div class="wp-panel grid grid-2">
                    <div>
                        <h1><?php _e("Pixobe Graphic Designer", 'pixobe-designer'); ?></h1>
                        <p>Offer your visitors the tools to design stunning greeting cards, create funny memes, or draw on a blank canvas.</p>
                    </div>

                    <div>
                        <?php if ($plan === 'Free') { ?>
                            <form method="post" name="request-trial">
                                <input type="submit" value="Request Trial" name="request-trial" class="button button-primary" />
                            </form>
                        <?php } ?>
                    </div>
                </div>

                <div class="wp-panel">
                    <h2><?php _e("Blank Canvas", "pixobe-designer") ?></h2>
                    <p>Copy this shortcode <code>[pixobe_designer]</code> to configure a blank canvas</p>
                </div>
                <div class="wp-panel">
                    <h2><?php _e("Canvas with Background", "pixobe-designer") ?></h2>
                    <p>Copy this shortcode <code>[pixobe_designer background="https://i.imgur.com/xzMwrn3.jpeg"]</code> to create a canvas with a background image.</p>
                </div>
                <div class="wp-panel">
                    <h2><?php _e("Template", "pixobe-designer") ?></h2>
                    <p>Go to <a href="/wp-admin/admin.php?page=pixobe-designer-templates">Templates</a> to create a template.</p>
                    <p>Once you create a template, copy this shortcode <code>[pixobe_designer template="Your template name"]</code> to insert the template on any of your front end.</p>
                </div>
            </div>
        </div>
    </div>
<?php

}

?>