<?php

App::uses('Component', 'Controller'); 

class SlugComponent extends Component {
	
	public function initialize(Controller $controller) {

	}  

	public function generateSlug($title,$slug,$id = 0) {
			
		if(empty($slug)) {
				$replacement = '-';
				$slug = Inflector::slug($title,$replacement);
		} else {
			$replacement = '-';
			$slug = Inflector::slug($slug,$replacement);
		} 	
		$newSlug = $this->checkSlugIsValid($slug,$id);
		
		return $newSlug;
	}
		
		
	public function checkSlugIsValid($slug, $id = 0) {
		$conditions = array();
		App::import("Model", "Property"); 
		$model = new Property();
		
		$conditions['Property.slug LIKE'] = $slug;
			
		if(!empty($id)) {
			$conditions = array_merge($conditions,array('NOT' => array('Property.id' => $id)));
		}
		
		$blogSlugArray = $model->find('first',array(
			'conditions' => $conditions,
				'order' => array('Property.modified DESC'),
				'fields' => 'Property.slug',
			'contain' => array() 
			) 
		);
		
		
		if(!empty($blogSlugArray)) {
			$lastIdArray = $model->find('first',array(
				'fields' => 'Property.id',
				'order'  => 'Property.id DESC',
				'limit'  => '1',
				'contain' => array()
				)
			); 
			$lastId = $lastIdArray['Property']['id'] + 1;
			$newSlug	   =  $slug.'-'.$lastId; 
		} else { 
			$newSlug = $slug; 
		}
			
		return $newSlug;
	}
} 