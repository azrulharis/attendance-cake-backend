<?php
App::uses('AppController', 'Controller');
/**
 * Posts Controller
 *
 * @property Post $Post
 * @property PaginatorComponent $Paginator
 */
class BlogCategoriesController extends BlogAppController {
/**
 * Components
 *
 * @var array
 */ 
 
 //  within your controllers:
	public $helpers = array();
	public $components = array('Paginator','Blog.Qimage','Blog.Slug');

	public function beforeFilter() {
        parent::beforeFilter();
	}
	

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index($id = NULL) {
		if($this->request->is(array('post','put')))
		{
		
			if(!empty($this->data['BlogCategory']['title']))
			{
				$id 	= $this->data['BlogCategory']['id'];
				$title  = $this->data['BlogCategory']['title'];
				$slug 	= $this->data['BlogCategory']['slug'];
				$this->request->data['BlogCategory']['user_id'] = $this->Session->read('Auth.User.id');
				if(empty($this->data['BlogCategory']['parent_id']))
				$this->request->data['BlogCategory']['parent_id'] = 0;
				if ($this->BlogCategory->save($this->request->data)) {
					$this->Session->setFlash(__('The blog category has been saved.'),'success');
					return $this->redirect(array('action' => 'index'));
				} else {
				$this->Session->setFlash(__('The blog category could not be saved. Please, try again.'),'error');
				}
				
			}
			else
				{
					$this->Session->setFlash(__('Please fill title.'),'error');
				}
		
		}
		else
			{
				if(!empty($id))
			$this->request->data = $this->BlogCategory->find('first',array('conditions' => array('BlogCategory.id' => $id)));
			}
		$parents 		= $this->BlogCategory->generateTreeList(null, null, null, '&nbsp;&nbsp;&nbsp;');
		$blogCategories = $this->BlogCategory->generateTreeList();
		$this->set(compact('blogCategories','parents'));
	}




/* Tree */

	public function admin_tree($id = NULL) {
		$blogCategories = $this->BlogCategory->generateTreeList();
		$this->set('blogCategories',$blogCategories);
	}
	

/* Move Up */
	
	public function admin_moveup($id = null, $key = null) {
		$this->BlogCategory->id = $id;
		if (!$this->BlogCategory->exists()) {
		   throw new NotFoundException(__('Invalid Blog Category'),'error');
		}
		if ($key > 0) {
			$this->BlogCategory->moveUp($this->BlogCategory->id, abs($key));
		} else {
			$this->Session->setFlash(__('Please provide a number of positions the Blog should' .
			  'be moved up.'),'error');
		}
	
		return $this->redirect(array('action' => 'index'));
	}
	
	
/* Move Down */
	
	public function admin_movedown($id = null, $delta = null) {
		$this->BlogCategory->id = $id;
		if (!$this->BlogCategory->exists()) {
		   throw new NotFoundException(__('Invalid Blog Category'),'error');
		}
	
		if ($delta > 0) {
			$this->BlogCategory->moveDown($this->BlogCategory->id, abs($delta));
		} else {
			$this->Session->setFlash(__('Please provide the number of positions the field should be' .
			  'moved down.'),'error');
		}
	
		return $this->redirect(array('action' => 'index'));
	}
	

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->BlogCategory->id = $id;		
		if (!$this->BlogCategory->exists()) {
			throw new NotFoundException(__('Invalid Blog Category'),'error');
		}
		if ($this->BlogCategory->delete()) {
			
			$this->Session->setFlash(__('The blog category has been deleted.'),'success');
		} else {
			$this->Session->setFlash(__('The blog category could not be deleted. Please, try again.'),'error');
		}
		return $this->redirect(array('action' => 'index'));
	}
	

/**
 * admin_ajax_add_category method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_ajax_add_category($title = NULL) {
	
		if($this->request->is('ajax') && !empty($title))
		{
			$this->layout = false;
			$category['BlogCategory']['title'] 	 	 = $title;
			$category['BlogCategory']['user_id'] 	 = $this->Session->read('Auth.User.id');
			$category['BlogCategory']['slug'] 	 	 = str_replace(' ','-',$title);
			$category['BlogCategory']['parent_id'] 	 = 0;
			
			$conditions['BlogCategory.slug'] = $title;
			$blogSlugArray = $this->BlogCategory->find('first',array(
									'conditions' => $conditions,
										'order' => array('BlogCategory.modified DESC'),
										'fields' => 'BlogCategory.slug',
									'contain' => array() 
									)
			
							);
					
					
			if(!empty($blogSlugArray))
			{
				$lastIdArray = $this->BlogCategory->find('first',array(
														'fields' => 'BlogCategory.id',
														'order'  => 'BlogCategory.id DESC',
														'limit'  => '1',
														'contain' => array()
														)
													);
				
				$lastId 						  = $lastIdArray['BlogCategory']['id'] + 1;
				$category['BlogCategory']['slug'] =  $category['BlogCategory']['slug'].'-'.$lastId;
			}
			
			if(!$this->BlogCategory->save($category))
			$category = array();
			else
			$category['BlogCategory']['id'] = $this->BlogCategory->getLastInsertId();
			
			
			$this->set('category',$category);
				
		}
	
	}
	
	/**
 * admin_index method
 *
 * @return void
 */
	public function admin_ajax_get_blog_category($keys) {
			$this->layout=false;
			$conditions = array();
			
			if(!empty($keys))
				{
           
			$blogCategories = $this->BlogCategory->find('all',array(
														'conditions' => array(
															'BlogCategory.title LIKE' => $keys.'%'
															),
														'fields' => array(
															'BlogCategory.id',
															'BlogCategory.title'
															),
														'contain' => array()
														)
													);  
		
		
			$this->set('blogCategories',$blogCategories);
			
			}
	}


}