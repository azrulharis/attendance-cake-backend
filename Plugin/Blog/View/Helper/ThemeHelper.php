<?php 
App::uses('Helper', 'View');

class ThemeHelper extends Helper {
    
	public $helpers = array('Html','Form');
	####### Blog Category Tree ######
	function blogCategoryTree($id = 0 ,$level = 0 )
	{
		App::import("Model", "Blog.BlogCategory"); 
		$model = new BlogCategory(); 
		
		$blank = "";
		$parents = $model->find('all',array('conditions' => array('BlogCategory.parent_id' => $id),'contain'=>array()));
		$res = isset($res)?$res:array();
		
		if(!empty($parents))
		{	
			$level++;
			$res[] = '<ul type="none">';
		
			$i = 0;
			for($i=1; $i< $level; $i++)
			$blank .= " ";
			
			foreach($parents as $value)
			{
			$checkbox = $this->Form->input('BlogCategory.BlogCategory.',array('hiddenField'=>false,'type'=>'checkbox','value'=>$value['BlogCategory']['id'],'label' => false,'hidenField'=>false,'div'=>false,'class'=>'blog_categories'));
			$title = $value['BlogCategory']['title'];
			$res[] = sprintf('<li>'.$blank.$checkbox.'&nbsp;'.$title.' %s</li>',$this->blogCategoryTree($value['BlogCategory']['id'],$level));
			}
		
			$res[] = '</ul>';
		}
		return implode('',$res);
	}
	
	###### Blog Category Tree #######
	
	
}