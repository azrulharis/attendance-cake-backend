<!-- BEGIN PAGE HEADER-->
<h1 class="page-header">
Add Configuration
</h1>
   <div style="margin-bottom:15px;margin-top:10px;" class="btn-group btn-breadcrumb" id="bc1">
    <?php echo $this->Html->link('<i class="fa fa-home"></i>', array('plugin' => false, 'controller' => 'users','action' => 'dashboard'),array('style'=>'background:#000000;','escape'=>false,'class'=>'btn btn-default')); ?>
     <?php echo $this->Html->link(__('Configuration'), array('plugin' => 'configuration', 'controller' => 'configurations','action' => 'index'),array('escape'=>false,'class'=>'btn btn-default')); ?>
    <a class="btn btn-default active" href="javascript::void();" style="display: block;"><div>Add</div></a> 
    <a class="" href="#"><div></div></a> 
 </div>

<!-- END PAGE HEADER-->

<!-- page start--->
<div class="row">
	<div class="col-md-12" >
		
		<?php  echo $this->element('Configurations/form');?>
	</div>
</div>
<!-- page end---->

