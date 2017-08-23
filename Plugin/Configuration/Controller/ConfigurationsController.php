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
 *
 * Company : W3itexperts
 * Author : Rahul Dev Sharma
 * Script Name : CakeReady - Ready Admin With Authentication & ACL Management Plugin
 * Created On : 31 December 2015
 * Script Version : CakeReady v 0.1
 * CakePHP Version : 2.5
 *
 *
 * Website: http://www.w3itexperts.com/
 * Contact: admin@w3itexperts.com
 * Follow: www.twitter.com/w3itexperts
 * Like: www.facebook.com/w3itexperts
 */
class ConfigurationsController extends ConfigurationAppController {
	
	public $components = array('Paginator','Qimage');

	var $name = 'Configurations';
	var $helpers = array('Html', 'Form');

	function admin_index($prefix = "") {
		$this->Configuration->recursive = 0;
		
		if(!$prefix){
			$prefix = "Site";}
			$record_per_page = Configure::read('Reading.nodes_per_page');
		$this->paginate = array(
		
			'order' => 'Configuration.weight ASC',
			'conditions' => array(
				'Configuration.name LIKE' => $prefix . '.%',
				'Configuration.editable' => 1,
			),'limit'=>$record_per_page
		);
		
		 
		
		$this->set('configurations', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Configuration.'));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('configuration', $this->Configuration->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Configuration->create();
			if ($this->Configuration->save($this->data)) {
				 
				$this->Session->setFlash(__('The Configuration has been saved'),'success');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Configuration could not be saved. Please, try again.'),'error');
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Configuration'));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Configuration->save($this->data)) {
				$this->Session->setFlash(__('The Configuration has been saved'),'success');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Configuration could not be saved. Please, try again.'),'error');
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Configuration->read(null, $id);
		}
	}

	function admin_delete($id = null) {
	
		$this->Configuration->id = $id;
		if (!$this->Configuration->exists()) {
			throw new NotFoundException(__('Invalid configuration'));
		}
		if ($this->Configuration->delete()) {
			$this->Session->setFlash(__('The configuration has been deleted.'),'success');
		} else {
			$this->Session->setFlash(__('The configuration could not be deleted. Please, try again.'),'error');
		}
		return $this->redirect(array('action' => 'index'));
	}

	function admin_prefix($prefix = NULL) {	
	    
		if($prefix==NULL){
		    $this->Session->setFlash(__('Invalid url.') ,'error');
		    $this->redirect(array('controller'=>'users','action'=>'dashboard','plugin'=>false));
	    }
		$conditions =  array('name LIKE' => $prefix.'.%');
		
		if (!empty($this->request->data)) {
			
			$this->__imageSave();   // Save Images
			
			if($this->Configuration->saveAll($this->request->data['Configuration']))
			{
				$this->Session->setFlash(__('The Configuration updated successfully.'), 'success');
				return $this->redirect(array('action' => 'prefix', $prefix));	
			}
			else
			{
				$this->Session->setFlash(__('The Configuration could not be saved. Please, try again'), 'error');
			}
		}
		
		$this->Configuration->recursive = 0;
		$this->Paginator->settings = array('conditions' => $conditions, 'limit' => 50);
		$this->set('configurations', $this->paginate());
		$this->set('prefix',$prefix);
	}

	/**
* image save function
*
*
**/
	private function __imageSave()
	{
		if(!empty($this->data['Configuration']))
		{
			foreach($this->data['Configuration'] as $key => $imageData)	
			{
				if(!empty($imageData['value']['name']) && $imageData['input_type'] == 'file')
				{
					$data['file'] = $imageData['value'];
					$data['path'] = IMAGE_PATH;
					// File Name
					$setting_name_array = explode('.',$imageData['name']);
					//pr($setting_name_array);
					$file_name = end($setting_name_array);
					$file_name = strtolower($file_name);
					
					$this->Qimage->file_name = $file_name;	
					
					$result = $this->Qimage->copy($data);
					
					if(!empty($this->errors))
					{
					
					 $this->request->data['Configuration'][$key]['error']=$this->errors;
					}
					
					$imageData['value'] = $result;
					
					$this->request->data['Configuration'][$key]['value'] = $imageData['value'];
				}
				elseif($imageData['input_type'] == 'file')
				{
				  
					unset($this->request->data['Configuration'][$key]);
				}
				
			}
		}
	}
	
	
}
?>