<?php
namespace Puleeno\Wallery\Factory;

use Puleeno\Wallery\Abstracts\Factory;

class MetaboxFactory extends Factory {


	protected $wallary_id;

	public function __construct() {
		add_action( 'save_post', array( $this, 'save' ) );
	}

	public function setId( $wallary_id ) {
		$this->wallary_id = $wallary_id;
	}

	public function save() {
	}

	public function render( $post ) {
		$wallery_id = $this->wallary_id;
		wallery_load_template( 'select-box', compact( 'wallery_id' ) );
	}
}
