<?php
App::uses('AppController', 'Controller');
/**
 * FaqCategories Controller
 *
 * @property PaginatorComponent $Paginator
 */
class FaqCategoriesController extends FaqAppController {
	public $components1 = array('Faq.FaqCategory');

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	
	public function beforeFilter() {
        parent::beforeFilter();
        //$this->Auth->allow();
		$this->layout = 'admin';
    }
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$conditions=array();
		/* Filter With Paging */
        if(!empty($this->data)) {         
            $this->Session->write('Filter.FaqCategory',$this->data);
        }
        elseif( (!empty($this->passedArgs['page']) || strpos($this->referer(), 'faq_categories/index')) &&  $this->Session->check('Filter.FaqCategory') ) {
            $this->request->data = $this->Session->check('Filter.FaqCategory')? $this->Session->read('Filter.FaqCategory') : '';
        }
        else
        {
            $this->Session->delete('Filter.FaqCategory');
        }
        /* End Filter With Paging */
	
		if(!empty($this->data)) {
			if(!empty($this->data['FaqCategory']['title'])) {
				$conditions['FaqCategory.title LIKE']='%'.$this->data['FaqCategory']['title'].'%';
			}
			if(isset($this->data['FaqCategory']['status']) && $this->data['FaqCategory']['status']!='') {
				$conditions['FaqCategory.status']=$this->data['FaqCategory']['status'];
			}
        }
		$this->FaqCategory->recursive = 0;
		$this->Paginator->settings = array('conditions' => $conditions,'order'=>'FaqCategory.id DESC');
		$this->set('faqCategories', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->FaqCategory->exists($id)) {
			throw new NotFoundException(__('Invalid faqCategory'),'error');
		}
		$options = array('conditions' => array('FaqCategory.' . $this->FaqCategory->primaryKey => $id));
		$this->set('faqCategory', $this->FaqCategory->find('first', $options));
	}

/**
 * admin_add method
 *	
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->FaqCategory->create();
			if ($this->FaqCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The faqCategory has been saved.'),'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The faqCategory could not be saved. Please, try again.'),'error');
			}
		}
	
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->FaqCategory->exists($id)) {
			throw new NotFoundException(__('Invalid faqCategory'),'error');
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FaqCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The faqCategory has been saved.'),'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The faqCategory could not be saved. Please, try again.'),'error');
			}
		} else {
			$options = array('conditions' => array('FaqCategory.' . $this->FaqCategory->primaryKey => $id));
			$this->request->data = $this->FaqCategory->find('first', $options);
		}
		
	}
/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->FaqCategory->id = $id;
		if (!$this->FaqCategory->exists()) {
			throw new NotFoundException(__('Invalid faqCategory'),'error');
		}
		$conditions = array('Faq.faq_category_id'=>$id);
		if($this->FaqCategory->Faq->hasAny($conditions))
		{
			 $this->Session->setFlash(__('Faq exist in this FaqCategory please delete Faq first which belongs to this FaqCategory.'),'error');
			 return $this->redirect($this->referer());
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FaqCategory->delete()) {
			$this->Session->setFlash(__('The faqCategory has been deleted.'),'success');
		} else {
			$this->Session->setFlash(__('The faqCategory could not be deleted. Please, try again.'),'error');
		}
		return $this->redirect(array('action' => 'index'));
	}
	
}
