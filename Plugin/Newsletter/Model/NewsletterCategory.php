<?php
App::uses('NewsletterAppModel', 'NewsletterCategory.Model');
/**
 * Post Model
 *
 * @property User $User
 */
class NewsletterCategory extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';
	public $name='NewsletterCategory';

/**
 * Validation rules
 *
 * @var array
 */
 
	public $validate = array(
		'title' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Please fill the title',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'unique' => array(
				'rule' => array('isUnique'),
				'message' => 'title already exist.',
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
	
}
