<?php

class AreaTest extends CTestCase
{
	public function testGetAreas() {
		$areas = Area::model()->getAreasByPid(Area::PID_ROOT);
		$this->assertTrue(is_array($areas));
	}
}



