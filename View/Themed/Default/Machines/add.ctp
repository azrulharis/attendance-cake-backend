<?php echo $this->Html->link('Machine List', array('action' => 'index'), array('class' => 'btn btn-primary', 'escape' => false)); ?> 
<div class="row"> 
  <div class="col-xs-12">
    <div class="x_panel tile">
      <div class="x_title">
        <h2><?php echo __('Add Machine'); ?></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content"> 
       <?php echo $this->Session->flash(); ?>
<div class="machines form">
<?php echo $this->Form->create('Machine', array('class' => 'form-horizontal form-label-left', 'id' => 'form')); ?>
 
			<div class="form-group">
	    		<label class="col-sm-3">machine_category_id</label>
	    		<div class="col-sm-9">
					<?php echo $this->Form->input('machine_category_id', array('class' => 'form-control', 'label' => false)); ?>				</div>
			</div>
						<div class="form-group">
	    		<label class="col-sm-3">name</label>
	    		<div class="col-sm-9">
					<?php echo $this->Form->input('name', array('class' => 'form-control', 'label' => false)); ?>				</div>
			</div>
						<div class="form-group">
	    		<label class="col-sm-3">cost</label>
	    		<div class="col-sm-9">
					<?php echo $this->Form->input('cost', array('class' => 'form-control', 'label' => false)); ?>				</div>
			</div>
						<div class="form-group">
	    		<label class="col-sm-3">source</label>
	    		<div class="col-sm-9">
					<?php echo $this->Form->input('source', array('class' => 'form-control', 'label' => false)); ?>				</div>
			</div>
						<div class="form-group">
	    		<label class="col-sm-3">worker_id</label>
	    		<div class="col-sm-9">
					<?php echo $this->Form->input('worker_id', array('class' => 'form-control', 'label' => false)); ?>				</div>
			</div>
						<div class="form-group">
	    		<label class="col-sm-3">code</label>
	    		<div class="col-sm-9">
					<?php echo $this->Form->input('code', array('class' => 'form-control', 'label' => false)); ?>				</div>
			</div>
						<div class="form-group">
	    		<label class="col-sm-3">note</label>
	    		<div class="col-sm-9">
					<?php echo $this->Form->input('note', array('class' => 'form-control', 'label' => false)); ?>				</div>
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