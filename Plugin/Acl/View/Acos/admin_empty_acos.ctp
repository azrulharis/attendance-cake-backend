<!-- BEGIN PAGE HEADER-->
<h3 class="page-header"><?php echo __('ACL Plugin'); ?></h3>
<div class="bram">
	<ul class="breadcrumb">
		<li>
			<i class="fa fa-home"></i>
			<?php echo $this->Html->link('Home',array('controller'=>'users','action'=>'dashboard','plugin'=>false));?>
			<i class="fa fa-angle-right"></i>
		</li>
		<li>
			<a href="javascript:void();">Access Manager</a>
			<i class="fa fa-angle-right"></i>
		</li>
		<li>
			<a href="javascript:void();">Action</a>
			<i class="fa fa-angle-right"></i>
		</li>
		<li>
			Clear Action ACOs
		</li>
	</ul>
<div style="clear:both"></div>	
	
</div>
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<div class="row" style="margin-bottom:10px;">
	<div class="col-md-12">
		<div class="clearfix  right">
			<?php 
				echo $this->Html->link('<button type="button" class="btn default"><i class="fa fa-plus"></i> '.__('Synchronize ACOs').'</button>', array('controller' => 'acos','action' => 'synchronize','plugin' => 'acl', 'admin'=>true), array('escape' => false));
				echo $this->Html->link('<button type="button" class="btn default"><i class="fa fa-plus"></i> '.__('Clear Action ACOs').'</button>', array('controller' => 'acos','action' => 'empty_acos','plugin' => 'acl', 'admin'=>true), array('escape' => false)); 
				echo $this->Html->link('<button type="button" class="btn default"><i class="fa fa-plus"></i> '.__('Bulid Action ACOs').'</button>', array('controller' => 'acos','action' => 'build_acl','plugin' => 'acl', 'admin'=>true), array('escape' => false)); 
				echo $this->Html->link('<button type="button" class="btn default"><i class="fa fa-plus"></i> '.__('Prune Action ACOs').'</button>', array('controller' => 'acos','action' => 'prune_acos','plugin' => 'acl', 'admin'=>true), array('escape' => false)); 
			?>
		</div>
	</div>
</div>				

<div class="row">
	<div class="col-md-12">
		<?php echo $this->Session->flash(); ?>
		<!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="table-wrap">
			<div class="table-head">
				<div class="table-head-lt"><i class="fa fa-cogs"></i><?php echo __('Empty Acl') ?></div>

				<?php echo $this->element('table_toolbar'); ?>
                <div style="clear:both"></div>
			</div>
			<div style="padding:20px 10px 0px 10px;" class="table-responsive">
			<?php
			echo '<p>';
			echo __d('acl', 'This page allows you to clear all actions ACOs.');
			echo '</p>';
			echo '<p>&nbsp;</p>';
    
			if($actions_exist)
			{
				echo '<p>';
				echo __d('acl', 'Clicking the link will destroy all existing actions ACOs and associated permissions.');
				echo '</p>';
				
				echo '<p>';
				echo $this->Html->link($this->Html->image('/acl/img/design/cross.png') . ' ' . __d('acl', 'Clear ACOs'), '/admin/acl/acos/empty_acos/run', array('confirm' => __d('acl', 'Are you sure you want to destroy all existing ACOs ?'), 'escape' => false));
				echo '</p>';
			}
			else
			{
				echo '<p style="font-style:italic;">';
				echo __d('acl', 'There is no ACO node to delete');
				echo '</p>';
			}
			?>			
			</div>
		</div>
		<!-- END SAMPLE TABLE PORTLET-->
	</div>
</div>
