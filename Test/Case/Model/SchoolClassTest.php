<?php
App::uses('SchoolClass', 'Model');

/**
 * SchoolClass Test Case
 *
 */
class SchoolClassTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.school_class',
		'app.educategory',
		'app.exam',
		'app.course_level',
		'app.question_edusubject',
		'app.question',
		'app.user',
		'app.group',
		'app.post',
		'app.subject',
		'app.stady_matirial_educategory',
		'app.study_material',
		'app.question_type',
		'app.question_level',
		'app.past_paper',
		'app.exam_subject',
		'app.school_class_subject',
		'app.university_course_subject',
		'app.university',
		'app.country',
		'app.state',
		'app.city',
		'app.university_course',
		'app.question_option',
		'app.edusubject',
		'app.exam_detail'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->SchoolClass = ClassRegistry::init('SchoolClass');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SchoolClass);

		parent::tearDown();
	}

}
