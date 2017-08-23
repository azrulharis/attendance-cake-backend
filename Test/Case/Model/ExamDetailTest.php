<?php
App::uses('ExamDetail', 'Model');

/**
 * ExamDetail Test Case
 *
 */
class ExamDetailTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.exam_detail',
		'app.exam'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ExamDetail = ClassRegistry::init('ExamDetail');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ExamDetail);

		parent::tearDown();
	}

}
