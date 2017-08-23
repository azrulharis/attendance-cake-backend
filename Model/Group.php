<?php
App::uses('AppModel', 'Model');
/**
 * Group Model
 *
 * @property User $User
 *
 * Company : W3itexperts
 * Author : Rahul Dev Sharma
 * Script Name : CakeReady - Ready Admin With Authentication & ACL Management Plugin
 * Created On : 31 December 2015
 * Script Version : CakeReady v 0.1
 * CakePHP Version : 2.5
 *
 * 
 */
class Group extends AppModel {


	public $actsAs = array('Acl' => array('type' => 'requester'));
	
	public function parentNode() {
		return null;
	}


/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Please fill group name',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'unique' => array( 
				'rule' => 'isUnique',
				'message' => 'Group name already exists.',
			)
		),
	); 

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */

	public $hasMany = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'group_id',
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
	
	public function groups(){
		$groups = $this->find('list');	
		return $groups;
	}
	
	

}
