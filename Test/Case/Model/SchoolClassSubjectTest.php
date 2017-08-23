<?php
App::uses('SchoolClassSubject', 'Model');

/**
 * SchoolClassSubject Test Case
 *
 */
class SchoolClassSubjectTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.school_class_subject',
		'app.subject',
		'app.question',
		'app.user',
		'app.group',
		'app.post',
		'app.question_type',
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
		'app.exam_detail',
		'app.question_option',
		'app.stady_matirial_educategory',
		'app.study_material'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->SchoolClassSubject = ClassRegistry::init('SchoolClassSubject');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SchoolClassSubject);

		parent::tearDown();
	}

}
