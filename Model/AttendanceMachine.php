<?php
App::uses('AppModel', 'Model');
/**
 * AttendanceMachine Model
 *
 * @property Attendance $Attendance
 * @property Machine $Machine
 * @property ProjectMachine $ProjectMachine
 * @property Worker $Worker
 * @property OtRequestMachine $OtRequestMachine
 */
class AttendanceMachine extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'attendance_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'machine_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'project_machine_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'worker_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'ot' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'status' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
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
		'Attendance' => array(
			'className' => 'Attendance',
			'foreignKey' => 'attendance_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Machine' => array(
			'className' => 'Machine',
			'foreignKey' => 'machine_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'ProjectMachine' => array(
			'className' => 'ProjectMachine',
			'foreignKey' => 'project_machine_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Worker' => array(
			'className' => 'Worker',
			'foreignKey' => 'worker_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'OtRequestMachine' => array(
			'className' => 'OtRequestMachine',
			'foreignKey' => 'attendance_machine_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
