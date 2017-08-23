<?php

 
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Methods: GET, POST');
header("Content-Type: application/json");
header("Access-Control-Allow-Credentials: true");
 

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
/**
 * Apis Controller
 * $this->response->header(array(
	            'Access-Control-Allow-Origin' => '*',
	            'Access-Control-Allow-Headers' => 'Content-Type'
	        )); 
 * @property Api $Api
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ApisController extends AppController {

	
	public $helpers = array('Js');

	public $components = array('Paginator', 'Session', 'RequestHandler');

	public function beforeFilter() { 
		parent::beforeFilter();
		$this->Auth->allow('register', 'edit', 'delete', 'index', 'login', 'validateauth', 'updatedeviceid', 'forgotpassword');  
	}

	public function validateauth($user_id, $token) { 
		$this->autoRender = false;
		$this->layout = 'ajax'; 
		$json = array();
		if (is_numeric($user_id) && ctype_alnum($token)) {
			$api = $this->Api->find('first', array(
				'fields' => array('Api.id'),
				'contain' => array(),
				'conditions' => array(
					'Api.user_id' => $user_id,
					'Api.token' => $token,
					'Api.is_login' => 1
					)
				));
			if(!empty($api)) {
				$json['status'] = true;
			} else {
				$json['status'] = false;
			} 
		} else {
			$json['status'] = false;
		}
		echo json_encode($json);
	}

	public function login() {   
		$this->autoRender = false;
		$this->layout = 'ajax'; 
		$json = array();
		$this->loadModel('User'); 
		if ($this->request->is('post')) {  
			$username = trim($this->request->data['username']);
			$password = $this->request->data['password'];
			if(ctype_alnum($username)) {
				$user = $this->User->find('first', array('conditions' => array(
				'User.username' => $username
				)));

				if($user) {
					if ($user['User']['password'] === AuthComponent::password($password)) { 
						// Check is user already Api
						$user_id = $user['User']['id'];
						$device_id = $this->request->data['device_id'];
						$device_type = $this->request->data['device_type'];
						// If first time login, then insert api
						if($this->check_api($user['User']['id'], $device_id, $device_type) === true) { 
							$json['status'] = true;
							$json['message'] = __('You are successfully logged in');
							$json['auth'] = $this->success_respond($user_id);	
						} else {
							$json['status'] = false;
							$json['message'] = __('E85. System error. Please try again');
						} 
					} else {
						$json['status'] = false;
						$json['message'] = __('Invalid username and password');
					}	
				} else {
					$json['status'] = false;
					$json['message'] = __('Invalid username and password');
				} 
					
			} else {
				$json['status'] = false;
				$json['message'] = __('Invalid username and password');
			}
			
		} else {
			$json['status'] = false;
			$json['message'] = __('We cannot process your request.');
		} 
		echo json_encode($json);  
	}

	public function updatedeviceid() {  
		$this->autoRender = false; 
		$json = array();
		if($this->request->is('post')) {
			$user_id = $this->request->data['Api']['user_id'];
			$device_id = $this->request->data['Api']['device_id'];
			$token = $this->request->data['Api']['token'];
			if(is_numeric($user_id)) { 
				$update = $this->Api->updateAll(
				    array('Api.device_id' => "'$device_id'"),
				    array('Api.user_id' => $user_id));
				if($update) {
					$json['status'] = true;
					$json['message'] = 'Device id successfully updated';
				} else {
					$json['status'] = false;
					$json['message'] = 'System error';
				}
			} else {
				$json['status'] = false;
				$json['message'] = 'Invalid user id & token';
			}
		}
		echo json_encode($json);
	}

	private function getuserbyemail($email) { 
		$this->loadModel('User');
		$user = $this->User->find('first', array(
			'contain' => array(),
			'conditions' => array(
				'User.email' => $email
				)
			));
		return $user;
	}

	private function getuser($user_id, $token) {   
		$this->loadModel('User');
		$user = $this->User->find('first', array( 
			'contain' => array(),
			'conditions' => array(
				'User.id' => $user_id 
				)
			));
		return $user;
	}

	public function forgotpassword() { 
		$this->autoRender = false;
		$this->layout = 'ajax';
		$json = array();
		// Check user exist
		if($this->request->is('post')) {

			$email = $this->request->data['User']['email'];

			if(!filter_var($email, FILTER_VALIDATE_EMAIL)) { 
				$json['status'] = false;
				$json['message'] = 'Invalid email address.';
			} else { 
				$checkEmail = $this->getuserbyemail($email);
				if(!empty($checkEmail)) {
					$password = rand(rand(1000000,99999999), 999999999);
					$this->request->data['User']['id'] = $checkEmail['User']['id'];
					$this->request->data['User']['password'] = $password;
					unset($this->request->data['User']['email']);
					$placeHolderArray = $this->EmailTemplate->getPlaceholders(NULL, 'User', $this->data);
					if($this->User->save($this->request->data)) {
					
						$emailTemplate = $this->EmailTemplate->find('first',array(
							'conditions' => array(
									'EmailTemplate.slug' => 'forget-password',
									'EmailTemplate.status' => 1,
									),
									'fields' => array(
										'EmailTemplate.content',
										'EmailTemplate.subject'
										)
								) 
							); 
								
						if(!empty($emailTemplate)) {
							$template_content = __($emailTemplate['EmailTemplate']['content'], array(
								'config' => array(
									'entities' => false,
									'basicEntities' => false,
									'entities_greek' => false,
									'entities_latin' => false,
									'htmlDecodeOutput'=>false
									)));

							$template_content = str_replace(array_keys($placeHolderArray), array_values($placeHolderArray), $template_content);	 	
							
							$Email = new CakeEmail('smtp');
							$Email->from(Configure::read('Site.email'));
							$Email->to($email);
							$Email->emailFormat('html');
							$Email->template('email')->viewVars( array('MAINCONTENT' => $template_content));
							$Email->subject($emailTemplate['EmailTemplate']['subject']);
							
							if($Email->send()) {
								$json['status']	 = true;
								$json['message'] = 'The Password has been updated. Please check your email for updated password.'; 
							} else {
								$json['status']	 = false;
								$json['message'] = 'Mail not sent. Please try again.'; 
							}
						}
					} else {
						$json['status'] = false;
						$json['message'] = 'Your password could not be update.'; 	
					}
				} else {
					$json['status'] = false;
					$json['message'] = 'Email not found.'; 	
				}
			}
		}  
		echo json_encode($json);
	}  

	public function index() {
		$this->Api->recursive = 0;
		$this->set('apis', $this->Paginator->paginate());
	}

	public function view($id = null) {
		if (!$this->Api->exists($id)) {
			throw new NotFoundException(__('Invalid api'));
		}
		$options = array('conditions' => array('Api.' . $this->Api->primaryKey => $id));
		$this->set('api', $this->Api->find('first', $options));
	}
 
	public function register() {   
		$this->autoRender = false;
		$this->layout = 'ajax';
		$json = array();
		$this->loadModel('User');
		if ($this->request->is('post')) { 
			// Insert user first
			 
			$this->Api->create();
			$rand = rand(rand(14020, 99999999), 999999999);
			$password = $this->request->data['User']['password'];
			$this->request->data['User']['activation_code'] = $rand;
			$this->request->data['User']['dob'] = '1990-12-30 12:00:01';
			$this->request->data['User']['status'] = 1; 
			$this->request->data['User']['image'] = 'Default.jpg'; 
			$this->request->data['User']['group_id'] = 3;
			$this->request->data['User']['coutry_id'] = 1;
			$this->request->data['User']['state_id'] = 1;
			$this->request->data['User']['city_id'] = 1;
			$this->request->data['User']['gender'] = 'm';
			$this->request->data['User']['mobile_number'] = 0;

			if($this->User->save($this->request->data)) {
				$user_id = $this->User->getLastInsertId();

				$this->request->data['Api']['user_id'] = $user_id; 
				$this->request->data['Api']['token'] = $user_id . $rand; 

				if ($this->Api->save($this->request->data)) {
					$json['status'] = true;
					$json['message'] = __('Registration has been success.');
					$json['auth'] = $this->success_respond($user_id);
				} else {
					$this->User->id = $user_id;
					$this->User->delete();
					$json['status'] = false;
					$json['message'] = __('We cannot process your request.');
				}	
			} else {
				$json['status'] = false;
				$json['message'] = $this->User->validationErrors;
			}  
			
		} else {
			$json['status'] = false;
			$json['message'] = __('Error!. We cannot process your request.');
		} 
		echo json_encode($json);
	}

	private function success_respond($user_id) {
		$api = $this->Api->find('first', array('conditions'=> array(
			'Api.user_id' => $user_id
			)));

		$resp = array(
			'Api' => $api['Api'],
			'User' => array(
				'id' => $api['User']['id'],
				'username' => $api['User']['username'],
				'name' => $api['User']['name'],
				'group_id' => $api['User']['group_id'] 
				)
			);
		return $resp;
	}

	private function check_api($user_id, $device_id, $device_type) {
		$api = $this->success_respond($user_id);
		if($api) {
			// Update is_login 
			if($this->update_is_login($api['Api']['id'], 1, $device_id, $device_type) === true) {
				return true;
			} 
		} else {
			// Insert api
			$this->Api->create();
			$rand = rand(rand(13050, 99999999), 999999999);
			$this->request->data['Api']['user_id'] = $user_id; 
			$this->request->data['Api']['token'] = sha1($user_id . $rand); 
			$this->request->data['Api']['is_login'] = 1; 
			$this->request->data['Api']['device_type'] = $device_type; 
			if($this->Api->save($this->request->data)) {
				return true;
			} 
		} 
		return false;
	}

	// Login 1/ Logout 0
	private function update_is_login($id, $status, $device_id, $device_type) {
		$data =  array(
		    	'Api.device_id' => "'$device_id'",
		    	'Api.is_login' => "'$status'",
		    	'Api.modified' => "'$this->date'",
		    	'Api.device_type' => "'$device_type'" 
		    	);

		if($this->Api->updateAll($data, array('Api.id' => $id))) {
			return true;
		}
		return false;
	} 

	/**
	 * edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		if (!$this->Api->exists($id)) {
			throw new NotFoundException(__('Invalid api'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Api->save($this->request->data)) {
				$this->Session->setFlash(__('The api has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The api could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Api.' . $this->Api->primaryKey => $id));
			$this->request->data = $this->Api->find('first', $options);
		}
		$users = $this->Api->User->find('list'); 
		$deviceTypes = $this->Api->DeviceType->find('list');
		$this->set(compact('users', 'deviceTypes'));
	}

	/**
	 * delete method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function delete($id = null) {
		$this->Api->id = $id;
		if (!$this->Api->exists()) {
			throw new NotFoundException(__('Invalid api'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Api->delete()) {
			$this->Session->setFlash(__('The api has been deleted.'));
		} else {
			$this->Session->setFlash(__('The api could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	/**
	 * admin_index method
	 *
	 * @return void
	 */
	public function admin_index() {
		$this->Api->recursive = 0;
		$this->set('apis', $this->Paginator->paginate());
	}

	/**
	 * admin_view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_view($id = null) {
		if (!$this->Api->exists($id)) {
			throw new NotFoundException(__('Invalid api'));
		}
		$options = array('conditions' => array('Api.' . $this->Api->primaryKey => $id));
		$this->set('api', $this->Api->find('first', $options));
	}

	/**
	 * admin_add method
	 *
	 * @return void
	 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Api->create();
			if ($this->Api->save($this->request->data)) {
				$this->Session->setFlash(__('The api has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The api could not be saved. Please, try again.'));
			}
		}
		$users = $this->Api->User->find('list'); 
		$deviceTypes = $this->Api->DeviceType->find('list');
		$this->set(compact('users', 'deviceTypes'));
	}

	/**
	 * admin_edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_edit($id = null) {
		if (!$this->Api->exists($id)) {
			throw new NotFoundException(__('Invalid api'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Api->save($this->request->data)) {
				$this->Session->setFlash(__('The api has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The api could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Api.' . $this->Api->primaryKey => $id));
			$this->request->data = $this->Api->find('first', $options);
		}
		$users = $this->Api->User->find('list'); 
		$deviceTypes = $this->Api->DeviceType->find('list');
		$this->set(compact('users', 'deviceTypes'));
	}

	/**
	 * admin_delete method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_delete($id = null) {
		$this->Api->id = $id;
		if (!$this->Api->exists()) {
			throw new NotFoundException(__('Invalid api'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Api->delete()) {
			$this->Session->setFlash(__('The api has been deleted.'));
		} else {
			$this->Session->setFlash(__('The api could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
