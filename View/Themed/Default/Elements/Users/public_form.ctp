
<?php echo $this->Form->create('User', array('class'=> 'form-signin login-form','type'=>'file','novalidate'=>true)); ?>
<div class="form-art">
<?php if($this->action == 'add') { ?> 
<p>Already register? <?php echo $this->Html->link('Login Here', array('controller' => 'users', 'action' => 'login'), array('escape' => false)); ?></p>
<?php } ?>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label class="control-label">Username (Letter &amp; number without space)</label>
<?php  echo $this->Form->input("username", array("class"=> "form-control", "placeholder" => "username","label"=> false,'div'=>array('class' => 'form-group'))); ?>			</div>
    </div>
    <!--/span-->
    <div class="col-md-12" style="display: none;">
    		 <label class="control-label">Group</label>
            <?php  echo $this->Form->input("group_id", array("value" => 3, "type" => "text")); ?>
    </div>
    <!--/span-->
</div> 
			<!--/row-->
			<h3 class="form-section">Account Detail</h3>

			<div class="row">
				<div class="col-md-12">
				<label class="control-label">Full Name</label>
						<?php  echo $this->Form->input("name", array("class"=> "form-control", "placeholder" => "Full Name","label"=> false)); ?>
				</div>
				<!--/span-->
				<div class="col-md-12" style="display: none;">
						<?php  echo $this->Form->input("lastname", array("value" => "Na")); ?>
				</div>
				<!--/span-->
			</div>
			<!--/row-->

			<div class="row">
				<div class="col-md-12">
					<?php  echo $this->Form->input("mobile_number", array("class"=> "form-control", "placeholder" => "0123456789")); ?>
				</div>
				<!--/span-->
				<div class="col-md-12">
						<?php  echo $this->Form->input("email", array("class"=> "form-control", "placeholder" => "youremail@example.com","label"=> array('class'=>'control-label'), 'div' => array('class' => 'form-group'))); ?>
						<?php  echo $this->Form->input("gender", array('type' => 'hidden', 'value' => 0)); ?>
				</div>
				 
			</div>
			 
            
			<div class="row" style="display: none;">
				<div class="col-md-12">
                	<div class="form-group">
                        <label class="control-label">DOB</label> 
                            <div class='sandbox-container' >
                                <?php echo $this->Form->input('dob', array('type'=> 'text', 'value' => '1980-10-16 11:11:11')); ?>
                            </div> 
                     </div>
                </div>
				<!--/span-->

				<div class="col-md-12 Country">
				    <?php echo $this->Form->input("country_id", array('type'=> 'text', 'value' => 1)); ?>	 
				</div>
				<!--/span-->
			</div>
			<!--/row-->
 
			<div class="row" style="display: none;">
				<div class="col-md-12">
					<div id="stateDiv" class="State">
						<?php echo $this->Form->input("state_id", array('type'=> 'text', 'value' => 38)); ?>	 				
					</div>
				</div>
				
				<div class="col-md-12">
					<div id="cityDiv">
					<?php  echo $this->Form->input("city_id", array('type'=> 'text', 'value' => 16940)); ?>				
					</div>
				</div>
			</div> 

			
            <div class="row">
                <div class="col-md-12">
                	<div class="form-group">
                    	 <label class="control-label">Group</label>
                       <?php  echo $this->Form->input("group_id", array("class"=> "form-control select2me", "empty" => "-Select Group-","label"=> false)); ?>	
                     </div> 
                </div>  
                <?php
            if($this->action == 'admin_add' || $this->action == 'admin_edit')
            {
            ?>
				<div class="col-md-12">
                	<div class="form-group">
                        <label class="control-label">Designation</label>  
                        <?php $type = array('N/A' => 'N/A', 'HOS' => 'HOS', 'HOD' => 'HOD', 'MD' => 'MD'); ?>
                        <?php echo $this->Form->input('role', array('options'=> $type, 'class' => 'form-control', 'label' => false)); ?> 
                     </div>
                </div> 
                <?php
            } 
            ?>
			</div>

            

			<!--/row--> 
			<div class="row"> 
					<?php  echo $this->Form->input("about_us", array("class"=> "form-control", "type" => "hidden")); ?>		 
 
				<div class="col-md-12">
					<div class="form-group">
                    <label class="control-label">Password</label>
						<?php  echo $this->Form->input("password", array("class"=> "form-control","placeholder" => "Password","label"=> false)); ?>						
					</div>
				</div>
				
				<div class="col-md-12">
					<div class="form-group">
                    <label class="control-label">Confirm Password</label>
					<?php  echo $this->Form->input("confirm_password", array("class"=> "form-control", 'type' => 'password',"placeholder" => "Confirm Password", "label" => false)); ?>						
					</div>
				</div>

				
			</div>
 
            <?php
            if($this->action == 'admin_add' || $this->action == 'admin_internaladd')
            {
            ?>
           
            <?php
            } 
            ?> 
            <?php echo $this->Form->input("status", array('type'=> 'hidden', 'value'=>1, 'hiddenField' => true)); ?>	
               
			<!--/row-->
			 
           </div>
<div class="form-foot">
	<?php echo $this->Form->button('Register',array('class'=>'btn btn-success')); ?>

</div>
<?php echo $this->Form->end(); ?>
                  