<?php

class DbTest extends CTestCase
{

	public function testConnection() {
		$this->assertNotEquals(NULL, Yii::app()->db);
	}

	public function testAreaTable() {
//		header('Content-Type: html/text; charset=utf-8');
		// Test the table data not null
		$result = Area::model()->findAll();
		$this->assertNotNull($result);

		$csv_file = YiiBase::getPathOfAlias('application.data.csv') . '/ybd_classify_area.csv';
		$this->assertTrue(file_exists($csv_file));

		// Clear the table data
		Area::model()->deleteAll();
		$n = Area::model()->count();
		$this->assertEquals(0, $n);

		$areas = array();
		$handle = fopen($csv_file, 'r');
		while ($row = fgetcsv($handle)) {
			if (isset($row[2]) && $row[2]) {
				$obj = new Area;
				$obj->aid = $row[0];
				$obj->pid = $row[1];
				$obj->name = $row[5];
				$obj->weight = $row[4];
				$obj->save();
			}
		}

		$count = Area::model()->count();
		$this->assertGreaterThan(0, $count);
		// loop and add the data into the database
		foreach ($areas as $id => $ar) {
			
		}
	}
	
	public function testCategoryTable() {
//		header('Content-Type: html/text; charset=utf8');
		// Test the table data not null
		$result = Category::model()->findAll();
		$this->assertNotNull($result);

		$csv_file = YiiBase::getPathOfAlias('application.data.csv') . '/ybd_classify_catetype.csv';
		$this->assertTrue(file_exists($csv_file));

		// Clear the table data
		Category::model()->deleteAll();
		$n = Category::model()->count();
		$this->assertEquals(0, $n);

		$areas = array();
		$handle = fopen($csv_file, 'r');
		while ($row = fgetcsv($handle)) {
			if (isset($row[2]) && $row[2]) {
				$obj = new Category;
				$obj->cid = $row[0];
				$obj->pid = $row[1];
				$obj->name = $row[4];
				$obj->weight = $row[3];
				$obj->keywords = $row[7];
				$obj->description = $row[8];
				if(($obj->cid == 1 && $obj->pid == 0) || $obj->pid == 1) {
					$obj->save();
				}
			}
		}
		fclose($handle);

		$count = Category::model()->count();
		$this->assertGreaterThan(0, $count);
	}

	function testCountPassword() {
		User::model()->deleteAll();
		$count = count(User::model()->findAll());
		$this->assertEquals(0, $count);
		
		$user = new User;
		$user->uid = 1;
		$user->username = 'admin';
		$user->password = md5('ybdadmin');
		$user->rid = 1;
		$user->save();

		$num = User::model()->countPassword(md5('ybdadmin'));
		$this->assertEquals(1, $num);

		$user = new User;
		$user->uid = 2;
		$user->username = 'admin2';
		$user->password = md5('ybdadmin');
		$user->rid = 1;
		$user->save();
		$num = User::model()->countPassword(md5('ybdadmin'));
		$this->assertEquals(2, $num);

		$count = count(User::model()->findAll());
		$this->assertNotEquals(0, $count);
	}

	/**
	 * Test the admin account
	 * if the admin account right then contine
	 * if not right then delete the admin account and create new admin account
	 */
	function testSetupAdminAccount() {
		User::model()->deleteAll();
		$count = count(User::model()->findAll());
		$this->assertEquals(0, $count);
		
		$user = new User;
		$user->uid = 1;
		$user->username = 'admin';
		$user->password = md5('ybdadmin');
		$user->rid = 1;
		$user->save();

		$user = new User;
		$user->uid = 2;
		$user->username = 'otheradmin';
		$user->password = md5('otheradmin');
		$user->rid = 1;
		$user->save();
	}

	/**
	 * Test the job purpose table data
	 */
	function testJobPurposeTable() {
		JobPurpose::model()->deleteAll();
		$count = JobPurpose::model()->count();
		$this->assertEquals(0, $count);

		$data = array(
			array(
				'pid' => 1,
				'name' => '請人',
			),
			array(
				'pid' => 2,
				'name' => '求職',
			),
		);

		foreach($data as $row) {
			$record = new JobPurpose;
			$record->pid = $row['pid'];
			$record->name = $row['name'];
			$record->save();
		}
		$count = JobPurpose::model()->count();
		$this->assertGreaterThan(0, $count);
	}

	/**
	 * Test the job type table data
	 */
	function testJobTypeTable() {
		JobType::model()->deleteAll();
		$count = JobType::model()->count();
		$this->assertEquals(0, $count);

		$data = array(
			array(
				'tid' => 1,
				'name' => '全職',
			),
			array(
				'tid' => 2,
				'name' => '兼職',
			),
		);

		foreach($data as $row) {
			$record = new JobType;
			$record->tid = $row['tid'];
			$record->name = $row['name'];
			$record->save();
		}
		$count = JobType::model()->count();
		$this->assertGreaterThan(0, $count);
	}
}

