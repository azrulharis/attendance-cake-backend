<?php 
//App::uses('AppController', 'Controller'); 
App::uses('CakeEmail', 'Network/Email');
/**
 * Subscribes Controller
 *
 * @property PaginatorComponent $Paginator
 */
class SubscribesController extends NewsletterAppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator','Newsletter.ExcelReader');
    public $uses = array('Newsletter.Subscribe','EmailTemplate.EmailTemplate');
    var $helpers = array('Newsletter.Xls');
	
	public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add','unsubscribe');
	}


/**
 * admin_index method
 *
 * @return void
 */
 	public function admin_index() {
	  
		/* Filter With Paging */
        if(!empty($this->data)) {         
            $this->Session->write('Filter.Subscribe',$this->data);
        }
        elseif((!empty($this->passedArgs['page']) || strpos($this->referer(), 'subscribes/index')) && $this->Session->check('Filter.Subscribe')) {
            $this->request->data = $this->Session->check('Filter.Subscribe')? $this->Session->read('Filter.Subscribe') : '';
        }
        else
        {
            $this->Session->delete('Filter.Subscribe');
        }
        /* End Filter With Paging */
		
		$conditions=array();
	    
		if(!empty($this->data['Filter'])) {
		 
			if(!empty($this->data['Filter']['keywords'])) {
				$conditions['OR'] = array(
                                          array('Subscribe.name LIKE' => '%' . $this->data['Filter']['keywords'] . '%'),
                                          array('Subscribe.email LIKE' => '%' . $this->data['Filter']['keywords'] . '%')
										 );
			}
			if(isset($this->data['Filter']['unsubscribe']) && $this->data['Filter']['unsubscribe']!='') {
				$conditions['Subscribe.unsubscribe']=$this->data['Filter']['unsubscribe'];
			}
		}		
		if(isset($this->request->data['Subscribe']) && $this->request->is('post')) { 
		    $this->Subscribe->create();
			if ($this->Subscribe->save($this->request->data)) {
				    $email = $this->data['Subscribe']['email'];
					
					$placeHolderArray = $this->EmailTemplate->getPlaceholders(NULL,'Subscribe',$this->data);	
					
					####### Newsletter Email Start ######	
					$emailTemplate = $this->EmailTemplate->find('first',array('conditions' => array(
																				'EmailTemplate.slug' => 'subscribe-for-newsletter',
																					'EmailTemplate.status' => '1'
																					),
																			'fields' => array('EmailTemplate.subject',
																			'EmailTemplate.content')
																				)
																			);
				
					if(!empty($emailTemplate))
					{	
						$template_content = __($emailTemplate['EmailTemplate']['content'],array('config'=>array('entities'=>false,'basicEntities'=>false,'entities_greek'=>false,'entities_latin'=>false,'htmlDecodeOutput'=>false)));
						$template_content = str_replace(array_keys($placeHolderArray),array_values($placeHolderArray),$template_content);
						
						$Email = new CakeEmail('smtp');
						$Email->from(Configure::read('newsletter.from_mail'));
						$Email->to($email);
						$Email->emailFormat('html');
						$Email->template('email')->viewVars( array('MAINCONTENT' => $template_content));
						$Email->subject($emailTemplate['EmailTemplate']['subject']);
						if($Email->send())
						$this->Session->setFlash(__('You have successfully subscribed for newsletter.'),'success');
					}
					$this->Session->setFlash(__('You have successfully subscribed for newsletter.'),'success');
					return $this->redirect(array('action' => 'index'));								
					####### Newsletter Email End ######									
			} 
			else {			  
				$this->Session->setFlash(__('The Subscriber could not be saved. Please,try again.'),'error');				
			}	
					
		}
		
		$record_per_page = Configure::read('Reading.nodes_per_page');
		$this->Paginator->settings = array('conditions' => $conditions,'order'=>'Subscribe.created DESC','limit'=>$record_per_page);
		$this->set('subscribes', $this->Paginator->paginate());
		$this->set(compact('conditions'));
	}



