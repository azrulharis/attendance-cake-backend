<?php
App::uses('AppController', 'Controller');
/**
 * OtRequests Controller
 *
 * @property OtRequest $OtRequest
 * @property PaginatorComponent $Paginator
 */
class OtRequestsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'RequestHandler');

	public function beforeFilter() { 
		parent::beforeFilter();
		$this->Auth->allow('api_index', 'api_view', 'api_add', 'api_edit');
	} 

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->OtRequest->recursive = 0;
		$this->set('otRequests', $this->Paginator->paginate());
	}

	public function api_index($status = null) {
		if($status != null) {
			$conditions['OtRequest.status'] = $status;
		} 
		$this->OtRequest->settings = array(
			'conditions' => $conditions,
			'recursive' => 0,
			'limit' => 30,
			'contain' => array(
				'User' => array(
					'fields' => array(
						'User.id',
						'User.username',
						'User.name',
						'User.mobile_number'
						)
					)
				),
				'ProjectManager' => array(
					'fields' => array(
						'User.id',
						'User.username',
						'User.name',
						'User.mobile_number'
						)
					)
				),
				'Project',
				'ProjectGroup'
			);
		$json = $this->Paginator->paginate();
		$this->set(array(
            'json' => $json,
            '_serialize' => array('json')
        ));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->OtRequest->exists($id)) {
			throw new NotFoundException(__('Invalid ot request'));
		}
		$options = array('conditions' => array('OtRequest.' . $this->OtRequest->primaryKey => $id));
		$this->set('otRequest', $this->OtRequest->find('first', $options));
	}

	public function api_view($id = null) {
		if (!$this->OtRequest->exists($id)) {
			$message = 'Invalid OT Request';
		}
		$options = array('conditions' => array('OtRequest.' . $this->OtRequest->primaryKey => $id));
		$json = $this->OtRequest->find('first', $options);
 
		$this->set(array(
            'json' => $json,
            'message' => $message,
            '_serialize' => array('json', 'message')
        ));
	}

/**
 * add method
 *
 * @return void
 */
	public function api_add($project_group_id = null) {
		$this->loadModel('ProjectGroup');
		$status = false; 
		$message = '';
		$projectGroup = $this->ProjectGroup->find('first', array(
			'conditions' => array(
				'ProjectGroup.id' => $project_group_id
				)
			)); 

		if ($this->request->is('post')) { 
			// Check group id
			if (!$this->ProjectGroup->exists($project_group_id)) {
				$message = 'Invalid project group';
			} else {
				// Find project group 
				$this->OtRequest->create();
				$this->request->data['OtRequest'] = $this->request->data;
				$this->request->data['OtRequest']['project_group_id'] = $project_group_id;
				$this->request->data['OtRequest']['project_id'] = $projectGroup['ProjectGroup']['project_id']; 
				$this->request->data['OtRequest']['project_manager'] = $projectGroup['Project']['user_id']; 
				$this->request->data['OtRequest']['company_id'] = 0; 
				$this->request->data['OtRequest']['created'] = $this->date; 

				$worker = $this->request->data['worker_id'];

				if ($this->OtRequest->save($this->request->data)) { 
					// Save worker
					$last_id = $this->OtRequest->getLastInsertId();
					if($this->request->data['type'] == 'Worker') {
						$this->loadModel('OtRequestWorker');
						// Insert worker
						for($i = 0; $i < count($worker); $i++) {
							$this->OtRequestWorker->create();
							$ot = array(
								'ot_request_id' => $last_id,
								'user_id' => $worker[$i], 
								'status' => 'Waiting Approval' 
								);
							if(!$this->OtRequestWorker->save($ot)) {
								$message = 'Could not save Worker List';
							}
						} 
						$status = true;
						$message = 'OT Request has been sent';
					} else {
						// Insert machine
					}

				} else {
					$message = 'Could not save';
				}	
			}  
		} 

		$this->set(array( 
            'status' => $status,
            'message' => $message,
            '_serialize' => array('status', 'message')
        ));
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->OtRequest->create();
			if ($this->OtRequest->save($this->request->data)) {
				$this->Session->setFlash(__('The ot request has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ot request could not be saved. Please, try again.'));
			}
		}
		$users = $this->OtRequest->User->find('list');
		$projects = $this->OtRequest->Project->find('list');
		$companies = $this->OtRequest->Company->find('list');
		$projectGroups = $this->OtRequest->ProjectGroup->find('list');
		$attendances = $this->OtRequest->Attendance->find('list');
		$this->set(compact('users', 'projects', 'companies', 'projectGroups', 'attendances'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function api_edit($id = null) {
		if (!$this->OtRequest->exists($id)) {
			throw new NotFoundException(__('Invalid ot request'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->OtRequest->save($this->request->data)) {
				$this->Session->setFlash(__('The ot request has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ot request could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('OtRequest.' . $this->OtRequest->primaryKey => $id));
			$this->request->data = $this->OtRequest->find('first', $options);
		}
		$users = $this->OtRequest->User->find('list');
		$projects = $this->OtRequest->Project->find('list');
		$companies = $this->OtRequest->Company->find('list');
		$projectGroups = $this->OtRequest->ProjectGroup->find('list');
		$attendances = $this->OtRequest->Attendance->find('list');
		$this->set(compact('users', 'projects', 'companies', 'projectGroups', 'attendances'));
	}

	public function edit($id = null) {
		if (!$this->OtRequest->exists($id)) {
			throw new NotFoundException(__('Invalid ot request'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->OtRequest->save($this->request->data)) {
				$this->Session->setFlash(__('The ot request has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ot request could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('OtRequest.' . $this->OtRequest->primaryKey => $id));
			$this->request->data = $this->OtRequest->find('first', $options);
		}
		$users = $this->OtRequest->User->find('list');
		$projects = $this->OtRequest->Project->find('list');
		$companies = $this->OtRequest->Company->find('list');
		$projectGroups = $this->OtRequest->ProjectGroup->find('list');
		$attendances = $this->OtRequest->Attendance->find('list');
		$this->set(compact('users', 'projects', 'companies', 'projectGroups', 'attendances'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->OtRequest->id = $id;
		if (!$this->OtRequest->exists()) {
			throw new NotFoundException(__('Invalid ot request'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->OtRequest->delete()) {
			$this->Session->setFlash(__('The ot request has been deleted.'));
		} else {
			$this->Session->setFlash(__('The ot request could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
