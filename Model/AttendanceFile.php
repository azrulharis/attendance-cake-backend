<?php
App::uses('AppModel', 'Model');
/**
 * AttendanceFile Model
 *
 * @property Attendance $Attendance
 * @property AttendanceWorker $AttendanceWorker
 */
class AttendanceFile extends AppModel {

	public $actsAs = array(
        'Upload.Upload' => array(
            'name' => array(  
                'fields' => array(
                    'dir' => 'dir'
                )
            ) 
        ) 
    );

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
		'name' => array(
			'name' => array(
				
				'rule' => array('isValidMimeType', array('application/pdf', 'image/png', 'image/jpg', 'image/jpeg', 'image/gif'), false),
    			'message' => 'Invalid file format. Only PDF, JPG, JPEG, GIF & PNG are allow.',
				
				'allowEmpty' => true
				//'message' => 'Please supply a valid image.',
			),
		) 
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
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'AttendanceWorker' => array(
			'className' => 'AttendanceWorker',
			'foreignKey' => 'attendance_file_id',
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
