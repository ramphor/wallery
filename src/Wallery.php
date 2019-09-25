<?php
namespace Puleeno\Wallery;

use Puleeno\Wallery\Abstracts\Factory;

class Wallery
{
    const VERSION  = '1.0.0';
    const LIB_NAME = 'wallery';

    protected $factory;
    public $gallery_id;

    public function __construct(Factory $factory, $gallery_id = null)
    {
        $this->factory = $factory;
        if (! empty($gallery_id)) {
            $this->setId($gallery_id);
        }
        $this->init();
    }

    public function setId($gallery_id)
    {
        $this->gallery_id = $gallery_id;
    }

    public function init()
    {
        if (defined('WALLERY_ABSPATH')) {
            return;
        }
        $this->define('WALLERY_ABSPATH', realpath(dirname(__FILE__) . '/..'));
        $this->includes();
        $this->initHooks();
    }

    private function define($name, $value)
    {
        if (defined($name)) {
            return;
        }
        define($name, $value);
    }

    public function includes()
    {
        require_once WALLERY_ABSPATH . '/src/helpers.php';
    }

    public function initHooks()
    {
        add_action('admin_enqueue_scripts', array( $this, 'enqueueScripts' ));
    }

    public function render($post)
    {
        $this->factory->render($post);
    }

    public function enqueueScripts()
    {
        wp_register_style(self::LIB_NAME, wallery_asset_url('css/wallery.css'), array(), self::VERSION);

        wp_enqueue_style(self::LIB_NAME);
    }
}
