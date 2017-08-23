
<div class="row"> 
  <div class="col-xs-12">
    <div class="x_panel tile">
      <div class="x_title">
        <h2><?php echo __('Edit Project Worker Transfer'); ?></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content"> 
        <?php echo ->flash(); ?>
<div class="projectWorkerTransfers form">
<?php echo $this->Form->create('ProjectWorkerTransfer'); ?>
 
			<div class="form-group">
	    		<label class="col-sm-3">id</label>
	    		<div class="col-sm-9">
					<?php echo $this->Form->input('id', array('class' => 'form-control', 'label' => false)); ?>				</div>
			</div>
						<div class="form-group">
	    		<label class="col-sm-3">from_project</label>
	    		<div class="col-sm-9">
					<?php echo $this->Form->input('from_project', array('class' => 'form-control', 'label' => false)); ?>				</div>
			</div>
						<div class="form-group">
	    		<label class="col-sm-3">project_id</label>
	    		<div class="col-sm-9">
					<?php echo $this->Form->input('project_id', array('class' => 'form-control', 'label' => false)); ?>				</div>
			</div>
						<div class="form-group">
	    		<label class="col-sm-3">from_group</label>
	    		<div class="col-sm-9">
					<?php echo $this->Form->input('from_group', array('class' => 'form-control', 'label' => false)); ?>				</div>
			</div>
						<div class="form-group">
	    		<label class="col-sm-3">project_group_id</label>
	    		<div class="col-sm-9">
					<?php echo $this->Form->input('project_group_id', array('class' => 'form-control', 'label' => false)); ?>				</div>
			</div>
						<div class="form-group">
	    		<label class="col-sm-3">project_worker_id</label>
	    		<div class="col-sm-9">
					<?php echo $this->Form->input('project_worker_id', array('class' => 'form-control', 'label' => false)); ?>				</div>
			</div>
						<div class="form-group">
	    		<label class="col-sm-3">worker_id</label>
	    		<div class="col-sm-9">
					<?php echo $this->Form->input('worker_id', array('class' => 'form-control', 'label' => false)); ?>				</div>
			</div>
						<div class="form-group">
	    		<label class="col-sm-3">user_id</label>
	    		<div class="col-sm-9">
					<?php echo $this->Form->input('user_id', array('class' => 'form-control', 'label' => false)); ?>				</div>
			</div>
						<div class="form-group">
	    		<label class="col-sm-3">received_by</label>
	    		<div class="col-sm-9">
					<?php echo $this->Form->input('received_by', array('class' => 'form-control', 'label' => false)); ?>				</div>
			</div>
						<div class="form-group">
	    		<label class="col-sm-3">type</label>
	    		<div class="col-sm-9">
					<?php echo $this->Form->input('type', array('class' => 'form-control', 'label' => false)); ?>				</div>
			</div>
						<div class="form-group">
	    		<label class="col-sm-3">status</label>
	    		<div class="col-sm-9">
					<?php echo $this->Form->input('status', array('class' => 'form-control', 'label' => false)); ?>				</div>
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