<div class="row">
<div class="col-md-12">
                  <div class="form">
                       <div class="form-head">
                               <div class="form-head-lt"><i class="icon-user"></i>Login Info</div>
                                <div style="clear:both"></div>
                       </div>
                        <?php echo $this->Form->create('User', array('class'=> 'horizontal-form','type'=>'file','novalidate'=>true)); 
							echo $this->Form->hidden('id');
						?>
                       <div class="form-art">
                      
							<?php
                            if($this->action == 'admin_edit')
                            {
                            ?>
                            <div class="row">
                                <div class="col-md-6">
                                	<div class="form-group">
                                    	 <label class="control-label">Username</label>
                                        <?php  echo '<div style="font-size:18px;font-style:italic;margin: 5px 0;">'.$this->request->data['User']['username'].'</div>'; 
                                        ?>	
                                     </div>
                                   
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                		 <label class="control-label">Group</label>
                                        <?php echo '<div style="font-size:18px;font-style:italic;margin: 5px 0;">'.$this->request->data['Group']['name'].'</div>'; 
                                        ?>
                                </div>
                                <!--/span-->
                            </div>
                            <?php
                            }
                            else
                            {
                            ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Username</label>
                  <?php  echo $this->Form->input("username", array("class"=> "form-control", "placeholder" => "username","label"=> false,'div'=>array('class' => 'form-group'))); ?>			</div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                		 <label class="control-label">Group</label>
                                        <?php  echo $this->Form->input("group_id", array("class"=> "form-control", "empty" => "-Select One-","label"=> false, 'div' => array('class' => 'form-group'))); ?>
                                </div>
                                <!--/span-->
                            </div>
                            <?php
                            }
                            ?>
                       			
			
			<!--/row-->
			<h3 class="form-section">Account Detail</h3>

			<div class="row">
				<div class="col-md-6">
						<?php  echo $this->Form->input("firstname", array("class"=> "form-control", "placeholder" => "First Name","label"=> array('class'=>'control-label'), 'div' => array('class' => 'form-group'))); ?>
						<?php  echo $this->Form->input("lastname", array("value" => "NA", "type"=> "hidden")); ?>
				</div>
				<!--/span-->
				<div class="col-md-6">
						<?php  echo $this->Form->input("gender", array("options" => $gender, "class"=> "form-control select2me", "empty" => "-Select Gender-","label"=> array('class'=>'control-label'), 'div' => array('class' => 'form-group'))); ?>	
				</div>
				<!--/span-->
			</div>
			<!--/row-->

			<div class="row">
				<div class="col-md-6">
						<?php  echo $this->Form->input("mobile_number", array("class"=> "form-control", "placeholder" => "Mobile Number","label"=> array('class'=>'control-label'), 'div' => array('class' => 'form-group'))); ?>
				</div>
				<!--/span-->
				<div class="col-md-6">
						<?php  echo $this->Form->input("email", array("class"=> "form-control", "placeholder" => "Email Address","label"=> array('class'=>'control-label'), 'div' => array('class' => 'form-group'))); ?>
				</div>
				<!--/span-->
			</div>
			<!--/row-->												
			<?php
				if(isset($this->request->data['User']['dob']))
				{
					//$this->request->data['User']['dob'] = (!empty($this->request->data['User']['dob'])) ? '' : $this->request->data['User']['dob'];
				}
			?>
            
			 
			 
            <?php
			if($this->action == 'admin_add')
			{
			?>
			<!--/row-->	
			<div class="row">
				<div class="col-md-6">
					<div id="stateDiv" >
						<?php  echo $this->Form->input("password", array("class"=> "form-control","placeholder" => "Password","label"=> array('class'=>'control-label'), 'div' => array('class' => 'form-group'))); ?>						
					</div>
				</div>
				
				<div class="col-md-6">
						<div id="cityDiv">
						<?php  echo $this->Form->input("confirm_password", array("class"=> "form-control", 'type'=>'password',"placeholder" => "Confirm Password","label"=> array('class'=>'control-label'), 'div' => array('class' => 'form-group'))); ?>						
						</div>
				</div>
			</div>
			<!--/row-->
            <?php } ?>
			 
            
            <div class="row" style="display: none"> 
                <?php  echo $this->Form->input("status", array('value' => 1, 'label'=> false,'div'=>array('class' => 'form-group'),'hiddenField' => false)); ?>	 
            </div>
			<!--/row-->
			
		    </div>
               <div class="form-foot">
               		<?php echo $this->Form->button('Submit',array('class'=>'btn btn-success')); ?>
               		
			   </div>
               <?php echo $this->Form->end(); ?>
           </div>
     </div>
</div>