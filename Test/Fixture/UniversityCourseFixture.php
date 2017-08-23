<?php
/**
 * UniversityCourseFixture
 *
 */
class UniversityCourseFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'university_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'title' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'title_hindi' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'status' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 4, 'unsigned' => false),
		'course_level_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'unsigned' => false, 'comment' => 'levels of course, one level may have multiple courses,exams'),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
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
			'university_id' => 1,
			'title' => 1,
			'title_hindi' => 1,
			'status' => 1,
			'course_level_id' => 1,
			'modified' => '2014-08-31 02:53:46',
			'created' => '2014-08-31 02:53:46'
		),
	);

}
