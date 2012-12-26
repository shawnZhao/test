<?php
$app = new \Slim\Slim(array(
    'templates.path' => './templates',
	'view' => new \Slim\Extras\Views\Twig() //TODO
));

// $loader = new Twig_Loader_Filesystem('./templates');
// $twig = new Twig_Environment($loader, array(
// 		'cache' => './templates_cache',
// ));


$app->get('/', function () {
	echo 'index request';
});

$app->get('/welcome', function () use ($app) {
	echo $app->render('welcome.html', array('name' => 'shawn'));
});

$app->get('/home/:args', function ($args = 'a') {
	echo 'get request ' . $args;
});