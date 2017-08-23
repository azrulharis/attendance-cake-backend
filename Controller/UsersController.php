<?php
App::uses('AppController', 'Controller');
 
 
class UsersController extends AppController { 

	public $components = array('Paginator','Qimage');

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('admin_forget_password','admin_login','subscriber','activate_code', 'add', 'login');
	}

	public function ajaxfinduser() {
		$this->autoRender = false;
		$this->layout = 'ajax'; 
		if(isset($this->request->query['term'])) {
			$term = $this->request->query['term'];
			
			$conditions = array(); 
			$conditions['OR']['User.name LIKE'] = '%'.$term.'%';
			$conditions['OR']['User.username LIKE'] = '%'.$term.'%';  

			$users = $this->User->find('all', array(
				'conditions' => $conditions,
				'recursive' => -1
				));
			
			$json = array();
			if($users) {
				foreach ($users as $item) {
					$json[] = array(
						'id' => $item['User']['id'], 
						'name' => $item['User']['name'],
						'username' => $item['User']['username'] 
						); 
				}	
			} else {
				$json[] = array(
						'id' => 0, 
						'name' => 'Not found',
						'username' => 'Not found' 
						);
			}
			
			echo json_encode($json);	
		}
	}

	public function admin_deleteduser($group_id = NULL) {
		$user_id	= $this->Session->read('Auth.User.id');
		$conditions = array();
		$this->loadModel('DeletedUser');
		if(!empty($group_id)) {
			$url	='users/deleteduser/'.$group_id;	
		} else {
			$url	='users';	
		} 
        if(!empty($this->data)) {         
            $this->Session->write('Filter.DeletedUser',$this->data);
        } elseif((!empty($this->passedArgs['page'])  || strpos($this->referer(), $url)) && $this->Session->check('Filter.DeletedUser')) {
            $this->request->data = $this->Session->check('Filter.DeletedUser')? $this->Session->read('Filter.DeletedUser') : '';
        } else {
            $this->Session->delete('Filter.DeletedUser');
        }
        /* End Filter With Paging */
		if(!empty($this->data)) {
			if(!empty($this->data['DeletedUser']['username'])) {
				$conditions['DeletedUser.username LIKE'] = '%'.$this->data['DeletedUser']['username'].'%';
			}
			
			if(isset($this->data['DeletedUser']['from']) && !empty($this->data['DeletedUser']['from'])) {
				$conditions['DeletedUser.created >='] = $this->data['DeletedUser']['from'];
			}
			if(isset($this->data['DeletedUser']['to']) && !empty($this->data['DeletedUser']['to'])) {
				$conditions['DeletedUser.created <='] = $this->data['DeletedUser']['to'].' 23:59:59';
			} 
		}	
		 
		
		$record_per_page = Configure::read('Reading.nodes_per_page');
		$this->Paginator->settings = array('conditions' => $conditions,  
			
			'order'=>'DeletedUser.created DESC',
			'limit'=>$record_per_page
			);
		$this->set('users', $this->Paginator->paginate('DeletedUser')); 
		
	} 

	public function dashboard() { 
		$user_id	= $this->Session->read('Auth.User.id');
		$this->set('title_for_layout', __('Dashboard'));

		$role = $this->Session->read('Auth.User.group_id'); 

		if($role == 1) {
			//return $this->redirect('/admin');
		}
 

		$user = $this->User->find('first', array('conditions' => array('User.id' => $user_id)));
  
 		// No of users
 		$users = $this->User->find('all', array('fields' => array('id'), 'reqursive' => -1)); 
 		$this->set('users', $users);

 		

 
		$this->set('user', $user);   
	}  

	private function get_draft_quotation(){
		$this->loadModel('SaleQuotation');
		$this->loadModel('SaleTender');
		$draft_array = array();
		$drafts = $this->SaleQuotation->find('all', array(
			'joins' => array(
		        array(
		            'table' => 'sale_tenders',
		            'alias' => 'SaleTender',
		            'type' => 'INNER',
		            'conditions' => array(
		                'SaleTender.id = SaleQuotation.sale_tender_id'
		            )
		        )
		    ),
			'conditions' => array(
				'YEAR(SaleTender.closing_date) =' => date('Y'),
				'SaleQuotation.status'=> 1,
				),
			'order' => 'SaleTender.closing_date DESC',
			'recursive' => -1,
			'limit' => 5
			));

		foreach ($drafts as $draft) {
			$draft_array[] = array(
				'name' => $draft['SaleQuotation']['name'],
			);
		}
		return $draft_array;
	}

	private function get_award_quotation(){
		$this->loadModel('SaleQuotation');
		$this->loadModel('SaleTender');
		$award_array = array();
		$awards = $this->SaleQuotation->find('all', array(
			'joins' => array(
		        array(
		            'table' => 'sale_tenders',
		            'alias' => 'SaleTender',
		            'type' => 'INNER',
		            'conditions' => array(
		                'SaleTender.id = SaleQuotation.sale_tender_id'
		            )
		        )
		    ),
			'conditions' => array(
				'YEAR(SaleTender.closing_date) =' => date('Y'),
				'SaleQuotation.status'=> 10,
				),
			'order' => 'SaleTender.closing_date DESC',
			'recursive' => -1,
			'limit' => 5
			));

		foreach ($awards as $award) {
			$award_array[] = array(
				'name' => $award['SaleQuotation']['name'],
			);
		}
		return $award_array;
	}

	private function get_fail_quotation(){
		$this->loadModel('SaleQuotation');
		$this->loadModel('SaleTender');
		$fail_array = array();
		$fails = $this->SaleQuotation->find('all', array(
			'joins' => array(
		        array(
		            'table' => 'sale_tenders',
		            'alias' => 'SaleTender',
		            'type' => 'INNER',
		            'conditions' => array(
		                'SaleTender.id = SaleQuotation.sale_tender_id'
		            )
		        )
		    ),
			'conditions' => array(
				'YEAR(SaleTender.closing_date) =' => date('Y'),
				'SaleQuotation.status'=> 11,
				),
			'order' => 'SaleTender.closing_date DESC',
			'recursive' => -1,
			'limit' => 5
			));

		foreach ($fails as $fail) {
			$fail_array[] = array(
				'name' => $fail['SaleQuotation']['name'],
			);
		}
		return $fail_array;
	}

	private function get_quotation_submit($month, $year, $status) {
		$this->loadModel('SaleQuotation');		
		if($status == 9){
			$submit = $this->SaleQuotation->find('all', array(
			'joins' => array(
	        	array(
	            	'table' => 'sale_tenders',
	            	'alias' => 'SaleTender',
	            	'type' => 'INNER',
	            	'conditions' => array(
	                'SaleTender.id = SaleQuotation.sale_tender_id'
	            )
	        )),
			'conditions' => array(
				'MONTH(SaleTender.closing_date) =' => $month,
				'YEAR(SaleTender.closing_date) =' => $year,
				'SaleQuotation.status >='=> $status,
			),
			'recursive' => -1
			));
		}
		return count($submit);
	}

	private function news() {
		$this->loadModel('News');
		$News = $this->News->find('all', array(
			'conditions' => array('News.status' => 1),
			'order' => array('News.id' => 'DESC'),
			'recursive'=> -1,
			'limit' => 5
			));
		return $News;
	}

	private function get_running_production() {
		$this->loadModel('ProductionOrder');
		$prod_run = $this->ProductionOrder->find('all', array(
			'conditions' => array('ProductionOrder.progress <' => 100),
			'order' => array('ProductionOrder.start' => 'DESC'),
			'recursive'=> -1,
			'limit' => 5
			));
		return $prod_run;
	}

	private function get_complete_production() {
		$this->loadModel('ProductionOrder');
		$prod_com = $this->ProductionOrder->find('all', array(
			'conditions' => array('ProductionOrder.progress' => 100),
			'order' => array('ProductionOrder.start' => 'DESC'),
			'recursive'=> -1,
			'limit' => 5
			));
		return $prod_com;
	}

	private function total_finished_goods() {
		$this->loadModel('FinishedGood');
		$FinishedGood = $this->FinishedGood->find('all', array(
			'fields' => array('id'),
			'reqursive'=> -1
			));
		return $FinishedGood;
	}

	 

	private function total_quotations($status = null) {
		$this->loadModel('SaleQuotation');
		$cond = array();
		if($status == null) {
			$cond['SaleQuotation.status >'] = 0;
		} else {
			$cond['SaleQuotation.status'] = $status;
		}
		
		$quotations = $this->SaleQuotation->find('all', array(
			'fields' => array('id'),
			'conditions' => $cond,
			'reqursive'=> -1
			));
		return $quotations;
	}

	private function total_tenders() {
		$this->loadModel('SaleTender');
		$tenders = $this->SaleTender->find('all', array(
			'fields' => array('id'),
			'reqursive'=> -1
			));
		return $tenders;
	}

	private function total_jobs() {
		$this->loadModel('SaleJob');
		$jobs = $this->SaleJob->find('all', array(
			'fields' => array('id'),
			'conditions' => array(
				'SaleJob.status' => 4
				),
			'reqursive'=> -1
			));
		return $jobs;
	}

	private function total_productions($status = null) {
		$this->loadModel('ProductionOrder');
		$cond = array();
		if($status == null) {
			$cond['ProductionOrder.status >'] = 0;
		} else {
			$cond['ProductionOrder.status'] = $status;
		}

		$prod = $this->ProductionOrder->find('all', array(
			'conditions' => $cond,
			'fields' => array('id'),
			'reqursive'=> -1
			));
		return $prod;
	}

	private function total_customers() {
		$this->loadModel('Customers');
		$customers = $this->Customers->find('all', array(
			'fields' => array('id'),
			'reqursive'=> -1
			));
		return $customers;
	}

	private function __get_content($type) {
		$this->loadModel('Content.Content');
		$content = $this->Content->find('all', array('conditions' => array(
			'Content.type' => $type
			), 'limit' => 5, 'order' => array('Content.id' => 'DESC')));
		return $content;
	}

	 
	
	public function admin_dashboard() {   

		$this->loadModel('InventoryItem'); 

		$items = $this->InventoryItem->find('all');
		/*
		foreach ($items as $item) {
			$this->InventoryItem->updateAll( 
				array( 
					'InventoryItem.quantity_available' => $item['InventoryItem']['quantity'],
					'InventoryItem.quantity_shortage' => 0,
					'InventoryItem.quantity_reserved' => 0
					), 
				array('InventoryItem.id' => $item['InventoryItem']['id']) 
			);
		} 
		*/

		$this->set('title_for_layout', __('Dashboard'));
		
	}

	private function __get_transaction($type) {
		$this->loadModel('Transaction');
		$cond = array();
		$cond['conditions']['payment_type'] = $type;
		$cond['fields'] = array('SUM(Transaction.amount) AS sum_amount');
		$payment = $this->Transaction->find('all', $cond);
		return $payment[0][0]['sum_amount'];
	}

	private function __count_users() {
		$user = $this->User->find('count');
		return $user;
	}

	private function __get_user($group) { 
		$cond = array();
		$cond['conditions']['group_id'] = $group;
		$user = $this->User->find('all', $cond);
		return $user;
	} 
	 
	public function add() {
		$this->layout = 'login';
		if ($this->request->is('post')) { 
			$this->User->create(); 
			$password = $this->request->data['User']['password'];
			$this->request->data['User']['activation_code'] = rand(rand(100000000,99999999), 999999999);
			$this->request->data['User']['dob'] = $this->request->data['User']['dob'];
			$this->request->data['User']['status'] = 1; 
			$this->request->data['User']['image'] = 'Default.jpg';  
				if ($this->User->save($this->request->data)) {
					$user_id = $this->User->getLastInsertId(); 
 

					unset($this->request->data['User']['dob']);
					$this->request->data['User']['password']	=	$password;
					$placeHolderArray = $this->EmailTemplate->getPlaceholders($user_id,'User',$this->data);
				
					$email = $this->request->data['User']['email'];
					$activation_link = BASE_URL."users/login";
					$emailTemplate = $this->EmailTemplate->find('first',array(
						'conditions' => array(
							'EmailTemplate.slug' => 'user-registration',
							'EmailTemplate.status' => 1
							),
						'fields' => array(
							'EmailTemplate.content',
							'EmailTemplate.subject'
							),
						)
					);
			
					if(!empty($emailTemplate)) {
						$template_content = __($emailTemplate['EmailTemplate']['content'],array('config'=>array('entities'=>false,'basicEntities'=>false,'entities_greek'=>false,'entities_latin'=>false,'htmlDecodeOutput'=>false)));
						$template_content = str_replace(array_keys($placeHolderArray),array_values($placeHolderArray),$template_content);
						
						
						$Email = new CakeEmail('smtp');
						$Email->from(Configure::read('Site.email'));
						$Email->to($this->request->data['User']['email']);
						$Email->emailFormat('html');
						$Email->template('email')->viewVars( array('MAINCONTENT' => $template_content));
						$Email->subject($emailTemplate['EmailTemplate']['subject']);
						 

						if($Email->send()) { 
					        
							if ($this->Auth->login()) {
								$this->Session->setFlash(__('Congratulation You are login succcessfully. Please wait for approval by Administrator.'), 'success');
								return $this->redirect($this->Auth->redirect());
							} 
						} else {
							$this->User->id = $user_id;
							$this->User->delete();
							$this->Session->setFlash(__('Mail not sent. Please, try again.'),'error');
						} 
					} else {
						$this->User->id = $user_id;
						$this->User->delete();
						$this->Session->setFlash(__('Mail not sent. Please, try again.'),'error');
					} 
									
				} else {
					$this->Session->setFlash(__('The user could not be saved. Please, try again.'),'error');
				}
			  
		}
		
		$this->set('users', $this->Paginator->paginate());
		$groups = $this->User->Group->find('list',array('conditions'=>array('Group.id !='=>ADMIN_GROUP_ID)));
		 
		$this->set(compact('groups')); 
		$gender = array('m' => 'Male', 'f' => 'Female');
		$this->set(compact('gender'));
	} 
 
	public function login() {
		$show_action = 'login';
		$this->layout = 'login';
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {  
				$this->Session->setFlash(__('Congratulation You are login succcessfully.'), 'success');
				return $this->redirect($this->Auth->redirect()); 
			}
			$this->Session->setFlash(__('<h4>Your username or password was incorrect.</h4>'), 'errorText');
		}
		$this->set(compact('show_action')); 
		 
	} 
	 
	public function admin_login() { 
		$show_action = 'login';
		$this->layout = 'login';
		if ($this->request->is('post')) {
			if ($this->Auth->login()) { 
				$this->Session->setFlash(__('Congratulation You are login succcessfully.'), 'success');
				return $this->redirect($this->Auth->redirect());
			}
			$this->Session->setFlash(__('<h4>Your username or password was incorrect.</h4>'), 'errorText');
		}
		$this->set(compact('show_action'));
	} 

	public function admin_logout() { 
		$this->Session->setFlash(__('<h4>Good bye</h4>'),'successText');
		$this->redirect($this->Auth->logout()); 
	}

	public function logout() { 
		$this->Session->setFlash(__('<h4>Good bye</h4>'),'successText');
		$this->redirect($this->Auth->logout());

	} 

	public function admin_index($group_id = NULL) {
		$user_id	= $this->Session->read('Auth.User.id');
		$conditions = array();
		
		if(!empty($group_id)) {
			$url	='users/index/'.$group_id;	
		} else {
			$url	='users';	
		} 
        if(isset($_GET['search'])) {
        	if($_GET['username'] != '') {
        		$conditions['User.username LIKE'] = '%'.trim($_GET['username']).'%';
        	}
        	if($_GET['name'] != '') {
        		$conditions['User.name LIKE'] = '%'.trim($_GET['name']).'%';
        	}
        	if($_GET['email'] != '') {
        		$conditions['User.email LIKE'] = '%'.trim($_GET['email']).'%';
        	}
        	if($_GET['group_id'] != '') {
        		$conditions['User.group_id'] = trim($_GET['group_id']);
        	}

        	$this->request->data['User'] = $_GET;
        }
		
		if(!empty($group_id)) {		
			$conditions['User.group_id'] = $group_id;
		}

		$conditions['User.group_id !='] = 12;
		
		$record_per_page = Configure::read('Reading.nodes_per_page');
		$this->Paginator->settings = array('conditions' => $conditions, 
			   'contain' => array(
			   		'Group' 
					),
				'fields' => array(
					'User.id',
					'User.username',
					'User.name',
					'User.created',
					'User.email',
					'User.mobile_number',
					'Group.id',
					'Group.name' 
				),
			'order' => 'User.id DESC',
			'limit' => $record_per_page
			);
		$this->set('users', $this->Paginator->paginate());

		$group = $this->User->Group->find('list', array('order' => 'Group.name ASC'));

		$this->set(compact('group_id', 'group')); 
	}
 

	private function __imageSave() {
		if(!empty($this->data['User']['image']['name'])) {
			$data['file'] = $this->data['User']['image'];
			$data['path'] = USER_ORIGINAL_IMAGE_PATH;
			
			$result = $this->Qimage->copy($data);	
			$this->request->data['User']['image'] = $result;
			$this->Qimage->resize_crop(USER_ORIGINAL_IMAGE_PATH.$result,USER_ICON_IMAGE_PATH.$result, 29,29);
			$this->Qimage->resize_crop(USER_ORIGINAL_IMAGE_PATH.$result,USER_SMALL_IMAGE_PATH.$result, 100,100);
			return $result;
		} else {
			return 'Default.jpg';
		}	
	}

	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}

		if ($this->request->is('post')) { 
			// Update tree status
			 
				 
		}
 
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));

		$status = array(0 => 'Inactive', 1 => 'Active');
		$this->set(compact('status'));
 
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}

		if ($this->request->is('post')) { 
			// Update tree status
			 
				 
		}
 
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));

		$status = array(0 => 'Inactive', 1 => 'Active');
		$this->set(compact('status'));
 
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() { 
		if ($this->request->is('post')) { 
			$this->User->create(); 
			$password = $this->request->data['User']['password'];
			$this->request->data['User']['activation_code'] = rand(rand(100000000,99999999), 999999999);
			$this->request->data['User']['dob'] = $this->request->data['User']['dob'];
			$this->request->data['User']['status'] = 1; 
 
			$this->request->data['User']['image'] = 'Default.jpg'; 
			//if($this->__check_duplicate_account($this->request->data['User']) === true) {
 
				if ($this->User->save($this->request->data)) {
					$user_id = $this->User->getLastInsertId(); 
					
					$name = 'Add New User : ' . $this->request->data['User']['username'];
					$link = 'users/view/'.$user_id;
					$type = 'Add User';
					$this->insert_log($this->user_id, $name, $link, $type);

					unset($this->request->data['User']['dob']);
					$this->request->data['User']['password']	=	$password;
					$placeHolderArray = $this->EmailTemplate->getPlaceholders($user_id,'User',$this->data);
				
					$email = $this->request->data['User']['email'];
					$activation_link = BASE_URL."users/login";
					$emailTemplate = $this->EmailTemplate->find('first',array(
						'conditions' => array(
							'EmailTemplate.slug' => 'user-registration',
							'EmailTemplate.status' => 1
							),
						'fields' => array(
							'EmailTemplate.content',
							'EmailTemplate.subject'
							),
						)
					);
			
					if(!empty($emailTemplate)) {
						$template_content = __($emailTemplate['EmailTemplate']['content'],array('config'=>array('entities'=>false,'basicEntities'=>false,'entities_greek'=>false,'entities_latin'=>false,'htmlDecodeOutput'=>false)));
						$template_content = str_replace(array_keys($placeHolderArray),array_values($placeHolderArray),$template_content);
						
						
						$Email = new CakeEmail('smtp');
						$Email->from(Configure::read('Site.email'));
						$Email->to($this->request->data['User']['email']);
						$Email->emailFormat('html');
						$Email->template('email')->viewVars( array('MAINCONTENT' => $template_content));
						$Email->subject($emailTemplate['EmailTemplate']['subject']);
						 

						if($Email->send()) { 
					        $this->Session->setFlash(__('Success!. New account has been created.'), 'success');
							return $this->redirect(array('action' => 'index'));
						} else {
							$this->User->id = $user_id;
							$this->User->delete();
							$this->Session->setFlash(__('Mail not sent. Please, try again.'),'error');
						} 
					} else {
						$this->User->id = $user_id;
						$this->User->delete();
						$this->Session->setFlash(__('Mail not sent. Please, try again.'),'error');
					} 
									
				} else {
					$this->Session->setFlash(__('The user could not be saved. Please, try again.'),'error');
				}
 
 
			//} else {
			//	$this->Session->setFlash(__('User information already exist. You can only have maximum 2 account.'),'error');
			//}	  
		}
		
		$this->set('users', $this->Paginator->paginate());
		$groups = $this->User->Group->find('list',array('conditions'=>array('Group.id !='=>ADMIN_GROUP_ID)));
		 
		$gender = array('m' => 'Male', 'f' => 'Female');
		$this->set(compact('gender', 'groups'));
		
	}

	public function edit() { 
		$user_id = $this->Session->read('Auth.User.id');
		if (!$this->User->exists($user_id)) {
			throw new NotFoundException(__('Invalid user'));
		} 

		$gender = array('m' => 'Male', 'f' => 'Female');
			
		if ($this->request->is(array('post', 'put'))) { 
			 
				 
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('Success!. New account has been created.'), 'success');
			    return $this->redirect(array('action' => 'edit')); 
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'),'error');
				
				$result = $this->User->find('first',array(
						'conditions' => array(
							'User.id' => $user_id
							),
						'fields' => array(
							'User.username',
							'Group.name'
							),
						'contain' => array('Group')
						)
					); 
				$this->request->data['User']['username'] = $result['User']['username']; 
			}	 
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $user_id));
			$this->request->data = $this->User->find('first', $options); 
		}
		$groups = $this->User->Group->find('list',array('conditions'=>array('Group.id !='=>ADMIN_GROUP_ID)));
	 
		$this->set(compact('groups', 'gender')); 
	}

	public function admin_editpassword($id = null) { 
		if($id == null) {
			$user_id = $this->Session->read('Auth.User.id');
		} else {
			$user_id = $id;
		}
		
		if (!$this->User->exists($user_id)) {
			throw new NotFoundException(__('Invalid user'));
		} 

		$gender = array('m' => 'Male', 'f' => 'Female');

		$options = array('conditions' => array('User.' . $this->User->primaryKey => $user_id));

		$user = $this->User->find('first', $options);
			
		if ($this->request->is(array('post', 'put'))) { 
			
			if ($this->request->data['User']['id'] != $user_id) {
				$this->Session->setFlash(__('Invalid request.'),'error');
				return $this->redirect(array('action' => 'dashboard')); 
			} 
			if ($this->User->save($this->request->data)) {
				
				$this->Session->setFlash(__('Success!. New password has been saved.'), 'success');
			    return $this->redirect(array('action' => 'index')); 
			} else { 
				debug($this->User->invalidFields());
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'),'error'); 
			}	 
		} else { 
			$this->request->data = $user; 
		}
		$groups = $this->User->Group->find('list',array('conditions'=>array('Group.id !='=>ADMIN_GROUP_ID)));
	 
		$this->set(compact('groups', 'gender')); 
	} 

	public function editpassword() { 
		$user_id = $this->Session->read('Auth.User.id');
		if (!$this->User->exists($user_id)) {
			throw new NotFoundException(__('Invalid user'));
		} 

		$gender = array('m' => 'Male', 'f' => 'Female');
			
		if ($this->request->is(array('post', 'put'))) { 
			
			if ($this->request->data['User']['id'] != $user_id) {
				$this->Session->setFlash(__('Invalid request.'),'error');
				return $this->redirect(array('action' => 'dashboard')); 
			}	 
			if ($this->User->save($this->request->data)) {
				
				$this->Session->setFlash(__('Success!. New password has been saved.'), 'success');
			    return $this->redirect(array('action' => 'editpassword')); 
			} else { 
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'),'error');
				
				$result = $this->User->find('first',array(
						'conditions' => array(
							'User.id' => $user_id
							),
						'fields' => array(
							'User.username',
							'Group.name'
							),
						'contain' => array('Group')
						)
					); 
				$this->request->data['User']['username'] = $result['User']['username']; 
			}	 
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $user_id));
			$this->request->data = $this->User->find('first', $options); 
		}
		$groups = $this->User->Group->find('list',array('conditions'=>array('Group.id !='=>ADMIN_GROUP_ID)));
	 
		$this->set(compact('groups', 'gender')); 
	} 
 
	public function admin_edit($id = null) { 
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
			
		if ($this->request->is(array('post', 'put'))) {  

			if ($this->User->save($this->request->data)) {  
				$this->Session->setFlash(__('The user has been saved.'),'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'),'error');
				
				$result = $this->User->find('first',array(
						'conditions' => array(
							'User.id' => $id
							),
						'fields' => array(
							'User.username',
							'Group.name'
							),
						'contain' => array('Group')
						)
					);
				
				$this->request->data['User']['username'] = $result['User']['username'];
				$this->request->data['Group']['name'] 	= $result['Group']['name'];  
			}
		} 
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->request->data = $this->User->find('first', $options); 

		$gender = array('m' => 'Male', 'f' => 'Female');
		$status = array('0' => 'Inactive', '1' => 'Active');

		$groups = $this->User->Group->find('list',array('conditions'=>array('Group.id !=' => ADMIN_GROUP_ID)));
	 
		$this->set(compact('gender', 'status', 'groups')); 
	}
	
 
	public function admin_profile() {
		
		$id = $this->Session->read('Auth.User.id');
		if ($this->request->is(array('post', 'put'))) { 
			
			$this->User->id = $id; 
			if(!empty($this->request->data['User']['dob'])) {
				$this->request->data['User']['dob'] = date('Y-m-d H:i:s',strtotime($this->request->data['User']['dob']));
			}
			
			if ($this->User->save($this->request->data)) {
				//$this->Session->write('Auth.User',$this->request->data);
				$this->Session->setFlash(__('The user has been saved.'),'success');
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'),'error');
			}
		}  
		
		$users = $this->User->find('first',array(
				'conditions' => array(
					'User.id' => $id,
					'User.status' => 1,
					),
				'contain' => array(
					'Group' => array(
						'fields' => array('Group.id','Group.name')
						) 
					) 
				)
			); 
		
		$this->request->data = $users;
		$this->request->data['User']['dob'] = date('m-d-Y H:i A',strtotime($users['User']['dob']));
		
		$this->request->data['User']['old_password'] = '';
		$this->request->data['User']['password'] = '';
		$this->set('users', $users);
		$this->set('title_for_layout', __('Profile')); 
	}
	
