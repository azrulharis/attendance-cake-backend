<?php

App::uses('Component', 'Controller');

/**
 *
 * CakePHP (version 2) component to upload, resize, crop and
 * add watermark to images.
 *
 * @author Angelito M. Goulart <ange.sap@hotmail.com>
 *
 */
 
class SlugComponent extends Component {
	
	public function initialize(Controller $controller) {

	}
	
	

	public function generateSlug($title,$slug,$id = 0)
		{
				
			if(empty($slug))
			{
					$replacement = '-';
					$slug = Inflector::slug($title,$replacement);
			}
			else
				{
					$replacement = '-';
					$slug = Inflector::slug($slug,$replacement);
				}
				
				$newSlug = $this->checkSlugIsValid($slug,$id);
				
				return $newSlug;
		}
		
		
		public function checkSlugIsValid($slug,$id = 0)
			{
				$conditions = array();
				App::import("Model", "Content.Content"); 
				$model = new Content();
				
				$conditions['Content.slug LIKE'] = $slug;
					
					if(!empty($id))
						{
							$conditions = array_merge($conditions,array('NOT' => array('Content.id' => $id)));;
						}
					
					$contentSlugArray = $model->find('first',array(
											'conditions' => $conditions,
												'order' => array('Content.modified DESC'),
												'fields' => 'Content.slug',
											'contain' => array() 
											)
					
				 					);
					
					
					if(!empty($contentSlugArray))
					{
						$lastIdArray = $model->find('first',array(
																'fields' => 'Content.id',
																'order'  => 'Content.id DESC',
																'limit'  => '1',
																'contain' => array()
																)
															);
						
						$lastId = $lastIdArray['Content']['id'] + 1;
						$newSlug	   =  $slug.'-'.$lastId;
						
					}
					else
						{ $newSlug = $slug; }
						
						return $newSlug;
			}
}
?>