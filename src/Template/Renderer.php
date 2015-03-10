<?php
namespace Project\Template;

/**
 * Interface Renderer
 *
 * @package Project\Template
 */
interface Renderer
{
	/**
	 * @param mixed $template
	 * @param array $data
	 *
	 * @return mixed
	 */
	public function render($template, array $data = []);
}