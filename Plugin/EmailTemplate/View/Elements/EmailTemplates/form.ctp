<style>
span.slug{display:none;}
input.form-control{ display:block !important;}
</style>
<div class="row">
<div class="col-md-12">
                  <div class="form">
                       <div class="form-head">
                           <div class="form-head-lt"><i class="fa fa-envelope-o"></i> Email Template</div>
                            <div style="clear:both"></div>
                       </div>
                      	<?php echo $this->Form->create('EmailTemplate',array('class'=>'horizontal-form','novalidate' => true)); 
						  echo $this->Form->hidden('id');
						  ?>
                       <div class="form-art">
                      
                            <div class="row">
                                <div class="col-md-6">
                                	<div class="form-group">
                                       <?php echo $this->Form->input('EmailTemplate.title', array('id'=>'title','class' => 'form-control','label' => array('class'=>'control-label'),'div'=>array('class'=>'form-group'))); ?> 	
                                     </div>
                                   
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                               		<?php 
										if($this->action == 'admin_edit')
										{
											echo 'Slug';
											echo '<div style="font-size:16px;font-style:italic;margin: 5px 0;">'.$this->data['EmailTemplate']['slug'].'</div>';
										
										}
										else
										{
										 echo $this->Form->input('EmailTemplate.slug', array('class' => 'slug form-control','id'=>'slug', 'placeholder'=>'slug','readonly' => 'readonly','div'=>array('class'=>'form-group'),'label' => array('class'=>'control-label')));
										}
									 ?> 
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                      
                            <div class="row">
                                <div class="col-md-6">
                                       <?php echo $this->Form->input('EmailTemplate.subject', array('class' => 'form-control','label' => array('class'=>'control-label'),'div'=>array('class'=>'form-group')));	?>  
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                       <?php echo $this->Form->input('EmailTemplate.description', array('class' => 'form-control','div'=>array('class'=>'form-group'),'label' => array('class'=>'control-label'),'rows' => 5));	?>  
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->

			<div class="row">
            	
            	<div class="col-md-6" style="overflow:auto;height:400px;">
                <label class="control-label">Placeholders</label>
				<?php 
							$configArray = Configure::read('Placeholder');
							foreach($configArray as $key => $configValue){
								echo "<b>".$key." Configuration</b><br>";
								foreach($configValue as $value){
								echo $value['placeholder'];
								echo ': '.$value['guideline'];
								echo "<br>";
								}
								echo "<br>";				
							}
							?>
                 </div>
				<div class="col-md-6">
						<?php echo $this->Form->input('EmailTemplate.content', array('class' => 'form-control ckeditor','div'=>array('class'=>'form-group'),'label' => array('class'=>'control-label'))); ?>
				</div>
				<!--/span-->
				
				<!--/span-->
			</div>
			<!--/row-->	
            <div class="row">
            	<div class="col-md-6">
					<?php echo $this->Form->input('EmailTemplate.status', array('div'=>false,'label' => array('class'=>'','text'=>'Status')));	?>
				</div>
            </div>											
			
          
                      	
                       </div>
                       <div class="form-foot">
                       		<?php echo $this->Form->button('Save',array('class'=>'btn default')); ?>
					   </div>
                       <?php echo $this->Form->end(); ?>
                   </div>
             </div>
</div>
		