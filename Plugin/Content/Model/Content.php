<?php
App::uses('ContentAppModel','Content.Model');


/**
 * Post Model
 *
 * @property User $User
 */
class Content extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $name = 'Content';
	public $displayField = 'title';

	public $actsAs = array('Tree','Containable');

/**
 * Validation rules
 *
 * @var array
 */

 	
public $validate = array(
	'title' => array(
		'notEmpty' => array(
			'rule' => array('notEmpty'),
			'message' => 'Please fill the title.',
			//'allowEmpty' => false,
			//'required' => false,
			//'last' => false, // Stop validation after this rule
			//'on' => 'create', // Limit validation to 'create' or 'update' operations
		),
	),
	'slug' => array(
		'slug' => array(
				'rule' => array('alphaNumericDashUnderscore'),
				'message' => 'Slug can only be letters, numbers, dash and underscore',
			),
		),
	'visibility' => array(
		'notEmpty' => array(
			'rule' => array('notEmpty'),
			'message' => 'Please select visibility.',
			//'allowEmpty' => false,
			//'required' => false,
			//'last' => false, // Stop validation after this rule
			//'on' => 'create', // Limit validation to 'create' or 'update' operations
		),
			
			
		),
	'password' => array(
			'visibilityCheckFunction' => array(
				'rule' => array('visibilityCheckFunction'),
				'message' => 'Please fill password.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	
	'value' => array(
		'image' => array(
			'rule' => array(
				'extension',
				array('gif', 'jpeg', 'png', 'jpg', '')
			),
			'message' => 'Please supply a valid image.'
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
		'ParentContent' => array(
			'className' => 'Content',
			'foreignKey' => 'parent_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			
		),
		
		
	);
	
/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'ChildContent' => array(
			'className' => 'Content',
			'foreignKey' => 'parent_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'ContentMeta' => array(
			'className' => 'ContentMeta',
			'foreignKey' => 'content_id',
			'dependent' => true,
			'conditions' => array('ContentMeta.title !=' => 'ximage'),
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'FeatureImage' => array(
			'className' => 'ContentMeta',
			'foreignKey' => 'content_id',
			'conditions' => array('FeatureImage.title' => 'ximage')														
		)
														
	);
	
	
	/**
 * hasOne associations
 *
 * @var array
 */
	public $hasOne = array(
		'ContentSeo' => array(
			'className' => 'ContentSeo',
			'foreignKey' => 'content_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),											
	);
	

	 public function alphaNumericDashUnderscore($check) {
        // $data array is passed using the form field name as the key
        // have to extract the value to make the function generic
        $value = array_values($check);
        $value = $value[0];

        return preg_match('|^[0-9a-zA-Z_-]*$|', $value);
    }
	
	
	public function visibilityCheckFunction()
		{
			$visibility = $this->data['Content']['visibility'];
			
			if($visibility == 'PP')
			{
				$password =$this->data['Content']['password'];
				if(!empty($password)) { return TRUE;}
				else
					{ return FALSE; }
			}
			else
				{
					return TRUE;
				}
		}
}
