<?php
App::uses('QuestionType', 'Model');

/**
 * QuestionType Test Case
 *
 */
class QuestionTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.question_type',
		'app.question',
		'app.user',
		'app.group',
		'app.post',
		'app.subject',
		'app.stady_matirial_educategory',
		'app.study_material',
		'app.question_level',
		'app.past_paper',
		'app.exam_subject',
		'app.exam',
		'app.educategory',
		'app.school_class',
		'app.course_level',
		'app.question_edusubject',
		'app.edusubject',
		'app.university_course',
		'app.university',
		'app.country',
		'app.state',
		'app.city',
		'app.university_course_subject',
		'app.school_class_subject',
		'app.exam_detail',
		'app.question_option'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->QuestionType = ClassRegistry::init('QuestionType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->QuestionType);

		parent::tearDown();
	}

}
