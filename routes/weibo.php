<?php

require_once './lib/weibo/saetv2.ex.class.php';
require_once './lib/account/manager.php';
use lib\base\FullPage,
	lib\base\Exceptions,
	lib\base\Forbidden;

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
	$authUrl = $o->getAuthorizeURL( WB_CALLBACK_URL, 'code', $_GET['refer'], 'popup' );
	echo $app->render('weibo/authToken.html', FullPage::getVar(array(
			'authUrl' => $authUrl
	)));
})->name('weibo-login');

$app->get('/account/weibo-callback', function () use ($app) {
	if (isset($_GET['error_code'])) {
		if ($_GET['error_code'] == '21330') {
			return next(new Forbidden('连接微博失败：你拒绝了本站访问你微博的授权请求'));//->Forbidden('连接微博失败：你拒绝了本站访问你微博的授权请求'));
		} else {
			return next(new Exceptions('连接微博失败：' + $_GET['error_code']));//.InternalServerError('连接微博失败：' + $_GET['error_code']));
		}
	}
	logInByWeiboCallbackCode($_GET['code']);
	
	/* accountManager.logInByWeiboCallbackCode($_GET['code'], function (err, user, accessTokenResult) {
		if (err) {
			if (err.constructor === exceptions.UserNotExists) {
				req.session.accessTokenResult = accessTokenResult;
				res.redirect('/account/new-account-by-weibo');
			}
			else next(err);
			return;
		}
	
		doLogIn(req, res, user, 'weibo');
	});
	echo $app->render('weibo/refresh.html', array(
			'refer' => $_GET['state'],
			'refresh' => 'parent'
	)); */
});

$app->get('/upload', $authToken(isset($_GET['refer'])), function () use ($app) {
	echo $app->render('weibo/upload.html', FullPage::getVar(array(
			'refer' => $_GET['refer'],
			'referUrl' => parse_url($_GET['refer']),
			'buttonJs' => buttonJS
	)));
});