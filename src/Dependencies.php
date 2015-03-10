<?php

$injector = new \Auryn\Provider;

$injector->alias('Http\Response', 'Http\HttpResponse');
$injector->share('Http\HttpRequest');
$injector->define('Http\HttpRequest', [
		':get' => $_GET,
		':post' => $_POST,
		':cookies' => $_COOKIE,
		':files' => $_FILES,
		':server' => $_SERVER,
	]);

$injector->alias('Http\Request', 'Http\HttpRequest');
$injector->share('Http\HttpResponse');

$injector->define('PDO', [
		':dsn' => 'mysql:host=localhost;
				   dbname=unit_db',
		':username' => 'root',
		':passwd' => 'root'
	]);
$injector->share('PDO');

$injector->alias('Project\Template\Renderer', 'Project\Template\TwigRenderer');

$injector->define('Twig_Environment', [
		':loader' => new Twig_Loader_Filesystem( __DIR__ . '/View/' )
	]);

return $injector;