<?php
namespace Puleeno\Wallery\Factory;

use Puleeno\Wallery\Abstracts\Factory;

class MetaboxFactory extends Factory
{
    protected $gallery_id;

    public function __construct()
    {
        add_action('save_post', array( $this, 'save' ));
    }

    public function setId($gallery_id)
    {
        $this->gallery_id = $gallery_id;
    }

    public function save()
    {
    }

    public function render()
    {
        $image = 'Upload Image';
        $button = 'button';
        $image_size = 'full'; // it would be better to use thumbnail size here (150x150 or so)
        $display = 'none'; // display state of the "Remove image" button
        ?>
        <p><?php
            _e('<i>Set Images for Featured Image Gallery</i>', 'mytheme');
        ?></p>

        <label>
            <div class="gallery-screenshot clearfix">
                <?php
                {
                    $ids = explode(',', $value);
                foreach ($ids as $attachment_id) {
                    $img = wp_get_attachment_image_src($attachment_id, 'thumbnail');
                    echo '<div class="screen-thumb"><img src="' . esc_url($img[0]) . '" /></div>';
                }
                }
                ?>
            </div>

            <input id="edit-gallery" class="button upload_gallery_button" type="button"
                value="<?php esc_html_e('Add/Edit Gallery', 'mytheme') ?>"/>
            <input id="clear-gallery" class="button upload_gallery_button" type="button"
                value="<?php esc_html_e('Clear', 'mytheme') ?>"/>
            <input type="hidden" name="<?php echo esc_attr($name); ?>" id="<?php echo esc_attr($name); ?>" class="gallery_values" value="<?php echo esc_attr($value); ?>">
        </label>
        <?php
    }
}
