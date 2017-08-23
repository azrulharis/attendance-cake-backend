<div class="row">
    <div class="col-md-12">
          <div class="form">
               <div class="form-head">
                       <div class="form-head-lt"><i class="fa fa-location-arrow"></i>Country Detail</div>
                        <div style="clear:both"></div>
               </div>
               	<?php echo $this->Form->create('Country', array('class'=>'horizontal-form','novalidate'=>true)); 
				echo $this->Form->hidden('id');
				?>
               <div class="form-art">
                
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                    <?php  echo $this->Form->input("name", array("class"=> "form-control", "placeholder" => "Name","label"=> array('class'=>'control-label'), 'div' => array('class' => 'form-group'))); ?>
                         </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                        <label class="control-label">Status</label>
                            <?php  echo $this->Form->input("status", array('label'=> false,'div'=>array('class' => 'form-group'),'hiddenField' => false)); ?>	
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