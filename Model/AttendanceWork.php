<?php
App::uses('AppModel', 'Model');
/**
 * AttendanceWork Model
 *
 * @property AttendanceWorker $AttendanceWorker
 * @property Work $Work
 */
class AttendanceWork extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'attendance_worker_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'work_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'AttendanceWorker' => array(
			'className' => 'AttendanceWorker',
			'foreignKey' => 'attendance_worker_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Work' => array(
			'className' => 'Work',
			'foreignKey' => 'work_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
