<?php
class NewsletterAppController extends AppController {
     
	 
	 public function beforeFilter() {
	 	parent :: beforeFilter();	 
	 	if(Configure::read('newsletter.use_plugin_layout'))
		{
			$this->layout  = 'newsletter'; 
		}
	 }

}
?>