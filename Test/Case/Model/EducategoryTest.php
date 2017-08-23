<?php
App::uses('Educategory', 'Model');

/**
 * Educategory Test Case
 *
 */
class EducategoryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.educategory',
		'app.exam',
		'app.school_class',
		'app.university'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Educategory = ClassRegistry::init('Educategory');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Educategory);

		parent::tearDown();
	}

}
