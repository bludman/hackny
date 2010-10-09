<?php
/* Sites Test cases generated on: 2010-10-09 16:10:42 : 1286656122*/
App::import('Controller', 'Sites');

class TestSitesController extends SitesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class SitesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.site', 'app.link');

	function startTest() {
		$this->Sites =& new TestSitesController();
		$this->Sites->constructClasses();
	}

	function endTest() {
		unset($this->Sites);
		ClassRegistry::flush();
	}

	function testIndex() {

	}

	function testView() {

	}

	function testAdd() {

	}

	function testEdit() {

	}

	function testDelete() {

	}

	function testAdminIndex() {

	}

	function testAdminView() {

	}

	function testAdminAdd() {

	}

	function testAdminEdit() {

	}

	function testAdminDelete() {

	}

}
?>