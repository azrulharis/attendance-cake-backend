<?php
App::uses('AppModel', 'Model');
/**
 * OtRequestMachine Model
 *
 * @property OtRequest $OtRequest
 * @property Machine $Machine
 * @property AttendanceMachine $AttendanceMachine
 */
class OtRequestMachine extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'ot_request_id' => array(
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
		'attendance_machine_id' => array(
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
		'OtRequest' => array(
			'className' => 'OtRequest',
			'foreignKey' => 'ot_request_id',
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
		'AttendanceMachine' => array(
			'className' => 'AttendanceMachine',
			'foreignKey' => 'attendance_machine_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
