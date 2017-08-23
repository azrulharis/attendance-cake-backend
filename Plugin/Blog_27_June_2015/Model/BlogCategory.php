<?php
App::uses('BlogAppModel','Blog.Model');


/**
 * Post Model
 *
 * @property User $User
 */
class BlogCategory extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $name = 'BlogCategory';
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
		'unique' => array(
				'rule' => array('isUnique'),
				'message' => 'Slug is already exists.',
			),
		),
/*	'visibility' => array(
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
	),*/
);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'ParentBlogCategory' => array(
			'className' => 'BlogCategory',
			'foreignKey' => 'parent_id',
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
		'ChildBlogCategory' => array(
			'className' => 'BlogCategory',
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
		'BlogsBlogCategory' => array(
			'className' => 'BlogsBlogCategory',
			'foreignKey' => 'blog_category_id',
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
	);

	
	
	 public function alphaNumericDashUnderscore($check) {
        // $data array is passed using the form field name as the key
        // have to extract the value to make the function generic
        $value = array_values($check);
        $value = $value[0];

        return preg_match('|^[0-9a-zA-Z_-]*$|', $value);
    }
	
}
