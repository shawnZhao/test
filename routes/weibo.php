<?php
require_once './lib/base/FullPage.php';
use lib\base\FullPage;

$app->get('/upload', function () use ($app) {
	echo $app->render('weibo/upload.html', FullPage::getVar(array(
			'refer' => $_GET['refer'],
			'referUrl' => parse_url($_GET['refer']),
			'buttonJs' => buttonJS
			)));
});