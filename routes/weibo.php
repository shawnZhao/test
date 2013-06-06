<?php
require_once './lib/weibo/saetv2.ex.class.php';
require_once './lib/base/FullPage.php';
use lib\base\FullPage;

$authToken = function ( $refer ) {
	return function () use ( $refer ) {
		if(!isset($_SESSION ['user'] ['uid'])){
			$app = \Slim\Slim::getInstance();
			$app->redirect('/account/weibo-login?refer=' . $refer);
			return;
		}
	};
};

$app->get('/account/weibo-login', function () use ($app) {
	$o = new SaeTOAuthV2(WB_AKEY, WB_SKEY);
	$authUrl = $o->getAuthorizeURL( WB_CALLBACK_URL, 'code', '/account/weibo-callback?refer='.$_GET['refer'], 'popup' );
	echo $app->render('authToken.html', FullPage::getVar(array(
			'authUrl' => $authUrl
	)));
})->name('weibo-login');

$app->get('/account/weibo-callback', function () use ($app) {
	echo 'back';
});

$app->get('/upload', $authToken($_GET['refer']), function () use ($app) {
	echo $app->render('weibo/upload.html', FullPage::getVar(array(
			'refer' => $_GET['refer'],
			'referUrl' => parse_url($_GET['refer']),
			'buttonJs' => buttonJS
	)));
});