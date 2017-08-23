
<div class="row"> 
  <div class="col-xs-12">
    <div class="x_panel tile">
      <div class="x_title">
        <h2><?php echo __('Add Attendance Worker'); ?></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content"> 
        <?php echo $this->Session->flash(); ?>
<div class="attendanceWorkers form">
<?php echo $this->Form->create('AttendanceWorker'); ?>
 
			<div class="form-group">
	    		<label class="col-sm-3">attendance_id</label>
	    		<div class="col-sm-9">
					<?php echo $this->Form->input('attendance_id', array('class' => 'form-control', 'label' => false)); ?>				</div>
			</div>
						<div class="form-group">
	    		<label class="col-sm-3">worker_id</label>
	    		<div class="col-sm-9">
					<?php echo $this->Form->input('worker_id', array('class' => 'form-control', 'label' => false)); ?>				</div>
			</div>
						<div class="form-group">
	    		<label class="col-sm-3">in</label>
	    		<div class="col-sm-9">
					<?php echo $this->Form->input('in', array('class' => 'form-control', 'label' => false)); ?>				</div>
			</div>
						<div class="form-group">
	    		<label class="col-sm-3">out</label>
	    		<div class="col-sm-9">
					<?php echo $this->Form->input('out', array('class' => 'form-control', 'label' => false)); ?>				</div>
			</div>
						<div class="form-group">
	    		<label class="col-sm-3">total_hours</label>
	    		<div class="col-sm-9">
					<?php echo $this->Form->input('total_hours', array('class' => 'form-control', 'label' => false)); ?>				</div>
			</div>
						<div class="form-group">
	    		<label class="col-sm-3">adjusted_time</label>
	    		<div class="col-sm-9">
					<?php echo $this->Form->input('adjusted_time', array('class' => 'form-control', 'label' => false)); ?>				</div>
			</div>
						<div class="form-group">
	    		<label class="col-sm-3">remark</label>
	    		<div class="col-sm-9">
					<?php echo $this->Form->input('remark', array('class' => 'form-control', 'label' => false)); ?>				</div>
			</div>
						<div class="form-group">
	    		<label class="col-sm-3">working_location</label>
	    		<div class="col-sm-9">
					<?php echo $this->Form->input('working_location', array('class' => 'form-control', 'label' => false)); ?>				</div>
			</div>
						<div class="form-group">
	    		<label class="col-sm-3">ot</label>
	    		<div class="col-sm-9">
					<?php echo $this->Form->input('ot', array('class' => 'form-control', 'label' => false)); ?>				</div>
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