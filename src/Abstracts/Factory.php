<?php
namespace Puleeno\Wallery\Abstracts;

use Puleeno\Wallery\Interfaces\Factory as FactoryInterfaces;

abstract class Factory implements FactoryInterfaces
{

    public function get_curent_image_layout()
    {
        $user_meta_layout = sprintf('wallery_%s_layout', $this->wallary_id);
        $layout           = get_user_meta(get_current_user_id(), $user_meta_layout, true);
        if (! $layout) {
            $layout = get_option("wallery_layout_{$this->wallary_id}");
        }
        if ($layout) {
            return $layout;
        }
        return apply_filters("wallery_{$this->wallary_id}_default_layout", Wallery::DEFAULT_IMAGE_LAYOUT);
    }

    function toolbar_image_list_styles()
    {
        wallery_load_template('image-list-styles');
    }
}
