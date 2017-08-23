<?php
App::uses('AppController', 'Controller');
/**
 * ProjectGroupTransfers Controller
 *
 * @property ProjectGroupTransfer $ProjectGroupTransfer
 * @property PaginatorComponent $Paginator
 */
class ProjectGroupTransfersController extends AppController {

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
		$this->ProjectGroupTransfer->recursive = 0;
		$this->set('projectGroupTransfers', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ProjectGroupTransfer->exists($id)) {
			throw new NotFoundException(__('Invalid project group transfer'));
		}
		$options = array('conditions' => array('ProjectGroupTransfer.' . $this->ProjectGroupTransfer->primaryKey => $id));
		$this->set('projectGroupTransfer', $this->ProjectGroupTransfer->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ProjectGroupTransfer->create();
			if ($this->ProjectGroupTransfer->save($this->request->data)) {
				$this->Session->setFlash(__('The project group transfer has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The project group transfer could not be saved. Please, try again.'));
			}
		}
		$projects = $this->ProjectGroupTransfer->Project->find('list');
		$projectGroups = $this->ProjectGroupTransfer->ProjectGroup->find('list');
		$users = $this->ProjectGroupTransfer->User->find('list');
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
		if (!$this->ProjectGroupTransfer->exists($id)) {
			throw new NotFoundException(__('Invalid project group transfer'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ProjectGroupTransfer->save($this->request->data)) {
				$this->Session->setFlash(__('The project group transfer has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The project group transfer could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ProjectGroupTransfer.' . $this->ProjectGroupTransfer->primaryKey => $id));
			$this->request->data = $this->ProjectGroupTransfer->find('first', $options);
		}
		$projects = $this->ProjectGroupTransfer->Project->find('list');
		$projectGroups = $this->ProjectGroupTransfer->ProjectGroup->find('list');
		$users = $this->ProjectGroupTransfer->User->find('list');
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
		$this->ProjectGroupTransfer->id = $id;
		if (!$this->ProjectGroupTransfer->exists()) {
			throw new NotFoundException(__('Invalid project group transfer'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->ProjectGroupTransfer->delete()) {
			$this->Session->setFlash(__('The project group transfer has been deleted.'));
		} else {
			$this->Session->setFlash(__('The project group transfer could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
