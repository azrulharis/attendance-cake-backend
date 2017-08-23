<?php

App::uses('Tree', 'Model');
 
class TreeTest extends CakeTestCase {

	/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user',
		'app.group',
		'app.tree'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Tree = ClassRegistry::init('User');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Tree);

		parent::tearDown();
	}

/**
 * testParentNode method
 *
 * @return void
 */
	public function testParentNode() {
		$this->markTestIncomplete('testParentNode not implemented.');
	}
}