<?php
App::uses('AppController', 'Controller');
/**
 * ProjectMachineRequests Controller
 *
 * @property ProjectMachineRequest $ProjectMachineRequest
 * @property PaginatorComponent $Paginator
 */
class ProjectMachineRequestsController extends AppController {

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
		$this->ProjectMachineRequest->recursive = 0;
		$this->set('projectMachineRequests', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ProjectMachineRequest->exists($id)) {
			throw new NotFoundException(__('Invalid project machine request'));
		}
		$options = array('conditions' => array('ProjectMachineRequest.' . $this->ProjectMachineRequest->primaryKey => $id));
		$this->set('projectMachineRequest', $this->ProjectMachineRequest->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ProjectMachineRequest->create();
			if ($this->ProjectMachineRequest->save($this->request->data)) {
				$this->Session->setFlash(__('The project machine request has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The project machine request could not be saved. Please, try again.'));
			}
		}
		$projects = $this->ProjectMachineRequest->Project->find('list');
		$projectGroups = $this->ProjectMachineRequest->ProjectGroup->find('list');
		$users = $this->ProjectMachineRequest->User->find('list');
		$this->set(compact('projects', 'projectGroups', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ProjectMachineRequest->exists($id)) {
			throw new NotFoundException(__('Invalid project machine request'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ProjectMachineRequest->save($this->request->data)) {
				$this->Session->setFlash(__('The project machine request has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The project machine request could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ProjectMachineRequest.' . $this->ProjectMachineRequest->primaryKey => $id));
			$this->request->data = $this->ProjectMachineRequest->find('first', $options);
		}
		$projects = $this->ProjectMachineRequest->Project->find('list');
		$projectGroups = $this->ProjectMachineRequest->ProjectGroup->find('list');
		$users = $this->ProjectMachineRequest->User->find('list');
		$this->set(compact('projects', 'projectGroups', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->ProjectMachineRequest->id = $id;
		if (!$this->ProjectMachineRequest->exists()) {
			throw new NotFoundException(__('Invalid project machine request'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->ProjectMachineRequest->delete()) {
			$this->Session->setFlash(__('The project machine request has been deleted.'));
		} else {
			$this->Session->setFlash(__('The project machine request could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
