<?php
App::uses('AppController', 'Controller');
/**
 * Workers Controller
 *
 * @property Worker $Worker
 * @property PaginatorComponent $Paginator
 */
class WorkersController extends AppController {

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
		$this->loadModel('User');
		$this->User->recursive = 0;
		$this->Paginator->settings = array(
			'conditions' => array(
				'User.group_id' => 12
				)
			);
		$this->set('workers', $this->Paginator->paginate('User'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->loadModel('User');
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid worker'));
		}
		$options = array('conditions' => array('User.' . $this->Worker->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The worker has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The worker could not be saved. Please, try again.'));
			}
		}
		$companies = $this->User->Company->find('list');
		$users = $this->Worker->User->find('list');
		$this->set(compact('companies', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->loadModel('User');
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid worker'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The worker has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The worker could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$companies = $this->User->Company->find('list');
		$groups = $this->User->Group->find('list');
		$users = $this->Worker->User->find('list');
		$this->set(compact('companies', 'users', 'groups'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->loadModel('User');
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid worker'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The worker has been deleted.'));
		} else {
			$this->Session->setFlash(__('The worker could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
