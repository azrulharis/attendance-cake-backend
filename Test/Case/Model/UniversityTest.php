<?php
App::uses('University', 'Model');

/**
 * University Test Case
 *
 */
class UniversityTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.university',
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
		'app.school_class',
		'app.university_course_subject',
		'app.university_course',
		'app.question_option',
		'app.edusubject',
		'app.exam_detail',
		'app.country',
		'app.state',
		'app.city'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->University = ClassRegistry::init('University');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->University);

		parent::tearDown();
	}

}
