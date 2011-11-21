<?php

class PostJobTest extends WebTestCase
{
	function testPostJob() {
		$job_title = 'Posting job';

		$this->login();
		$this->clickAndWait('link=Job');
		$this->assertTextPresent('開心職場');
		$this->click('link=開心職場');
		$this->clickAndWait("//img[@alt='我要求職']");
		$this->assertTextPresent('請選擇工作類型');
		$this->click("//input[@id='Job_cid_2']");
		$this->type('id=Job_title', $job_title);
		$this->type('id=Job_email','my email');
		$this->type('id=Job_telephone','111234123');
		$this->type('id=Job_description','1234');
		$this->type('id=Job_password','abcd');
		$this->clickAndWait('name=發佈信息');
		$this->assertTextPresent($job_title);
	}
}