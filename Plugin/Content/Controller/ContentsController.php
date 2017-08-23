<?php
App::uses('AppController', 'Controller');
/**
 * Posts Controller
 *
 * @property Post $Post
 * @property PaginatorComponent $Paginator
 */
class ContentsController extends ContentAppController {
/**
 * Components
 *
 * @var array
 */
 
 //  within your controllers:
	public $helpers = array();
	public $components = array('Paginator','Content.Qimage','Content.Slug');

	public function beforeFilter() {
        parent::beforeFilter();
		$this->Auth->allow('index');
	}

	public function index($page_slug) { 

		$this->layout = 'user_dashboard';
		$contents = $this->Content->findBySlug($page_slug);
		
		$title_for_layout = $contents['Content']['title'];
		$this->set(compact('contents','title_for_layout'));
	}

	public function view($slug) {
		$options = array('conditions' => array('Content.slug' => $slug),
			'contain' => array(
				'ContentMeta',
				'ContentSeo',
				'FeatureImage'
			)
		);
		$content = $this->Content->find('first', $options);
		$this->set('content', $content);
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		//$this->layout = 'admin';
		if(!empty($this->data)) {
			$conditions=array();
			if($this->data['Content']['title']!="") {
				$conditions['Content.title LIKE']='%'.$this->data['Content']['title'].'%';
			}
			if($this->data['Content']['status']!="") {
				$conditions['Content.status']=$this->data['Content']['status'];
			}
			if(isset($this->data['Content']['from']) && !empty($this->data['Content']['from'])) {
				$conditions['Content.created >=']	=	$this->data['Content']['from'];
			}
			if(isset($this->data['Content']['to']) && !empty($this->data['Content']['to'])) {
				$conditions['Content.created <=']	=	$this->data['Content']['to'].' 23:59:59';
			}
            $this->Paginator->settings = array('conditions' => array('AND'=>array($conditions)));
		}
		$this->Content->recursive = 0;
		$this->set('contents', $this->Paginator->paginate());
	}


	public function _imageSave()
	{
		if(!empty($this->data['ContentMeta'][0]['value']['name']))
				{
					$data['file'] = $this->data['ContentMeta'][0]['value'];
					$data['path'] = Configure::read('Content.IMAGE_PATH');
					$result = $this->Qimage->copy($data);
					$this->request->data['ContentMeta'][0]['value'] = $result;
				//pr($data);
				//die;
					
				}
				else
				{
					unset($this->request->data['ContentMeta'][0]['value']);
				}
	
	}


/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {	
	 	//echo $this->layout;
		$this->request->data['Content']['user_id'] = (isset($this->request->data['Content']['user_id']) && !empty($this->request->data['Content']['user_id']))?$this->request->data['Content']['user_id']:$this->Session->read('Auth.User.id');
		
		date_default_timezone_set("Asia/Kolkata"); 
		$currentTime = date('Y-m-d');
		
		$this->request->data['Content']['publish_on'] = (isset($this->request->data['Content']['publish_on']) && !empty($this->request->data['Content']['publish_on']))?$this->request->data['Content']['publish_on']:$currentTime;
		
		if ($this->request->is('post')) {
			
			if(!empty($this->request->data['Content']['title']))
				{
				$title  = $this->request->data['Content']['title'];
				$slug  	= $this->request->data['Content']['slug'];
				
				$this->request->data['Content']['slug'] = $this->Slug->generateSlug($title,$slug);
			
				$this->_imageSave();
				
				$this->request->data['Content']['parent_id'] = (isset($this->data['Content']['parent_id']) && !empty($this->data['Content']['parent_id']))?$this->data['Content']['parent_id']:0;
				unset($this->request->data['Content']['Customtitle']);
				unset($this->request->data['Content']['Customvalue']);
				//pr($this->data);die;	
				$this->Content->create();
				if ($this->Content->saveAll($this->request->data)) {
					$this->Session->setFlash(__('The content has been saved.'),'success');
					return $this->redirect(array('action' => 'index'));
				} else {
					
					if($this->request->data['Content']['visibility'] == 'PP')
						{
							$this->Session->setFlash(__('Please fill user password and try again.'),'error');	
						}
						else
							{
								$this->Session->setFlash(__('The content could not be saved. Please, try again.'),'error');
							}
						}
				} else {
							
							$this->Session->setFlash(__('Please fill title.'),'error');
						}
		}
		
		
		$users 			= $this->Content->User->find('list');
		$parents 	= $this->Content->generateTreeList(null, null, null, '&nbsp;&nbsp;&nbsp;');

		$type = array('1' => 'News', '2' => 'Training', '3' => 'Other'); 

		$this->set(compact('users','parents', 'type')); 
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Content->exists($id)) {
			throw new NotFoundException(__('Invalid content'),'error');
		}
		
