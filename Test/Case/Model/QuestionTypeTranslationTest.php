<?php
App::uses('QuestionTypeTranslation', 'Model');

/**
 * QuestionTypeTranslation Test Case
 *
 */
class QuestionTypeTranslationTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.question_type_translation'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->QuestionTypeTranslation = ClassRegistry::init('QuestionTypeTranslation');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->QuestionTypeTranslation);

		parent::tearDown();
	}

}
