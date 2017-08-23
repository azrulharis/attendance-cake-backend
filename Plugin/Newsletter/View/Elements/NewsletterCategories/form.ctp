<div class="portlet-body form">
	<!-- BEGIN FORM-->
	
	  <?php echo $this->Form->create('NewsletterCategory',array('type' => 'file','novalidate'=>true)); 
	  echo $this->Form->hidden('id');
	  ?>
		<div class="form-body">			
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label class="control-label">Title</label>
						<?php echo $this->Form->input('NewsletterCategory.title', array('class' => 'form-control','placeholder'=>'Title','label' => false)); ?> 
						
					</div>
				</div>
			</div>
			<div class="row">
                <div class="col-md-12">
					<div class="form-group">
						<label class="control-label">Slug</label>
					<?php echo $this->Form->input('NewsletterCategory.slug', array('class' => 'form-control','label' => false)); ?>
						<span class="help-block">
						This field has error. </span>
					</div>
				</div>
			</div>		
			
           <div class="row"> 
            	 <div class="col-md-12">
					<div class="form-group">
						<label class="control-label">Description</label>
						<?php echo $this->Form->input('description', array('class' => 'form-control','label' => false)); ?> 
						<span class="help-block">
						This is inline help </span>
					</div>
				</div>
				<!--/span-->
				  
               
				<!--/span-->
		
            </div>
           
		
           
		</div>
		<div class="form-actions right">
			<!--	<button type="button" class="btn default">Cancel</button>
		<button type="submit" class="btn blue"><i class="fa fa-check"></i> Save</button>-->
		
	<?php echo $this->Form->button('Save NewsletterCategory', array('class' => 'btn blue','title' => 'Click here to add the EmailTemplate'),array('escape'=>false) );?>	
			
		</div>
	<?php echo $this->Form->end(); ?>
	<!-- END FORM-->
</div>
		