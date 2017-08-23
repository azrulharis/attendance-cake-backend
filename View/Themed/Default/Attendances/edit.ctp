
<div class="row"> 
  <div class="col-xs-12">
    <div class="x_panel tile">
      <div class="x_title">
        <h2><?php echo __('Edit Attendance'); ?></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content"> 
        <?php echo $this->Session->flash(); ?>
<div class="attendances form">
<?php echo $this->Form->create('Attendance'); ?>
 
			<div class="form-group">
	    		<label class="col-sm-3">id</label>
	    		<div class="col-sm-9">
					<?php echo $this->Form->input('id', array('class' => 'form-control', 'label' => false)); ?>				</div>
			</div>
						<div class="form-group">
	    		<label class="col-sm-3">user_id</label>
	    		<div class="col-sm-9">
					<?php echo $this->Form->input('user_id', array('class' => 'form-control', 'label' => false)); ?>				</div>
			</div>
						<div class="form-group">
	    		<label class="col-sm-3">project_id</label>
	    		<div class="col-sm-9">
					<?php echo $this->Form->input('project_id', array('class' => 'form-control', 'label' => false)); ?>				</div>
			</div>
						<div class="form-group">
	    		<label class="col-sm-3">company_id</label>
	    		<div class="col-sm-9">
					<?php echo $this->Form->input('company_id', array('class' => 'form-control', 'label' => false)); ?>				</div>
			</div>
						<div class="form-group">
	    		<label class="col-sm-3">project_group_id</label>
	    		<div class="col-sm-9">
					<?php echo $this->Form->input('project_group_id', array('class' => 'form-control', 'label' => false)); ?>				</div>
			</div>
						<div class="form-group">
	    		<label class="col-sm-3">time_in</label>
	    		<div class="col-sm-9">
					<?php echo $this->Form->input('time_in', array('class' => 'form-control', 'label' => false)); ?>				</div>
			</div>
						<div class="form-group">
	    		<label class="col-sm-3">time_out</label>
	    		<div class="col-sm-9">
					<?php echo $this->Form->input('time_out', array('class' => 'form-control', 'label' => false)); ?>				</div>
			</div>
						<div class="form-group">
	    		<label class="col-sm-3">photo</label>
	    		<div class="col-sm-9">
					<?php echo $this->Form->input('photo', array('class' => 'form-control', 'label' => false)); ?>				</div>
			</div>
						<div class="form-group">
	    		<label class="col-sm-3">dir</label>
	    		<div class="col-sm-9">
					<?php echo $this->Form->input('dir', array('class' => 'form-control', 'label' => false)); ?>				</div>
			</div>
						<div class="form-group">
	    		<label class="col-sm-3">gps</label>
	    		<div class="col-sm-9">
					<?php echo $this->Form->input('gps', array('class' => 'form-control', 'label' => false)); ?>				</div>
			</div>
						<div class="form-group">
	    		<label class="col-sm-3">remark</label>
	    		<div class="col-sm-9">
					<?php echo $this->Form->input('remark', array('class' => 'form-control', 'label' => false)); ?>				</div>
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