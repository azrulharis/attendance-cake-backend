<?php
App::uses('StudyMaterial', 'Model');

/**
 * StudyMaterial Test Case
 *
 */
class StudyMaterialTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.study_material',
		'app.user',
		'app.group',
		'app.post',
		'app.subject',
		'app.question',
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
		'app.school_class_subject',
		'app.exam_detail',
		'app.question_option',
		'app.stady_matirial_educategory'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->StudyMaterial = ClassRegistry::init('StudyMaterial');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->StudyMaterial);

		parent::tearDown();
	}

}
