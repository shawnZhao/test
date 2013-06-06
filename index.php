<?php
require_once './vendor/autoload.php';
require_once './config.php';

mb_internal_encoding ( "UTF-8" );
date_default_timezone_set ( 'Asia/Shanghai' );
session_start();

$app = new \Slim\Slim(array(
		'mode' => 'development',
		'templates.path' => './templates',
		'view' => new \Slim\Extras\Views\Twig() //TODO
));


require_once './routes/index.php';
require_once './routes/error.php';
require_once './routes/weibo.php';
//require_once './routes/test.php';

$app->run();
?>