<?php
/**
 * QuestionEdusubjectFixture
 *
 */
class QuestionEdusubjectFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'question_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'edusubject_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'comment' => 'exam_subject_id, school_class_subject_id, university_course_subject_id'),
		'course_level_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'comment' => 'levels of course, one level may have multiple courses,exams'),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'question_id' => 1,
			'edusubject_id' => 1,
			'course_level_id' => 1,
			'modified' => '2014-08-30 23:41:39',
			'created' => '2014-08-30 23:41:39'
		),
	);

}
