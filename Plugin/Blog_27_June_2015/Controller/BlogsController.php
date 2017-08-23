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
	public $uses = array('Blog.Blog','Blog.BlogTagTag');
	public $components = array('Paginator','Blog.Qimage','Blog.Slug');

	public function beforeFilter() {
        parent::beforeFilter();
		$this->Auth->allow('index','view','category_blogs');
	}

	public function index($id = NULL) {
		$conditions = array();
		if(!empty($id)){
			$blog_ids = $this->Blog->BlogsBlogCategory->find('list',array('fields' => array('BlogsBlogCategory.id','BlogsBlogCategory.blog_id'),'conditions' => array('BlogsBlogCategory.blog_category_id' => $id)));
			$conditions['Blog.id'] = $blog_ids;
		}
		
		$conditions['Blog.status'] = 1;	
		$this->Blog->unbindModel(array('hasOne'=>'BlogTag'));
		
		$this->Paginator->settings = array('conditions' => $conditions, 
										   'contain'=>array(
												'BlogTagTag',
												'FeatureImage',
												'Video'
											), 
											'order'=>'Blog.created DESC',
											'limit'=>3
									);					
		$this->set('blogs',$this->Paginator->Paginate());
	}
	
/*
category Method 
Use: find blog using category slug
$type = 'C',
$slug = 'cat-slug'
*/	
	public function category_blogs($id,$slug) {
		$conditions = array();
		$category_conditions = array();
		if(!empty($slug)){
			$this->loadModel('BlogCategory');
			$blogCategory = $this->BlogCategory->find('first',array(
										'fields' => array('BlogCategory.id'),
										'conditions' => array('BlogCategory.slug' => $slug)
								));
			$blog_ids = $this->Blog->BlogsBlogCategory->find('list',array('fields' => array('BlogsBlogCategory.id','BlogsBlogCategory.blog_id'),'conditions' => array('BlogsBlogCategory.blog_category_id' => $blogCategory['BlogCategory']['id'])));
			$conditions['Blog.id'] = $blog_ids;
		}
		$conditions['Blog.status'] = 1;	
		$this->Blog->unbindModel(array('hasOne'=>'BlogTag'));  // delete this association
		
		$this->Paginator->settings = array('conditions' => $conditions, 
										   'contain'=>array(
												'BlogTagTag',
											), 
											'order'=>'Blog.created DESC',
											'limit'=>1
									);					
		$this->set('blogs',$this->Paginator->Paginate());
		$this->render('index');
	}
	
/*
tag Method 
Use: find blog using tag slug
$type = 't',
$slug = 'tag-name'
*/	
	public function tag_blogs($id,$name) {
		$conditions = array();
		$category_conditions = array();
		if(!empty($slug)){
			$blog_tag_id= $this->Blog->BlogBlogTag->BlogTag->find('first',array('fields' => array('BlogTag.id'),'conditions' => array('BlogTag.name' => $name)));
			$blog_ids = $this->Blog->BlogBlogTag->find('list',array('fields' => array('BlogBlogTag.blog_id'),'conditions' => array('BlogBlogTag.title' => $name)));
			$conditions['Blog.id'] = $blog_ids;
		}
		$conditions['Blog.status'] = 1;	
		$this->Blog->unbindModel(array('hasOne'=>'BlogTag'));
		$this->Paginator->settings = array('conditions' => $conditions, 
										   'contain'=>array(
												'BlogTagTag',
											), 
											'order'=>'Blog.created DESC',
											'limit'=>1
									);					
		$this->set('blogs',$this->Paginator->Paginate());
		$this->render('index');
	}

/**
view Method
*/

	public function view($slug=NULL){
		$conditions['Blog.status'] = 1;	
		$conditions['Blog.slug'] = $slug;	
		$this->Blog->unbindModel(array('hasOne'=>'BlogTag'));
		$blogDetail = $this->Blog->find('first',array('conditions'=>$conditions,
													'contain'=>array(
															'BlogTagTag',
															'FeatureImage',
															'Video',
															'User'=>array('fields'=>array('User.firstname','User.lastname'))
													)));
		$this->set(compact('blogDetail'));
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




/* Tree */

	public function admin_tree($id = NULL) {
		$options = array('BlogCategory.parent_id' => $id);
		$blogCategories = $this->Blog->BlogCategory->generateTreeList();
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
	
		return $this->redirect(array('action' => 'tree'));
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
	
		return $this->redirect(array('action' => 'tree'));
	}
	





/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Blog->exists($id)) {
			throw new NotFoundException(__('Invalid blog'),'error');
		}
		$options = array('conditions' => array('Blog.' . $this->Blog->primaryKey => $id));
		$this->set('blog', $this->Blog->find('first', $options));
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
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_category_delete($id = null) {
		$this->BlogCategory->id = $id;		
		if (!$this->BlogCategory->exists()) {
			throw new NotFoundException(__('Invalid Blog Category'),'error');
		}
		if ($this->BlogCategory->delete()) {
			
			$this->Session->setFlash(__('The blog has been deleted.'),'success');
		} else {
			$this->Session->setFlash(__('The blog could not be deleted. Please, try again.'),'error');
		}
		return $this->redirect(array('action' => 'tree'));
	}
	
/**
 * admin_delete method
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
	
/* Change Status */
	
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