<?php
namespace lib\base;

use lib\base\FullPage;

class Exceptions extends \ErrorException {
	private $title = '';
	
	function __construct ($title, $message='拼命修理服务器', $code='500') {
		$this->title = $title;
		parent::__construct($message, $code);
	}
	
	protected function render () {
		$app = \Slim\Slim::getInstance();
		echo $app->render('base/message.html', FullPage::getVar(array(
				'title' => $this->title,
				'message' => $this->getMessage()
		)));
	}
}

class Forbidden extends Exceptions {
	function __construct ($message='嫩亲没有权限访问哦~', $title='无权访问') {
		parent::__construct($title, $message, '403');
		parent::render();
	}
}

?>