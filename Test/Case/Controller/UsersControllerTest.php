<?php
App::uses('UsersController', 'Controller');
App::uses('View', 'View');
/**
 * SubjectsController Test Case
 *
 */
class UsersControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */ 

/**
 * testIndex method
 *
 * @return void
 */
	public function test__check_duplicate_bank_account() {
		$Controller = new UsersController();
    	$View = new View($Controller);
    	$Controller->ajaxtree(431);
	}

/**
 * testView method
 *
 * @return void
 */
	public function testView() {
		$this->markTestIncomplete('testView not implemented.');
	}

/**
 * testAdd method
 *
 * @return void
 */
	public function testAdd() {
		$this->markTestIncomplete('testAdd not implemented.');
	}

/**
 * testEdit method
 *
 * @return void
 */
	public function testEdit() {
		$this->markTestIncomplete('testEdit not implemented.');
	}

/**
 * testDelete method
 *
 * @return void
 */
	public function testDelete() {
		$this->markTestIncomplete('testDelete not implemented.');
	}

/**
 * testAdminIndex method
 *
 * @return void
 */
	public function testAdminIndex() {
		$this->markTestIncomplete('testAdminIndex not implemented.');
	}

/**
 * testAdminView method
 *
 * @return void
 */
	public function testAdminView() {
		$this->markTestIncomplete('testAdminView not implemented.');
	}

/**
 * testAdminAdd method
 *
 * @return void
 */
	public function testAdminAdd() {
		$this->markTestIncomplete('testAdminAdd not implemented.');
	}

/**
 * testAdminEdit method
 *
 * @return void
 */
	public function testAdminEdit() {
		$this->markTestIncomplete('testAdminEdit not implemented.');
	}

/**
 * testAdminDelete method
 *
 * @return void
 */
	public function testAdminDelete() {
		$this->markTestIncomplete('testAdminDelete not implemented.');
	}

}
