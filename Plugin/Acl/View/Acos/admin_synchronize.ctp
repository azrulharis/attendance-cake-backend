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
			Synchronize Action ACOs
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
            <div class="table-head-lt"><i class="fa fa-cogs"></i><?php echo __('Synchronize'); ?></div>
            <?php echo $this->element('table_toolbar'); ?>
            <div style="clear:both"></div>
        </div>
			<div style="padding:20px 10px 0px 10px;" class="table-responsive">
			<?php
			if($run)
			{
				echo '<h3>' . __d('acl', 'New ACOs') . '</h3>';
				
				if(count($create_logs) > 0)
				{
					echo '<p>';
					echo __d('acl', 'The following actions ACOs have been created');
					echo '<p>';
					echo $this->Html->nestedList($create_logs);
				}
				else
				{
					echo '<p>';
					echo __d('acl', 'There was no new actions ACOs to create');
					echo '</p>';
				}
				
				echo '<h3>' . __d('acl', 'Obsolete ACOs') . '</h3>';
				
				if(count($prune_logs) > 0)
				{
					echo '<p>';
					echo __d('acl', 'The following actions ACOs have been deleted');
					echo '<p>';
					echo $this->Html->nestedList($prune_logs);
				}
				else
				{
					echo '<p>';
					echo __d('acl', 'There was no action ACO to delete');
					echo '</p>';
				}
			}
			else
			{
				echo '<p>';
				echo __d('acl', 'This page allows you to synchronize the existing controllers and actions with the ACO datatable.');
				echo '</p>';
				
				echo '<p>&nbsp;</p>';
				
				$has_aco_to_sync = false;
				
				if(count($missing_aco_nodes) > 0)
				{
					echo '<h3>' . __d('acl', 'Missing ACOs') . '</h3>';
					
					echo '<p>';
					echo $this->Html->nestedList($missing_aco_nodes);
					echo '</p>';
					
					$has_aco_to_sync = true;
				}
				
				if(count($nodes_to_prune) > 0)
				{
					echo '<h3>' . __d('acl', 'Obsolete ACO nodes') . '</h3>';
					
					echo '<p>';
					echo $this->Html->nestedList($nodes_to_prune);
					echo '</p>';
					
					$has_aco_to_sync = true;
				}
				
				if($has_aco_to_sync)
				{
					echo '<p>&nbsp;</p>';
					
					echo '<p>';
					echo __d('acl', 'Clicking the link will not change or remove permissions for existing actions ACOs.');
					echo '</p>';
					
					echo '<p>';
					echo $this->Html->link($this->Html->image('/acl/img/design/sync.png') . ' ' . __d('acl', 'Synchronize'), '/admin/acl/acos/synchronize/run', array('escape' => false));
					echo '</p>';
				}
				else
				{
					echo '<p style="font-style:italic;">';
					echo $this->Html->image('/acl/img/design/tick.png') . ' ' . __d('acl', 'The ACO datatable is already synchronized');
					echo '</p>';
				}
			}
			?>			
			</div>
		</div>
		<!-- END SAMPLE TABLE PORTLET-->
	</div>
</div>
