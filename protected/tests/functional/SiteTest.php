<?php

class SiteTest extends WebTestCase
{
	public function testIndex()
	{
		$this->open('');
		$this->assertTextPresent('Welcome');
	}

	public function testContact()
	{
		$this->open('?r=site/contact');
		$this->assertTextPresent('Contact Us');
		$this->assertElementPresent('name=ContactForm[name]');

		$this->type('name=ContactForm[name]','tester');
		$this->type('name=ContactForm[email]','tester@example.com');
		$this->type('name=ContactForm[subject]','test subject');
		$this->click("//input[@value='Submit']");
		if(time_nanosleep(0, 200000000)) {
			$this->assertTextPresent('Body cannot be blank.');
		}
	}

	public function testLoginLogout()
	{
		$this->open('');
		// ensure the user is logged out
		if($this->isTextPresent('Logout'))
			$this->clickAndWait('link=Logout (admin)');

		// test login process, including validation
		$this->clickAndWait('link=Login');
		$this->assertElementPresent('name=LoginForm[username]');
		$this->type('name=LoginForm[username]','admin');
		$this->click("//input[@value='Login']");
		$this->waitForElementPresent('id=LoginForm_password_em_');
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
	}
}
