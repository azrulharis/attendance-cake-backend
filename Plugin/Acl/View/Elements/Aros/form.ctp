<div class="form">
                       <div class="form-head">
                               <div class="form-head-lt"><i class="fa fa-star"></i>Action Detail</div>
                                <div style="clear:both"></div>
                       </div>
                       <?php echo $this->Form->create("Aco", array("class"=> "horizontal-form")); 
						echo $this->Form->hidden('Aco.id');
						?>
                       <div class="form-art">
                       	
                            <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                     <?php  echo $this->Form->input("Aco.parent_id", array("class"=> "form-control",'empty'=>'None', "label"=> array('class'=>'control-label',
                                     'text'=>'Name'),'div' => array('class' => 'form-group'))); ?>
                                 </div>
                            </div>
                            <!--/span-->
							<div class="col-md-6">
                                <div class="form-group">
                                     <?php  echo $this->Form->input("Aco.alias", array("class"=> "form-control", "label"=> array('class'=>'control-label',
                                     'text'=>'Name'),'div' => array('class' => 'form-group'))); ?>
                                 </div>
                            </div>
                            <!--/span-->
                            </div>
                       </div>
                       <div class="form-foot">
                       		<?php echo $this->Form->button('Save',array('class'=>'btn default')); ?>
					   </div>
                       <?php echo $this->Form->end(); ?>
                   </div>