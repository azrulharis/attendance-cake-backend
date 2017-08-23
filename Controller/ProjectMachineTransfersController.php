<?php
App::uses('AppController', 'Controller');
/**
 * ProjectMachineTransfers Controller
 *
 * @property ProjectMachineTransfer $ProjectMachineTransfer
 * @property PaginatorComponent $Paginator
 */
class ProjectMachineTransfersController extends AppController {

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
		$this->ProjectMachineTransfer->recursive = 0;
		$this->set('projectMachineTransfers', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ProjectMachineTransfer->exists($id)) {
			throw new NotFoundException(__('Invalid project machine transfer'));
		}
		$options = array('conditions' => array('ProjectMachineTransfer.' . $this->ProjectMachineTransfer->primaryKey => $id));
		$this->set('projectMachineTransfer', $this->ProjectMachineTransfer->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ProjectMachineTransfer->create();
			if ($this->ProjectMachineTransfer->save($this->request->data)) {
				$this->Session->setFlash(__('The project machine transfer has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The project machine transfer could not be saved. Please, try again.'));
			}
		}
		$projects = $this->ProjectMachineTransfer->Project->find('list');
		$projectMachines = $this->ProjectMachineTransfer->ProjectMachine->find('list');
		$users = $this->ProjectMachineTransfer->User->find('list');
		$machines = $this->ProjectMachineTransfer->Machine->find('list');
		$this->set(compact('projects', 'projectMachines', 'users', 'machines'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ProjectMachineTransfer->exists($id)) {
			throw new NotFoundException(__('Invalid project machine transfer'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ProjectMachineTransfer->save($this->request->data)) {
				$this->Session->setFlash(__('The project machine transfer has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The project machine transfer could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ProjectMachineTransfer.' . $this->ProjectMachineTransfer->primaryKey => $id));
			$this->request->data = $this->ProjectMachineTransfer->find('first', $options);
		}
		$projects = $this->ProjectMachineTransfer->Project->find('list');
		$projectMachines = $this->ProjectMachineTransfer->ProjectMachine->find('list');
		$users = $this->ProjectMachineTransfer->User->find('list');
		$machines = $this->ProjectMachineTransfer->Machine->find('list');
		$this->set(compact('projects', 'projectMachines', 'users', 'machines'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->ProjectMachineTransfer->id = $id;
		if (!$this->ProjectMachineTransfer->exists()) {
			throw new NotFoundException(__('Invalid project machine transfer'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->ProjectMachineTransfer->delete()) {
			$this->Session->setFlash(__('The project machine transfer has been deleted.'));
		} else {
			$this->Session->setFlash(__('The project machine transfer could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
