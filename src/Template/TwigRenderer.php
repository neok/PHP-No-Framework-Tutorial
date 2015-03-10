<?php
namespace Project\Template;

/**
 * Class TwigRenderer
 *
 * @package Project\Template
 */
class TwigRenderer implements Renderer
{

	/**
	 * @var \Twig_Environment
	 */
	private $environment;

	/**
	 * @param \Twig_Environment $environment
	 */
	public function __construct(\Twig_Environment $environment)
	{
		$this->environment = $environment;

	}

	/**
	 * @param mixed $template
	 * @param array $data
	 *
	 * @return mixed|void
	 */
	public function render($template, array $data = [])
	{
		echo $this->environment->render($template, $data);
	}
}