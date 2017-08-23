<?php
App::uses('AppController', 'Controller');
/**
 * MachineCategories Controller
 *
 * @property MachineCategory $MachineCategory
 * @property PaginatorComponent $Paginator
 */
class MachineCategoriesController extends AppController {

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
		$this->MachineCategory->recursive = 0;
		$this->set('machineCategories', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->MachineCategory->exists($id)) {
			throw new NotFoundException(__('Invalid machine category'));
		}
		$options = array('conditions' => array('MachineCategory.' . $this->MachineCategory->primaryKey => $id));
		$this->set('machineCategory', $this->MachineCategory->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->MachineCategory->create();
			if ($this->MachineCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The machine category has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The machine category could not be saved. Please, try again.'));
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
		if (!$this->MachineCategory->exists($id)) {
			throw new NotFoundException(__('Invalid machine category'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->MachineCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The machine category has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The machine category could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('MachineCategory.' . $this->MachineCategory->primaryKey => $id));
			$this->request->data = $this->MachineCategory->find('first', $options);
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
		$this->MachineCategory->id = $id;
		if (!$this->MachineCategory->exists()) {
			throw new NotFoundException(__('Invalid machine category'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->MachineCategory->delete()) {
			$this->Session->setFlash(__('The machine category has been deleted.'));
		} else {
			$this->Session->setFlash(__('The machine category could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
