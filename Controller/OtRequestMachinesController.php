<?php
App::uses('AppController', 'Controller');
/**
 * OtRequestMachines Controller
 *
 * @property OtRequestMachine $OtRequestMachine
 * @property PaginatorComponent $Paginator
 */
class OtRequestMachinesController extends AppController {

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
		$this->OtRequestMachine->recursive = 0;
		$this->set('otRequestMachines', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->OtRequestMachine->exists($id)) {
			throw new NotFoundException(__('Invalid ot request machine'));
		}
		$options = array('conditions' => array('OtRequestMachine.' . $this->OtRequestMachine->primaryKey => $id));
		$this->set('otRequestMachine', $this->OtRequestMachine->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->OtRequestMachine->create();
			if ($this->OtRequestMachine->save($this->request->data)) {
				$this->Session->setFlash(__('The ot request machine has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ot request machine could not be saved. Please, try again.'));
			}
		}
		$otRequests = $this->OtRequestMachine->OtRequest->find('list');
		$machines = $this->OtRequestMachine->Machine->find('list');
		$attendanceMachines = $this->OtRequestMachine->AttendanceMachine->find('list');
		$this->set(compact('otRequests', 'machines', 'attendanceMachines'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->OtRequestMachine->exists($id)) {
			throw new NotFoundException(__('Invalid ot request machine'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->OtRequestMachine->save($this->request->data)) {
				$this->Session->setFlash(__('The ot request machine has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ot request machine could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('OtRequestMachine.' . $this->OtRequestMachine->primaryKey => $id));
			$this->request->data = $this->OtRequestMachine->find('first', $options);
		}
		$otRequests = $this->OtRequestMachine->OtRequest->find('list');
		$machines = $this->OtRequestMachine->Machine->find('list');
		$attendanceMachines = $this->OtRequestMachine->AttendanceMachine->find('list');
		$this->set(compact('otRequests', 'machines', 'attendanceMachines'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->OtRequestMachine->id = $id;
		if (!$this->OtRequestMachine->exists()) {
			throw new NotFoundException(__('Invalid ot request machine'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->OtRequestMachine->delete()) {
			$this->Session->setFlash(__('The ot request machine has been deleted.'));
		} else {
			$this->Session->setFlash(__('The ot request machine could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
