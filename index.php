<?php
include_once './vendor/autoload.php';

mb_internal_encoding ( "UTF-8" );
date_default_timezone_set ( 'Asia/Shanghai' );
 
include_once './routes/index.php';

$app->run();
?>