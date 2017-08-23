<?php
App::uses('AppController', 'Controller');
/**
 * ProjectDepartments Controller
 *
 * @property ProjectDepartment $ProjectDepartment
 * @property PaginatorComponent $Paginator
 */
class ProjectDepartmentsController extends AppController {

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
		$this->ProjectDepartment->recursive = 0;
		$this->set('projectDepartments', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ProjectDepartment->exists($id)) {
			throw new NotFoundException(__('Invalid project department'));
		}
		$options = array('conditions' => array('ProjectDepartment.' . $this->ProjectDepartment->primaryKey => $id));
		$this->set('projectDepartment', $this->ProjectDepartment->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ProjectDepartment->create();
			if ($this->ProjectDepartment->save($this->request->data)) {
				$this->Session->setFlash(__('The project department has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The project department could not be saved. Please, try again.'));
			}
		}
		$companies = $this->ProjectDepartment->Company->find('list');
		$users = $this->ProjectDepartment->User->find('list');
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
		if (!$this->ProjectDepartment->exists($id)) {
			throw new NotFoundException(__('Invalid project department'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ProjectDepartment->save($this->request->data)) {
				$this->Session->setFlash(__('The project department has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The project department could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ProjectDepartment.' . $this->ProjectDepartment->primaryKey => $id));
			$this->request->data = $this->ProjectDepartment->find('first', $options);
		}
		$companies = $this->ProjectDepartment->Company->find('list');
		$users = $this->ProjectDepartment->User->find('list');
		$this->set(compact('companies', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->ProjectDepartment->id = $id;
		if (!$this->ProjectDepartment->exists()) {
			throw new NotFoundException(__('Invalid project department'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->ProjectDepartment->delete()) {
			$this->Session->setFlash(__('The project department has been deleted.'));
		} else {
			$this->Session->setFlash(__('The project department could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
