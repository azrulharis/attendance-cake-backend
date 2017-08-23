<?php
App::uses('SaleJob', 'Model');

/**
 * SaleJob Test Case
 *
 */
class SaleJobTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.sale_job'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->SaleJob = ClassRegistry::init('SaleJob');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SaleJob);

		parent::tearDown();
	}

}