/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Subscribe->exists($id)) {
			throw new NotFoundException(__('Invalid Subscriber'),'error');
		}
		$options = array('conditions' => array('Subscribe.' . $this->Subscribe->primaryKey => $id));
		$this->set('subscribe', $this->Subscribe->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {			
			$this->Subscribe->create();
		   
			if ($this->Subscribe->save($this->request->data)) {
				$this->Session->setFlash(__('The Subscriber has been saved.'),'success');				
			} else {			   
				$this->Session->setFlash(__('The Subscriber could not be saved. Please, try again.'),'error');				
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
		if (!$this->Subscribe->exists($id)) {
			throw new NotFoundException(__('Invalid Subscriber'),'error');
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Subscribe->save($this->request->data)) {
				$this->Session->setFlash(__('The Subscriber has been saved.'),'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Subscriber could not be saved. Please, try again.'),'error');
			}
		} else {
			$options = array('conditions' => array('Subscribe.' . $this->Subscribe->primaryKey => $id));
			$this->request->data = $this->Subscribe->find('first', $options);
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
		$this->Subscribe->id = $id;		
		if (!$this->Subscribe->exists()) {
			throw new NotFoundException(__('Invalid Subscriber'),'error');
		}
		$this->request->allowMethod('post', 'delete');		
		if ($this->Subscribe->delete()) {
			
			$this->Session->setFlash(__('The Subscriber has been deleted.'),'success');
		} else {
			$this->Session->setFlash(__('The Subscriber could not be deleted. Please, try again.'),'error');
		}
		return $this->redirect(array('action' => 'index'));
	}

/* 
Change Status
*/	
	public function admin_change($id)
	 {
	  
		$this->layout = false;
		$this->Subscribe->query('UPDATE subscribes SET status=(CASE WHEN status LIKE 1 THEN status=0 ELSE status=0 END) WHERE
id ='.$id);
		$this->Subscribe->id = $id;
	    $subscribe_status = $this->Subscribe->field('status');
		$this->set('subscribe_status', $subscribe_status);
		$this->set('id',$id);
	
		
	}
	
	public function admin_subscribe() {}
	
	public function unsubscribe($email) {
	    $this->layout = false;
		$subscriberinfo = $this->Subscribe->find('first',array('conditions'=>array('Subscribe.email'=>$email),'contain'=>array()));
	    $this->request->data['Subscribe']['id'] = $subscriberinfo['Subscribe']['id'];
		$this->request->data['Subscribe']['unsubscribe'] = 1;
	    if($this->Subscribe->save($this->request->data))
		{
			$this->Session->setFlash(__('Success! &nbsp; The Subscriber successfully unsubscribed.'),'success');
		}
	}
	
	public function newsletter() {	
		if ($this->request->is('post')) {		
			$this->Subscribe->create();
			if($this->Subscribe->save($this->request->data)){
					$this->Session->setFlash(__('You have successfully subscribed for newsletter.'),'success');
					return $this->redirect($this->referer());
			}
			else{
				$this->Session->setFlash(__('Email already exists.'));
				return $this->redirect($this->referer());

			}
		}	
	}
/*
Export excel Method
*/	
	public function admin_excel_export(){
	  $data = $this->Subscribe->find('all');
	  $this->set('models', $data);
	}
/*
Import excel Method
*/	
	public function admin_excel_import()
	{
		if ($this->request->is('post')) {		
			$row['file'] = $this->request->data['Subscribe']['file'];
			$row['path'] = 'files/';
			$uploadFileName = $this->ExcelReader->copy($row);
			$result = $this->Subscribe->import( $row['path'].$uploadFileName, true);
			$this->Session->setFlash(__('Total '.$result['saved'].' subscribers saved successfully. '.$result['failed'].' Subscribers could not saved due to fail validation.'),'success');
			$this->set('result',$result);
		}
	}
}