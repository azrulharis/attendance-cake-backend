<?php
App::uses('AppController', 'Controller');
/**
 * Blogs Controller
 *
 * @property Blog $Blog
 * @property PaginatorComponent $Paginator
 */
class BlogsController extends BlogAppController {
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
		$this->Auth->allow();
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$conditions=array();
		if(!empty($this->data)) {
			if(!empty($this->data['Blog']['title'])) {
				$conditions['Blog.title LIKE']='%'.$this->data['Blog']['title'].'%';
			}
			if(!empty($this->data['Blog']['status'])) {
				$conditions['Blog.status']=$this->data['Blog']['status'];
			}
			if(isset($this->data['Blog']['from']) && !empty($this->data['Blog']['from'])) {
				$conditions['Blog.created >=']	=	$this->data['Blog']['from'];
			}
			if(isset($this->data['Blog']['to']) && !empty($this->data['Blog']['to'])) {
				$conditions['Blog.created <=']	=	$this->data['Blog']['to'].' 23:59:59';
			}
			
		}
		$this->Paginator->settings = array('conditions' => $conditions,'contain'=>array(),'order' =>'Blog.title asc');
		$this->Blog->recursive = 0;
		$this->set('blogs', $this->Paginator->paginate());
	}


	
	public function _imageSave()
	{
		if(!empty($this->data['BlogMeta'][0]['value']['name']))
			{
				$data['file'] = $this->data['BlogMeta'][0]['value'];
				$data['path'] = Configure::read('Blog.IMAGE_PATH');
				$result = $this->Qimage->copy($data);
				$this->request->data['BlogMeta'][0]['value'] = $result;
			}
			else
			{
				unset($this->request->data['BlogMeta'][0]);
			}
		
		if(empty($this->data['BlogMeta'][1]['value']))
			{
				unset($this->request->data['BlogMeta'][1]);
			}
			
	
	}


/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {	
		$this->request->data['Blog']['user_id'] = (isset($this->request->data['Blog']['user_id']) && !empty($this->request->data['Blog']['user_id']))?$this->request->data['Blog']['user_id']:$this->Session->read('Auth.User.id');
		
		date_default_timezone_set("Asia/Kolkata"); 
		$currentTime = date('Y-m-d');
		
		$this->request->data['Blog']['publish_on'] = (isset($this->request->data['Blog']['publish_on']) && !empty($this->request->data['Blog']['publish_on']))?$this->request->data['Blog']['publish_on']:$currentTime;
		
		
		if ($this->request->is('post')) {
			
			if(!empty($this->request->data['Blog']['title']))
			{
					$user_id = $this->Session->read('Auth.User.id');
					$title  = $this->request->data['Blog']['title'];
					$slug  	= $this->request->data['Blog']['slug'];
					$this->request->data['Blog']['slug'] = $this->Slug->generateSlug($title,$slug);
					$this->_imageSave();
					unset($this->request->data['Blog']['Customtitle']);
					unset($this->request->data['Blog']['Customvalue']);
					if(!empty($this->request->data['Blog']['BlogTag']))
					$this->request->data['BlogBlogTag'] = $this->Blog->blogTag($this->request->data['Blog']['BlogTag'],$user_id);
					$this->Blog->create();
				
				if ($this->Blog->saveAll($this->request->data)) {
					$this->Session->setFlash(__('The blog has been saved.'),'success');
					return $this->redirect(array('action' => 'index'));
				} else {
					
					if($this->request->data['Blog']['visibility'] == 'PP')
						{
							$this->Session->setFlash(__('Please fill user password and try again.'),'error');	
						}
						else
							{
								$this->Session->setFlash(__('The blog could not be saved. Please, try again.'),'error');
							}
						}
			} else {
					
					$this->Session->setFlash(__('Please fill title.'),'error');
				}
		}
		
		
		$parentBlogs = $this->Blog->find('list');
		$users 			= $this->Blog->User->find('list');
		$this->set(compact('parentBlogs','users'));
		
		
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Blog->exists($id)) {
			throw new NotFoundException(__('Invalid blog'),'error');
		}
		
		if ($this->request->is(array('post', 'put')))
		{
		
			if(!empty($this->request->data['Blog']['title']))
			{
				$user_id = $this->Session->read('Auth.User.id');
				$id  	= $this->request->data['Blog']['id'];
				$title  = $this->request->data['Blog']['title'];
				$slug  	= $this->request->data['Blog']['slug'];
				
				$this->request->data['Blog']['slug'] = $this->Slug->generateSlug($title,$slug,$id);
			
				$this->_imageSave();
				
				unset($this->request->data['Blog']['Customtitle']);
				unset($this->request->data['Blog']['Customvalue']);
				unset($this->request->data['Blog']['edittitle']);
				if(!empty($this->request->data['Blog']['BlogTag']))
				$this->request->data['BlogBlogTag'] = $this->Blog->blogTag($this->request->data['Blog']['BlogTag'],$user_id,$id);
				if ($this->Blog->saveAll($this->request->data)) {
					$this->Session->setFlash(__('The blog has been saved.'),'success');
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The blog could not be saved. Please, try again.'),'error');
					
				}
			}
		} 
		else 
		{
			$options = array('conditions' => array('Blog.id' => $id));
			$this->request->data = $this->Blog->find('first', $options);
			if(!empty($this->request->data['BlogCategory']))
			{
				foreach($this->request->data['BlogCategory'] as $blogCategory)
				$blogCategoryIds[] = $blogCategory['id'];
			}
			if(!empty($this->request->data['BlogBlogTag']))
			$this->request->data['Blog']['BlogTag'] = $this->Blog->blogTagManage($this->request->data['BlogBlogTag']);
		
		
		}
		$users 			= $this->Blog->User->find('list');
		$this->set(compact('users','blogCategoryIds'));
		
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Blog->id = $id;		
		if (!$this->Blog->exists()) {
			throw new NotFoundException(__('Invalid blog'),'error');
		}
		if ($this->Blog->delete()) {
			
			$this->Session->setFlash(__('The blog has been deleted.'),'success');
		} else {
			$this->Session->setFlash(__('The blog could not be deleted. Please, try again.'),'error');
		}
		return $this->redirect(array('action' => 'index'));
	}
	

	
/**
 * admin_ajax_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_ajax_delete($id = null) {
		$this->layout = false;
		$this->Blog->BlogMeta->id = $id;		
		if (!$this->Blog->BlogMeta->exists()) {
			throw new NotFoundException(__('Invalid blog'),'error');
		}
		/* $this->request->allowMethod('post', 'delete'); */		
		if ($this->Blog->BlogMeta->delete()) {
			$result['result'] = 1;
			
		} else {
			$result['result'] = 2;
		}
		
		echo json_encode($result);
		exit;
	}
	
	
/**
 * admin_trash_status method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */	
	public function admin_trash_status($id){
		
		if (!$this->Blog->exists($id)) {
			throw new NotFoundException(__('Invalid user'),'error');
		}
		$status = 3;
		$this->Blog->id = $id;
		if($this->Blog->saveField('status',$status))
			$this->Session->setFlash(__('Page is trashed successfully.'),'success');
		else
			$this->Session->setFlash(__('Page could not be update. Please, try again.'),'error');
	
		
		$this->redirect(array('action' => 'edit',$id));
	}
	
}