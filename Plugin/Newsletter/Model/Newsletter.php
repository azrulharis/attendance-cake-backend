<?php
App::uses('NewsletterAppModel', 'Newsletter.Model');
/**
 * Post Model
 *
 * @property User $User
 */
class Newsletter extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	//public $displayField = 'title';
	public $name = 'Newsletter';

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
		'subject' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Please fill the subject',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'newsletter_category_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Please select category',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'email' => array(														// this field is used for validation on send test mail
			'notEmpty' => array(												// function on admin_testmail.ctp in Newsletter controller
				'rule' => array('notEmpty'),
				'message' => 'Please fill the email',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'email' => array(
				'rule' => array('email'),
				'message' => 'Please fill the correct email',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'subscriber' => array(														// this field is used for validation on send test mail
			/*'notEmpty' => array(												// function on admin_testmail.ctp in Newsletter controller
				'rule' => array('selectSubscriber'),
				'message' => 'Please select atleast one subscriber',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),*/
			'CheckSelectionSubscriber' => array(
				'rule' => array('CheckSelectionSubscriber','subscriber'),
				'message' => 'Please select atleast one subscriber.',
				 'allowEmpty' => false,
				 'required' => false,
				 'on' => 'create', 
             )
		),
		'newsletter_id' => array(														// this field is used for validation on send test mail
			'notEmpty' => array(												// function on admin_testmail.ctp in Newsletter controller
				'rule' => array('notEmpty'),
				'message' => 'Please select Newsletter',
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
		'NewsletterCategory' => array(
			'className' => 'NewsletterCategory',
			'foreignKey' => 'newsletter_Category_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	public function title($newscat_id){		
	 $title = $this->NewsletterCategory->find('first',array('fields'=>'NewsletterCategory.title','conditions'=>array('NewsletterCategory.id'=>$newscat_id)));
	 
	 return  $title['NewsletterCategory']['title'] ;
	}
	
	
	 public function CheckSelectionSubscriber() {	  //// Checking Rank For Users
	 
		   $subscriber = $this->data['Newsletter']['subscriber'];
		   if(!empty($subscriber)>0){
		      return true;
		   }
		return false;	
   	}
	
/*
Get Placehoders for email
*/	
	public function getPlaceholders()
	{
		$config = Configure::read('newsletter.Placeholder');
		$result = array();
			
		foreach($config['Config'] as $key => $value)
		{
			$result[$value['placeholder']] = Configure::read($key);
		}
		
		$result[$config['Generate']['site_logo']['placeholder']] = '<img  src="'.BASE_URL.'img/'.Configure::read("Site.logo").'" />';
		
		return $result;
	}
}
