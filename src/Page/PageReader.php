<?php
namespace Project\Page;

/**
 * Interface PageReader
 *
 * @package Project\Page
 */
interface PageReader
{
	/**
	 * @param $parameter
	 *
	 * @return mixed
	 */
	public function readByParameter($parameter);
}