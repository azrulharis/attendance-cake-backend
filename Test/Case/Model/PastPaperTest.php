<?php
App::uses('PastPaper', 'Model');

/**
 * PastPaper Test Case
 *
 */
class PastPaperTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.past_paper',
		'app.question',
		'app.user',
		'app.group',
		'app.post',
		'app.subject',
		'app.stady_matirial_educategory',
		'app.study_material',
		'app.question_type',
		'app.question_level',
		'app.question_edusubject',
		'app.edusubject',
		'app.course_level',
		'app.exam',
		'app.educategory',
		'app.school_class',
		'app.school_class_subject',
		'app.university',
		'app.country',
		'app.state',
		'app.city',
		'app.university_course_subject',
		'app.university_course',
		'app.exam_detail',
		'app.exam_subject',
		'app.question_option',
		'app.main_item'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PastPaper = ClassRegistry::init('PastPaper');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PastPaper);

		parent::tearDown();
	}

}
