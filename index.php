<?php

include './bootstrap.php';

use Pimple\Container;
use Application\Utilities\Database;

$c = new Container();

$c['config'] = $config;

$c['db'] = function($c) {
	return new Database($c['config']['database']);
};

$c['PostService'] = function($c) {
	$postService = new PostService($c['db']);
	return $postService;
};

/*
//TODO create an AUTH service to handle authentication
$c['auth_service'] = function($c) {};
*/

$frontController = new FrontController(BASEPATH);
$frontController->handleRequest();

?>