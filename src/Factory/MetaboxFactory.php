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

    public function render($post)
    {
        wallery_load_template('select-box');
    }
}
