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
               <?php echo $action; ?> Faq</div>
                <div style="clear:both"></div>
       </div>
	  <?php echo $this->Form->create('Faq',array('class'=>'horizontal-form','novalidate'=>true)); 
	    echo $this->Form->hidden('Faq.id'); 
	  ?>
       <div class="form-art">
            <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <label class="control-label">Faq Category</label>
                 <?php echo $this->Form->input('faq_category_id', array('class'=>'form-control','empty'=>'Select Category','label' => false)); ?>
                 </div>
            </div>
            <!--/span-->
            <div class="col-md-6">
                <div class="form-group">
						<label class="control-label">Question</label>
						<?php echo $this->Form->input('Faq.question', array('class'=>'form-control','label' => false)); ?>
                </div>
            </div>
            </div>
            <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <label class="control-label">Answer</label>
                 <?php echo $this->Form->input('Faq.answer', array('class'=>'form-control','label' => false)); ?>
                 </div>
            </div>
            <!--/span-->
            <div class="col-md-6">
                <div class="form-group">
						<label class="control-label">Status</label>
						<?php echo $this->Form->input('Faq.status', array('label' => false)); ?>
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