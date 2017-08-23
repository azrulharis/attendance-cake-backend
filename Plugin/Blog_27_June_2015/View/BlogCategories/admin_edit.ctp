<?php echo $this->element('Blogs/screen_option');?>
<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
<!-- BEGIN STYLE CUSTOMIZER -->
<?php echo $this->element('admin/theme_setting')?>
<!-- END STYLE CUSTOMIZER -->
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
 <?php echo __('Blog'); ?>&nbsp; <small>All blogs regarding all pages.</small>
</h3>

			<div class="page-bar">
					<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<?php echo $this->Html->link(__('Home'), array('plugin' => false, 'controller' => 'users','action' => 'dashboard')); ?>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<?php echo $this->Html->link( "Blogs", array('controller' => 'blogs','action'=>'index') );?>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
					<?php echo __('Edit Blog'); ?>
					</li>
				</ul>
			</div>
			
			<!-- END PAGE HEADER-->
		 <!--links-->
 
 
 <!-- Flash Messages -->   
 <?php echo $this->Session->flash(); ?> 
  <!-- Flash Messages --> 
         
<div class="row" style="margin-bottom:10px">
	<div class="col-md-12">
<?php

echo $this->Html->link('<button type="button" class="btn blue-hoki">'.__('New Blogs').'</button>', array('controller' => 'blogs','action'=>'add', 'label'=>'true', 'plugin'=>'content'),array('escape'=> false));

echo $this->Html->link('<button type="button" class="btn yellow-crusta">'.__('Blog List').'</button>', array('controller' => 'blogs','action'=>'index', 'label'=>'true', 'plugin'=>'content'),array('escape'=> false));
?>

	</div>
</div>
            
<!--end links-->				
			
			
<!-- BEGIN PAGE CONTENT-->

<div class="row">
	<div class="col-md-12">
		<?php echo $this->element('Blogs/form');?>
	</div>
</div>
	
<!-- END PAGE CONTENT-->

