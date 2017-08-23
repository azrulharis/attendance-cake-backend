<?php echo $this->Html->link('Worker List', array('action' => 'index'), array('class' => 'btn btn-primary')); ?>
 
<div class="row"> 
 <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel tile">
      <div class="x_title">
        <h2>Edit</h2> 
        <div class="clearfix"></div>
      </div>
      <div class="x_content"> 
        <?php echo $this->Session->flash(); ?>
        
            <?php echo $this->Form->create('User', array('class'=> 'form-horizontal form-label-left input_mask', 'novalidate'=>true)); 
				echo $this->Form->hidden('id');
			?>
           
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Username</label>

<?php if($this->action == 'admin_edit') { ?>
	<?php  echo $this->Form->input("username", array("class"=> "form-control", "placeholder" => "username","label"=> false,'div'=>array('class' => 'form-group'))); ?>
<?php } else { ?>
	<?php  echo $this->Form->input("username", array("readonly" => "readonly", "class"=> "form-control", "placeholder" => "username","label"=> false,'div'=>array('class' => 'form-group'))); ?>
<?php } ?>			
      					</div>
                    </div>
                     
	                    <div class="col-md-6">
	                        <div class="form-group">
	    		<label>Company</label> 
					<?php echo $this->Form->input('company_id', array('class' => 'form-control', 'label' => false,'div'=>array('class' => 'form-group'))); ?>				 
			</div>
	                    </div>	 
                     
                </div> 
          
			<!--/row-->
			<h3 class="form-section">Account Detail</h3>

			<div class="row">
				<div class="col-md-6">
				<label class="control-label">Full Name</label>
						<?php  echo $this->Form->input("name", array("class"=> "form-control", "placeholder" => "Full Name","label"=> false, 'div' => array('class' => 'form-group'))); ?>
				</div>
				<!--/span-->
				<div class="col-md-6">
						<?php  echo $this->Form->input("email", array("class"=> "form-control", "placeholder" => "Email Address", "label"=> array('class'=>'control-label'), 'div' => array('class' => 'form-group'))); ?>
				</div>
				<!--/span-->
			</div>
			<!--/row-->

			<div class="row">
				<div class="col-md-6">
						<?php  echo $this->Form->input("mobile_number", array("class"=> "form-control", "placeholder" => "Mobile Phone","label"=> array('class'=>'control-label'), 'div' => array('class' => 'form-group'))); ?>
				</div>
				<!--/span-->
				 
	                <div class="col-md-6">
	                	<div class="form-group">
	                    	 <label class="control-label">Group</label>
	                       <?php  echo $this->Form->input("group_id", array("class"=> "form-control select2me", "empty" => "-Select Group-","label"=> false, 'div' => array('class' => 'form-group'))); ?>	
	                     </div> 
	                </div>  
	            	 
			</div>

			
 
       

		  	<div class="row">
				 
				<div class="col-xs-12">
				<div class="form-group">
	       		<?php echo $this->Form->button('Update Profile',array('class'=>'btn btn-warning')); ?>
		    </div>
		    </div>
			</div>
            

	        
	        <?php echo $this->Form->end(); ?>
 
 

 
 
 




      </div>
    </div>
  </div> 
</div>