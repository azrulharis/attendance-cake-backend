<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9 
 */
class EmailTemplatesController extends EmailTemplateAppController {

	

 	public $helpers = array('Html', 'Form');

    public $uses = array('EmailTemplate.EmailTemplate');

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
            $this->Session->write('Filter.EmailTemplate',$this->data);
        }
        elseif((!empty($this->passedArgs['page'])  || strpos($this->referer(), 'email_templates/index')) && $this->Session->check('Filter.EmailTemplate')) {
            $this->request->data = $this->Session->check('Filter.EmailTemplate')? $this->Session->read('Filter.EmailTemplate') : '';
        }
        else
        {
            $this->Session->delete('Filter.EmailTemplate');
        }
        /* End Filter With Paging */
		$conditions=array();
		if(!empty($this->data)) {
			
			if(!empty($this->data['EmailTemplate']['title'])) {
				$conditions['EmailTemplate.title LIKE']='%'.$this->data['EmailTemplate']['title'].'%';
			}
			
			if(isset($this->data['User']['from']) && !empty($this->data['User']['from'])) {
				$conditions['User.created >='] = $this->data['User']['from'];
			}
			if(isset($this->data['User']['to']) && !empty($this->data['User']['to'])) {
				$conditions['User.created <='] = $this->data['User']['to'].' 23:59:59';
			}
		}
		$record_per_page = Configure::read('Reading.nodes_per_page');
		$this->Paginator->settings = array('conditions' => $conditions,'order'=>'EmailTemplate.created DESC','limit'=>$record_per_page);
		$this->set('emailTemplates', $this->Paginator->paginate());
	}



/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */

	public function admin_view($id = null) {
		if (!$this->EmailTemplate->exists($id)) {
			throw new NotFoundException(__('Invalid emailTemplate'),'error');
		}
		$options = array('conditions' => array('EmailTemplate.' . $this->EmailTemplate->primaryKey => $id));
		$this->set('emailTemplate', $this->EmailTemplate->find('first', $options));
	}



/**
 * admin_add method
 *
 * @return void
 */

	public function admin_add() {	
		if ($this->request->is('post')) {		
			$this->EmailTemplate->create();
			if ($this->EmailTemplate->save($this->request->data)) {
				$this->Session->setFlash(__('The EmailTemplate has been saved.'),'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The EmailTemplate could not be saved. Please, try again.'),'error');
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
		if (!$this->EmailTemplate->exists($id)) {
			throw new NotFoundException(__('Invalid mail'),'error');
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->EmailTemplate->save($this->request->data)) {
				$this->Session->setFlash(__('The EmailTemplate has been saved.'),'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The EmailTemplate could not be saved. Please, try again.'),'error');
			}
		} else {
			$options = array('conditions' => array('EmailTemplate.' . $this->EmailTemplate->primaryKey => $id));
			$this->request->data = $this->EmailTemplate->find('first', $options);
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
		$this->EmailTemplate->id = $id;		
		if (!$this->EmailTemplate->exists()) {
			throw new NotFoundException(__('Invalid mail'),'error');
		}
		if ($this->EmailTemplate->delete()) {
			$this->Session->setFlash(__('The EmailTemplate has been deleted.'),'success');
		} else {

			$this->Session->setFlash(__('The EmailTemplate could not be deleted. Please, try again.'),'error');
		}
		return $this->redirect(array('action' => 'index'));
	}


/**
 * admin_status method
 *
 * @return void
 */
 
	public function admin_status($id,$status){
		if (!$this->EmailTemplate->exists($id)) {

			throw new NotFoundException(__('Invalid EmailTemplate'));

		}
		$this->EmailTemplate->id = $id;
		if($this->EmailTemplate->saveField('status',$status))
			$this->Session->setFlash(__('Status successfully updated.'),'success');
		else
			$this->Session->setFlash(__('Status could not be update. Please, try again.'),'error');
			
		$this->redirect(array('action' => 'index'));
	}	
}





?>