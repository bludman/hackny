<?php
/* Site Test cases generated on: 2010-10-09 16:10:07 : 1286656087*/
App::import('Model', 'Site');

class SiteTestCase extends CakeTestCase {
	var $fixtures = array('app.site', 'app.link');

	function startTest() {
		$this->Site =& ClassRegistry::init('Site');
	}

	function endTest() {
		unset($this->Site);
		ClassRegistry::flush();
	}

}
?>