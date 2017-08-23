
<div class="row"> 
  <div class="col-xs-12">
    <div class="x_panel tile">
      <div class="x_title">
        <h2><?php echo __('Add Notification'); ?></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content"> 
        <?php echo ->flash(); ?>
<div class="notifications form">
<?php echo $this->Form->create('Notification'); ?>
 
			<div class="form-group">
	    		<label class="col-sm-3">user_id</label>
	    		<div class="col-sm-9">
					<?php echo $this->Form->input('user_id', array('class' => 'form-control', 'label' => false)); ?>				</div>
			</div>
						<div class="form-group">
	    		<label class="col-sm-3">body</label>
	    		<div class="col-sm-9">
					<?php echo $this->Form->input('body', array('class' => 'form-control', 'label' => false)); ?>				</div>
			</div>
						<div class="form-group">
	    		<label class="col-sm-3">status</label>
	    		<div class="col-sm-9">
					<?php echo $this->Form->input('status', array('class' => 'form-control', 'label' => false)); ?>				</div>
			</div>
						<div class="form-group">
	    		<label class="col-sm-3">type</label>
	    		<div class="col-sm-9">
					<?php echo $this->Form->input('type', array('class' => 'form-control', 'label' => false)); ?>				</div>
			</div>
						<div class="form-group">
	    		<label class="col-sm-3">link</label>
	    		<div class="col-sm-9">
					<?php echo $this->Form->input('link', array('class' => 'form-control', 'label' => false)); ?>				</div>
			</div>
			 

			<div class="form-group">
				<label class="col-sm-3">&nbsp;</label>
				<div class="col-sm-9">
					<?php echo $this->Form->button('Submit', array('class' => 'btn btn-success pull-right')); ?>				</div>
			</div>

<?php echo $this->Form->end(); ?>
</div>
 
</div>
</div>
</div>
</div>