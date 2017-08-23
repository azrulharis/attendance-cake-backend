<?php
App::uses('AppController', 'Controller');
/**
 * ProjectWorkerRequests Controller
 *
 * @property ProjectWorkerRequest $ProjectWorkerRequest
 * @property PaginatorComponent $Paginator
 */
class ProjectWorkerRequestsController extends AppController {

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
		$this->ProjectWorkerRequest->recursive = 0;
		$this->set('projectWorkerRequests', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ProjectWorkerRequest->exists($id)) {
			throw new NotFoundException(__('Invalid project worker request'));
		}
		$options = array('conditions' => array('ProjectWorkerRequest.' . $this->ProjectWorkerRequest->primaryKey => $id));
		$this->set('projectWorkerRequest', $this->ProjectWorkerRequest->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ProjectWorkerRequest->create();
			if ($this->ProjectWorkerRequest->save($this->request->data)) {
				$this->Session->setFlash(__('The project worker request has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The project worker request could not be saved. Please, try again.'));
			}
		}
		$projects = $this->ProjectWorkerRequest->Project->find('list');
		$projectGroups = $this->ProjectWorkerRequest->ProjectGroup->find('list');
		$users = $this->ProjectWorkerRequest->User->find('list');
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
		if (!$this->ProjectWorkerRequest->exists($id)) {
			throw new NotFoundException(__('Invalid project worker request'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ProjectWorkerRequest->save($this->request->data)) {
				$this->Session->setFlash(__('The project worker request has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The project worker request could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ProjectWorkerRequest.' . $this->ProjectWorkerRequest->primaryKey => $id));
			$this->request->data = $this->ProjectWorkerRequest->find('first', $options);
		}
		$projects = $this->ProjectWorkerRequest->Project->find('list');
		$projectGroups = $this->ProjectWorkerRequest->ProjectGroup->find('list');
		$users = $this->ProjectWorkerRequest->User->find('list');
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
		$this->ProjectWorkerRequest->id = $id;
		if (!$this->ProjectWorkerRequest->exists()) {
			throw new NotFoundException(__('Invalid project worker request'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->ProjectWorkerRequest->delete()) {
			$this->Session->setFlash(__('The project worker request has been deleted.'));
		} else {
			$this->Session->setFlash(__('The project worker request could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
