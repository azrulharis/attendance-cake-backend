
<div class="row"> 
  	<div class="col-xs-12"> 
    	<div class="x_panel tile">
      		<div class="x_title">
        		<h2>Page Not Found</h2> 
        	<div class="clearfix"></div>
      	</div>
      	<div class="x_content"> 

         <h2>Why it happen?</h2>
         <p>1. Not valid email address. System trying to send email to invalid address, email not found.</p>
         <p>2. Server not connected to internet.</p>

         <h2>Your data has been saved</h2>
         <p>Any data has been saved when you see this page.</p>
               
		<?php
		if (Configure::read('debug') > 0):
			echo $this->element('exception_stack_trace');
		endif;
		?> 
	</div>
	</div>
</div>
</div>