/**
* Reset password method
*
* @throws NotFoundException
* @param string $id
* @return void
*/

	public function admin_reset_password() {
		if ($this->request->is(array('post', 'put'))) {
				$this->User->id = $this->Session->read('Auth.User.id');
				if ($this->User->save($this->request->data)) {
					$this->Session->setFlash(__('The password has been updated.'),'success');
					return $this->redirect(array('action' => 'profile'));
				} else {
					$this->Session->setFlash(__('The password could not be updated. Please, try again.'),'error');
					return $this->redirect(array('action' => 'profile'));
					
				}
		}
	
	}	
 

	public function admin_forget_password() {
		
		$this->layout = 'admin_login';
		if ($this->request->is('post')) {
			$result['Message']	=	'';
			$result['Success']	=	0;
			$email = $this->request->data['User']['email'];
			if(!empty($email)) { 
				$checkEmail = $this->User->find('first', array(
						'conditions' => array('User.email' => $email),
						'fields' => array('User.id'),
						'contain' => array()
						)
					); 
			
				if(!empty($checkEmail)) { 
					$password = rand(rand(100000000,99999999), 999999999);
					$this->request->data['User']['id'] = $checkEmail['User']['id'];
					$this->request->data['User']['password'] = $password;
					unset($this->request->data['User']['email']);
					$placeHolderArray = $this->EmailTemplate->getPlaceholders(NULL,'User',$this->data);
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
							$template_content= __($emailTemplate['EmailTemplate']['content'],array('config'=>array('entities'=>false,'basicEntities'=>false,'entities_greek'=>false,'entities_latin'=>false,'htmlDecodeOutput'=>false)));
							$template_content = str_replace(array_keys($placeHolderArray),array_values($placeHolderArray),$template_content);	 	
							
							$Email = new CakeEmail('smtp');
							$Email->from(Configure::read('Site.email'));
							$Email->to($email);
							$Email->emailFormat('html');
							$Email->template('email')->viewVars( array('MAINCONTENT' => $template_content));
							$Email->subject($emailTemplate['EmailTemplate']['subject']);
							
							if($Email->send()) {
								$result['Success']	=	1;
								$result['Message']	= 'The Password has been updated. Please check your email for updated password';
								echo json_encode($result);
							} else {
								$result['Message']	= 'Mail not sent.Please try again.';
								echo json_encode($result);
							}
						}
					} else {
						$result['Message']	= 'Your password could not be update.';
						echo json_encode($result);	
					}
				} else {
					$result['Message']	= 'This email is not exists. Please, try again.';
					echo json_encode($result);
				}
			} else {
				$result['Message']	= 'Please fill email.try again.';
				echo json_encode($result);
			}	
		}
		exit;		
    }	 
 
	public function admin_delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		//$this->request->allowMethod('post', 'delete');
		
		$this->__delete_user($id);
		$this->Session->setFlash(__('Account has been deleted.'),'success');
		return $this->redirect(array('action' => 'index'));
	} 

	private function __delete_user($id) {
		  
		$this->User->delete($id); 
	}
 
	public function subscriber() {
		$this->layout = false;
		
		if($this->request->is('post'))
		{
			$subscriber['Subscribe']['email'] = $this->data['User']['email'];
			$this->loadModel('Newsletter.Subscribe');
			if(!$this->Subscribe->hasAny(array('email' => $this->data['User']['email'])))
			{
				$this->Subscribe->create();
				if($this->Subscribe->save($subscriber)){
					echo 1; //'You have successfully subscribed. '),'success');
				}	
				else
				{
					echo 3; //$this->Session->setFlash(__('There is some problem. Please try again.'),'error');
				}
			}
			else
			{
			echo 2;	
			}	
		}
		exit;
	}
	
 
	public function activate_code($activation_code) {
		$users = $this->User->find('first',array('conditions'=>array('User.activation_code'=>$activation_code,'User.status'=>0),
												'contain'=>array(),
												'fields'=>array('User.id')
											)
								);
		if(!empty($users['User']['id'])) {	
			$this->User->id = $users['User']['id'];
			$this->request->data['User']['status'] = 1;
			if($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('Your account has been activated successfully. Please login'),'success');
				return $this->redirect(array('action'=>'login','admin'=>true));
			} else {
				$this->Session->setFlash(__('There is some problem to activate account. Please try again.'),'error');
				return $this->redirect(array('action'=>'login','admin'=>true));
			}
		} else {
			$this->Session->setFlash(__('There is some problem to activate account. Please try again.'),'error');
			return $this->redirect(array('action'=>'login','admin'=>true));
		}
		
	}

	 

	
} 