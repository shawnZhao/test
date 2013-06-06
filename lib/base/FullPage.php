<?php

namespace lib\base;

require_once 'config.php';

class FullPage {
	static function getVar (array $var) {
		return array_merge(array(
				'version' => VERSION,
				'cppUrl' => SITEURL
				), $var);
	}
}

?>