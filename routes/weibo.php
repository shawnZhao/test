<?php
require_once './lib/base/FullPage.php';
use lib\base\FullPage;

function authToken ($app) {
	if(!$_SESSION['user']['uid']){
		$url = $app->urlFor('auth');
		$app->redirect($url);
		return;
	}
}

$app->get('/auth', function () use ($app) {
	$o = new SaeTOAuthV2(WB_AKEY, WB_SKEY);
	echo $app->render('weibo/auth.html', FullPage::getVar(array(
			'authUrl' => $_GET['refer']
	)));
})->name('auth');

$app->get('/upload', authToken(), function () use ($app) {
	echo $app->render('weibo/upload.html', FullPage::getVar(array(
			'refer' => $_GET['refer'],
			'referUrl' => parse_url($_GET['refer']),
			'buttonJs' => buttonJS
	)));
});