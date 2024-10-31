<?php

namespace Plugin\PixobeDesigner;

function pixobe_gallery_page()
{
    if (isset($_FILES['add_image']) && check_admin_referer('pixobe_upload_nonce', 'pixobe_upload_nonce_field')) {
        try {
            $upload = wp_handle_upload($_FILES['add_image'], array('test_form' => false));
            if (isset($upload['file'])) {
                $image_url = $upload['url'];
                add_media($image_url, null);
            }
        } catch (\Exception $e) {
            print_r($e);
        }
    }
    $media_items = get_media_items();
?>
    <div class="wp-wrap">
        <div class="wp-grid">
            <div class="flex flex-col gap-1">
                <div class="wp-panel grid grid-2">
                    <div>
                        <h1><?php _e("Media", 'pixobe-designer'); ?></h1>
                        <p>Add images for your designer app.</p>
                    </div>
                    <div>
                        <form method="post" enctype="multipart/form-data" name="media-form" id="media-form">
                            <?php wp_nonce_field('pixobe_upload_nonce', 'pixobe_upload_nonce_field'); ?>
                            <label class="button button-primary" for="add-image">
                                Add Image
                                <input type="file" name="add_image" id="add-image" oninput="onFileUpload(event)" />
                            </label>
                        </form>
                    </div>
                </div>
                <div class="wp-panel">
                    <?php if (!empty($media_items)): ?>
                        <form method="post" action="<?php echo admin_url('admin.php?page=pixobe-designer-fonts'); ?>" name="designer-form" id="designer-form">
                            <div class="designer-media">
                                <?php foreach ($media_items as $image): ?>
                                    <div class="media-item">
                                        <img src="<?php echo htmlspecialchars($image->url); ?>" />
                                        <button class="btn-delete" type="button" onclick="deleteMedia(event)" data-media="<?php echo htmlspecialchars($image->id); ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                                <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </form>
                    <?php else: ?>
                        <p> Upload your first image.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>


<?php
}
