
            <?php echo $this->Form->create('User', array('class'=> 'form-horizontal', 'novalidate'=>true)); 
				echo $this->Form->input('id'); 
			?>      

		  	<div class="row">
 
				
				<div class="col-md-12">
						<div id="cityDiv">
						<?php  echo $this->Form->input("name", array("disabled" => true, "class"=> "form-control", "placeholder" => "Full Name","label"=> array('class'=>'control-label'), 'div' => array('class' => 'form-group'))); 
						echo $this->Form->input('username', array('type' => 'hidden')); 
						?>						
						</div>
				</div>


				<div class="col-md-6">
					<div id="stateDiv" >
						<?php  echo $this->Form->input("password", array("value" => "", "class"=> "form-control","placeholder" => "Password","label"=> array('class'=>'control-label'), 'div' => array('class' => 'form-group'))); ?>						
					</div>
				</div>
				
				<div class="col-md-6">
						<div id="cityDiv">
						<?php  echo $this->Form->input("confirm_password", array("class"=> "form-control", 'type'=>'password',"placeholder" => "Confirm Password","label"=> array('class'=>'control-label'), 'div' => array('class' => 'form-group'))); ?>						
						</div>
				</div>
				<div class="col-xs-12">
				<div class="form-group">
	       		<?php echo $this->Form->submit('Change Password',array('class'=>'btn btn-danger')); ?>
		    </div>
		    </div>
			</div>
          <?php echo $this->Form->end(); ?>
 
 



