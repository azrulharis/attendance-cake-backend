<?php
App::uses('StadyMatirialEducategory', 'Model');

/**
 * StadyMatirialEducategory Test Case
 *
 */
class StadyMatirialEducategoryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.stady_matirial_educategory',
		'app.user',
		'app.group',
		'app.post',
		'app.subject'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->StadyMatirialEducategory = ClassRegistry::init('StadyMatirialEducategory');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->StadyMatirialEducategory);

		parent::tearDown();
	}

}
