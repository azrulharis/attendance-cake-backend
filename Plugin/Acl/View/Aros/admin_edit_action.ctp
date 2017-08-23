<!-- BEGIN PAGE HEADER-->
<h1 class="page-header"><?php echo __('Add Action'); ?></h1>
<div class="bram">
 <ul class="breadcrumb">
	<li><i class="fa fa-home"></i><?php echo $this->Html->link(__('Home'), array('plugin' => false, 'controller' => 'users','action' => 'dashboard')); ?>
    <i class="fa  fa-angle-right "></i>
    </li>
	<li><?php echo $this->Html->link(__('Action'), array('controller' => 'aros','action' => 'add_action')); ?>
     <i class="fa  fa-angle-right "></i>
    </li>
	<li class="active"><?php echo __('Add Action'); ?></li>
   
   </ul>  
   <div class="calender"> </div>
   <div style="clear:both"></div>
</div>
<!-- END PAGE HEADER-->

<?php echo $this->Session->flash(); ?> 


<div class="mart-b">
    <div class="row mart-b">
        <div class="col-md-12">
<?php

echo $this->Html->link('<button type="button" class="btn default"><i class="fa fa-list"></i> '.__('Add New Action').'</button>', array('controller' => 'aros', 'action' => 'add_action','plugin'=>'acl'),array('escape'=> false));

?>
        </div>
    </div>
</div>
	

<!-- page start--->
<div class="row">
	<div class="col-md-12" >
	<?php echo $this->element('Aros/form') ?>
		
	</div>
</div>
<!-- page end---->	