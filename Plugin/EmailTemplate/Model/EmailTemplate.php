<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9 
 */
 
App::uses('EmailTemplateAppModel','EmailTemplate.Model');

/**
 * Post Model
 * @property User $User
 */

class EmailTemplate extends AppModel {

/**
 * Display field
 *
 * @var string
 */

	public $name = 'EmailTemplate';

/**
 * Validation rules
 *
 * @var array
 */

	public $validate  = array(
		'title' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Please fill title.', 
			),

		),
		
		'slug' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Please fill slug', 
			),

			'unique' => array(
				'rule' => array('isUnique'),
				'message' => 'This Slug  already exists.', 
			),
		),
	);
	
	/*
Get Placehoders for email
*/	
	public function getPlaceholders($user_id = NULL,$model, $data = array())
	{
		$config = Configure::read('Placeholder');
		$result = array();
		if($model == 'User')
		{
			if(!empty($user_id))
			{
				App::import("Model", "User");  
				$model = new User();
			
				$userData = $model->find('first',array(
						'conditions'=>array('User.id'=>$user_id),
						'contain'=>array(),
						'fields'=>array('User.username', 
								'User.firstname',
								'User.lastname',
								'User.mobile_number' 
							)			
					    )
			        );
				
				foreach($userData['User'] as $key => $value) {
					$result[$config['User'][$key]['placeholder']] = $value;
				}
				
				$result[$config['User']['password']['placeholder']] = (!empty($data['User']['password']))?$data['User']['password']:'';
			
				if(!empty($data['User']['activation_code'])) {
					$result[$config['Generate']['activation_link']['placeholder']] = '<a href="'.BASE_URL.'users/activate_code/'.$data['User']['activation_code'].'">Activate Account</a>';
				} else {
					$result[$config['Generate']['activation_link']['placeholder']] = 'No activation link available';
				}
			
			} else {				
				$result[$config['User']['firstname']['placeholder']] = (!empty($data['User']['firstname']))?$data['User']['firstname']:'';
				$result[$config['User']['lastname']['placeholder']] = (!empty($data['User']['lastname']))?$data['User']['lastname']:'';
				$result[$config['User']['username']['placeholder']] = (!empty($data['User']['username']))?$data['User']['username']:'';
				$result[$config['User']['password']['placeholder']] = (!empty($data['User']['password']))?$data['User']['password']:'';	
			}
		}
		foreach($config['Config'] as $key => $value)
		{
		
			$result[$value['placeholder']] = Configure::read($key);
		} 
		
		$result[$config['Generate']['site_logo']['placeholder']] = '<img  src="'.BASE_URL.'img/'.Configure::read("Site.logo").'" />';
		$result[$config['Generate']['login_link']['placeholder']] = '<a href="'.BASE_URL.'users/login">Account login link</a>';
		$result[$config['Generate']['register_link']['placeholder']] = '<a href="'.BASE_URL.'users/registration">Account Registration link</a>';
		
		if($model == 'Contact')
		{
			$result[$config['Contact']['name']['placeholder']] = (!empty($data['Contact']['name']))?$data['User']['firstname']:'';
			$result[$config['Contact']['email']['placeholder']] = (!empty($data['Contact']['email']))?$data['User']['firstname']:'';
			$result[$config['Contact']['message']['placeholder']] = (!empty($data['Contact']['message']))?$data['Contact']['message']:'';
		}
		
		if($model == 'Subscribe')
		{
			$result[$config['Subscribe']['name']['placeholder']] = (!empty($data['Subscribe']['name']))?$data['Subscribe']['name']:'';
		} 
		return $result; 
	}


}