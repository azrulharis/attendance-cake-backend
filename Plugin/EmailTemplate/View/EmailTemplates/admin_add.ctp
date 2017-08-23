<!-- BEGIN PAGE HEADER-->
<h1 class="page-header"><?php echo __('Email Templates'); ?></h1>
<div style="margin-bottom:15px;margin-top:10px;" class="btn-group btn-breadcrumb" id="bc1">
    <?php echo $this->Html->link('<i class="fa fa-home"></i>', array('plugin' => false, 'controller' => 'users','action' => 'dashboard'),array('style'=>'background:#000000;','escape'=>false,'class'=>'btn btn-default')); ?>
     <?php echo $this->Html->link(__('Email Template'), array('plugin' => 'email_template', 'controller' => 'email_templates','action' => 'index'),array('escape'=>false,'class'=>'btn btn-default')); ?>
    <a class="btn btn-default active" href="javascript::void();" style="display: block;"><div>Add</div></a> 
    <a class="" href="#"><div></div></a> 
 </div>
<!-- END PAGE HEADER-->

<div class="row"> 
  <div class="col-xs-12">
    <div class="x_panel tile">
      <div class="x_title">
        <h2>Add Email Template</h2> 
        <div class="clearfix"></div>
      </div>
      <div class="x_content"> 
        <?php echo $this->Session->flash(); ?>


<div class="mart-b">
    <div class="row mart-b">
        <div class="col-md-12">
<?php

echo $this->Html->link('<button type="button" class="btn default"><i class="fa fa-list"></i> '.__('List Email Template').'</button>', array('controller' => 'email_templates','action'=>'index','label'=>'true','plugin'=>'email_template'),array('escape'=> false));


?>
        </div>
    </div>
</div>
	
 
<div class="row">
	<div class="col-md-12" >
		<?php echo $this->element('EmailTemplates/form');?>
	</div>
</div> 	

</div>
</div>  
</div>
</div>  