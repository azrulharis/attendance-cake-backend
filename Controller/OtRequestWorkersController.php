<?php
App::uses('AppController', 'Controller');
/**
 * OtRequestWorkers Controller
 *
 * @property OtRequestWorker $OtRequestWorker
 * @property PaginatorComponent $Paginator
 */
class OtRequestWorkersController extends AppController {

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
		$this->OtRequestWorker->recursive = 0;
		$this->set('otRequestWorkers', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->OtRequestWorker->exists($id)) {
			throw new NotFoundException(__('Invalid ot request worker'));
		}
		$options = array('conditions' => array('OtRequestWorker.' . $this->OtRequestWorker->primaryKey => $id));
		$this->set('otRequestWorker', $this->OtRequestWorker->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->OtRequestWorker->create();
			if ($this->OtRequestWorker->save($this->request->data)) {
				$this->Session->setFlash(__('The ot request worker has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ot request worker could not be saved. Please, try again.'));
			}
		}
		$otRequests = $this->OtRequestWorker->OtRequest->find('list');
		$workers = $this->OtRequestWorker->Worker->find('list');
		$attendanceWorkers = $this->OtRequestWorker->AttendanceWorker->find('list');
		$this->set(compact('otRequests', 'workers', 'attendanceWorkers'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->OtRequestWorker->exists($id)) {
			throw new NotFoundException(__('Invalid ot request worker'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->OtRequestWorker->save($this->request->data)) {
				$this->Session->setFlash(__('The ot request worker has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ot request worker could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('OtRequestWorker.' . $this->OtRequestWorker->primaryKey => $id));
			$this->request->data = $this->OtRequestWorker->find('first', $options);
		}
		$otRequests = $this->OtRequestWorker->OtRequest->find('list');
		$workers = $this->OtRequestWorker->Worker->find('list');
		$attendanceWorkers = $this->OtRequestWorker->AttendanceWorker->find('list');
		$this->set(compact('otRequests', 'workers', 'attendanceWorkers'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->OtRequestWorker->id = $id;
		if (!$this->OtRequestWorker->exists()) {
			throw new NotFoundException(__('Invalid ot request worker'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->OtRequestWorker->delete()) {
			$this->Session->setFlash(__('The ot request worker has been deleted.'));
		} else {
			$this->Session->setFlash(__('The ot request worker could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
