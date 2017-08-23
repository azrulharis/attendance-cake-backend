<?php
App::uses('AppController', 'Controller');
/**
 * AttendanceWorkers Controller
 *
 * @property AttendanceWorker $AttendanceWorker
 * @property PaginatorComponent $Paginator
 */
class AttendanceWorkersController extends AppController {

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
		//$this->AttendanceWorker->contain('User', 'Attendance');
		$this->AttendanceWorker->recursive = 2;
		$this->set('attendanceWorkers', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->AttendanceWorker->exists($id)) {
			throw new NotFoundException(__('Invalid attendance worker'));
		}
		$options = array('conditions' => array('AttendanceWorker.' . $this->AttendanceWorker->primaryKey => $id), 'recursive' => 2);
		$this->set('attendanceWorker', $this->AttendanceWorker->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->AttendanceWorker->create();
			if ($this->AttendanceWorker->save($this->request->data)) {
				$this->Session->setFlash(__('The attendance worker has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The attendance worker could not be saved. Please, try again.'));
			}
		}
		$attendances = $this->AttendanceWorker->Attendance->find('list');
		$workers = $this->AttendanceWorker->Worker->find('list');
		$this->set(compact('attendances', 'workers'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->AttendanceWorker->exists($id)) {
			throw new NotFoundException(__('Invalid attendance worker'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->AttendanceWorker->save($this->request->data)) {
				$this->Session->setFlash(__('The attendance worker has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The attendance worker could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('AttendanceWorker.' . $this->AttendanceWorker->primaryKey => $id));
			$this->request->data = $this->AttendanceWorker->find('first', $options);
		}
		$attendances = $this->AttendanceWorker->Attendance->find('list');
		$workers = $this->AttendanceWorker->Worker->find('list');
		$this->set(compact('attendances', 'workers'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->AttendanceWorker->id = $id;
		if (!$this->AttendanceWorker->exists()) {
			throw new NotFoundException(__('Invalid attendance worker'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->AttendanceWorker->delete()) {
			$this->Session->setFlash(__('The attendance worker has been deleted.'));
		} else {
			$this->Session->setFlash(__('The attendance worker could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
