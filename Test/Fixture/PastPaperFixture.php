<?php
/**
 * PastPaperFixture
 *
 */
class PastPaperFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'question_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'edusubject_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'comment' => 'exam_subject_id, school_class_subject_id, university_course_subject_id'),
		'main_item_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'comment' => 'exam_id,school_class_id, university_cours_id '),
		'year' => array('type' => 'text', 'null' => true, 'default' => null, 'length' => 4),
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
			'question_id' => 1,
			'edusubject_id' => 1,
			'main_item_id' => 1,
			'year' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'modified' => '2014-08-31 00:51:20',
			'created' => '2014-08-31 00:51:20'
		),
	);

}
