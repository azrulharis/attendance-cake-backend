<?php
App::uses('AppController', 'Controller');
/**
 * Faqs Controller
 *
 * @property PaginatorComponent $Paginator
 */
class FaqsController extends FaqAppController {
	
	public $components1 = array('Faq.Faq');
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	public function beforeFilter() {
        parent::beforeFilter();
        //$this->layout = 'admin';
    }

    public function index($faqid = NULL) {
		$conditions=array();
		/* Filter With Paging */
        if(!empty($this->data)) {         
            $this->Session->write('Filter.Faq',$this->data);
        }
        elseif( (!empty($this->passedArgs['page']) || strpos($this->referer(), 'faqs/index/'.$faqid)) && $this->Session->check('Filter.Faq')  ) {
            $this->request->data = $this->Session->check('Filter.Faq')? $this->Session->read('Filter.Faq') : '';
        }
        else
        {
            $this->Session->delete('Filter.Faq');
        }
        /* End Filter With Paging */
		
		if(!empty($this->data)) {
			if(!empty($this->data['Faq']['faq_category_id'])) {
				$conditions['Faq.faq_category_id']=$this->data['Faq']['faq_category_id'];
			}
			if(!empty($this->data['Faq']['question'])) {
				$conditions['Faq.question LIKE']='%'.$this->data['Faq']['question'].'%';
			}
			if(isset($this->data['Faq']['status']) && $this->data['Faq']['status']!='') {
				$conditions['Faq.status']=$this->data['Faq']['status'];
			}
		 }
		$this->Faq->recursive = 0;
		$this->Paginator->settings = array('conditions' => $conditions,'order'=>'Faq.id DESC');
		$this->set('faqs', $this->Paginator->paginate());
		$faqCategories = $this->Faq->FaqCategory->find('list',array('conditions'=>array('FaqCategory.status'=>1)));
		$title = $this->Faq->FaqCategory->field('title',array('FaqCategory.id'=>$faqid));
		$this->set(compact('faqCategories','title','faqid'));
	}
	
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index($faqid = NULL) {
		$conditions=array();
		/* Filter With Paging */
        if(!empty($this->data)) {         
            $this->Session->write('Filter.Faq',$this->data);
        }
        elseif( (!empty($this->passedArgs['page']) || strpos($this->referer(), 'faqs/index/'.$faqid)) && $this->Session->check('Filter.Faq')  ) {
            $this->request->data = $this->Session->check('Filter.Faq')? $this->Session->read('Filter.Faq') : '';
        }
        else
        {
            $this->Session->delete('Filter.Faq');
        }
        /* End Filter With Paging */
		
		if(!empty($this->data)) {
			if(!empty($this->data['Faq']['faq_category_id'])) {
				$conditions['Faq.faq_category_id']=$this->data['Faq']['faq_category_id'];
			}
			if(!empty($this->data['Faq']['question'])) {
				$conditions['Faq.question LIKE']='%'.$this->data['Faq']['question'].'%';
			}
			if(isset($this->data['Faq']['status']) && $this->data['Faq']['status']!='') {
				$conditions['Faq.status']=$this->data['Faq']['status'];
			}
		 }
		$this->Faq->recursive = 0;
		$this->Paginator->settings = array('conditions' => $conditions,'order'=>'Faq.id DESC');
		$this->set('faqs', $this->Paginator->paginate());
		$faqCategories = $this->Faq->FaqCategory->find('list',array('conditions'=>array('FaqCategory.status'=>1)));
		$title = $this->Faq->FaqCategory->field('title',array('FaqCategory.id'=>$faqid));
		$this->set(compact('faqCategories','title','faqid'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Faq->exists($id)) {
			throw new NotFoundException(__('Invalid faq'),'error');
		}
		$options = array('conditions' => array('Faq.' . $this->Faq->primaryKey => $id));
		$this->set('faq', $this->Faq->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {		 	
		if ($this->request->is('post')) {		
			$this->Faq->create();
			if ($this->Faq->save($this->request->data)) {
				$this->Session->setFlash(__('The faq has been saved.'),'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The faq could not be saved. Please, try again.'),'error');
			}
		}
		$faqCategories = $this->Faq->FaqCategory->find('list');
		$this->set(compact('faqCategories'));	
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Faq->exists($id)) {
			throw new NotFoundException(__('Invalid faq'),'error');
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Faq->save($this->request->data)) {
				$this->Session->setFlash(__('The faq has been saved.'),'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The faq could not be saved. Please, try again.'),'error');
			}
		} else {
			$options = array('conditions' => array('Faq.' . $this->Faq->primaryKey => $id));
			$this->request->data = $this->Faq->find('first', $options);
		}
		$faqCategories = $this->Faq->FaqCategory->find('list');
		$this->set(compact('faqCategories'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Faq->id = $id;		
		if (!$this->Faq->exists()) {
			throw new NotFoundException(__('Invalid faq'),'error');
		}
		$this->request->allowMethod('post', 'delete');		
		if ($this->Faq->delete()) {
			
			$this->Session->setFlash(__('The faq has been deleted.'),'success');
		} else {
			$this->Session->setFlash(__('The faq could not be deleted. Please, try again.'),'error');
		}
		return $this->redirect(array('action' => 'index'));
	}
	
}