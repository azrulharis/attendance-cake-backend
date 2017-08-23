<div class="row">
<div class="col-md-12">
                  <div class="form">
                       <div class="form-head">
                               <div class="form-head-lt"><i class="fa fa-question-circle"></i>
							   <?php if($this->action=='admin_edit'){
							   		$action ='Edit';
							   }
							   else
							   {
							   		$action = 'Add';
							   }
							   ?>
							   <?php echo $action; ?> FaqCategory</div>
                                <div style="clear:both"></div>
                       </div>
                         <?php echo $this->Form->create('FaqCategory',array('class'=>'horizontal-form','novalidate'=>true)); 
	  					  echo $this->Form->hidden('FaqCategory.id');
	  					 ?>
                       <div class="form-art">
                            <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
									<label class="control-label">Title</label>
									<?php echo $this->Form->input('FaqCategory.title',array('class' => 'form-control','label' => false)); ?>
                                </div>
                            </div>
                            <!--/span-->
							<div class="col-md-6">
                                <div class="form-group">
										<label class="control-label">Status</label>
										<?php echo $this->Form->input('FaqCategory.status',array('label' => false)); ?>
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