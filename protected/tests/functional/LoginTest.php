<?php

class LoginTest extends WebTestCase
{
	function testLoginLogout() {
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

		// test logout process
		$this->assertTextNotPresent('Login');
		$this->clickAndWait('link=Logout (admin)');
		$this->assertTextPresent('Login');
		$this->close();
	}
}