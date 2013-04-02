<?php
require_once './vendor/autoload.php';

mb_internal_encoding ( "UTF-8" );
date_default_timezone_set ( 'Asia/Shanghai' );

$app = new \Slim\Slim(array(
		'mode' => 'development',
		'templates.path' => './templates',
		'view' => new \Slim\Extras\Views\Twig() //TODO
));

require_once './routes/index.php';
require_once './routes/error.php';

$app->run();
?>