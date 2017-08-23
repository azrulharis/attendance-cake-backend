<?php
class BlogAppController extends AppController {

	public function beforeFilter() {
	 	parent :: beforeFilter();
	 
	 	if(Configure::read('blog.use_plugin_layout'))
		{
			$this->layout  = 'blog'; 
		}
	 }	
}
?>