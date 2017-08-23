<?php
App::uses('AppController', 'Controller');
/**
 * AttendanceMachines Controller
 *
 * @property AttendanceMachine $AttendanceMachine
 * @property PaginatorComponent $Paginator
 */
class AttendanceMachinesController extends AppController {

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
		$this->AttendanceMachine->recursive = 0;
		$this->set('attendanceMachines', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->AttendanceMachine->exists($id)) {
			throw new NotFoundException(__('Invalid attendance machine'));
		}
		$options = array('conditions' => array('AttendanceMachine.' . $this->AttendanceMachine->primaryKey => $id));
		$this->set('attendanceMachine', $this->AttendanceMachine->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->AttendanceMachine->create();
			if ($this->AttendanceMachine->save($this->request->data)) {
				$this->Session->setFlash(__('The attendance machine has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The attendance machine could not be saved. Please, try again.'));
			}
		}
		$attendances = $this->AttendanceMachine->Attendance->find('list');
		$machines = $this->AttendanceMachine->Machine->find('list');
		$projectMachines = $this->AttendanceMachine->ProjectMachine->find('list');
		$workers = $this->AttendanceMachine->Worker->find('list');
		$this->set(compact('attendances', 'machines', 'projectMachines', 'workers'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->AttendanceMachine->exists($id)) {
			throw new NotFoundException(__('Invalid attendance machine'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->AttendanceMachine->save($this->request->data)) {
				$this->Session->setFlash(__('The attendance machine has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The attendance machine could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('AttendanceMachine.' . $this->AttendanceMachine->primaryKey => $id));
			$this->request->data = $this->AttendanceMachine->find('first', $options);
		}
		$attendances = $this->AttendanceMachine->Attendance->find('list');
		$machines = $this->AttendanceMachine->Machine->find('list');
		$projectMachines = $this->AttendanceMachine->ProjectMachine->find('list');
		$workers = $this->AttendanceMachine->Worker->find('list');
		$this->set(compact('attendances', 'machines', 'projectMachines', 'workers'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->AttendanceMachine->id = $id;
		if (!$this->AttendanceMachine->exists()) {
			throw new NotFoundException(__('Invalid attendance machine'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->AttendanceMachine->delete()) {
			$this->Session->setFlash(__('The attendance machine has been deleted.'));
		} else {
			$this->Session->setFlash(__('The attendance machine could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
