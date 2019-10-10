<?php
namespace Puleeno\Wallery\Factory;

use Puleeno\Wallery\Abstracts\Factory;

class MetaboxFactory extends Factory
{


    protected $wallary_id;

    public function __construct()
    {
        add_action('save_post', array( $this, 'save' ));
    }

    public function setId($wallary_id)
    {
        $this->wallary_id = $wallary_id;
    }

    public function save($post_id = null)
    {
        if (!empty($_POST[$this->wallary_id])) {
            update_post_meta($post_id, $this->wallary_id, $_POST[$this->wallary_id]);
        } else {
            delete_post_meta($post_id, $this->wallary_id);
        }
    }

    public function getImages($post_id = null)
    {
        $image_ids = get_post_meta($post_id, $this->wallary_id, true);
        if ($image_ids) {
            $images = [];
            foreach ($image_ids as $image_id) {
                $image = [
                    'id' => $image_id,
                    'src' => wp_get_attachment_url($image_id, 'thumbnail'),
                ];
                $images[] = $image;
            }
            return $images;
        }
        return [];
    }

    public function render($post)
    {
        $this->check_id();
        $wallery_id = $this->wallary_id;
        $images = $this->getImages($post->ID);
        wallery_load_template('select-box', compact('wallery_id', 'images'));
    }

    public function check_id()
    {
        if (empty($this->wallary_id)) {
            throw new \Exception('Please set ID for wallary can working is correctly.');
        }
    }
}
