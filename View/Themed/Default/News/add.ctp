<?php echo $this->Html->link(__('News List'), array('action' => 'index'), array('class' => 'btn btn-default')); ?>
<div class="row"> 
  <div class="col-xs-12">
    <div class="x_panel tile">
      <div class="x_title">
        <h2>Add Company News</h2> 
        <div class="clearfix"></div>
      </div>
      <div class="x_content"> 
        <?php echo $this->Session->flash(); ?>

<div class="news form">
<?php echo $this->Form->create('News', array('class' => 'form-horizontal')); ?>
	
	<div class="form-group"> 
	<label class="col-xs-3">Title</label>
	<div class="col-xs-9">
	<?php echo $this->Form->input('title', array('class' => 'form-control', 'label' => false, 'placeholder' => 'News title...')); ?>
	</div>
	</div>
	<div class="form-group"> 
	<label class="col-xs-3">Content</label>
	<div class="col-xs-9">
	<?php echo $this->Form->input('body', array('type' => 'textarea', 'class' => 'form-control', 'label' => false, 'placeholder' => 'News content...')); ?>
	</div>
	</div>
	<div class="form-group"> 
	<label class="col-xs-3">Status</label>
	<div class="col-xs-9">
	<?php 
	$status = array(0 => 'Draft', 1 => 'Publish');
	echo $this->Form->input('status', array('options' => $status, 'class' => 'form-control', 'label' => false, 'empty' => '-Select Status-')); ?>
	</div>
	</div>
	<div class="form-group"> 
    	<?php echo $this->Form->submit('Save', array('div' => false, 'class' => 'btn btn-success')); ?> 
    </div>	  
	<?php $this->Form->end(); ?>
</div>
 
</div>
</div>
</div>
</div>