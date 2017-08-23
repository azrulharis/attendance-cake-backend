
<div class="row"> 
  <div class="col-xs-12">
    <div class="x_panel tile">
      <div class="x_title">
        <h2><?php echo __('Edit Ot Request'); ?></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content"> 
        <?php echo $this->Session->flash(); ?>
<div class="otRequests form">
<?php echo $this->Form->create('OtRequest', array('class' => 'form-horizontal form-label-left', 'id' => 'form')); ?>
 
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
	    		<label class="col-sm-3">project_manager</label>
	    		<div class="col-sm-9">
					<?php echo $this->Form->input('project_manager', array('class' => 'form-control', 'label' => false)); ?>				</div>
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
	    		<label class="col-sm-3">attendance_id</label>
	    		<div class="col-sm-9">
					<?php echo $this->Form->input('attendance_id', array('class' => 'form-control', 'label' => false)); ?>				</div>
			</div>
						<div class="form-group">
	    		<label class="col-sm-3">ot_from</label>
	    		<div class="col-sm-9">
					<?php echo $this->Form->input('ot_from', array('type' => 'text', 'class' => 'form-control', 'label' => false)); ?>				</div>
			</div>
						<div class="form-group">
	    		<label class="col-sm-3">ot_to</label>
	    		<div class="col-sm-9">
					<?php echo $this->Form->input('ot_to', array('type' => 'text', 'class' => 'form-control', 'label' => false)); ?>				</div>
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
	    		<label class="col-sm-3">sv_remark</label>
	    		<div class="col-sm-9">
					<?php echo $this->Form->input('sv_remark', array('class' => 'form-control', 'label' => false)); ?>				</div>
			</div>
						<div class="form-group">
	    		<label class="col-sm-3">pm_remark</label>
	    		<div class="col-sm-9">
					<?php echo $this->Form->input('pm_remark', array('class' => 'form-control', 'label' => false)); ?>				</div>
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