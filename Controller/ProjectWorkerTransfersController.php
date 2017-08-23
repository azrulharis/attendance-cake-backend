<?php
App::uses('AppController', 'Controller');
/**
 * ProjectWorkerTransfers Controller
 *
 * @property ProjectWorkerTransfer $ProjectWorkerTransfer
 * @property PaginatorComponent $Paginator
 */
class ProjectWorkerTransfersController extends AppController {

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
		$this->ProjectWorkerTransfer->recursive = 0;
		$this->set('projectWorkerTransfers', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ProjectWorkerTransfer->exists($id)) {
			throw new NotFoundException(__('Invalid project worker transfer'));
		}
		$options = array('conditions' => array('ProjectWorkerTransfer.' . $this->ProjectWorkerTransfer->primaryKey => $id));
		$this->set('projectWorkerTransfer', $this->ProjectWorkerTransfer->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ProjectWorkerTransfer->create();
			if ($this->ProjectWorkerTransfer->save($this->request->data)) {
				$this->Session->setFlash(__('The project worker transfer has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The project worker transfer could not be saved. Please, try again.'));
			}
		}
		$projects = $this->ProjectWorkerTransfer->Project->find('list');
		$projectGroups = $this->ProjectWorkerTransfer->ProjectGroup->find('list');
		$projectWorkers = $this->ProjectWorkerTransfer->ProjectWorker->find('list');
		$workers = $this->ProjectWorkerTransfer->Worker->find('list');
		$users = $this->ProjectWorkerTransfer->User->find('list');
		$this->set(compact('projects', 'projectGroups', 'projectWorkers', 'workers', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ProjectWorkerTransfer->exists($id)) {
			throw new NotFoundException(__('Invalid project worker transfer'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ProjectWorkerTransfer->save($this->request->data)) {
				$this->Session->setFlash(__('The project worker transfer has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The project worker transfer could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ProjectWorkerTransfer.' . $this->ProjectWorkerTransfer->primaryKey => $id));
			$this->request->data = $this->ProjectWorkerTransfer->find('first', $options);
		}
		$projects = $this->ProjectWorkerTransfer->Project->find('list');
		$projectGroups = $this->ProjectWorkerTransfer->ProjectGroup->find('list');
		$projectWorkers = $this->ProjectWorkerTransfer->ProjectWorker->find('list');
		$workers = $this->ProjectWorkerTransfer->Worker->find('list');
		$users = $this->ProjectWorkerTransfer->User->find('list');
		$this->set(compact('projects', 'projectGroups', 'projectWorkers', 'workers', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->ProjectWorkerTransfer->id = $id;
		if (!$this->ProjectWorkerTransfer->exists()) {
			throw new NotFoundException(__('Invalid project worker transfer'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->ProjectWorkerTransfer->delete()) {
			$this->Session->setFlash(__('The project worker transfer has been deleted.'));
		} else {
			$this->Session->setFlash(__('The project worker transfer could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
