<?php
namespace Puleeno\Wallery\Interfaces;

interface Factory
{


    public function setId($gallery_id);
	public function save($object = null);
	public function getImages($object = null);
    public function render($post);
}
