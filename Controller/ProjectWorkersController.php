<?php
App::uses('AppController', 'Controller');
/**
 * ProjectWorkers Controller
 *
 * @property ProjectWorker $ProjectWorker
 * @property PaginatorComponent $Paginator
 */
class ProjectWorkersController extends AppController {

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
		$this->ProjectWorker->recursive = 0;
		$this->set('projectWorkers', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ProjectWorker->exists($id)) {
			throw new NotFoundException(__('Invalid project worker'));
		}
		$options = array('conditions' => array('ProjectWorker.' . $this->ProjectWorker->primaryKey => $id));
		$this->set('projectWorker', $this->ProjectWorker->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ProjectWorker->create();
			if ($this->ProjectWorker->save($this->request->data)) {
				$this->Session->setFlash(__('The project worker has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The project worker could not be saved. Please, try again.'));
			}
		}
		$projects = $this->ProjectWorker->Project->find('list');
		$projectGroups = $this->ProjectWorker->ProjectGroup->find('list');
		$workers = $this->ProjectWorker->Worker->find('list');
		$this->set(compact('projects', 'projectGroups', 'workers'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ProjectWorker->exists($id)) {
			throw new NotFoundException(__('Invalid project worker'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ProjectWorker->save($this->request->data)) {
				$this->Session->setFlash(__('The project worker has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The project worker could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ProjectWorker.' . $this->ProjectWorker->primaryKey => $id));
			$this->request->data = $this->ProjectWorker->find('first', $options);
		}
		$projects = $this->ProjectWorker->Project->find('list');
		$projectGroups = $this->ProjectWorker->ProjectGroup->find('list');
		$workers = $this->ProjectWorker->Worker->find('list');
		$this->set(compact('projects', 'projectGroups', 'workers'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->ProjectWorker->id = $id;
		if (!$this->ProjectWorker->exists()) {
			throw new NotFoundException(__('Invalid project worker'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->ProjectWorker->delete()) {
			$this->Session->setFlash(__('The project worker has been deleted.'));
		} else {
			$this->Session->setFlash(__('The project worker could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
