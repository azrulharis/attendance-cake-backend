<?php
App::uses('AppController', 'Controller');
/**
 * Works Controller
 *
 * @property Work $Work
 * @property PaginatorComponent $Paginator
 */
class WorksController extends AppController {

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
		$this->Work->recursive = 0;
		$this->set('works', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Work->exists($id)) {
			throw new NotFoundException(__('Invalid work'));
		}
		$options = array('conditions' => array('Work.' . $this->Work->primaryKey => $id));
		$this->set('work', $this->Work->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Work->create();
			if ($this->Work->save($this->request->data)) {
				$this->Session->setFlash(__('The work has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The work could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Work->exists($id)) {
			throw new NotFoundException(__('Invalid work'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Work->save($this->request->data)) {
				$this->Session->setFlash(__('The work has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The work could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Work.' . $this->Work->primaryKey => $id));
			$this->request->data = $this->Work->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Work->id = $id;
		if (!$this->Work->exists()) {
			throw new NotFoundException(__('Invalid work'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Work->delete()) {
			$this->Session->setFlash(__('The work has been deleted.'));
		} else {
			$this->Session->setFlash(__('The work could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
