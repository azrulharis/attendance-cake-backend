<?php
App::uses('AppController', 'Controller');
/**
 * ProjectResources Controller
 *
 * @property ProjectResource $ProjectResource
 * @property PaginatorComponent $Paginator
 */
class ProjectResourcesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ProjectResource->recursive = 0;
		$this->set('projectResources', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ProjectResource->exists($id)) {
			throw new NotFoundException(__('Invalid project resource'));
		}
		$options = array('conditions' => array('ProjectResource.' . $this->ProjectResource->primaryKey => $id));
		$this->set('projectResource', $this->ProjectResource->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ProjectResource->create();
			if ($this->ProjectResource->save($this->request->data)) {
				$this->Session->setFlash(__('The project resource has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The project resource could not be saved. Please, try again.'));
			}
		}
		$projects = $this->ProjectResource->Project->find('list');
		$projectDepartments = $this->ProjectResource->ProjectDepartment->find('list');
		$users = $this->ProjectResource->User->find('list');
		$companies = $this->ProjectResource->Company->find('list');
		$this->set(compact('projects', 'projectDepartments', 'users', 'companies'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ProjectResource->exists($id)) {
			throw new NotFoundException(__('Invalid project resource'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ProjectResource->save($this->request->data)) {
				$this->Session->setFlash(__('The project resource has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The project resource could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ProjectResource.' . $this->ProjectResource->primaryKey => $id));
			$this->request->data = $this->ProjectResource->find('first', $options);
		}
		$projects = $this->ProjectResource->Project->find('list');
		$projectDepartments = $this->ProjectResource->ProjectDepartment->find('list');
		$users = $this->ProjectResource->User->find('list');
		$companies = $this->ProjectResource->Company->find('list');
		$this->set(compact('projects', 'projectDepartments', 'users', 'companies'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->ProjectResource->id = $id;
		if (!$this->ProjectResource->exists()) {
			throw new NotFoundException(__('Invalid project resource'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->ProjectResource->delete()) {
			$this->Session->setFlash(__('The project resource has been deleted.'));
		} else {
			$this->Session->setFlash(__('The project resource could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
