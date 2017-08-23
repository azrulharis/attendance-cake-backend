<?php echo $this->Html->link(__('My Feedback'), array('action' => 'index'), array('class' => 'btn btn-primary btn-sm')); ?> 
<div class="row"> 
  <div class="col-xs-12"> 
    <div class="x_panel tile">
      <div class="x_title">
        <h2>User Feedback</h2> 
        <div class="clearfix"></div>
      </div>
      <div class="x_content"> 
        <?php echo $this->Session->flash(); ?>  
		<div class="userFeedbacks form">
		<?php echo $this->Form->create('UserFeedback', array('class' => 'form-horizontal', 'type' => 'file')); ?> 
			<div class="form-group">
				<label class="col-sm-3">Subject <span class="red">*</span></label>
				<div class="col-sm-9">
				<?php echo $this->Form->input('name', array('class' => 'form-control', 'label' => false)); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3">Category <span class="red">*</span></label>
				<div class="col-sm-9">
				<?php $category = array(
					'Additional Request' => 'Additional Request',
					'User ' => 'Additional Request',
					);
				?>
				<?php echo $this->Form->input('category', array('class' => 'form-control', 'label' => false)); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3">Description <span class="red">*</span></label>
				<div class="col-sm-9">
				<?php echo $this->Form->input('body', array('class' => 'form-control', 'label' => false)); ?>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3">Attachment (Optional)</label>
				<div class="col-sm-9">
				<?php echo $this->Form->input('file', array('type' => 'file', 'class' => 'form-control', 'label' => false, 'required' => false)); ?>
				<?php echo $this->Form->input('dir', array('type' => 'hidden')); ?> 
				</div>
			</div>
			 <div class="form-group">
				<label class="col-sm-3">&nbsp;</label>
				<div class="col-sm-9">   
					<?php echo $this->Form->button('Save', array('class' => 'btn btn-success pull-right')); ?>
				</div>
			</div>

			<?php echo $this->Form->end(); ?>
		</div>
		 
		</div>
	</div>
  </div>
</div>