<?php
namespace Project\Controllers;

use Http\Response;
use Http\Request;
use Project\Model\Service;
use Project\Observer\Object;
use Project\Observer\OBS;
use Project\Observer\Subject;
use Project\OtherShit\Body;
use Project\Template\Renderer;

/**
 * Class Homepage
 *
 * @package Project\Controllers
 */
class Homepage
{
	/**
	 * @var Response;
	 */
	private $response;

	/**
	 * @var Request
	 */
	private $request;

	/**
	 * @var \Project\Template\Renderer
	 */
	private $renderer;

	/**
	 * @var Service
	 */
	private $service;

	/**
	 *
	 * @param Request  $request
	 * @param Response $response
	 * @param Renderer $renderer
	 * @param Service $service
	 */
	public function __construct(
		Request $request,
		Response $response,
		Renderer $renderer,
		Service $service)
	{
		$this->response = $response;
		$this->request 	= $request;
		$this->renderer = $renderer;
		$this->service 	= $service;
	}

	/**
	 * @return Response
	 */
	public function show()
	{
		$name = $this->request->getParameter('name', 'neok');
		$data = [
			'name' => $name
		];
		$this->response->setContent($this->renderer->render('index.html', $data));

	}
}