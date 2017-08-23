<!-- BEGIN PAGE HEADER-->
<h1 class="page-header">
<?php echo __('Newsletter'); ?> 
</h1>
<div style="margin-bottom:15px;margin-top:10px;" class="btn-group btn-breadcrumb" id="bc1">
    <?php echo $this->Html->link('<i class="fa fa-home"></i>', array('plugin' => false, 'controller' => 'users','action' => 'dashboard'),array('style'=>'background:#000000;','escape'=>false,'class'=>'btn btn-default')); ?>
     <?php echo $this->Html->link(__('Newsletter'), array('plugin' => 'newsletter', 'controller' => 'newsletters',
	 'action' => 'index'),array('escape'=>false,'class'=>'btn btn-default')); ?>
    <a class="btn btn-default active" href="javascript::void();" style="display: block;"><div>Edit</div></a> 
    <a class="" href="#"><div></div></a> 
 </div>
<!-- END PAGE HEADER-->
<?php echo $this->Session->flash(); ?> 
<div class="row">
    <div class="col-md-12">
    	<div class="mart-b">
            <div class="row mart-b">
                <div class="col-md-6">
					<?php
                    echo $this->Html->link('<button type="button" class="btn default"><i class="fa fa-list"></i> '.__('List Newsletters').'</button>', array('action' => 'index'),array('escape'=> false)); ?>
                   <?php echo $this->Html->link('<button type="button" class="btn default"><i class="fa fa-server"></i> '.__('Manage Newsletter Category').'</button>', array('controller' => 'newsletter_categories','action' => 'manage'),array('escape'=> false));
                    
                    ?>
                   </div>
    	</div>
        
    </div>
    <?php echo $this->element('Newsletters/form');?>
    </div>
</div>
