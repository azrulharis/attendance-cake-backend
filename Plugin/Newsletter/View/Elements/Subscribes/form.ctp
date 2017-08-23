<div class="row">
<div class="col-md-12">
                  <div class="form">
                       <div class="form-head">
                               <div class="form-head-lt"><i class="fa fa-group"></i>Subscriber Detail</div>
                                <div style="clear:both"></div>
                       </div>
                       <?php echo $this->Form->create("Subscribe", array("class"=> "horizontal-form",'novalidate'=>true)); 
						echo $this->Form->hidden('id');
						?>
                       <div class="form-art">
                       			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label">Name</label>
						 <?php echo $this->Form->input('Subscribe.name', array('class'=>'form-control','label'=>false)); ?> 						
					</div>
				</div>
                <div class="col-md-6">
					<div class="form-group">
						<label class="control-label">Email</label>
						<?php echo $this->Form->input('Subscribe.email', array('class'=>'form-control','label'=>false)); ?>
					</div>
				</div>
			</div>
								<div class="row"> 
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Phone</label>
											<?php echo $this->Form->input('Subscribe.phone', array('class'=>'form-control','label'=>false)); ?>
										</div>
									</div>
								</div>
								<div class="row"> 	
				  <div class="col-md-6">
                    <div class="form-group">
                    		<label class="control-label">Status</label>							
							<?php echo $this->Form->input('Subscribe.status', array('class' => 'form-control','type'=>'checkbox','class'=>'make-switch','data-on-text'=>'<i class="fa fa-check"></i>' ,'data-off-text'=>'<i class="fa fa-times"></i>','label'=>false));?>								
                    </div>					
                </div>		
				 <div class="col-md-6">
                    <div class="form-group">
                    		<label class="control-label">Unsubscribe</label>							
							<?php echo $this->Form->input('Subscribe.unsubscribe', array('class' => 'form-control','type'=>'checkbox','class'=>'make-switch','data-on-text'=>'<i class="fa fa-check"></i>' ,'data-off-text'=>'<i class="fa fa-times"></i>','label'=>false));?>								
                    </div>					
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