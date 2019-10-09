<?php
namespace Puleeno\Wallery\Interfaces;

interface Factory {


	public function setId( $gallery_id);
	public function save();
	public function render( $post);
}
