<?php

/**
 * Change the following URL based on your server configuration
 * Make sure the URL ends with a slash so that we can use relative URLs in test cases
 */
define('TEST_BASE_URL','http://localhost/classified/index-test.php/');

/**
 * The base class for functional test cases.
 * In this class, we set the base URL for the test application.
 * We also provide some common methods to be used by concrete test classes.
 */
class WebTestCase extends CWebTestCase
{
	/**
	 * Sets up before each test method runs.
	 * This mainly sets the base URL for the test application.
	 */
	protected function setUp()
	{
		parent::setUp();
		$this->setBrowserUrl(TEST_BASE_URL);
	}

	/**
	 * Login
	 */
	function login() {
		$this->open('');
		// ensure the user is logged out
		if($this->isTextPresent('Logout'))
			$this->clickAndWait('link=Logout (admin)');

		// test login process, including validation
		$this->clickAndWait('link=Login');
		$this->assertElementPresent('name=LoginForm[username]');
		$this->type('name=LoginForm[username]','admin');
		$this->click("//input[@value='Login']");
		if (time_nanosleep(0, 250000000) === true) {
			$this->assertTextPresent('Password cannot be blank.');
		}
		$this->type('name=LoginForm[password]','ybdadmin');
		$this->clickAndWait("//input[@value='Login']");
		$this->assertTextPresent('Logout');
	}

	function logout() {
		$this->open('');
		// ensure the user is logged out
		if($this->isTextPresent('Logout'))
			$this->clickAndWait('link=Logout (admin)');
	}
}
