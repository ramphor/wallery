<?php
namespace Puleeno\Wallery;

use Puleeno\Wallery\Abstracts\Factory;

class Wallery
{
    protected $factory;
    public $gallery_id;

    public function __construct(Factory $factory, $gallery_id = null)
    {
        $this->factory =  $factory;
        if (!empty($gallery_id)) {
            $this->setId($gallery_id);
        }
    }

    public function setId($gallery_id)
    {
        $this->gallery_id = $gallery_id;
    }

    public function render()
    {
        $this->factory->render();
    }
}