		if ($this->request->is(array('post', 'put')))
		{
		
			if(!empty($this->request->data['Content']['title']))
			{
				$id  	= $this->request->data['Content']['id'];
				$title  = $this->request->data['Content']['title'];
				$slug  	= $this->request->data['Content']['slug'];
				
				$this->request->data['Content']['slug'] = $this->Slug->generateSlug($title,$slug,$id);
			
				$this->_imageSave();
				
				$this->request->data['Content']['parent_id'] = (isset($this->data['Content']['parent_id']) && !empty($this->data['Content']['parent_id']))?$this->data['Content']['parent_id']:0;
				unset($this->request->data['Content']['Customtitle']);
				unset($this->request->data['Content']['Customvalue']);
				unset($this->request->data['Content']['edittitle']);
			
				if ($this->Content->saveAll($this->request->data)) {
					$this->Session->setFlash(__('The content has been saved.'),'success');
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The content could not be saved. Please, try again.'),'error');
				}
			}
		} 
		else 
		{
			$options = array('conditions' => array('Content.id' => $id),
				'contain' => array(
					'ContentMeta',
					'ContentSeo',
					'FeatureImage'
				)
			);
			$this->request->data = $this->Content->find('first', $options);
		
		
		}
		
		$users 			= $this->Content->User->find('list');
		$parents 	= $this->Content->generateTreeList(null, null, null, '&nbsp;&nbsp;&nbsp;');
		$type = array('1' => 'News', '2' => 'Training', '3' => 'Other'); 
		$this->set(compact('users','parents', 'type'));
		
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Content->id = $id;		
		if (!$this->Content->exists()) {
			throw new NotFoundException(__('Invalid content'),'error');
		}
		/* $this->request->allowMethod('post', 'delete'); */		
		if ($this->Content->delete()) {
			
			$this->Session->setFlash(__('The content has been deleted.'),'success');
		} else {
			$this->Session->setFlash(__('The content could not be deleted. Please, try again.'),'error');
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
	public function admin_ajax_delete($id = null) {
		$this->layout = false;
		$this->Content->ContentMeta->id = $id;		
		if (!$this->Content->ContentMeta->exists()) {
			throw new NotFoundException(__('Invalid content'),'error');
		}
		/* $this->request->allowMethod('post', 'delete'); */		
		if ($this->Content->ContentMeta->delete()) {
			$result['result'] = 1;
			
		} else {
			$result['result'] = 2;
		}
		
		echo json_encode($result);
		exit;
	}
	
/* Change Status */
	
	public function admin_trash_status($id){
		
		if (!$this->Content->exists($id)) {
			throw new NotFoundException(__('Invalid user'),'error');
		}
		$status = 3;
		$this->Content->id = $id;
		if($this->Content->saveField('status',$status))
			$this->Session->setFlash(__('Page is trashed successfully.'),'success');
		else
			$this->Session->setFlash(__('Page could not be update. Please, try again.'),'error');
	
		
		$this->redirect(array('action' => 'edit',$id));
	}
	
}