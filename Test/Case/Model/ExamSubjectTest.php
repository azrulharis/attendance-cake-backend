<?php
App::uses('ExamSubject', 'Model');

/**
 * ExamSubject Test Case
 *
 */
class ExamSubjectTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.exam_subject',
		'app.exam',
		'app.educategory',
		'app.school_class',
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
		'app.edusubject',
		'app.main_item',
		'app.question_option',
		'app.university_course',
		'app.university',
		'app.country',
		'app.state',
		'app.city',
		'app.university_course_subject',
		'app.school_class_subject',
		'app.exam_detail'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ExamSubject = ClassRegistry::init('ExamSubject');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ExamSubject);

		parent::tearDown();
	}

}
