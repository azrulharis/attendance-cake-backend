<div class="row">
<div class="col-md-12">
                  <div class="form">
                       <div class="form-head">
                               <div class="form-head-lt"><i class="icon-users"></i>Group Detail</div>
                                <div style="clear:both"></div>
                       </div>
                       <?php echo $this->Form->create("Group", array("class"=> "horizontal-form",'novalidate'=>true)); 
						echo $this->Form->hidden('id');
						?>
                       <div class="form-art">
                            <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                     <?php  echo $this->Form->input("name", array("class"=> "form-control", "label"=> array('class'=>'control-label',
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
             </div>
</div>