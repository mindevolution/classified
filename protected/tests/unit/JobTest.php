<?php

define('ADMIN_UID', 1);
define('ADMIN_NAME', 'admin');

define('AREA_MANHATTON_AID', 1);
define('AREA_MANHATTON_NAME', '曼哈頓');

define('TYPE_ID', 1);
define('TYPE_NAME', '全職');

define('CATEGORY_ID', 3);
define('CATEGORY_NAME', '銷售相關-Sales Related');

define('PURPOSE_ID', 1);
define('PURPOSE_NAME', '請人');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of JobTest
 *
 * @author peniel
 */
class JobTest extends CTestCase
{
	function testJobData() {
		$number = 12;
		Job::model()->deleteAll();
		$this->assertEquals(0, Job::model()->count());

		$date = array(
			0 => '2011-11-10 15:28:59',
			1 => '2011-11-09 15:28:59',
//			2 => '2011-11-07 15:28:59',
		);
		$areas_id = array(1,2,3,7,8,28,29,30,32);
		
		for($id=1; $id < $number; $id++) {
			$job = new Job;
			$job->id = $id;
			$job->description = 'Great job';
			$job->title = 'Hiring: '.md5(rand(0, 100000));
			$job->uid = ADMIN_UID;
			$job->aid = $areas_id[array_rand($areas_id)];
			$job->tid = TYPE_ID;
			$job->cid = rand(1, 3);
			$job->pid = PURPOSE_ID;
			$job->timestamp = $date[array_rand($date)];
			$job->save();
		}

		$this->assertNotEquals(0, Job::model()->count());
	}

	function testJobRelations() {
		$job = Job::model()->findByPk(1);
		$user = $job->user;
		$this->assertEquals(ADMIN_NAME, $user->username);
//		$this->assertEquals(AREA_MANHATTON_NAME, $job->area->name);
//		$this->assertEquals(CATEGORY_NAME, $job->category->name);
		$this->assertEquals(TYPE_NAME, $job->type->name);
		$this->assertEquals(PURPOSE_NAME, $job->purpose->name);
	}


}

?>
