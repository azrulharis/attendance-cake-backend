<?php
App::uses('AppController', 'Controller');
/**
 * AttendanceWorks Controller
 *
 * @property AttendanceWork $AttendanceWork
 * @property PaginatorComponent $Paginator
 */
class AttendanceWorksController extends AppController {

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
		$this->AttendanceWork->recursive = 0;
		$this->set('attendanceWorks', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->AttendanceWork->exists($id)) {
			throw new NotFoundException(__('Invalid attendance work'));
		}
		$options = array('conditions' => array('AttendanceWork.' . $this->AttendanceWork->primaryKey => $id));
		$this->set('attendanceWork', $this->AttendanceWork->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->AttendanceWork->create();
			if ($this->AttendanceWork->save($this->request->data)) {
				$this->Session->setFlash(__('The attendance work has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The attendance work could not be saved. Please, try again.'));
			}
		}
		$attendanceWorkers = $this->AttendanceWork->AttendanceWorker->find('list');
		$works = $this->AttendanceWork->Work->find('list');
		$this->set(compact('attendanceWorkers', 'works'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->AttendanceWork->exists($id)) {
			throw new NotFoundException(__('Invalid attendance work'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->AttendanceWork->save($this->request->data)) {
				$this->Session->setFlash(__('The attendance work has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The attendance work could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('AttendanceWork.' . $this->AttendanceWork->primaryKey => $id));
			$this->request->data = $this->AttendanceWork->find('first', $options);
		}
		$attendanceWorkers = $this->AttendanceWork->AttendanceWorker->find('list');
		$works = $this->AttendanceWork->Work->find('list');
		$this->set(compact('attendanceWorkers', 'works'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->AttendanceWork->id = $id;
		if (!$this->AttendanceWork->exists()) {
			throw new NotFoundException(__('Invalid attendance work'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->AttendanceWork->delete()) {
			$this->Session->setFlash(__('The attendance work has been deleted.'));
		} else {
			$this->Session->setFlash(__('The attendance work could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
