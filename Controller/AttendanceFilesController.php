<?php
App::uses('AppController', 'Controller');
/**
 * AttendanceFiles Controller
 *
 * @property AttendanceFile $AttendanceFile
 * @property PaginatorComponent $Paginator
 */
class AttendanceFilesController extends AppController {

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
		$this->AttendanceFile->recursive = 0;
		$this->set('attendanceFiles', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->AttendanceFile->exists($id)) {
			throw new NotFoundException(__('Invalid attendance file'));
		}
		$options = array('conditions' => array('AttendanceFile.' . $this->AttendanceFile->primaryKey => $id));
		$this->set('attendanceFile', $this->AttendanceFile->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->AttendanceFile->create();
			if ($this->AttendanceFile->save($this->request->data)) {
				$this->Session->setFlash(__('The attendance file has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The attendance file could not be saved. Please, try again.'));
			}
		}
		$attendances = $this->AttendanceFile->Attendance->find('list');
		$this->set(compact('attendances'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->AttendanceFile->exists($id)) {
			throw new NotFoundException(__('Invalid attendance file'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->AttendanceFile->save($this->request->data)) {
				$this->Session->setFlash(__('The attendance file has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The attendance file could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('AttendanceFile.' . $this->AttendanceFile->primaryKey => $id));
			$this->request->data = $this->AttendanceFile->find('first', $options);
		}
		$attendances = $this->AttendanceFile->Attendance->find('list');
		$this->set(compact('attendances'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->AttendanceFile->id = $id;
		if (!$this->AttendanceFile->exists()) {
			throw new NotFoundException(__('Invalid attendance file'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->AttendanceFile->delete()) {
			$this->Session->setFlash(__('The attendance file has been deleted.'));
		} else {
			$this->Session->setFlash(__('The attendance file could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
