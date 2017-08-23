<?php
App::uses('AppModel', 'Model');
 
class User extends AppModel {

    
	public $actsAs = array('Acl' => array('type' => 'requester'),'Containable');

	public $displayField = 'username';
    
  

	public $validate = array(
		'username' => array(
			'alphaNumeric' => array(
                'rule' => 'alphaNumeric',
                'required' => true,
                'message' => 'Letters and numbers only without space'
            ),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Please fill username.',
			),
			'unique' => array(
				'rule' => 'isUnique',
				'message' => 'This username already exists.',
			),
			'between' => array(
				'rule'      => array('between', 4, 34),
				'message'   => 'Username must be between 5 and 18 characters.',
			),
		),
		'password' => array(
			'between' => array(
				'rule'      => array('between', 6, 18),
				'message'   => 'Your password must be between 8 and 18 characters.',
			),
		),
		'confirm_password' => array(
			'between' => array(
				'rule'      => array('between', 6, 18),
				'message'   => 'Your password must be between 6 and 18 characters.',
			),
			'compare'    => array(
				'rule'      => array('validate_passwords'),
				'message' => 'The passwords you entered do not match.',
			)
		),/*
		'old_password' => array(
				'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Please fill current password.',
			),
			'checkPassword' => array(
				'rule' => array('checkPassword'),
				'message' => 'Wrong current password.',
			)
		),*/
		'firstname' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Please fill full name.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'email' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Please Fill Email', 
			),
			'unique' => array(
				'rule' => array('isUnique'),
				'message' => 'This email already exists', 
			),
			'email' => array(
        		'rule' => array('email'),
        		'message' => 'Please supply a valid email address'
   		    ),
		),
		'group_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Please select group.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
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
		'Group' => array(
			'className' => 'Group',
			'foreignKey' => 'group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Company' => array(
			'className' => 'Company',
			'foreignKey' => 'company_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		) 
	);
 
	public $hasOne = array(
		
	);
 
	/**
	 * hasMany associations
	 *
	 * @var array
	 */
	public $hasMany = array(
		'Notification' => array(
			'className' => 'Notification',
			'foreignKey' => 'user_id',
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
	

    public function parentNode() {
        if (!$this->id && empty($this->data)) {
            return null;
        }
        if (isset($this->data['User']['group_id'])) {
            $groupId = $this->data['User']['group_id'];
        } else {
            $groupId = $this->field('group_id');
        }
        if (!$groupId) {
            return null;
        } else {
            return array('Group' => array('id' => $groupId));
        }
    }
/*
	public function bindNode($user) {
	
		return array('model' => 'Group', 'foreign_key' => $user['User']['group_id']);
	}
*/	
	public function beforeSave($options = array()) {
        if(!empty($this->data['User']['password'])) {
			$this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
			return true;
		}
	}
	
	public function validate_passwords() {
		return $this->data[$this->alias]['password'] === $this->data[$this->alias]['confirm_password'];
	}
	
	public function checkPassword() {
		$user_id = $this->id;
		$checkPassword = AuthComponent::password($this->data[$this->alias]['old_password']);
		if($this->hasAny(array('User.password' => $checkPassword, 'User.id' => $user_id))) {
			return true;
		} else {
			return false;
		} 
	}

}
