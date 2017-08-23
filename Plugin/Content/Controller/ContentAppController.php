<?php
class ContentAppController extends AppController {

	public function beforeFilter() {
	 	parent :: beforeFilter();
	 
	 	if(Configure::read('content.use_plugin_layout'))
		{
			$this->layout  = 'content'; 
		}
	 }	
}
?>