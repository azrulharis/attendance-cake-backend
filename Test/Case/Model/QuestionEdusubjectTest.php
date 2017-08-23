<?php
App::uses('QuestionEdusubject', 'Model');

/**
 * QuestionEdusubject Test Case
 *
 */
class QuestionEdusubjectTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.question_edusubject',
		'app.question',
		'app.edusubject',
		'app.course_level',
		'app.exam',
		'app.educategory',
		'app.school_class',
		'app.university',
		'app.exam_detail',
		'app.exam_subject',
		'app.subject',
		'app.university_course'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->QuestionEdusubject = ClassRegistry::init('QuestionEdusubject');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->QuestionEdusubject);

		parent::tearDown();
	}

}
