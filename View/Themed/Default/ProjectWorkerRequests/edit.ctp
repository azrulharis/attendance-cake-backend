
<div class="row"> 
  <div class="col-xs-12">
    <div class="x_panel tile">
      <div class="x_title">
        <h2><?php echo __('Edit Project Worker Request'); ?></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content"> 
       <?php echo $this->Session->flash(); ?>
<div class="projectWorkerRequests form">
<?php echo $this->Form->create('ProjectWorkerRequest'); ?>
 
			<div class="form-group">
	    		<label class="col-sm-3">id</label>
	    		<div class="col-sm-9">
					<?php echo $this->Form->input('id', array('class' => 'form-control', 'label' => false)); ?>				</div>
			</div>
						<div class="form-group">
	    		<label class="col-sm-3">project_id</label>
	    		<div class="col-sm-9">
					<?php echo $this->Form->input('project_id', array('class' => 'form-control', 'label' => false)); ?>				</div>
			</div>
						<div class="form-group">
	    		<label class="col-sm-3">project_group_id</label>
	    		<div class="col-sm-9">
					<?php echo $this->Form->input('project_group_id', array('class' => 'form-control', 'label' => false)); ?>				</div>
			</div>
						<div class="form-group">
	    		<label class="col-sm-3">user_id</label>
	    		<div class="col-sm-9">
					<?php echo $this->Form->input('user_id', array('class' => 'form-control', 'label' => false)); ?>				</div>
			</div>
						<div class="form-group">
	    		<label class="col-sm-3">status</label>
	    		<div class="col-sm-9">
					<?php echo $this->Form->input('status', array('class' => 'form-control', 'label' => false)); ?>				</div>
			</div>
						<div class="form-group">
	    		<label class="col-sm-3">from</label>
	    		<div class="col-sm-9">
					<?php echo $this->Form->input('from', array('class' => 'form-control', 'label' => false)); ?>				</div>
			</div>
						<div class="form-group">
	    		<label class="col-sm-3">to</label>
	    		<div class="col-sm-9">
					<?php echo $this->Form->input('to', array('class' => 'form-control', 'label' => false)); ?>				</div>
			</div>
						<div class="form-group">
	    		<label class="col-sm-3">note</label>
	    		<div class="col-sm-9">
					<?php echo $this->Form->input('note', array('class' => 'form-control', 'label' => false)); ?>				</div>
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