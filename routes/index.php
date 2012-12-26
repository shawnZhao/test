<?php
include_once './vendor/autoload.php';
$app = new \Slim\Slim();

$app->get('/', function () {
	echo 'index request';
});

$app->get('/home/:args', function ($args = 'a') {
	echo 'get request ' . $args;
});