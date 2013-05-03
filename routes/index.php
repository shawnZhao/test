<?php

// $loader = new Twig_Loader_Filesystem('./templates');
// $twig = new Twig_Environment($loader, array(
// 		'cache' => './templates_cache',
// ));

$aBitOfInfo = function (\Slim\Route $route) {
	echo "Current route is " . $route->getName();
};

$app->get('/', function () use ($app) {
	echo $app->render('index.html');
});

$app->get('/welcome', $aBitOfInfo, function () use ($app) {
	echo $app->render('welcome.html', array(
			'name' => 'shawn',
			'buttonJs' => buttonJS
			));
// 	$url = $app->urlFor('home', array('args' => 'Josh'));
// 	$app->redirect($url);
})->name('welcome');

$app->get('/home/:args', function ($args = 'a') {
	echo 'get request ' . $args;
})->name('home');