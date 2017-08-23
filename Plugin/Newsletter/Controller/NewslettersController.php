<?php
//App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
/**
 * Newsletters Controller
 *
 * @property PaginatorComponent $Paginator
 */
class NewslettersController extends NewsletterAppController {
	/**
	 * Components
	 *
	 * @var array
	 */ 

 	public $helpers = array('Html', 'Form','Newsletter.Ck');
 	public $uses = array('Newsletter.Newsletter','Newsletter.Subscribe');
	public $components = array('Paginator');
      

	public function beforeFilter() {
        parent::beforeFilter();
    	$ckeditorClass = 'CKEDITOR';
		$this->set('ckeditorClass', $ckeditorClass);
	}

/**
 * admin_index method
 *
 * @return void
 */
 public function admin_index($category_id = NULL) {	   
	 
		/* Filter With Paging */
        if(!empty($this->data)) {         
            $this->Session->write('Filter.Newsletter',$this->data);
        }
        elseif((!empty($this->passedArgs['page']) || strpos($this->referer(), 'newsletters/index')) && $this->Session->check('Filter.Newsletter')) {
            $this->request->data = $this->Session->check('Filter.Newsletter')? $this->Session->read('Filter.Newsletter') : '';
        }
        else
        {
            $this->Session->delete('Filter.Newsletter');
        }
        /* End Filter With Paging */
		$conditions=array();
		if(!empty($this->data)) {			
			if(!empty($this->data['Newsletter']['title'])) {
				$conditions['Newsletter.title LIKE']='%'.$this->data['Newsletter']['title'].'%';
			}
			if(!empty($this->data['Newsletter']['newsletter_category_id'])) {
				$conditions['Newsletter.newsletter_category_id']=$this->data['Newsletter']['newsletter_category_id'];
			}
			if(isset($this->data['Newsletter']['status']) && $this->data['Newsletter']['status']!='') {
				$conditions['Newsletter.status']=$this->data['Newsletter']['status'];
			}  
			if(!empty($this->data['Newsletter']['modified'])) {
			$date = date('Y-m-d',strtotime($this->data['Newsletter']['modified']));
				$conditions['Newsletter.modified LIKE']='%'.$date.'%';
			}         
		}
		
		if(!empty($category_id))
		{
			$conditions = array('newsletter_category_id'=>$category_id);
			$title = $this->Newsletter->title($category_id);
		}
		
		$record_per_page = Configure::read('Reading.nodes_per_page');
		$this->Paginator->settings = array('conditions' => $conditions,'order'=>'Newsletter.created DESC','limit'=>$record_per_page);
		$this->set('newsletters', $this->Paginator->paginate());
		$newsletterCategories = $this->Newsletter->NewsletterCategory->find('list');
		$this->set(compact('newsletterCategories','title'));		
		
	}
	
	
	
/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Newsletter->exists($id)) {
			throw new NotFoundException(__('Invalid Newsletter'));
		}
		$options = array('conditions' => array('Newsletter.' . $this->Newsletter->primaryKey => $id));
		$this->set('newsletter', $this->Newsletter->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {		 	
		if ($this->request->is('post')) {		
			$this->Newsletter->create();
			if ($this->Newsletter->save($this->request->data)) {
				$this->Session->setFlash(__('The Newsletter has been saved.'),'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Newsletter could not be saved. Please, try again.'),'error');
			}
		}
		$newsletterCategories = $this->Newsletter->NewsletterCategory->find('list');
		$this->set(compact('newsletterCategories'));	
	}

