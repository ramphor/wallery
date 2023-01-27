<?php
namespace Ramphor\Wallery;

use Ramphor\Wallery\Abstracts\Factory;
use Ramphor\Wallery\Wallery\Ajax as WalleryAjax;

class Wallery
{

    const VERSION              = '1.0.5';
    const LIB_NAME             = 'wallery';
    const DEFAULT_IMAGE_LAYOUT = 'thumbnail';

    protected $factory;
    public $wallary_id;

    public function __construct(Factory $factory, $wallary_id = null)
    {
        $this->factory = $factory;
        if (! empty($wallary_id)) {
            $this->setId($wallary_id);
        }
        $this->init();
    }

    public function setId($wallary_id)
    {
        $this->factory->setId($wallary_id);
    }

    public function init()
    {
        if (defined('WALLERY_ABSPATH')) {
            return;
        }
        $walleryAbsPath = realpath(dirname(__FILE__) . '/..');
        if (PHP_OS === 'WINNT') {
            $walleryAbsPath = str_replace(DIRECTORY_SEPARATOR, '/', $walleryAbsPath);
        }
        $this->define('WALLERY_ABSPATH', $walleryAbsPath);
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
        add_action('wallery_toolbars', array( $this->factory, 'toolbar_image_list_styles' ));

        new WalleryAjax();
    }

    public function render($post)
    {
        $this->factory->render($post);
    }

    public function enqueueScripts()
    {
        wp_enqueue_media();

        wp_register_style(self::LIB_NAME, wallery_asset_url('css/wallery.css'), array(), self::VERSION);
        wp_enqueue_style(self::LIB_NAME);

        wp_register_script(self::LIB_NAME, wallery_asset_url('js/wallery.js'), array( 'jquery' ), self::VERSION, true);
        wp_enqueue_script(self::LIB_NAME);
    }
}
