
<div class="row"> 
  <div class="col-xs-12">
    <div class="x_panel tile">
      <div class="x_title">
        <h2><?php echo __('Add Worker'); ?></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content"> 
        <?php echo $this->Session->flash(); ?>
<div class="workers form">
<?php echo $this->Form->create('Worker', array('class' => 'form-horizontal form-label-left', 'id' => 'form')); ?>
 
			<div class="form-group">
	    		<label class="col-sm-3">company_id</label>
	    		<div class="col-sm-9">
					<?php echo $this->Form->input('company_id', array('class' => 'form-control', 'label' => false)); ?>				</div>
			</div>
						<div class="form-group">
	    		<label class="col-sm-3">name</label>
	    		<div class="col-sm-9">
					<?php echo $this->Form->input('name', array('class' => 'form-control', 'label' => false)); ?>				</div>
			</div>
						<div class="form-group">
	    		<label class="col-sm-3">code</label>
	    		<div class="col-sm-9">
					<?php echo $this->Form->input('code', array('class' => 'form-control', 'label' => false)); ?>				</div>
			</div>
						<div class="form-group">
	    		<label class="col-sm-3">phone</label>
	    		<div class="col-sm-9">
					<?php echo $this->Form->input('phone', array('class' => 'form-control', 'label' => false)); ?>				</div>
			</div>
						<div class="form-group">
	    		<label class="col-sm-3">cost</label>
	    		<div class="col-sm-9">
					<?php echo $this->Form->input('cost', array('class' => 'form-control', 'label' => false)); ?>				</div>
			</div>
						<div class="form-group">
	    		<label class="col-sm-3">type</label>
	    		<div class="col-sm-9">
					<?php echo $this->Form->input('type', array('class' => 'form-control', 'label' => false)); ?>				</div>
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