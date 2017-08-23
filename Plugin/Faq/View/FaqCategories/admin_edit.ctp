<!-- BEGIN PAGE HEADER-->
<h1 class="page-header">Edit Faq Category</h1>
 <div style="margin-bottom:15px;margin-top:10px;" class="btn-group btn-breadcrumb" id="bc1">
    <?php echo $this->Html->link('<i class="fa fa-home"></i>', array('plugin' => false, 'controller' => 'users','action' => 'dashboard'),array('style'=>'background:#000000;','escape'=>false,'class'=>'btn btn-default')); ?>
     <?php echo $this->Html->link(__('Faq Categories'), array('action' => 'index'),array('escape'=>false,'class'=>'btn btn-default')); ?>
    <a class="btn btn-default active" href="javascript::void();" style="display: block;"><div>Edit</div></a> 
    <a class="" href="#"><div></div></a> 
 </div>

<!-- END PAGE HEADER-->


<!--links-->
 <!-- Flash Messages -->   
 <?php echo $this->Session->flash(); ?> 
  <!-- Flash Messages --> 
         <div class="mart-b">
    <div class="row mart-b">
        <div class="col-md-12">
 <?php

echo $this->Html->link('<button type="button" class="btn default">'.__('New Faq').'</button>', array('controller' => 'faqs','action'=>'add', 'label'=>'true', 'plugin'=>'faq'),array('escape'=> false));
echo $this->Html->link('&nbsp;<button type="button" class="btn default">'.__('List Faqs').'</button>', array('controller' => 'faqs','action'=>'index', 'label'=>'true', 'plugin'=>'faq'),array('escape'=> false));
echo $this->Html->link('&nbsp;<button type="button" class="btn default">'.__('List Faq Categories ').'</button>', array('controller' => 'faq_categories','action'=>'index','plugin'=>'faq'),array('escape'=> false));
?>
        </div>
    </div>
</div>
<!--end links-->		
<!-- BEGIN PAGE CONTENT-->
<div class="row">
	<div class="col-md-12" >
		<?php echo $this->element('FaqCategories/form');?>
	</div>
</div>