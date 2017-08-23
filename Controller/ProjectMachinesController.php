<?php
App::uses('AppController', 'Controller');
/**
 * ProjectMachines Controller
 *
 * @property ProjectMachine $ProjectMachine
 * @property PaginatorComponent $Paginator
 */
class ProjectMachinesController extends AppController {

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
		$this->ProjectMachine->recursive = 0;
		$this->set('projectMachines', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ProjectMachine->exists($id)) {
			throw new NotFoundException(__('Invalid project machine'));
		}
		$options = array('conditions' => array('ProjectMachine.' . $this->ProjectMachine->primaryKey => $id));
		$this->set('projectMachine', $this->ProjectMachine->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ProjectMachine->create();
			if ($this->ProjectMachine->save($this->request->data)) {
				$this->Session->setFlash(__('The project machine has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The project machine could not be saved. Please, try again.'));
			}
		}
		$machines = $this->ProjectMachine->Machine->find('list');
		$projects = $this->ProjectMachine->Project->find('list');
		$users = $this->ProjectMachine->User->find('list');
		$this->set(compact('machines', 'projects', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ProjectMachine->exists($id)) {
			throw new NotFoundException(__('Invalid project machine'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ProjectMachine->save($this->request->data)) {
				$this->Session->setFlash(__('The project machine has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The project machine could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ProjectMachine.' . $this->ProjectMachine->primaryKey => $id));
			$this->request->data = $this->ProjectMachine->find('first', $options);
		}
		$machines = $this->ProjectMachine->Machine->find('list');
		$projects = $this->ProjectMachine->Project->find('list');
		$users = $this->ProjectMachine->User->find('list');
		$this->set(compact('machines', 'projects', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->ProjectMachine->id = $id;
		if (!$this->ProjectMachine->exists()) {
			throw new NotFoundException(__('Invalid project machine'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->ProjectMachine->delete()) {
			$this->Session->setFlash(__('The project machine has been deleted.'));
		} else {
			$this->Session->setFlash(__('The project machine could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