/**
 * admin_sendnewsletter method
 *
 * @return void
 */
	 
	 public function admin_sendnewsletter($category_id = NULL , $newsletter_id = NULL) {
		 
	   if ($this->request->is('post')) {
		$email_address = $this->request->data['Newsletter']['subscriber'];
		$this->Newsletter->set($this->request->data);	
		if ($this->Newsletter->validates()) {
			if(!empty($email_address)) {
			#### Get placeholder ####
			$placeHolderArray = $this->Newsletter->getPlaceholders();		 	  
			#### Get placeholder ####
			$newsLetter = $this->Newsletter->find('first',array('conditions' => 
						array(
							'Newsletter.id' => $this->request->data['Newsletter']['newsletter_id'],
							'Newsletter.status' => 1,
						),
						'fields' => array(
							'Newsletter.subject',
							'Newsletter.content'
						)
					)
				);

			$subscribers = $this->Subscribe->find('list',array('fields'=>array('Subscribe.email','Subscribe.vname'),'conditions'=>array('Subscribe.id'=>$email_address)));   // vname for virual name subscriber model

				if(!empty($newsLetter)) {	   					    
					$subject = $newsLetter['Newsletter']['subject'];
					$template_content = __($newsLetter['Newsletter']['content'],array('config'=>array('entities'=>false,'basicEntities'=>false,'entities_greek'=>false,'entities_latin'=>false,'htmlDecodeOutput'=>false)));						
					$template_content = str_replace("[SUBJECT]", $subject, $template_content);
					$template_content = str_replace(array_keys($placeHolderArray),array_values($placeHolderArray),$template_content);
					$count =0;
					foreach($subscribers as $email =>$vname) {	
						$user_info = array();
						$content = array();
						$content = str_replace("[USER]", $vname, $template_content);	   						
						
						$Email = new CakeEmail('smtp');
						$Email->from(Configure::read('Site.email'));
						$Email->to($email);
						$Email->emailFormat('html');
						$Email->template('email')->viewVars(array('MAINCONTENT' => $content,'email'=>$email));
						$Email->subject($newsLetter['Newsletter']['subject']);
						if($Email->send()){
						  $count++;
						}
					}
					if($count >0){									
						$this->Session->setFlash(__('Newsletter has been sent.'),'success');
						$this->redirect(array('action' => 'index'));
						
					} else{	
					 $this->Session->setFlash(__('Newsletter not sent.'),'error');
					 $this->redirect($this->referer());
					}							
				}	
			}
		} else{		  	
			$this->Session->setFlash(__('The Newsletter could not be sent. Please, try again.'),'error'); 
		} 
	   }	   
	   $subscribers = $this->Subscribe->find('list',array('fields'=>array('Subscribe.id','Subscribe.vname'),'conditions'=>array('Subscribe.status'=>'1','Subscribe.unsubscribe'=>'0','NOT' => array('OR'=>array('Subscribe.name' =>'','Subscribe.email' =>'')))));   // vname for virual name subscriber model
	   $newsletterCategories = $this->Newsletter->NewsletterCategory->find('list');
	   $newsletters = $this->Newsletter->find('list',array('conditions'=>array('Newsletter.newsletter_category_id'=>$category_id)));
	   $this->set(compact('subscribers','newsletterCategories','newsletters','category_id','newsletter_id'));
	   
	}
	
	public function admin_getnewsletters($category_id) {
	   $this->layout =false;	   
	   $newsletters = array();
	   if ($this->request->is('ajax')) {
	   		$newsletters = $this->Newsletter->find('list',array('fields'=>'Newsletter.title','conditions'=>array('Newsletter.newsletter_category_id'=>$category_id)));		
	   } 
	   $this->set(compact('newsletters'));	
	}
	
/*
Send Test mail Method
*/	
	
    public function admin_testmail(){
	     if ($this->request->is('post')) {		
			$this->Newsletter->set($this->request->data);	
			if ($this->Newsletter->validates()) {
			   	$to_email = $this->request->data['Newsletter']['email'];
				$subject =  $this->request->data['Newsletter']['subject'];
				$content =  $this->request->data['Newsletter']['content'];
				$Email = new CakeEmail('smtp');
				$Email->from(Configure::read('Site.email'));
				$Email->to($to_email);
				$Email->subject($subject);
				$Email->emailFormat('html');
				$Email->template('email')->viewVars( array('MAINCONTENT' => $content,'email'=>$to_email));			
				
				if($Email->send()){
				   $this->Session->setFlash(__('The Mail has been sent sucessfully.'),'success');
				   return $this->redirect(array('action' => 'testmail'));
				}
				 else {
				   $this->Session->setFlash(__('The Mail could not be sent. Please, try again.'),'error');   
				 }
			} else {
			   $this->Session->setFlash(__('The Mail could not be sent. Please, try again.'),'error');   
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
		if (!$this->Newsletter->exists($id)) {
			throw new NotFoundException(__('Invalid Newsletter'));
		}
		if ($this->request->is(array('newsletter', 'put'))) {
			if ($this->Newsletter->save($this->request->data)) {
				$this->Session->setFlash(__('The Newsletter has been saved.'),'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Newsletter could not be saved. Please, try again.'),'error');
			}
		} else {
			$options = array('conditions' => array('Newsletter.' . $this->Newsletter->primaryKey => $id));
			$this->request->data = $this->Newsletter->find('first', $options);
		}
		$newsletterCategories = $this->Newsletter->NewsletterCategory->find('list');
		$this->set(compact('newsletterCategories'));
	}
/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Newsletter->id = $id;		
		if (!$this->Newsletter->exists()) {
			throw new NotFoundException(__('Invalid Newsletter'));
		}		
		$this->request->allowMethod('post', 'delete'); 	
		
		if ($this->Newsletter->delete()) {
			
			$this->Session->setFlash(__('The Newsletter has been deleted.'),'success');
		} else {
			$this->Session->setFlash(__('The Newsletter could not be deleted. Please, try again.'),'error');
		}
		return $this->redirect(array('action' => 'index'));
	}
	
/* 
Change Status
*/	
	public function admin_change($id,$status)
	 {
		$this->layout=false;
		$this->Newsletter->id = $id;
		
		if($this->Newsletter->saveField('status',$status))
		{
			$this->Session->setFlash(__('Success! &nbsp; The FaqCategory status was successfully changed.'),'success');
			$this->redirect(array('action' => 'index'));	
		}		
	}
	
	
}