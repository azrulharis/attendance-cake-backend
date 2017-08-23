<?php
//App::uses('AppController', 'Controller');
/**
 * NewsletterCategories Controller
 *
 * @property PaginatorComponent $Paginator
 */
class NewsletterCategoriesController extends NewsletterAppController {
/**
 * Components
 *
 * @var array
 */	
 	public $helpers = array('Html', 'Form','Newsletter.Ck');
 	public $uses1 = array('Newsletter.NewsletterCategory');
	public $components = array('Paginator');
	
	public function beforeFilter() {
        parent::beforeFilter();
   }

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		
		/* Filter With Paging */
        if(!empty($this->data)) {         
            $this->Session->write('Filter.NewsletterCategory',$this->data);
        }
        elseif( (!empty($this->passedArgs['page']) || strpos($this->referer(), 'newsletter_categories/index')) && $this->Session->check('Filter.NewsletterCategory')  ) {
            $this->request->data = $this->Session->check('Filter.NewsletterCategory')? $this->Session->read('Filter.NewsletterCategory') : '';
        }
        else
        {
            $this->Session->delete('Filter.NewsletterCategory');
        }
        /* End Filter With Paging */
		$conditions=array();
		if(!empty($this->data)) {			
			if(!empty($this->data['NewsletterCategory']['title'])) {
				$conditions['NewsletterCategory.title LIKE']='%'.$this->data['NewsletterCategory']['title'].'%';
			}
			if(isset($this->data['NewsletterCategory']['status']) && $this->data['NewsletterCategory']['status']!='') {
				$conditions['NewsletterCategory.status']=$this->data['NewsletterCategory']['status'];
			}
			if(!empty($this->data['NewsletterCategory']['modified'])) {
				$date = date('Y-m-d',strtotime($this->data['NewsletterCategory']['modified']));
				$conditions['NewsletterCategory.modified LIKE']='%'.$date.'%';
			} 
		}
		
		$record_per_page = Configure::read('Reading.nodes_per_page');
		$this->Paginator->settings = array('conditions' => $conditions,'order'=>'NewsletterCategory.created DESC','limit'=>$record_per_page);
		$this->set('newsletterCategories', $this->Paginator->paginate());	
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->NewsletterCategory->exists($id)) {
			throw new NotFoundException(__('Invalid NewsletterCategory'),'error');
		}
		$options = array('conditions' => array('NewsletterCategory.' . $this->NewsletterCategory->primaryKey => $id));
		$this->set('newsletterCategory', $this->NewsletterCategory->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->NewsletterCategory->create();
			if ($this->NewsletterCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The NewsletterCategory has been saved.'),'success');
				return $this->redirect(array('action' => 'manage'));
			} else {
				$this->Session->setFlash(__('The NewsletterCategory could not be saved. Please, try again.'),'error');
			}
		}
		      
	}
   
      /**
 * admin_manage method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_manage($id = NULL) {	
	   
		if ($this->request->is(array('post', 'put'))) {
		
					if ($this->NewsletterCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The newsletterCategory has been saved.'),'success');
				return $this->redirect(array('action' => 'manage'));
			} else {
				$this->Session->setFlash(__('The newsletterCategory could not be saved. Please, try again.'),'error');
			}
		} else {
			$options = array('conditions' => array('NewsletterCategory.' . $this->NewsletterCategory->primaryKey => $id));
			$this->request->data = $this->NewsletterCategory->find('first', $options);
		}
		$this->Paginator->settings = array('limit'=>4);
		$this->NewsletterCategory->recursive = 0;
		$this->set('newsletterCategories', $this->Paginator->paginate());
	}

  
/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->NewsletterCategory->exists($id)) {
			throw new NotFoundException(__('Invalid NewsletterCategory'),'error');
		}
		if ($this->request->is(array('newsletterCategory', 'put'))) {
			if ($this->NewsletterCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The newsletterCategory has been saved.'),'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The newsletterCategory could not be saved. Please, try again.'),'error');
			}
		} else {
			$options = array('conditions' => array('NewsletterCategory.' . $this->NewsletterCategory->primaryKey => $id));
			$this->request->data = $this->NewsletterCategory->find('first', $options);
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
		$this->NewsletterCategory->id = $id;
		if (!$this->NewsletterCategory->exists()) {
			throw new NotFoundException(__('Invalid NewsletterCategories'),'error');
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->NewsletterCategory->delete()) {
			$this->Session->setFlash(__('The NewsletterCategory has been deleted.'),'success');
		} else {
			$this->Session->setFlash(__('The NewsletterCategory could not be deleted. Please, try again.'),'error');
		}
		return $this->redirect(array('action' => 'manage'));
	}
	
	/* 
Change Status
*/	
	public function admin_change($id,$status)
	 {
		$this->layout=false;
		$this->NewsletterCategory->id = $id;
		
		if($this->NewsletterCategory->saveField('status',$status))
		{
			$this->Session->setFlash(__('Success! &nbsp; The NewsletterCategory status was successfully changed.'),'success');
			$this->redirect(array('action' => 'index'));	
		}
		
	}
	
	public function admin_newsletterCategory() {}
}
