<?php
App::uses('FaqAppModel', 'Faq.Model');
/**
 * Faq Model
 *
 */
class Faq extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	//public $displayField = 'title';
	public $name = 'Faq';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'question' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'faq_category_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Please select faq category',
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
		'FaqCategory' => array(
			'className' => 'FaqCategory',
			'foreignKey' => 'faq_Category_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
