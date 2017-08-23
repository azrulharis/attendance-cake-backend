<!-- BEGIN PAGE HEADER-->
<h1 class="page-header">
<?php echo __('Newsletter Setting'); ?> 
</h1>
<div class="bram">
	<ul>
		<li>
			<i class="fa fa-home"></i>
			<?php echo $this->Html->link(__('Home'), array('plugin' => false, 'controller' => 'users','action' => 'dashboard')); ?>
			<i class="fa fa-angle-right"></i>
		</li>
		<li>
        	<?php echo $this->Html->link(__('Newsletter Setting'), array('action' => 'index')); ?>
			<i class="fa fa-angle-right"></i>
		</li>
		<li>
			<?php echo __('Edit'); ?>
		</li>
	</ul>
     <div style="clear:both"></div>	
</div>
<!-- END PAGE HEADER-->
<?php echo $this->Session->flash(); ?> 
<div class="row">
    <div class="col-md-12">
    <?php echo $this->element('NewsletterSettings/form');?>
    </div>
</div>
