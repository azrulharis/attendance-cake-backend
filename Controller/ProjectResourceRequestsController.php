<?php
App::uses('AppController', 'Controller');
/**
 * ProjectResourceRequests Controller
 *
 * @property ProjectResourceRequest $ProjectResourceRequest
 * @property PaginatorComponent $Paginator
 */
class ProjectResourceRequestsController extends AppController {

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
		$this->ProjectResourceRequest->recursive = 0;
		$this->set('projectResourceRequests', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ProjectResourceRequest->exists($id)) {
			throw new NotFoundException(__('Invalid project resource request'));
		}
		$options = array('conditions' => array('ProjectResourceRequest.' . $this->ProjectResourceRequest->primaryKey => $id));
		$this->set('projectResourceRequest', $this->ProjectResourceRequest->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ProjectResourceRequest->create();
			if ($this->ProjectResourceRequest->save($this->request->data)) {
				$this->Session->setFlash(__('The project resource request has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The project resource request could not be saved. Please, try again.'));
			}
		}
		$projects = $this->ProjectResourceRequest->Project->find('list');
		$projectDepartments = $this->ProjectResourceRequest->ProjectDepartment->find('list');
		$companies = $this->ProjectResourceRequest->Company->find('list');
		$users = $this->ProjectResourceRequest->User->find('list');
		$this->set(compact('projects', 'projectDepartments', 'companies', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ProjectResourceRequest->exists($id)) {
			throw new NotFoundException(__('Invalid project resource request'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ProjectResourceRequest->save($this->request->data)) {
				$this->Session->setFlash(__('The project resource request has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The project resource request could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ProjectResourceRequest.' . $this->ProjectResourceRequest->primaryKey => $id));
			$this->request->data = $this->ProjectResourceRequest->find('first', $options);
		}
		$projects = $this->ProjectResourceRequest->Project->find('list');
		$projectDepartments = $this->ProjectResourceRequest->ProjectDepartment->find('list');
		$companies = $this->ProjectResourceRequest->Company->find('list');
		$users = $this->ProjectResourceRequest->User->find('list');
		$this->set(compact('projects', 'projectDepartments', 'companies', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->ProjectResourceRequest->id = $id;
		if (!$this->ProjectResourceRequest->exists()) {
			throw new NotFoundException(__('Invalid project resource request'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->ProjectResourceRequest->delete()) {
			$this->Session->setFlash(__('The project resource request has been deleted.'));
		} else {
			$this->Session->setFlash(__('The project resource request could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
