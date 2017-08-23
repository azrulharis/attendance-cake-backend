<?php
App::uses('AppController', 'Controller');
/**
 * ProjectGroups Controller
 *
 * @property ProjectGroup $ProjectGroup
 * @property PaginatorComponent $Paginator
 */
class ProjectGroupsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'RequestHandler'); 

	public function beforeFilter() { 
		parent::beforeFilter();
		$this->Auth->allow('api_index', 'api_view', 'api_attendance');
	}
/**
 * index method
 *
 * @return void
 */
	public function index() { 
		$this->ProjectGroup->recursive = 0;
		$projectGroups = $this->Paginator->paginate();
		$this->set('projectGroups', $projectGroups);
		
	}

	public function api_index($type = null, $user_id = null) {
		if($type == 'admin') {
			$conditions['ProjectGroup.id !='] = 0;
		}

		if($type == 'manager') {
			$conditions['Project.user_id'] = $user_id;
		}

		if($type == 'supervisor') {
			$conditions['ProjectGroup.user_id'] = $user_id;
		}

		$conditions['ProjectGroup.status'] = 'Active';

		$this->ProjectGroup->recursive = 0;
		$this->Paginator->settings = array(
			'conditions' => $conditions
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
		if (!$this->ProjectGroup->exists($id)) {
			throw new NotFoundException(__('Invalid project group'));
		}
		$options = array('conditions' => array('ProjectGroup.' . $this->ProjectGroup->primaryKey => $id), 'recursive' => 2);
		$this->set('projectGroup', $this->ProjectGroup->find('first', $options));
	}

	public function api_view($id = null) {
		if (!$this->ProjectGroup->exists($id)) {
			throw new NotFoundException(__('Invalid project group'));
		}

		$options = array('conditions' => array('ProjectGroup.' . $this->ProjectGroup->primaryKey => $id), 'recursive' => 0);
		$projectGroup = $this->ProjectGroup->find('first', $options);

		$this->loadModel('ProjectWorker');

		$workers = $this->ProjectWorker->find('all', array(
			'conditions' => array(
				'ProjectWorker.project_group_id' => $id
				),
			'contain' => array(
				'User' => array(
					'fields' => array(
						'User.id',
						'User.username',
						'User.name',
						'User.mobile_number'
						) 
					)
				)
			));

		$this->set(array(
            'project_group' => $projectGroup,
            'workers' => $workers,
            '_serialize' => array('project_group', 'workers')
        ));
	}

	public function api_attendance($id = null) {
		if (!$this->ProjectGroup->exists($id)) {
			throw new NotFoundException(__('Invalid project group'));
		}

		// Project group
		$options = array('conditions' => array('ProjectGroup.' . $this->ProjectGroup->primaryKey => $id), 'recursive' => 0);
		$projectGroup = $this->ProjectGroup->find('first', $options);

		$this->loadModel('ProjectWorker');
		$this->ProjectWorker->contain('User');

		// Group workers
		$workers = $this->ProjectWorker->find('all', array(
			'conditions' => array(
				'ProjectWorker.project_group_id' => $id
				)
			)); 
		
		$this->set(array(
            'projectGroup' => $projectGroup,
            'workers' => $workers,
            '_serialize' => array('projectGroup', 'workers')
        ));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ProjectGroup->create();
			$project_id = $this->request->data['ProjectGroup']['project_id']; 
			$this->request->data['ProjectGroup']['user_id'] = $this->user_id;  
			$user_id = $this->request->data['user_id']; 
			if(count($user_id) > 1) {
				if ($this->ProjectGroup->save($this->request->data)) {
					$project_group_id = $this->ProjectGroup->getLastInsertId();

					$this->loadModel('ProjectWorker');

					
					for($i = 0; $i < count($user_id); $i++) { 
						$this->ProjectWorker->create();
						$worker = array(
							'project_id' => $project_id,
							'project_group_id' => $project_group_id,
							'user_id' => $user_id[$i],
							'created' => $this->date
							);
						if(!$this->ProjectWorker->save($worker)) {
							die('E79. Please contact developer');
						}
					}

					$this->Session->setFlash(__('The project group has been saved.'), 'success');
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The project group could not be saved. Please, try again.'), 'error');
				}
			} else {
				$this->Session->setFlash(__('Please add atleast 1 worker.'), 'error');
			} 
		}
		$companies = $this->ProjectGroup->Company->find('list');
		$projects = $this->ProjectGroup->Project->find('list');
		$users = $this->ProjectGroup->User->find('list');
		$this->set(compact('companies', 'projects', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ProjectGroup->exists($id)) {
			throw new NotFoundException(__('Invalid project group'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ProjectGroup->save($this->request->data)) {
				$this->Session->setFlash(__('The project group has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The project group could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ProjectGroup.' . $this->ProjectGroup->primaryKey => $id));
			$this->request->data = $this->ProjectGroup->find('first', $options);
		}
		$companies = $this->ProjectGroup->Company->find('list');
		$projects = $this->ProjectGroup->Project->find('list');
		$users = $this->ProjectGroup->User->find('list');
		$this->set(compact('companies', 'projects', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->ProjectGroup->id = $id;
		if (!$this->ProjectGroup->exists()) {
			throw new NotFoundException(__('Invalid project group'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->ProjectGroup->delete()) {
			$this->Session->setFlash(__('The project group has been deleted.'));
		} else {
			$this->Session->setFlash(__('The project group could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
